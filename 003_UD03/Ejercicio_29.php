<?php
/* Escribe una función en el script anterior que devuelva la suma de los elementos 3 y 7 del array anterior. */

$array = [];

for ($i = 0; $i < 10; $i++) {
    $array[$i] = $i;
}

// veo el contenido del array
foreach ($array as $value) {
    echo $value . " ";
}

echo "<br>";

// Función para calcular la suma de los elementos 3 y 7 del array
function sumaElementos($array)
{
    return $array[3] + $array[7];
}

// Calcular y mostrar la suma de los elementos 3 y 7 del array
echo "La suma de los elementos 3 y 7 del array anterior es: " . sumaElementos($array);
