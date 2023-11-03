<?php
/* Escribe una función en el script anterior que devuelva por pantalla cada elemento del array anterior. en una línea diferente */
$array = [];

for ($i = 0; $i < 1000; $i++) {
    $array[$i] = "elemento" . $i;
}

// veo el contenido del array
foreach ($array as $value) {
    echo $value . "<br>";
}