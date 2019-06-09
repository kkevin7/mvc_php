<?php
    class Alumno extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->alumnos=[];
            //$this->view->alumno="";
        }

        //merod que muestra la interfaz inicial a la llamada del contralador
        function index(){
            $alumnos=$this->model->get();
            $this->view->estudiantes=$alumnos;
            $this->view->titulo='<h1>Titulo de alumno</h1>';
            $this->view->render('alumno/index');
        }

        function nuevo(){
            $this->view->render('alumno/nuevo');
        }

        function insert(){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $this->model->insert(['nombre' => $nombre, 'apellido' => $apellido, 'telefono'=>$telefono]);
            $this->index();
        }

        function eliminar($dato=null){
            $id=$dato[0];
            $this->model->delete($id);
            $this->index();
        }

        function getById($dato=null){
            $id=$dato[0];
            $alumno=$this->model->getById($id);

            session_start();
            $_SESSION['id_alumno']=$alumno->id;

            //remderizando la vista de detalles
            $this->view->alumno = $alumno;
            $this->view->render('alumno/detalle');
        }

    }
?>