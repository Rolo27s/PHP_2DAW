<?php
/* Crear un formulario con dos campos numéricos (filas y columnas) y al enviar, mostrará una tabla con tantas filas y columnas (usando los datos del formulario) y tendrán dentro un contador de celdas, es decir, la 1a celda tendrá un 1, la 2a celda tendrá un 2, la 3a celda tendrá un 3, etc. */
// Función para generar una tabla
function generar_tabla($filas, $columnas) {
  $count = 1;
  // Crear una tabla
  echo "<table>";

  // Recorrer las filas
  for ($i = 1; $i <= $filas; $i++) {
    // Crear una fila
    echo "<tr>";

    // Recorrer las columnas
    for ($j = 1; $j <= $columnas; $j++) {
      // Mostrar el contador de celdas
      if ($count < 10) {
        echo "<td> 0$count </td>";
      } else {
        echo "<td> $count </td>";
      }
      $count++;
    }

    // Cerrar la fila
    echo "</tr>";
  }

  // Cerrar la tabla
  echo "</table>";
}

// Obtener los datos del formulario
$filas = $_POST["filas"];
$columnas = $_POST["columnas"];

// Generar la tabla
generar_tabla($filas, $columnas);