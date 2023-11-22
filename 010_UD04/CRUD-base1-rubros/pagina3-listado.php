<!doctype html>
<html>
<!-- pagina3 funciona sola. Enseña el contenido de la tabla rubros en el HTML usando un select. PHPYA-49-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado</title>
    <style>
        .tablalistado {
            border-collapse: collapse;
            box-shadow: 0px 0px 8px #000;
            margin: 20px;
        }

        .tablalistado th {
            border: 1px solid #000;
            padding: 5px;
            background-color: #ffd040;
        }

        .tablalistado td {
            border: 1px solid #000;
            padding: 5px;
            background-color: #ffdd73;
        }
    </style>
</head>

<body>

    <?php
    $mysql = new mysqli("localhost", "root", "", "base1");
    if ($mysql->connect_error)
        die("Problemas con la conexión a la base de datos");

    $registros = $mysql->query("select codigo,descripcion from rubros") or
        die($mysql->error);

    echo '<table class="tablalistado">';
    echo '<tr><th>Código</th><th>Descripción</th></tr>';

    # fetch_array que nos permiten acceder a los campos rescatados con el comando SQL Select.
    while ($reg = $registros->fetch_array()) {
        echo '<tr>';
        echo '<td>';
        echo $reg['codigo'];
        // echo $reg['0'];
        echo '</td>';
        echo '<td>';
        echo $reg['descripcion'];
        // echo $reg['1'];
        echo '</td>';
        echo '</tr>';
        // Explicación como funciona el método fetch_array
        // print_r($reg);
        // echo "<br>";
    }
    echo '</table>';

    $mysql->close();

    ?>
</body>

</html>