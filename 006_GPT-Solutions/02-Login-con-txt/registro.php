<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

  if (!empty($usuario) && !empty($email) && !empty($contrasena)) {
    // Validar y sanitizar datos
    $usuario = htmlspecialchars($usuario);
    $email = htmlspecialchars($email);

    // Verificar si el usuario ya existe
    $usuariosRegistrados = file('usuarios.txt', FILE_IGNORE_NEW_LINES);
    foreach ($usuariosRegistrados as $linea) {
      list($usuarioRegistrado, , ) = explode('|', $linea);
      if ($usuarioRegistrado === $usuario) {
        $mensajeError = 'Usuario ya registrado. Por favor, elige otro nombre de usuario.';
        break;
      }
    }

    // Verificar la longitud de la contraseña
    if (strlen($contrasena) < 6) {
      $mensajeError = 'La contraseña debe tener al menos 6 caracteres.';
    }

    if (!isset($mensajeError)) {
      // Si no hay error, continuar con el registro
      $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

      // Almacenar usuario en archivo de texto
      $usuarioInfo = "$usuario|$email|$contrasena\n";
      file_put_contents('usuarios.txt', $usuarioInfo, FILE_APPEND | LOCK_EX);

      // Redirigir a la página de inicio de sesión
      header('Location: login.php');
      exit();
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
  <title>Registro de Usuario</title>
</head>

<body>
  <h1>Registro de Usuario</h1>

  <?php if (isset($mensajeError)): ?>
    <p style="color: red;">
      <?php echo $mensajeError; ?>
    </p>
  <?php endif; ?>

  <form action="registro.php" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br>

    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="contrasena">Contraseña (al menos 6 caracteres):</label>
    <input type="password" id="contrasena" name="contrasena" required minlength="6"><br>

    <input type="submit" value="Registrar">
  </form>
  <p><a href="login.php">Sign In</a></p>
</body>

</html>