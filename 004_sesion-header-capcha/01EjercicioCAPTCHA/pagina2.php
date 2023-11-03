<?php
session_start();
$_SESSION['usuario'] = $_REQUEST['campousuario'];
$_SESSION['clave'] = $_REQUEST['campoclave'];
$_SESSION['captcha-user'] = $_REQUEST['captcha-user'];
$_SESSION['captcha-generate'] = $_REQUEST['captcha-generate'];
?>
<html>

<head>
    <title>Problema</title>
</head>

<body>
    Se almacenaron cuatro variables de sesión.<br><br>
    <?php
    echo "Nombre de usuario recuperado de la variable de sesión: " . $_SESSION['usuario'];
    echo "<br><br>";
    echo "La clave recuperada de la variable de sesión: " . $_SESSION['clave'];
    echo "<br><br>";
    echo "El captcha qu ingresó el usuario: " . $_SESSION['captcha-user'];
    echo "<br><br>";
    echo "El captcha autogenerado: " . $_SESSION['captcha-generado'];

    echo "<br><br>";

    session_start();

    if (isset($_POST['captcha-user']) && isset($_SESSION['captcha-generado'])) {
        $captcha_user = $_POST['captcha-user'];
        $captcha_generated = $_SESSION['captcha-generate'];

        if ($captcha_user == $captcha_generated) {
            echo "El captcha es correcto, procede con el procesamiento del formulario";
        } else {
            echo "El captcha es incorrecto, (mensaje de error)";
        }
    } else {
        echo "Algo salió mal o el captcha no se ingresó, maneja el caso según sea necesario";
    }

    ?>
</body>

</html>