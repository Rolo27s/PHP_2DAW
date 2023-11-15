<?php
session_start();

$archivoLibroDeVisitas = 'libro_de_visitas.txt';

// Crear el archivo si no existe
if (!file_exists($archivoLibroDeVisitas)) {
  file_put_contents($archivoLibroDeVisitas, '');
  chmod($archivoLibroDeVisitas, 0644); // Establecer permisos (puedes ajustar según tus necesidades)
}

// Procesar el formulario de ingreso
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
  $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';

  if (!empty($nombre) && !empty($mensaje)) {
    // Guardar el mensaje en un archivo
    $mensajeFormato = "$nombre: $mensaje\n";
    file_put_contents($archivoLibroDeVisitas, $mensajeFormato, FILE_APPEND | LOCK_EX);

    // Recordar el nombre del usuario usando sesiones
    $_SESSION['nombre'] = $nombre;

    // Recordar el nombre del usuario usando cookies (por 30 días)
    setcookie('nombre_usuario', $nombre, time() + (30 * 24 * 60 * 60));
  }
}

// Leer y mostrar todos los mensajes almacenados
$libroDeVisitas = file($archivoLibroDeVisitas, FILE_IGNORE_NEW_LINES) ?: [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Libro de Visitas</title>
</head>

<body>
  <h1>Libro de Visitas</h1>

  <!-- Formulario de ingreso -->
  <form action="index.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre"
      value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>" required>

    <label for="mensaje">Mensaje:</label>
    <textarea id="mensaje" name="mensaje" required></textarea>

    <input type="submit" value="Enviar">
  </form>

  <!-- Mostrar mensajes almacenados -->
  <h2>Mensajes Anteriores:</h2>
  <?php
  foreach ($libroDeVisitas as $mensajeAlmacenado) {
    echo '<div class="mensaje">' . htmlspecialchars($mensajeAlmacenado) . '</div>';
  }
  ?>
</body>

</html>