$(document).ready(function (e) {
    $uri = "http://localhost/mvc_php/alumnoajax";
    $("#div_form").hide();
    $("#save_edit").hide();

    $(document).on('click', '#btn_nuevo', function () {
        limpiar();
        $("#div_form").show();
    });

    $(document).on('click', '#btn_cancelar', function () {
        limpiar();
        $("#div_form").hide();
    });

    // Metodo que se encargar de la guardar datos
    $(document).on('click', '#btn_save', function(){

        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var telefono = $('#telefono').val();

        $.ajax({
            url: $uri + "/insert/",
            type: 'POST',
            data: {
                'nombre': nombre,
                'apellido': apellido,
                'telefono': telefono,
            },
            success: function(response){
                $("#div_form").hide();
                limpiar();
            }
        });
    });

    //Metodo que se encargar de eliminar registro de la base datos
    $(document).on('click', '.btn_delete', function () {
        var id = $(this).data('id_alumno');
        $clicked_btn = $(this);
        $.ajax({
            url: $uri + "/eliminar/" + id,
            type: 'DELETE',
            data: {},
            success: function (response) {
                // Remover le td de la tabla
                $clicked_btn.parent().parent().remove();
            }
        });
    });

    //Guardar el valor de id
    var edit_id;
    //Metodo que se encargar de ediat registro en la base datos
    $(document).on('click', '.show_edit', function () {
        $("#div_form").show();

        edit_id = $(this).data('id_alumno');
        $td_datos = $(this).parent();

        var nombre = $td_datos.siblings('.nombre').text();
        var apellido = $td_datos.siblings('.apellido').text();
        var telefono = $td_datos.siblings('.telefono').text();

        limpiar();

        //Mostramos los datos en el formulario
        $("#nombre").focus();
        $("#nombre").val(nombre);
        $("#apellido").focus();
        $("#apellido").val(apellido);
        $("#telefono").focus();
        $("#telefono").val(telefono);
        $("#telefono").blur();

        $('#btn_save').hide();
        $('#save_edit').show();
    });

    $(document).on('click', '#save_edit', function () {
        var id = edit_id;
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var telefono = $('#telefono').val();

        $.ajax({
            url: $uri + "/update/",
            type: 'POST',
            data: {
                'id_alumno': id,
                'nombre': nombre,
                'apellido': apellido,
                'telefono': telefono,
            },
            success: function (response) {
                $("#div_form").hide();
                limpiar();
                $("#tb_alumno").ajax.reload();
            }
        });

    });
});

function limpiar() {
    $("#nombre").val("");
    $("#apellido").val("");
    $("#telefono").val("");
    $("#nombre").blur();
    $("#apellido").blur();
    $("#telefono").blur();

    $('#btn_save').show();
    $('#save_edit').hide();
}