<?php
/* Escribe un script que calcule el área de un círculo a partir de su radio. */
// Función para calcular el área de un círculo
function calcular_area_circulo($radio) {
  return pi() * $radio * $radio;
}

// Obtener el radio del círculo del formulario
$radio = 44;

// Calcular el área
$area = calcular_area_circulo($radio);

// Mostrar el área
echo "El área del círculo es: $area";
