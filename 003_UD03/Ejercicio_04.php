<?php
/* Desarrolla un script que reciba un texto de entrada y, de forma aleatoria, ponga en
mayúsculas algunas letras. */

function mayusculas_aleatorias($texto) {
  // Convertir el texto a un array de caracteres.
  $array_texto = str_split($texto);

  // Iterar sobre el array de caracteres.
  for ($i = 0; $i < count($array_texto); $i++) {
    // Generar un número aleatorio entre 0 y 1.
    $numero_aleatorio = rand(0, 1);

    // Si el número aleatorio es 1, poner la letra en mayúsculas.
    if ($numero_aleatorio == 1) {
      $array_texto[$i] = strtoupper($array_texto[$i]);
    }
  }

  // Convertir el array de caracteres de nuevo a una cadena.
  $texto_en_mayusculas = implode("", $array_texto);

  return $texto_en_mayusculas;
}

// Introduzco un texto emulando una entrada por consola
$texto_de_entrada = "Texto de prueba para comprobar mayúsculas randoms";

// Convertir el texto de entrada a mayúsculas aleatorias.
$texto_en_mayusculas = mayusculas_aleatorias($texto_de_entrada);

// Mostrar el texto en mayúsculas aleatorias.
echo "El texto en mayúsculas aleatorias es: $texto_en_mayusculas";
