<?php
/* Ejercicio 1: Manipulación de Datos de Usuarios con Cookies
En un sistema de gestión de usuarios, se te pide escribir un script en PHP que realice las siguientes tareas:­
    • Crear un array con información de usuarios que incluya nombre, edad y correo electrónico.
    • Mostrar en pantalla la información de cada usuario.
    • Calcular la edad promedio de los usuarios.
    • Definir una cookie con el nombre del usuario y mostrar su valor. */


$infoUser = [
    ['Juan.Pardo', 34, 'juan.pardo@gmail.com'],
    ['Miguel.Buñuel', 22, 'miguel.buñuel@gmail.com'],
    ['Emilio.Aragon', 74, 'emilio.aragon@gmail.com'],
];

$totAge = 0;
$count = 0;
foreach ($infoUser as $info) {
    $totAge += $info[1];
    $count++;
    echo ("Nombre: {$info[0]}</br>");
    echo ("Edad: {$info[1]}</br>");
    echo ("Correo: {$info[2]}</br></br>");

    // Agrego una nueva cookie por cada usuario por los próximos 10 minutos
    setcookie("Nombre-de-usuario-{$count}", $info[0], time() + 600, '/');
}

$edadPromedio = $totAge / $count;
$edadPromedio = intval($edadPromedio);
// $edadPromedio = number_format((float)$edadPromedio, 2, '.', '');
echo "</br>Edad promedio: {$edadPromedio} años";
