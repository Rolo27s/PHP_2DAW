<?php
/* 
    • Utilizar la función header para redirigir a los usuarios a una nueva página después de cierta cantidad de tiempo.
    • En la página original, incluir un formulario con un campo de entrada.
    • Utilizar el método GET para enviar los datos del formulario a la nueva página.
    • Mostrar un mensaje en la nueva página a la que se redirigen los usuarios, incluyendo el valor enviado a través del método GET.
    • Utilizar una cookie para recordar el último valor enviado a través del formulario.
*/

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $nombre = $_GET['nombre'];
    setcookie("Nombre-de-usuario", $nombre, time() + 600, '/');
    echo "<h1>Bienvenido {$nombre}!</h1>";
    echo "<p>Se ha accedido a esta web con un método get. Fíjate en la URL, sale tu nombre</p>";
    echo "<p>Tras 10 segundos serás redirigido automáticamente al formulario inicial. Hasta otra!</p>";
    /// Espera 10 segundos antes de redirigir
    header("refresh:10;url=index.html");
} else {
    echo "<p>Ha ocurrido algún fallo con el método GET</p>";
}
