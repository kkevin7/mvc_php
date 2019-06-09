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
<div id="main">
    <a href="<?php echo constant('URL') ?>alumno/nuevo" class="waves-effect waves-light btn light-blue darken-3">Crear
        Registro</a>
    <h4>Listado de Alumno</h4>
    <div class="z-depth-3 relleno-table">
        <table class="highlight ">
            <thead class="blue darken-1 centered">
            <tr>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
                <td>TELEFONO</td>
                <td colspan="2">Acciones</td>
            </tr>
            </thead>
            <tbody>
            <?php include_once 'models/alumnos.php';
            foreach ($this->estudiantes as $item) {
                $alumno = new Alumnos();
                $alumno = $item;
                ?>
                <tr>
                    <td><?php echo $alumno->id; ?></td>
                    <td><?php echo $alumno->nombre; ?></td>
                    <td><?php echo $alumno->apellido; ?></td>
                    <td><?php echo $alumno->telefono; ?></td>
                    <td><a href="<?php echo constant('URL') . 'alumno/getById/' . $alumno->id ?>"
                           class="waves-effect waves-light btn amber darken-3">Editar</a></td>
                    <td><a href="<?php echo constant('URL') . 'alumno/eliminar/' . $alumno->id ?>"
                           class="waves-effect waves-light btn deep-orange darken-2"
                           title="¿Deseas eiminar este registro?">Eliminar</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once 'views/footer.php' ?>
</body>

</html>