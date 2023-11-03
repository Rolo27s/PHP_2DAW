<?php 
/* Desarrolla un script que devuelva el número de veces que aparece cada vocal en una frase */

function contarVocales($frase) {
    // Convertir la frase a minúsculas para hacer la búsqueda de vocales insensible a mayúsculas y minúsculas.
    $frase = strtolower($frase);

    // Inicializar un arreglo asociativo para contar las vocales.
    $vocales = ['a' => 0, 'e' => 0, 'i' => 0, 'o' => 0, 'u' => 0];

    // Recorrer la frase y contar las vocales.
    for ($i = 0; $i < strlen($frase); $i++) {
        // Recorro la frase y guardo cada carácter
        $caracter = $frase[$i];
        // Miro si ese carácter existe en el array de vocales.
        /* 
        Para revisar las keys en un array se usaría array_key_exists(palabra, array)
        Para revisar los values en un array se usaría in_array(palabra, array)
        */
        if (array_key_exists($caracter, $vocales)) {
            $vocales[$caracter]++;
        }
    }

    return $vocales;
}

// Ejemplo de uso:
$frase = "Estoy probando la función de contar vocales";
$resultado = contarVocales($frase);

// Por cada contenido del array resultado y mirando el key, value, muestro cada par por pantalla
foreach ($resultado as $vocal => $cantidad) {
    echo "La vocal '$vocal' aparece $cantidad veces.<br>";
}
