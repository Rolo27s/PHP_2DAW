<?php
/* Desarrolla un script que reciba un fichero de texto con palabras separadas por líneas y las añada a un array */

$my_file = "archivo-ejercicio-5.txt";

if (file_exists($my_file)) {
  $contenido = file_get_contents($my_file);
  // Genero el array de frutas
  $frutas = explode('-', $contenido);

  echo "Mi array de frutas: ";
  print_r($frutas);

} else {
  echo "El archivo '$my_file' no existe";
}

// Otra manera usando fopen en lugar de file_get_contents
/* 
<?php

$my_file = "archivo-ejercicio-5.txt";

if (file_exists($my_file)) {
  // Abre el archivo en modo lectura
  $file = fopen($my_file, "r");

  if ($file) {
    $frutas = array();

    // Lee el archivo línea por línea y agrega cada línea al array de frutas
    while (!feof($file)) {
      $line = fgets($file);
      $frutas = array_merge($frutas, explode('-', $line));
    }

    // Cierra el archivo
    fclose($file);

    echo "Mi array de frutas: ";
    print_r($frutas);
  } else {
    echo "No se pudo abrir el archivo para lectura.";
  }
} else {
  echo "El archivo '$my_file' no existe";
}
*/
