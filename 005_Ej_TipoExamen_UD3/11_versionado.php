<?php
$archivo = 'archivo_versionado.txt';

function agregarMensaje($mensaje)
{
  global $archivo;

  // Obtener contenido actual del archivo si existe
  $contenidoActual = file_exists($archivo) ? file_get_contents($archivo) : '';

  // Crear un mensaje con la fecha y hora actual
  $mensajeNuevo = "[" . date("Y-m-d H:i:s") . "] $mensaje\n";
  /* 
    Y: Año con cuatro dígitos.
    m: Mes con ceros iniciales.
    d: Día con ceros iniciales.
    H: Hora en formato 24 horas con ceros iniciales.
    i: Minutos con ceros iniciales.
    s: Segundos con ceros iniciales.
  */

  // Agregar el nuevo mensaje al contenido actual
  $contenidoNuevo = $contenidoActual . $mensajeNuevo;

  // Escribir el contenido actualizado en el archivo
  file_put_contents($archivo, $contenidoNuevo);

  echo "Mensaje agregado con éxito. <br />";
}

// Agregar un mensaje inicial
agregarMensaje("Versión 1: Archivo creado.");

// Actualizar el archivo con un nuevo mensaje
agregarMensaje("Versión 2: Se agregó un nuevo mensaje.");

// Puedes repetir este proceso para cada modificación que desees realizar
?>