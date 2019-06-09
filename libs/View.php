<?php
    class View{
        function __construct(){
        }

        function render($nombre){
            require_once 'views/'.$nombre.'.php';
            //por ej: si la varaible $nombre = index ser formaria la ubicacion --> views/index.php
        }
    }
?>