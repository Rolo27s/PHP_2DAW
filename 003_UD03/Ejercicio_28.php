<?php
/* Escribe una función en el script anterior que devuelva por pantalla cada elemento del array anterior separado por un espacio. */
$array = [];

for ($i = 0; $i < 10; $i++) {
    $array[$i] = $i;
}

// veo el contenido del array
foreach ($array as $value) {
    echo $value . " ";
}