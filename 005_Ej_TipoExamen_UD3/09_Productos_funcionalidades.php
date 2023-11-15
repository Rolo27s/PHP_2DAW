<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos con funcionalidades</title>
</head>

<body>

  <?php
  // 1. Crear un array multidimensional de productos
  $productos = array(
    array(
      'nombre' => 'Producto 1',
      'precio' => 50.00,
      'cantidad_en_stock' => 100,
      'descripcion' => 'Este es el Producto 1. Una breve descripción del producto.',
      'resenas' => array(
        'Buena calidad',
        'Me encanta',
        'Podría ser mejor'
      )
    ),
    array(
      'nombre' => 'Producto 2',
      'precio' => 75.00,
      'cantidad_en_stock' => 50,
      'descripcion' => 'Este es el Producto 2. Una breve descripción del producto.',
      'resenas' => array(
        'Increíble',
        'No está mal'
      )
    ),
    // Agrega más productos según sea necesario
  );

  // 2. Mostrar en pantalla la información detallada de cada producto y sus reseñas
  foreach ($productos as $producto) {
    echo '<h2>' . $producto['nombre'] . '</h2>';
    echo '<p><strong>Precio:</strong> $' . $producto['precio'] . '</p>';
    echo '<p><strong>Cantidad en Stock:</strong> ' . $producto['cantidad_en_stock'] . '</p>';
    echo '<p><strong>Descripción:</strong> ' . $producto['descripcion'] . '</p>';

    echo '<h3>Reseñas:</h3>';
    if (empty($producto['resenas'])) {
      echo '<p>No hay reseñas disponibles.</p>';
    } else {
      echo '<ul>';
      foreach ($producto['resenas'] as $resena) {
        echo '<li>' . $resena . '</li>';
      }
      echo '</ul>';
    }
  }

  // 3. Calcular y mostrar el precio total de todos los productos en stock, considerando descuentos aplicados
  $total = 0;

  foreach ($productos as $producto) {
    $total += $producto['precio'] * $producto['cantidad_en_stock'];
  }

  // Aplicar descuentos (por ejemplo, un 10% de descuento)
  $descuento = 0.1;
  $precio_total_con_descuento = $total * (1 - $descuento);

  echo '<h2>Precio Total de Productos en Stock:</h2>';
  echo '<p><strong>Total sin Descuento:</strong> $' . number_format($total, 2) . '</p>';
  echo '<p><strong>Total con Descuento (' . ($descuento * 100) . '% de descuento):</strong> $' . number_format($precio_total_con_descuento, 2) . '</p>';
  ?>
</body>

</html>