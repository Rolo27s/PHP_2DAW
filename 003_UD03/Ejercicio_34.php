<?php
/* Programar un formulario con una contraseña, al enviarlo mostrará si se han usado:
mayúsculas, minúsculas, números, símbolos y longitud mínima. También mostrará un mensaje de robustez (muy poco robusta, poco robusta, regular robusta, bastante robusta y muy robusta) dependiendo de la cantidad de grupos usada y en un color que vaya variando desde el rojo hasta el verde. */

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $contrasena = $_POST["contrasena"];
    $robustez = 0;
    $color = "red";
    $requisitos = [];

    // Verificar si la contraseña tiene al menos 8 caracteres
    if (strlen($contrasena) >= 8) {
        $robustez++;
        $requisitos[] = "Longitud mínima";
    }

    // Verificar si la contraseña contiene mayúsculas
    if (preg_match('/[A-Z]/', $contrasena)) {
        $robustez++;
        $requisitos[] = "Mayúsculas";
    }

    // Verificar si la contraseña contiene minúsculas
    if (preg_match('/[a-z]/', $contrasena)) {
        $robustez++;
        $requisitos[] = "Minúsculas";
    }

    // Verificar si la contraseña contiene números
    if (preg_match('/[0-9]/', $contrasena)) {
        $robustez++;
        $requisitos[] = "Números";
    }

    // Verificar si la contraseña contiene símbolos (puedes personalizar esta parte)
    if (preg_match('/[\W_]/', $contrasena)) {
        $robustez++;
        $requisitos[] = "Símbolos";
    }

    // Asignar un color según la robustez
    if ($robustez === 0) {
        $color = "red";
        $mensaje = "Muy poco robusta";
    } elseif ($robustez === 1) {
        $color = "orange";
        $mensaje = "Poco robusta";
    } elseif ($robustez === 2) {
        $color = "yellow";
        $mensaje = "Regular robusta";
    } elseif ($robustez === 3) {
        $color = "lightgreen";
        $mensaje = "Bastante robusta";
    } else {
        $color = "green";
        $mensaje = "Muy robusta";
    }
}

echo ("Contrasena evaluada: $contrasena");

echo "</br>Requisitos:</br>";

foreach ($requisitos as $requisito) {
    echo "<li>$requisito</li>";
}

print ("<p>Mensaje de robustez: <span style='color: $color;'>$mensaje</span></p>
    <a href='Ejercicio_34.html'>Volver al formulario</a>");
