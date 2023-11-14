<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SGU_funcionalidades</title>
</head>

<body>
  <?php
  // 1. Genero un array multidimensional
  $usuarios = [
    [
      'Paco',
      34,
      'paco@gmail.com',
      [
        ['Tornillos', 44],
        ['Arandelas', 44],
        ['Tuercas', 44],
      ],
      '2022-01-01',
      '2023-09-01',
    ],
    [
      'María',
      28,
      'maria@yahoo.com',
      [
        ['Martillos', 20],
        ['Clavos', 100],
        ['Sierras', 10],
      ],
      '2021-05-15',
      '2023-09-02',
    ],
    [
      'Carlos',
      40,
      'carlos@hotmail.com',
      [
        ['Destornilladores', 30],
        ['Cables eléctricos', 50],
        ['Bombillas', 25],
      ],
      '2022-03-10',
      '2023-09-03',
    ],
    [
      'Ana',
      22,
      'ana@gmail.com',
      [
        ['Pintura', 15],
        ['Brochas', 25],
        ['Lienzos', 10],
      ],
      '2020-11-28',
      '2023-09-04',
    ],
    [
      'Juan',
      45,
      'juan@gmail.com',
      [
        ['Llaves inglesas', 20],
        ['Martillos', 30],
        ['Taladros', 15],
      ],
      '2021-08-05',
      '2023-09-05',
    ],
  ];

  // 2. Muestro toda la información
  foreach ($usuarios as $usuario) {
    echo ("Nombre: {$usuario[0]}<br />");
    echo ("Edad: {$usuario[1]}<br />");
    echo ("Email: {$usuario[2]}<br />");
    echo ("Fecha de Registro: {$usuario[4]}<br />");
    echo ("__Pedido: <br />");
    foreach ($usuario[3] as $items) {
      echo ("__{$items[0]} - {$items[1]}<br />");
    }

    echo ("<br />");
  }

  // 3. Calcular y mostrar el tiempo promedio que los usuarios han sido clientes
  $totalUsuarios = count($usuarios);
  $totalTiempo = 0;

  foreach ($usuarios as $usuario) {
    $fechaRegistro = new DateTime($usuario[4]);
    $fechaActual = new DateTime('now');
    // Accedo al método diff contenido en el objeto generado $fechaActual
    $tiempoCliente = $fechaActual->diff($fechaRegistro);
    // Accedo al método days del objeto resultante guardado en $tiempoCliente
    $totalTiempo += $tiempoCliente->days;
  }

  $tiempoPromedio = $totalTiempo / $totalUsuarios;
  echo ("<br />Tiempo promedio como clientes: " . round($tiempoPromedio) . " días");

  // 4. Definir cookies con el nombre del usuario y la fecha de su último pedido
  foreach ($usuarios as $usuario) {
    $nombreUsuario = $usuario[0];
    $fechaUltimoPedido = $usuario[5];
    setcookie("usuario_{$nombreUsuario}", json_encode(['nombre' => $nombreUsuario, 'fecha_ultimo_pedido' => $fechaUltimoPedido]), time() + 3600, '/');
    // Para utilizar la información guardada en la cookie, usar json_decode()
  }
  ?>

</body>

</html>