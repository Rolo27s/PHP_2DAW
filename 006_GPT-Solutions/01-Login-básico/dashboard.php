<?php
// Archivo: dashboard.php

session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Control</title>
</head>

<body>
  <h1>Bienvenido,
    <?php echo $_SESSION['usuario']; ?>!
  </h1>

  <p>Esta es tu página de inicio después de iniciar sesión.</p>

  <form action="logout.php" method="post">
    <input type="submit" value="Cerrar Sesión">
  </form>
</body>

</html>