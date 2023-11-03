<?php
/* Escribe un script que calcule el área de un triángulo rectángulo a partir de sus dos catetos. */
function calcular_area_triangulo_rectangulo($cateto_1, $cateto_2) {
  return (1 / 2) * $cateto_1 * $cateto_2;
}

// Obtener los catetos del triángulo rectángulo del formulario
$cateto_1 = 8;
$cateto_2 = 22;

// Calcular el área
$area = calcular_area_triangulo_rectangulo($cateto_1, $cateto_2);

// Mostrar el área
echo "El área del triángulo rectángulo es: $area";
