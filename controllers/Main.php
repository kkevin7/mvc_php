<?php

    class Main extends Controller{
        function __construct(){
            parent::__construct();
        }

        function index(){
            $this->view->render('main/index');
        }

        //metodo de prueba
        function saludo(){
            echo "Un saludo a los de guatemala en el salvador";
        }

        //metodo de prueba
        function hola(){
            echo "<h1>Robertototototototototo</h1>";
        }
    }
?>