<?php
/* Escribe un script que reciba dos números de un formulario y compruebe si están
entre 100 y 200 y devuelva si o no. */

// Función para comprobar si un número está entre 100 y 200
function esta_entre_100_y_200($numero) {
  return ($numero >= 100 && $numero <= 200);
}

// Función para mostrar el resultado
function mostrar_resultado($numero_1, $numero_2) {
  if (esta_entre_100_y_200($numero_1) && esta_entre_100_y_200($numero_2)) {
    echo "Los números $numero_1 y $numero_2 si están entre 100 y 200.";
  } else {
    echo "Los números $numero_1 y $numero_2 no están entre 100 y 200.";
  }
}

// Obtener los números del formulario
$numero_1 = $_POST["numero_1"];
$numero_2 = $_POST["numero_2"];

// Comprobar si los números están entre 100 y 200
mostrar_resultado($numero_1, $numero_2);
