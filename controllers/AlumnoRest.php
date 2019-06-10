<?php
require_once './models/Alumnos.php';

class AlumnoRest extends Controller
{

    private $url;

    function __construct()
    {
        parent::__construct();
        //Llamamos al modelo de la instancia que queremos utilizar
        $this->loadModel('Alumno');
        $this->url = constant('URL') . "alumnorest";
    }

    //Muestra todos los registro de la base datos
    function findAll()
    {
        //Comprueba que la peticion hasido enviada por GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            try {
                //Obtiene los datos del modelo
                $rest = $this->model->get();
                //Mouestra los datos en formato JSON
                echo json_encode($rest);
                //Manda un estatus 200 que la peticion fue correcta
                return http_response_code(200);
            } catch (Exception $e) {
                //Manda un estatus 500 diciendo que algo salio mal el servidor
                return http_response_code(500);
            }
        } else {
            //Status de error que realizo un bad request
            return http_response_code(400);
            // tell the user
            echo json_encode(array("Mensaje" => "Algo salio mal al realizar la peticion"));
        }
    }

    function create()
    {
        //Comprueba que la peticion hasido enviada por POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // required headers
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            header("Access-Control-Allow-Methods: POST");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

            $datos = json_decode(file_get_contents($this->url . "/create"));

            //Asegurarse que los datos obtenidos no estan vacios
            if (
                !empty($datos->nombre) &&
                !empty($datos->apellido) &&
                !empty($datos->telefono)
            ) {
                $alumno = new Alumnos();
                $alumno->id = null;
                $alumno->nombre = $datos->nombre;
                $alumno->apellido = $datos->apellido;
                $alumno->telefono = $datos->telefono;


                if ($this->model->create($alumno)) {
                    // set response code - 201 created
                    http_response_code(201);

                    // tell the user
                    echo json_encode(array("Mensaje" => "El registro fue creado con exito"));
                } else {
                    // set response code - 503 service unavailable
                    http_response_code(503);

                    // tell the user
                    echo json_encode(array("Mensaje" => "Algo salio mal al realizar la peticion"));
                }
            }
        } else {
            // set response code - 400 bad request
            http_response_code(400);

            // tell the user
            echo json_encode(array("Mensaje" => "Realizo un bad request al servidor"));
        }
    }


}

?>