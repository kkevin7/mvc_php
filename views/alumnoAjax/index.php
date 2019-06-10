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
<div class="row margen-div">
    <div class="col s6">
        <h4>Listado de Alumno</h4>
        <div class="z-depth-3 relleno-table">
            <table class="responsive-table highlight ">
                <thead class="blue darken-1 centered">
                <tr>
                    <td>ID</td>
                    <td>NOMBRE</td>
                    <td>APELLIDO</td>
                    <td>TELEFONO</td>
                    <td colspan="2">Acciones</td>
                </tr>
                </thead>
                <tbody id="tbody-alumnos">
                <?php include_once 'models/alumnos.php';
                foreach ($this->estudiantes as $item) {
                    $alumno = new Alumnos();
                    $alumno = $item;
                    ?>
                    <tr id="fila-<?php echo $alumno->id; ?>">
                        <td><?php echo $alumno->id; ?></td>
                        <td><?php echo $alumno->nombre; ?></td>
                        <td><?php echo $alumno->apellido; ?></td>
                        <td><?php echo $alumno->telefono; ?></td>
                        <td><button class="waves-effect waves-light btn amber darken-3 btn_editar"
                                    data-id_alumno="<?php echo $alumno->id; ?>" >Editar</button></td>
                        <td><button class="waves-effect waves-light btn deep-orange darken-2 btn_eliminar" data-id_alumno="<?php echo $alumno->id; ?>"
                               title="¿Deseas eiminar este registro?"
                                >Eliminar</button></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="col s5 ">

        <div class="row z-depth-3 margen-form ">
            <form  method="post" class="col s12 centered">
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
                    <a href="<?php echo constant('URL') ?>alumnoajax" class="waves-effect waves-light btn grey lighten-1">Cancelar</a>
                </div>
            </form>
        </div>

    </div>
</div>
<?php require_once 'views/footer.php' ?>

<!--<script>
    $(function () {

        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'post.php',
                data: $('form').serialize(),
                success: function () {
                    alert('form was submitted');
                }
            });

        });

    });
</script> -->
</body>

</html>