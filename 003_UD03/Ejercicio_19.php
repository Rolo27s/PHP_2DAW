<?php
/* Escribe un script que calcule el área de un rectángulo a partir de sus dos lados. */

// Función para calcular el área de un rectángulo
function calcular_area_rectangulo($base, $altura) {
  return $base * $altura;
}

// Obtener los lados del rectángulo del formulario
$base = 4;
$altura = 7;

// Calcular el área
$area = calcular_area_rectangulo($base, $altura);

// Mostrar el área
echo "El área del rectángulo es: $area";
