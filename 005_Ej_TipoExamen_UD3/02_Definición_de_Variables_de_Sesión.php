<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <form method="post">
        Ingrese nombre de usuario:
        <input type="text" name="campousuario" /><br />
        Ingrese clave:
        <input type="password" name="campoclave" /><br />
        <input type="submit" value="confirmar" />
    </form>
    <?php
    /* Ejercicio 2: Definición de Variables de Sesión
En un sistema de gestión de sesiones, se te pide escribir un script en PHP que realice las siguientes tareas:
    • Iniciar una sesión.
    • Definir variables de sesión para el nombre y el correo electrónico de un usuario.
    • Mostrar en pantalla los valores de las variables de sesión definidas. */

    if ($_REQUEST['campousuario'] && $_REQUEST['campoclave']) {
        session_start();
        $_SESSION['usuario'] = $_REQUEST['campousuario'];
        $_SESSION['clave'] = $_REQUEST['campoclave'];


        echo "<br><br>Se almacenaron dos variables de sesión.<br><br>";

        echo "Nombre de usuario recuperado de la variable de sesión:" . $_SESSION['usuario'];
        echo "<br><br>";
        echo "La clave recuperada de la variable de sesión:" . $_SESSION['clave'];
    }
    ?>
</body>

</html>