<?php
session_start();
$_SESSION['usuario'] = $_REQUEST['campousuario'];
$_SESSION['clave'] = $_REQUEST['campoclave'];
?>
<html>

<head>
    <title>Problema</title>
</head>

<body>
    Se almacenaron dos variables de sesión.<br><br>
    <?php
    echo "Nombre de usuario recuperado de la variable de sesión:" . $_SESSION['usuario'];
    echo "<br><br>";
    echo "La clave recuperada de la variable de sesión:" . $_SESSION['clave'];
    ?>
</body>

</html>