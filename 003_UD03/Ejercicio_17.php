<?php
/* Escribe un script que reciba dos números de un formulario y los sume. Si el
resultado es mayor que 100, mostrarlo en color verde y si no. mostrarlo en color rojo. */

// Función para mostrar el resultado en color
function mostrar_resultado($resultado, $color) {
  echo "<span style='color: $color'>$resultado</span>";
}

// Obtener los números del formulario
$numero_1 = $_POST["numero_1"];
$numero_2 = $_POST["numero_2"];

// Sumar los números
$resultado = $numero_1 + $numero_2;

// Comprobar si el resultado es mayor que 100
if ($resultado > 100) {
  $color = "green";
} else {
  $color = "red";
}

// Mostrar el resultado
mostrar_resultado($resultado, $color);