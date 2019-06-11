<?php

class AlumnoAjax extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('Alumno');
        $this->view->alumnos = [];
    }

    function index()
    {
        $alumnos = $this->model->get();
        $this->view->estudiantes = $alumnos;
        $this->view->titulo = '<h1>Titulo de alumno</h1>';
        $this->view->render('alumnoajax/index');
    }

    //metodo que muestra la interfaz inicial a la llamada del contralador
    function nuevo()
    {
        $this->view->render('alumno/nuevo');
    }

    function insert()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $this->model->insert(['nombre' => $nombre, 'apellido' => $apellido, 'telefono' => $telefono]);
        $this->index();
    }


    function eliminar($dato = null)
    {
        $id = $dato[0];
        $this->model->delete($id);
        //$this->index();
    }

    function getById($dato = null)
    {
        $id = $dato[0];
        $alumno = $this->model->getById($id);

        session_start();
        /$_SESSION['id_alumno'] = $alumno->id;

        //remderizando la vista de detalles
        $this->view->alumno = $alumno;
        $this->view->render('alumno/detalle');
    }

    function update()
    {
        $id_alumno = $_POST['id_alumno'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];


        if ($this->model->update(['id' => $id_alumno, 'nombre' => $nombre, 'apellido' => $apellido, 'telefono' => $telefono])) {
            //Cargar en menoria la entity del alumno
            $alumno = new Alumno();
            $alumno->id = $id_alumno;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;
            $alumno->telefono = $telefono;

            $this->view->alumno = $alumno;
            //$this->view->mensaje = "Alumno actualizado correctamente";
            $this->index();
            //$this->view->render('alumno/detalle');

        } else {
            // mensaje de error
            $this->view->mensaje = "No se pudo actualizar el alumno";
            $this->view->render('errores/index');
        }
    }



}
