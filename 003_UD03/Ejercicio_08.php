<?php
/* Desarrolla un script que permita subir un fichero sólo si tiene extensión .zip. */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Extensiones permitidas en este caso sólo zip. De esta manera comprobaremos si este array está contenido en otro array que generaremos que recogerá la extensión del archivo subido.
  $allowedExtensions = array('zip');

  // $_FILES es una variable superglobal en PHP que contiene información sobre archivos enviados a través de formularios.

  // $_FILES['archivo']['error'] === UPLOAD_ERR_OK verifica que no haya errores al cargar el archivo. UPLOAD_ERR_OK indica que no se produjeron errores al cargar el archivo.
  if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    // Obtengo el nombre del archivo subido
    $fileName = $_FILES['archivo']['name'];

    // Obtengo la extensión del archivo subido y así podré comprobar si es .zip
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // in_array($fileExtension, $allowedExtensions) verifica si la extensión del archivo coincide con alguna de las extensiones permitidas (en este caso, solo ".zip")
    if (in_array($fileExtension, $allowedExtensions)) {
      // Directorio donde se almacenarán los archivos ZIP
      $uploadDirectory = 'uploads/';
      if (!is_dir($uploadDirectory)) { // Si la carpeta no existe, se crea con permisos de escritura.
        mkdir($uploadDirectory, 0755, true);
      }

      // Ruta completa del archivo en el servidor
      $targetFilePath = $uploadDirectory . $fileName;

      // move_uploaded_file se utiliza para mover el archivo desde la ubicación temporal donde se carga ($_FILES['archivo']['tmp_name']) a la ubicación definitiva en el servidor ($targetFilePath). Si ha sido posible devolverá true y se subirá con éxito.
      if (move_uploaded_file($_FILES['archivo']['tmp_name'], $targetFilePath)) {
        echo "El archivo se ha subido con éxito.";
      } else {
        echo "Error al subir el archivo.";
      }
    } else { // En caso de que no sea extensión .zip se manda el aviso
      echo "Solo se permiten archivos ZIP.";
    }
  } else {
    echo "Error al cargar el archivo.";
  }
}
