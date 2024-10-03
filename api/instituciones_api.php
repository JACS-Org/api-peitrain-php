<?php
require "../core/controllers/institucion_controller.php";



class InstitucionApi extends BaseAPI{
    protected $instituciones;

    public function __construct() {
        parent::__construct();
        $this->instituciones  = new InstitucionController();
    }

    public function getInfo() {
        
        if ($this->method == 'GET') {
            return $this->getAllInstituciones();
        }else if ($this->method == 'POST') {
            return $this->registrarInstitucion();
        }
    }

    function getAllInstituciones(){
   
        $data = $this->instituciones->getInstituciones(10);
        return $data;
    }

    function registrarInstitucion(){
        $this->validarParams(['titulo','resumen','mision','vision']);
        $titulo = $this->inputs['titulo'];
        $resumen = $this->inputs['resumen'];
        $mision = $this->inputs['mision'];
        $vision = $this->inputs['vision'];

        return $this->instituciones->registrarInstitucion($titulo,$resumen,$mision,$vision);
    }
}





