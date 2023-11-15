<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenida</title>
</head>

<body>
  <h1>Bienvenido,
    <?php echo $_SESSION['usuario']; ?>!
  </h1>

  <p>Esta es tu página de bienvenida después de iniciar sesión.</p>

  <form action="cerrar_sesion.php" method="post">
    <input type="submit" value="Cerrar Sesión">
  </form>
</body>

</html>