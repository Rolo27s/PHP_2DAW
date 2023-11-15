<?php
// Archivo: index.php

session_start();

// Comprobar si el usuario ya ha iniciado sesión
if (isset($_SESSION['usuario'])) {
  header('Location: dashboard.php');
  exit();
}

// Comprobar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validar el formulario (en este ejemplo, simplemente verificamos que se hayan ingresado usuario y contraseña)
  // Validar el formulario
  if (!empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
    // Simulamos una validación de usuario y contraseña
    $usuarioValido = 'Fran';
    $contrasenaValida = '1234';

    // Utilizar la función trim para eliminar espacios en blanco al principio y al final de las cadenas
    $usuarioIngresado = trim($_POST['usuario']);
    $contrasenaIngresada = trim($_POST['contrasena']);

    if ($usuarioIngresado === $usuarioValido && $contrasenaIngresada === $contrasenaValida) {
      // Iniciar sesión y redirigir al panel de control
      $_SESSION['usuario'] = $usuarioValido;
      header('Location: dashboard.php');
      exit();
    } else {
      $mensajeError = 'Usuario o contraseña incorrectos';
    }
  } else {
    $mensajeError = 'Por favor, complete todos los campos';
  }

}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión</title>
</head>

<body>
  <h1>Iniciar Sesión</h1>

  <?php if (isset($mensajeError)): ?>
    <p style="color: red;">
      <?php echo $mensajeError; ?>
    </p>
  <?php endif; ?>

  <form action="index.php" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>

    <input type="submit" value="Iniciar Sesión">
  </form>
</body>

</html>