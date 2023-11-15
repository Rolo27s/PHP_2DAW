<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
  header('Location: login.php');
  exit();
}

// Función para obtener todos los usuarios del archivo
function obtenerTodosLosUsuarios($archivo)
{
  $usuarios = [];
  $lineas = file($archivo, FILE_IGNORE_NEW_LINES);

  foreach ($lineas as $linea) {
    list($usuario, $email, $contrasena) = explode('|', $linea);
    $usuarios[] = ['usuario' => $usuario, 'email' => $email, 'contrasena' => $contrasena];
  }

  return $usuarios;
}

// Función para buscar un usuario por nombre
function buscarUsuarioPorNombre($nombreUsuario, $archivo)
{
  $usuarios = obtenerTodosLosUsuarios($archivo);

  foreach ($usuarios as $usuario) {
    if ($usuario['usuario'] === $nombreUsuario) {
      return $usuario;
    }
  }

  return null;
}

// Función para actualizar el archivo con la información modificada
function actualizarArchivo($archivo, $usuarios)
{
  $nuevoContenido = '';

  foreach ($usuarios as $usuario) {
    $nuevoContenido .= implode('|', $usuario) . "\n";
  }

  file_put_contents($archivo, $nuevoContenido, LOCK_EX);
}

// Procesar la edición si se envía un formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'editar') {
  $nombreUsuarioEditar = $_POST['usuario_editar'];
  $nuevoNombre = $_POST['nuevo_nombre'];
  $nuevoEmail = $_POST['nuevo_email'];

  // Obtener todos los usuarios
  $usuarios = obtenerTodosLosUsuarios('usuarios.txt');

  // Buscar el usuario y actualizar la información
  foreach ($usuarios as &$usuario) {
    if ($usuario['usuario'] === $nombreUsuarioEditar) {
      $usuario['usuario'] = $nuevoNombre;
      $usuario['email'] = $nuevoEmail;
      break;
    }
  }

  // Actualizar el archivo
  actualizarArchivo('usuarios.txt', $usuarios);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>

<body>
  <h1>Panel de Control - Dashboard</h1>

  <p>Bienvenido,
    <?php echo $_SESSION['usuario']; ?>!
  </p>

  <h2>Buscar Usuario</h2>
  <form action="dashboard.php" method="get">
    <label for="buscar_usuario">Nombre de Usuario:</label>
    <input type="text" id="buscar_usuario" name="buscar_usuario" required>
    <input type="submit" value="Buscar">
  </form>

  <?php
  // Mostrar resultados de la búsqueda
  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['buscar_usuario'])) {
    $nombreUsuarioBuscar = $_GET['buscar_usuario'];
    $usuarioEncontrado = buscarUsuarioPorNombre($nombreUsuarioBuscar, 'usuarios.txt');

    if ($usuarioEncontrado !== null) {
      echo '<h3>Usuario Encontrado</h3>';
      echo '<p><strong>Usuario:</strong> ' . $usuarioEncontrado['usuario'] . '</p>';
      echo '<p><strong>Email:</strong> ' . $usuarioEncontrado['email'] . '</p>';
      // Puedes mostrar más información si es necesario
    } else {
      echo '<p>Usuario no encontrado.</p>';
    }
  }

  // Mostrar todos los usuarios
  $todosLosUsuarios = obtenerTodosLosUsuarios('usuarios.txt');
  if (!empty($todosLosUsuarios)) {
    echo '<h2>Todos los Usuarios</h2>';
    echo '<ul>';
    foreach ($todosLosUsuarios as $usuario) {
      echo '<li>';
      echo '<strong>Usuario:</strong> ' . $usuario['usuario'] . ' | ';
      echo '<strong>Email:</strong> ' . $usuario['email'];
      echo '</li>';
    }
    echo '</ul>';
  } else {
    echo '<p>No hay usuarios registrados.</p>';
  }
  ?>

  <h2>Editar Usuario</h2>
  <form action="dashboard.php" method="post">
    <label for="usuario_editar">Nombre de Usuario:</label>
    <input type="text" id="usuario_editar" name="usuario_editar" required>

    <label for="nuevo_nombre">Nuevo Nombre:</label>
    <input type="text" id="nuevo_nombre" name="nuevo_nombre" required>

    <label for="nuevo_email">Nuevo Email:</label>
    <input type="email" id="nuevo_email" name="nuevo_email" required>

    <input type="hidden" name="accion" value="editar">
    <input type="submit" value="Editar">
  </form>

  <p><a href="cerrar_sesion.php">Cerrar Sesión</a></p>
</body>

</html>