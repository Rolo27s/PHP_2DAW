<?php
session_start();

// Cerrar sesión
session_unset();
session_destroy();

// Redirigir a la página de inicio de sesión
header('Location: login.php');
exit();
?>