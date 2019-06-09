<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php require_once "views/header.php" ;?>

    <?php include_once 'models/alumnos.php';?>
    <div id="main">


        <div class="row z-depth-3">
            <form action="<?php echo constant('URL') ?>alumno/insert" method="post" class="col s12 ">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate" name="nombre" data-length="25" required>
                        <label for="icon_prefix">Nombres</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_telephone" type="text" class="validate" name="apellido" data-length="25" required>
                        <label for="icon_telephone">Apellidos</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <input id="icon_telephone" type="text" class="validate" name="telefono" data-length="9" >
                        <label for="icon_telephone">Telefono</label>
                    </div>
                </div>
                <div class="row center-align">
                    <button type="submit" value="Registrar" class="waves-effect waves-light btn light-blue darken-3">Guardar</button>
                    <a href="<?php echo constant('URL') ?>alumno" class="waves-effect waves-light btn grey lighten-1">Cancelar</a>
                </div>
            </form>
        </div>

    </div>
    <?php require_once 'views/footer.php'?>
</body>

</html>