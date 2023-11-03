<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CAPTCHA</title>
</head>

<body>
    <p>Para que el Form Logee el user será 'Fran' y la pwd '1234'</p>
    <form action="pagina2.php" method="post">
        Ingrese nombre de usuario:
        <input type="text" name="campousuario" value="Fran" required /><br />
        Ingrese clave:
        <input type="password" name="campoclave" value="1234" required /><br />
        <input type="submit" value="confirmar" />
    </form>
    <?php
    if (isset($_GET['error1'])) {
        echo $_GET['error1'];
    }
    if (isset($_GET['error2'])) {
        echo $_GET['error2'];
    }
    ?>
</body>

</html>