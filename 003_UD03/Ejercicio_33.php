<?php
/* Crea un formulario con un dato numérico de 1 a 9, al enviarlo mostrará la tabla de multiplicar de dicho número. */

// Obtener el número
$numero = $_POST['numero'];
$numero = intval($numero);

// Recorrer los valores de 1 a 10
for ($i = 0; $i <= 10; $i++) {
  // Multiplicar el número por el valor del contador
  $resultado = $numero * $i;

  // Mostrar el resultado
  echo "$numero x $i = $resultado<br/>";
}
