<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php require_once "views/header.php" ?>

    <?php include_once 'models/alumnos.php';?>
    <div id="main">
        <form action="<?php echo constant('URL') ?>alumno/insert" method="post">
            <table>
                <tr>
                    <td><label for="nombre">Nombre</label></td>
                    <td><input type="text" name="nombre" require></td>
                </tr>
                <tr>
                    <td><label for="apellido">Apellido</label></td>
                    <td><input type="text" name="apellido" require></td>
                </tr>
                <tr>
                    <td><label for="telefono">Telefono</label></td>
                    <td><input type="text" name="telefono" require></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Registrar"></td>
                    <td><a href="<?php echo constant('URL') ?>alumno">Cancelar</a></td>

                </tr>
            </table>
        </form>
    </div>
    <?php require_once 'views/footer.php'?>
</body>

</html>