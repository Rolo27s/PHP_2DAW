<?php
session_start();

// Función para generar un token único
function generarToken()
{
  return bin2hex(random_bytes(16));
}

// Iniciar una sesión y establecer un token único para cada usuario
if (!isset($_SESSION['token'])) {
  $_SESSION['token'] = generarToken();
}

// Definir variables de sesión para el nombre, el correo electrónico y el tipo de suscripción del usuario
if (!isset($_SESSION['nombre'])) {
  $_SESSION['nombre'] = 'Usuario Ejemplo';
}

if (!isset($_SESSION['correo'])) {
  $_SESSION['correo'] = 'usuario@example.com';
}

if (!isset($_SESSION['tipo_suscripcion'])) {
  $_SESSION['tipo_suscripcion'] = 'Básica';
}

// Mostrar en pantalla los valores de las variables de sesión definidas
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Gestión de Sesiones</title>
  <style>
    /* Estilos básicos para mejorar la presentación */
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      color: #333;
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <h1>Sistema de Gestión de Sesiones</h1>

  <ul>
    <li><strong>Token:</strong>
      <?php echo $_SESSION['token']; ?>
    </li>
    <li><strong>Nombre:</strong>
      <?php echo $_SESSION['nombre']; ?>
    </li>
    <li><strong>Correo Electrónico:</strong>
      <?php echo $_SESSION['correo']; ?>
    </li>
    <li><strong>Tipo de Suscripción:</strong>
      <?php echo $_SESSION['tipo_suscripcion']; ?>
    </li>
  </ul>
</body>

</html>