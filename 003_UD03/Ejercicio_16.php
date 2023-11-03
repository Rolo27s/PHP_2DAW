<?php
/* Escribe un script que reciba un número de un formulario de 4 dígitos (por ejemplo,
1347) y lo devuelva descompuesto por pantalla como: Unidades de millar: 1000,
centenas: 300, decenas: 40, unidades: 7. */

// Función para descomponer un número
function descomponer_numero($numero) {
  // Obtener las unidades de millar
  $unidades_millar = substr($numero, 0, 1) * 1000; // variable, comienzo de substring, numero de caracteres

  // Obtener las centenas
  $centenas = substr($numero, 1, 1) * 100;

  // Obtener las decenas
  $decenas = substr($numero, 2, 1) * 10;

  // Obtener las unidades
  $unidades = substr($numero, 3, 1);

  // Mostrar el número descompuesto
  echo "Unidades de millar: $unidades_millar </br> centenas: $centenas </br> decenas: $decenas </br> unidades: $unidades";
}

// Obtener el número del formulario
$numero = $_POST["numero"];


// Doble comprobación. La regEx es que el primer carácter sea del 1 al 9, ^[1-9], luego \d{3} son que halla 3 números más.
if (preg_match("/^[1-9]\d{3}$/", $numero)) {
  descomponer_numero($numero);
} else {
  echo ("Input erróneo");
}
