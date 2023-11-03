<?php
/* Desarrolla un script que compruebe si una palabra o frase es palíndroma (como las
capicúas en los números. Ejemplos: reconocer, rallar, dábale arroz a la zorra el
abad) */

function esPalindromo($cadena) {
    // Elimina espacios y convierte la cadena a minúsculas para hacer la comparación insensible a mayúsculas y minúsculas.
    $cadena = strtolower(trim($cadena));
    
    // Invierte la cadena.
    $cadenaInvertida = strrev($cadena);
    
    // Comprueba si la cadena original y la invertida son iguales.
    return $cadena === $cadenaInvertida;
}

// Ejemplo de uso:
$frase = "reconocer";
if (esPalindromo($frase)) {
    echo "La frase '$frase' es un palíndromo.";
} else {
    echo "La frase '$frase' no es un palíndromo.";
}
