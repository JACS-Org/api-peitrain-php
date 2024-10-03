<?php

class InstitucionController extends BaseController {
    
    public function __construct() {
        $this->institucion = new InstitucionModel();
    }

    public function getInstituciones(int $limit){
        return $this->institucion->getInstituciones($limit);
    }

    public function getInstitucionById(){

    }

    public function registrarInstitucion($titulo, $resumen, $mision, $vision){
        return $this->institucion->crearInstitucion($titulo, $resumen, $mision, $vision);
    }

}