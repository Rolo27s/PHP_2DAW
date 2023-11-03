<?php
/* Escribe un script que devuelva si un número es divisible por 3. */
function es_divisible_por_tres($numero) {

  // Comprobar si la suma es divisible por 3.
  return ($numero % 3 == 0);
}

$numero = 19;

// Comprobar si el número es divisible por 3.
$es_divisible = es_divisible_por_tres($numero);

// Mostrar el resultado.
if ($es_divisible) {
  echo "El número $numero es divisible por 3.";
} else {
  echo "El número $numero no es divisible por 3.";
}
