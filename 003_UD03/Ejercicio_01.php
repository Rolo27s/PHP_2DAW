<?php
/* Desarrolla un script que reciba un número de mes y un número de día de la semana y devuelva el nombre del mes, el nombre del día de la semana y el número de días de dicho mes (sin tener en cuenta los bisiestos) */

$nombresMeses = [
    "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
];

$diasMeses = [
    31, 28, 31, 30, 31, 30,
    31, 31, 30, 31, 30, 31
];

$dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];

function getCalendarInfo($numMes, $numDia)
{
    global $nombresMeses, $diasMeses, $dias;

    if ($numMes >= 1 && $numMes <= 12 && $numDia >= 1 && $numDia <= 7) {
        $nombreMes = $nombresMeses[$numMes - 1]; // Restamos 1 porque los índices comienzan en 0.
        $nombreDia = $dias[$numDia - 1]; // Restamos 1 porque los índices comienzan en 0.
        $numDias = $diasMeses[$numMes - 1]; // Restamos 1 porque los índices comienzan en 0.

        return [
            'nombreMes' => $nombreMes,
            'nombreDia' => $nombreDia,
            'numDias' => $numDias
        ];
    } else {
        return "Número de mes o día de la semana no válidos. Deben estar en el rango 1-12 y 1-7, respectivamente.";
    }
}

// Ejemplo de uso:
$resultado = getCalendarInfo(5, 3); // Mes 5 (Mayo), Día 3 (Miércoles)
if (is_array($resultado)) {
    echo "Mes: " . $resultado['nombreMes'] . "<br>";
    echo "Día de la semana: " . $resultado['nombreDia'] . "<br>";
    echo "Número de días en el mes: " . $resultado['numDias'];
} else {
    echo $resultado;
}
