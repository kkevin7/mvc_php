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
        <button id="btn_nuevo" class="waves-effect waves-light btn light-blue darken-3">Nuevo
            Registro</button>
        <h4>Listado de Alumno</h4>
        <div class="z-depth-3 relleno-table">
            <table id="tb_alumno" class="responsive-table highlight ">
                <thead class="blue darken-1 centered">
                <tr>
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
                        <td class="nombre"><?php echo $alumno->nombre; ?></td>
                        <td class="apellido"><?php echo $alumno->apellido; ?></td>
                        <td class="telefono"><?php echo $alumno->telefono; ?></td>
                        <td>
                            <button class="waves-effect waves-light btn amber darken-3 show_edit"
                                    data-id_alumno="<?php echo $alumno->id; ?>">Editar
                            </button>
                        </td>
                        <td>
                            <button class="waves-effect waves-light btn deep-orange darken-2 btn_eliminar btn_delete"
                                    data-id_alumno="<?php echo $alumno->id; ?>"
                                    title="¿Deseas eiminar este registro?"
                            >Eliminar
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="col s5 ">

        <div id="div_form" class="row z-depth-3 margen-form ">
            <form method="post" class="col s12 centered">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nombre" type="text" class="validate nombre" name="nombre" data-length="25" required>
                        <label for="nombre">Nombres</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="apellido" type="text" class="validate apellido" name="apellido" data-length="25"
                               required>
                        <label for="apellido">Apellidos</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <input id="telefono" type="text" class="validate" name="telefono" data-length="9">
                        <label for="telefono">Telefono</label>
                    </div>
                </div>
                <div class="row center-align">
                    <button type="submit" id="btn_save" class="waves-effect waves-light btn light-blue darken-3">
                        Guardar
                    </button>
                    <button type="submit" id="save_edit" class="waves-effect waves-light btn  cyan darken-1">
                        Editar
                    </button>
                    <button id="btn_cancelar" type="button"
                       class="waves-effect waves-light btn grey lighten-1">Cancelar</button>
                </div>
            </form>
        </div>

    </div>


</div>
<?php require_once 'views/footer.php' ?>

<script src="<?php echo constant('URL'); ?>/public/js/alumnoAjax.js"></script>


</body>

</html>