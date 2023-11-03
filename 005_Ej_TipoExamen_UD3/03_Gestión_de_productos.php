<?php
/* Ejercicio 2: Gestión de Productos
En un sistema de gestión de productos, se te pide escribir un script en PHP que realice las siguientes tareas:
    • Crear un array de productos que incluya nombre, precio y cantidad en stock.
    • Mostrar en pantalla la información de cada producto.
    • Calcular y mostrar el precio total de todos los productos en stock. */

// Nombre, precio y cantidad en stock
$productos = [
    ['plátanos', 3.46, 80],
    ['mandarinas', 2.14, 55],
    ['peras', 2.56, 34]
];

$total = 0;
foreach ($productos as $item) {
    $subtotal = 0;
    echo "Producto: {$item[0]} </br>";
    echo "Precio: {$item[1]} </br>";
    echo "Cantidad: {$item[2]} </br>";

    $subtotal = $item[1] * $item[2];

    echo "Precio del subtotal de {$item[0]}: {$subtotal} </br></br>";

    $total += $subtotal;
}

echo "Precio total de todos los productos en stock: {$total}";
