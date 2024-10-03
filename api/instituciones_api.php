<?php

class InstitucionApi extends BaseAPI{
    protected $institucionController;

    public function __construct() {
        parent::__construct();
        $this->institucionController  = new InstitucionController();
    }

    public function index() {
        
        if ($this->method == 'GET') {
            return $this->getAllInstituciones();
        }else if ($this->method == 'POST') {
            return $this->registrarInstitucion();
        }
    }

    function getAllInstituciones(){
   
        $data = $this->institucionController->getInstituciones(10);
        return $data;
    }

    function registrarInstitucion(){
        $this->validarParams(['titulo','resumen','mision','vision']);
        $titulo = $this->inputs['titulo'];
        $resumen = $this->inputs['resumen'];
        $mision = $this->inputs['mision'];
        $vision = $this->inputs['vision'];

        return $this->institucionController->registrarInstitucion($titulo,$resumen,$mision,$vision);
    }
}





