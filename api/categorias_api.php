<?php

class CategoriaApi extends BaseAPI{

    protected $categoriaController;

    public function __construct(){
        parent::__construct();
        $this->categoriaController = new CategoriaController();
    }


    public function index(){
        if($this->method == "GET"){
            return $this->categoriaController->getCategorias();
        }

        if($this->method == "POST"){
            $this->validarParams([
                "institucion_id",
                "nombre",
                "descripcion"
            ]);
            return $this->categoriaController->registrarCategoria(
                $this->inputs["institucion_id"],
                $this->inputs["nombre"],
                $this->inputs["descripcion"]
            );
        }



    }

}