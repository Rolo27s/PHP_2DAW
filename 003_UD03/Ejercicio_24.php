<?php
/* Escribe en un script un array de 1000 elementos con el valor elemento0, elemento1,
..., elemento999. */
$array = [];

for ($i = 0; $i < 1000; $i++) {
    $array[$i] = "elemento" . $i;
}