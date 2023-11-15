<?php
session_start();

// Cerrar sesión
session_unset();
session_destroy();

// Redirigir a la página de inicio
header('Location: 10_SCA_registro.php');
exit();
?>