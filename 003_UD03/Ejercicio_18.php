<?php
/* Escribe un script que reciba un número de un formulario y lo devuelva elevado al cuadrado. */
$numero = $_POST["numero"];

$result = $numero * $numero;

echo ("El numero $numero al cuadrado es $result");