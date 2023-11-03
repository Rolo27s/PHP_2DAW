<?php
/* Ejercicio 4: Manipulación de Archivos
En un sistema de manipulación de archivos, se te pide escribir un script en PHP que realice las siguientes tareas:
    • Crear un archivo de texto y escribir un mensaje en él.
    • Leer el contenido del archivo y mostrarlo en pantalla. */

$info = 'Dos semanas después de su derrota en octavos de Shanghai, agudizada por la fatiga, Carlos Alcaraz se presenta en París-Bercy con las precauciones habituales de estas alturas del calendario. "No voy a decir que estoy al cien por cien, sería mentira en esta época del año", adelantó el lunes el ganador de Wimbledon. Con un debut delicado, ante Roman Safiullin, y los amargos recuerdos de sus dos primeras participaciones, Alcaraz admite que jugará con molestias su último Masters 1000 de 2023.';

// Genero o escribo archivo
chmod("Alcaraz.txt", 0777);
$file = fopen("Alcaraz.txt", "w");
if ($file) {
    fwrite($file, $info);
    fclose($file);
    echo "Archivo 'Alcaraz.txt' creado con éxito </br></br>";
} else {
    echo "No se pudo abrir el archivo para escritura";
}

// Leo archivo
if (file_exists("Alcaraz.txt")) {
    echo "Contenido del archivo: </br>";
    $contenido = file_get_contents("Alcaraz.txt");
    print_r($contenido);
} else {
    echo "El archivo 'Alcaraz.txt' no existe";
}
