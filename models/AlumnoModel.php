<?php
    require_once 'models/alumnos.php';
    class AlumnoModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        function get(){
            $items = [];
            try{
                $query = $this->db->conn()->query('SELECT * FROM alumnos');
                while($row = $query->fetch()){
                    //Creacion de la entidad alumnos
                    $item=new Alumnos();
                    $item->id=$row['id_alumno'];
                    $item->nombre=$row['nombre'];
                    $item->apellido= $row['apellido'];
                    $item->telefono =$row['telefono'];
                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }

        //metodo que pernmitira ingresar un registro a la bd
        function insert($data){
            try {
                $query=$this->db->conn()->prepare("INSERT INTO alumnos(nombre,apellido,telefono) VALUES(:nombre,:apellido,:telefono)");
                $query->execute(['nombre'=>$data['nombre'], 'apellido'=>$data['apellido'],'telefono'=>$data['telefono']]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }

        function delete($id){
            try {
                $query=$this->db->conn()->prepare("DELETE FROM alumnos WHERE id_alumno=:id");
                $query->execute(['id'=>$id]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }

        function getById($id){
            $item=new Alumnos();
            try {
                $query=$this->db->conn()->prepare("SELECT * FROM alumnos WHERE id_alumno=:id");
                $query->execute(['id' => $id]);
                while($row = $query->fetch()){
                    $item->matricula = $row['id_alumno'];
                    $item->nombre = $row['nombre'];
                    $item->apellido = $row['apellido'];
                    $item->apellido = $row['telefono'];
                }
                return $item;
        }catch(PDOException $e){
            return null;
        }
        }




    }
?>