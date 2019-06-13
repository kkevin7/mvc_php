$(document).ready(function (e) {

    $uri = "http://localhost/mvc_php/alumnoajax";
    $("#div_form").hide();
    $("#save_edit").hide();

    $(document).on('click', '#btn_nuevo', function (e) {
        limpiar();
        $("#div_form").show();
    });

    $(document).on('click', '#btn_cancelar', function (e) {
        limpiar();
        $("#div_form").hide();
    });

    //Metodo que se encarga de limpiar los campos del formulario
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

    // Metodo que se encargar de la guardar datos
    $(document).on('click', '#btn_save', function (e) {
        e.preventDefault();
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
            success: function (response) {

                mostrarDatos();

                $("#div_form").hide();
                limpiar();
            }
        });
    });

    //Metodo que se encargar de eliminar registro de la base datos
    $(document).on('click', '.btn_delete', function (e) {

        const confirm = window.confirm("¿Deseas eliminar el alumno ?");

        if (confirm){
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
        }

    });

    //Guardar el valor de id
    var edit_id;
    //Metodo que se encargar de ediat registro en la base datos
    $(document).on('click', '.show_edit', function (e) {
        $("#div_form").show();

        edit_id = $(this).data('id_alumno');
        $td_datos = $(this).parent();

        var nombre = $td_datos.siblings('.nombre').text();
        var apellido = $td_datos.siblings('.apellido').text();
        var telefono = $td_datos.siblings('.telefono').text();

        console.log(nombre)

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

    $(document).on('click', '#save_edit', function (e) {
        e.preventDefault();
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

                mostrarDatos();

                $("#div_form").hide();
                limpiar();
            }
        });

    });

    //Metodo que se encargar de mostrar los datos de una tabla
    function mostrarDatos() {
        $.ajax({
            url: 'http://localhost/mvc_php/alumnorest/findall',
            type: 'GET',
            success: function (response) {
                const valores = JSON.parse(response);
                let tbody = '';

                valores.forEach(alumno => {
                    tbody += "<tr>" +
                        "<td class=\"nombre\">" + alumno.nombre + "</td>" +
                        "<td class=\"apellido\">" + alumno.apellido + "</td>" +
                        "<td class=\"telefono\">" + alumno.telefono + "</td>" +
                        "<td><button class=\"waves-effect waves-light btn amber darken-3 show_edit\" data-id_alumno=\"" + alumno.id + "\">Editar</button></td>" +
                        "<td><button class=\"waves-effect waves-light btn deep-orange darken-2 btn_eliminar btn_delete\" data-id_alumno=\"" + alumno.id + "\" title=\"¿Deseas eiminar este registro?\">Eliminar</button></td>" +
                        "</tr>";
                });
                $("#tbody-alumnos").html(tbody)
            }
        });
    }

    //Metodo que sirve pare recargar solo la parte de componente mediante una vista
    function recargarComponente(uri, etiqueta, id_etiqueta) {
        //Ejemplo del metodo de recargar el componente
        //$("#tb_alumno").load($uri+" table#tb_alumno");
        httpRequest(uri, function () {
            $(id_etiqueta).load(uri+" "+etiqueta+id_etiqueta);
        });
    }

    //Metodo que se encarga realizar una peticicon HTTP por medio una url
    function httpRequest(url, callback) {
        const http = new XMLHttpRequest();
        http.open("GET", url);
        http.send();

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                callback.apply(http);
            }

        }
    }


});

