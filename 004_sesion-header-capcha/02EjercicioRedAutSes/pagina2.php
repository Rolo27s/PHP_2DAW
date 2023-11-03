<?php
session_start();
$_SESSION['usuario'] = $_REQUEST['campousuario'];
$_SESSION['clave'] = $_REQUEST['campoclave'];

$usuario = $_SESSION['usuario'];
$clave = $_SESSION['clave'];
?>
<html>

<head>
    <title>Problema</title>
</head>

<body>
    Se almacenaron 2 variables de sesión.<br><br>
    <?php
    echo "Nombre de usuario recuperado de la variable de sesión: " . $usuario;
    echo "<br><br>";
    echo "La clave recuperada de la variable de sesión: " . $clave;

    session_start();
    if (isset($usuario) && isset($clave)) {
        if ($usuario == "Fran" && $clave == "1234") {
            echo "Usuario y clave correctos. Logeando...";
            sleep(3);
            header("Location: logged.html");
        } else {
            echo "Usuario y/o contraseña incorrectos...";
            sleep(3);
            header("Location: index.php?error1='Usuario y/o contraseña incorrectos...'");
        }
    } else {
        echo "Faltó por completar algún dato del login";
        sleep(3);
        header("Location: index.php?error2='Faltó por completar algún dato del login'");
    }

    ?>
</body>

</html>