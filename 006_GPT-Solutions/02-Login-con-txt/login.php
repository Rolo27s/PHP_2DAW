<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
  $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

  if (!empty($usuario) && !empty($contrasena)) {
    // Leer usuarios del archivo de texto
    $usuarios = file('usuarios.txt', FILE_IGNORE_NEW_LINES);
    /* 
      La función file() en PHP devuelve un array donde cada elemento del array corresponde a una línea del archivo. La constante FILE_IGNORE_NEW_LINES se utiliza para que cada elemento del array no incluya el carácter de nueva línea (\n) al final.
    */

    // Genera nuevo hash para la contraseña 'admin'
    $hash_admin = password_hash('admin', PASSWORD_DEFAULT);
    
    // Si logeas como admin, ve al dashboard
    if (($usuario === 'admin') && password_verify($contrasena, $hash_admin)) {
      $_SESSION['usuario'] = $usuario;
      header('Location: dashboard.php');
      exit();
    }

    foreach ($usuarios as $linea) {
      list($usuarioGuardado, $email, $contrasenaGuardada) = explode('|', $linea);
      // La función list() asigna los elementos del array resultante de explode() a las variables especificadas. Desestructuración directa. Se dividirá la información con el carácter '|'.

      if ($usuario === $usuarioGuardado && password_verify($contrasena, $contrasenaGuardada)) {
        // password_verify() compara una contraseña en texto plano con su versión hasheada y devuelve true si son iguales y false si no lo son.

        // Iniciar sesión y redirigir al usuario
        $_SESSION['usuario'] = $usuario;
        header('Location: bienvenida.php');
        exit();
      }
    }

    $mensajeError = 'Usuario o contraseña incorrectos';
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
  <title>Iniciar Sesión</title>
</head>

<body>
  <h1>Iniciar Sesión</h1>
  <i>admin/admin iniciarás sesión como administrador (No existe en el fichero. Solo está en el back)</i>
  <?php if (isset($mensajeError)): ?>
    <p style="color: red;">
      <?php echo $mensajeError; ?>
    </p>
  <?php endif; ?>

  <form action="login.php" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>

    <input type="submit" value="Iniciar Sesión">
  </form>
  <p><a href="registro.php">Sign Up</a></p>
</body>

</html>