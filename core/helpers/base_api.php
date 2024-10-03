<?php
class BaseAPI
{
    protected $inputs;
    protected $params;
    protected $method;
    public function __construct()
    {
        
        $this->inputs = json_decode(file_get_contents('php://input'), true);
        $this->params =  parse_str($_SERVER['QUERY_STRING'], $query);
        $this->method =  strtoupper($_SERVER["REQUEST_METHOD"]);
    }

   
    
    function validarParams($params){
        //suponiendo que todos los parametros estan disponibles
        $available = true;
        $missingparams = "";

        foreach ($params as $param) {
            
            if(!isset($this->inputs[$param]) || strlen($this->inputs[$param]) <= 0){
                $available = false;
                $missingparams = $missingparams . ", " . $param;
            }
        }

        if(!$available){ //si faltan parametros
            $mensaje =  'Parametro(s)' . substr($missingparams, 1, strlen($missingparams)) . ' vacio(s)';
            $response = errorApi(405,$mensaje);
            echo json_encode($response); //error de visualización
            die(); //detener la ejecución adicional
        }
    }

}

