<?php

class InstitucionController extends BaseController {
    protected $institucionModel;

    public function __construct() {
        $this->institucionModel = new InstitucionModel();
    }

    public function getInstituciones(int $limit){
        return $this->institucionModel->getInstituciones($limit);
    }

    public function getInstitucionById(){

    }

    public function registrarInstitucion($titulo, $resumen, $mision, $vision){
        return $this->institucionModel->crearInstitucion($titulo, $resumen, $mision, $vision);
    }

    public function actualizarFotoInstitucion($id, $photo){
        $path = '/assets/img/instituciones/';
        $url_photo = $this->savePhotoServer($photo, $path, $id);

        return $this->institucionModel->actualizarFotoInstitucion($id, $url_photo);
    }

}