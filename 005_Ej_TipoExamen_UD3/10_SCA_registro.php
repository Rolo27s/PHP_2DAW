<?php
session_start();

$directorioRegistro = 'registros';

if (!file_exists($directorioRegistro)) {
  mkdir($directorioRegistro, 0755, true);
}

// Verificar si el archivo log.txt existe, si no, crearlo
$logFile = "$directorioRegistro/log.txt";
if (!file_exists($logFile)) {
  file_put_contents($logFile, "");
}

function generarHash($contrasena)
{
  return password_hash($contrasena, PASSWORD_BCRYPT);
}

$usuarios = array(
  'usuario1' => generarHash('contrasena1'),
  'usuario2' => generarHash('contrasena2'),
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
  $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

  if (array_key_exists($usuario, $usuarios) && password_verify($contrasena, $usuarios[$usuario])) {
    $_SESSION['usuario'] = $usuario;

    $mensaje = "Inicio de sesión exitoso para el usuario: $usuario";
    file_put_contents($logFile, "[" . date("Y-m-d H:i:s") . "] $mensaje\n", FILE_APPEND | LOCK_EX);

    header('Location: bienvenida.php');
    exit();
  } else {
    $mensaje = "Intento de inicio de sesión fallido para el usuario: $usuario";
    file_put_contents($logFile, "[" . date("Y-m-d H:i:s") . "] $mensaje\n", FILE_APPEND | LOCK_EX);

    $error = "Credenciales incorrectas. Intenta de nuevo.";
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Control de Acceso</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    form {
      width: 300px;
      margin: 0 auto;
    }

    input {
      margin-bottom: 10px;
    }

    .error {
      color: red;
    }
  </style>
</head>

<body>
  <h1>Sistema de Control de Acceso</h1>

  <!-- Formulario de inicio de sesión y "sign in" -->
  <form action="10_control_acceso.php" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required>

    <input type="submit" value="Iniciar Sesión">
  </form>

  <?php if (isset($error)): ?>
    <p class="error">
      <?php echo $error; ?>
    </p>
  <?php endif; ?>
</body>

</html>