<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
  header('Location: 10_SCA_registro.php');
  exit();
}

$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenida</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
  </style>
</head>

<body>
  <h1>Bienvenido,
    <?php echo $usuario; ?>!
  </h1>
  <p>Esta es la página de bienvenida. Puedes agregar contenido adicional aquí.</p>
  <p><a href="10_logout.php">Cerrar sesión</a></p>
</body>

</html>