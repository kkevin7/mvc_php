<?php
    class Controller{
        function __construct(){
            //Crear las vistas que pertenecan al controlador invocado
            $this->view = new View();
        }

        function loadModel($model){
            $url = 'models/'.$model.'model.php';
            //validando que el modelo exista
            if(file_exists($url)){
                require_once $url;
                $modelName = $model.'Model';
                //instancia de la clase del modelo recibido
                $this->model = new $modelName;
            }
        }
    }