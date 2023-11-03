<?php
/* Escribe un script que reciba un número de un formulario y compruebe si tiene 3
dígitos y devuelva si o no. */

// Función para comprobar si un número tiene 3 dígitos
function tiene_tres_digitos($numero) {
  return (strlen($numero) == 3);
}

// Función para mostrar el resultado
function mostrar_resultado($numero) {
  if (tiene_tres_digitos($numero)) {
    echo "El número si tiene 3 dígitos.";
  } else {
    echo "El número no tiene 3 dígitos.";
  }
}

// Obtener el número del formulario
$numero = $_POST["numero"];

// Comprobar si el número tiene 3 dígitos
mostrar_resultado($numero);