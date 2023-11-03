<?php
/* Escribe un script que reciba dos números de un formulario y compruebe si están
entre 0 y 50 o entre 100 y 150, ambos inclusive, y devuelva si o no. */
function esta_entre_0_y_50($numero) {
  return ($numero >= 0 && $numero <= 50);
}

function esta_entre_100_y_150($numero) {
  return ($numero >= 100 && $numero <= 150);
}

// Función para mostrar el resultado
function mostrar_resultado($numero_1, $numero_2) {
  if ((esta_entre_0_y_50($numero_1) || esta_entre_100_y_150($numero_1)) && (esta_entre_0_y_50($numero_2) || esta_entre_100_y_150($numero_2))) {
    echo "Los números $numero_1 y $numero_2 si están entre 0 y 50 o entre 100 y 150.";
  } else {
    echo "Los números $numero_1 y $numero_2 no están entre 0 y 50 o entre 100 y 150.";
  }
}

// Obtener los números del formulario
$numero_1 = $_POST["numero_1"];
$numero_2 = $_POST["numero_2"];

// Comprobar si los números están entre 100 y 200
mostrar_resultado($numero_1, $numero_2);
