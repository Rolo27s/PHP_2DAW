<?php
/* Desarrolla un script que reciba un array y lo devuelva escrito por líneas en un fichero
de texto */

// Array de frutas
$frutas = array("Manzana", "Pera", "Plátano", "Sandía", "Melón", "Melocotón", "Uvas", "Pasas");

// Nombre del archivo en el que se guardarán las frutas
$nombreArchivo = "archivo-ejercicio-6.txt";

// Abrir el archivo en modo escritura
$file = fopen($nombreArchivo, "w");

if ($file) {
  $count = count($frutas);

  // Recorrer el array y escribir cada elemento en una línea del archivo
  foreach ($frutas as $key => $fruta) {
    fwrite($file, $fruta);

    // Agregar un salto de línea si no es el último elemento
    if ($key < $count - 1) {
      fwrite($file, PHP_EOL);
    }
  }

  // Cerrar el archivo
  fclose($file);

  echo "El archivo '$nombreArchivo' se ha creado satisfactoriamente con las frutas.";
} else {
  echo "No se pudo abrir el archivo para escritura.";
}
