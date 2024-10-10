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
            if(isset($this->params['subaction'])){
                $subaction = $this->params['subaction'];
                if($subaction == "updatePhoto"){
                    return $this->actualizarFotoInstitucion();
                }else{
                    errorApi(405,"Subaction no encontrada");
                }
            }else{
                return $this->registrarInstitucion();
            }
           
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

    function actualizarFotoInstitucion(){
        $this->validarFile('photo');
        $this->validarPost('id');

        $photo = $_FILES['photo'];
        $id = $_POST['id'];
            
        return $this->institucionController->actualizarFotoInstitucion($id,$photo);
    }
}





