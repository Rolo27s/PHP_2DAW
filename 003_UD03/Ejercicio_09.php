<?php
/* Modifica el script anterior para que el tamaño máximo permitido sea de 2MB. */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Extensiones permitidas en este caso solo .zip
  $allowedExtensions = array('zip');

  // Tamaño máximo permitido en bytes (2MB)
  $maxFileSize = 2 * 1024 * 1024; // 2MB

  if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    $fileName = $_FILES['archivo']['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    // Almacena el tamaño del archivo en bytes
    $fileSize = $_FILES['archivo']['size'];

    // En este condicional insertamos la condición que el tamaño debe ser menor o igual a 2MB
    if (in_array($fileExtension, $allowedExtensions) && $fileSize <= $maxFileSize) {
      $uploadDirectory = 'uploads/';
      if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true); // El tercer parámetro de mkdir en true está habilitando que se generen directorios padres si fuese necesario. 0755 son permisos de escritura.
      }

      $targetFilePath = $uploadDirectory . $fileName;

      if (move_uploaded_file($_FILES['archivo']['tmp_name'], $targetFilePath)) {
        echo "El archivo se ha subido con éxito.";
      } else {
        echo "Error al subir el archivo.";
      }
    } elseif (!in_array($fileExtension, $allowedExtensions)) {
      echo "Solo se permiten archivos ZIP.";
    } else {
      echo "El archivo supera el tamaño máximo permitido (2MB).";
    }
  } else {
    echo "Error al cargar el archivo.";
  }
}
