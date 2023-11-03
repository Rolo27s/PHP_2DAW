<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <span>La información correcta será <br>
        Nombre: Fran <br>
        Contraseña: 1234
    </span>
    <form method="post">
        Ingrese nombre de usuario:
        <input type="text" name="campousuario" /><br />
        Ingrese clave:
        <input type="password" name="campoclave" /><br />
        <input type="submit" value="confirmar" />
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_REQUEST['campousuario'] == "Fran" && $_REQUEST['campoclave'] == 1234) {
            session_start();
            $_SESSION['usuario'] = $_REQUEST['campousuario'];
            $_SESSION['clave'] = $_REQUEST['campoclave'];


            echo "<br><br>Se almacenaron dos variables de sesión.<br><br>";

            echo "Nombre de usuario recuperado de la variable de sesión:" . $_SESSION['usuario'];
            echo "<br><br>";
            echo "La clave recuperada de la variable de sesión:" . $_SESSION['clave'];
        }
        if ($_REQUEST['campousuario'] != "Fran" || $_REQUEST['campoclave'] != 1234) {
            echo "<p>Mensaje de error: Credenciales incorrectas</p>";
        }
    }
    ?>
</body>

</html>