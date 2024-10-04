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
            $dataSubcategorias = array();
            if(isset($this->inputs["subcategorias"])){
                
                // verificar que las subcategorias sean un array
                if(is_array( $this->inputs["subcategorias"])){
                    $subcategorias =$this->inputs["subcategorias"];
                    foreach($subcategorias as  $value){
                        if(!isset($value["nombre"]) || !isset($value["descripcion"])){
                            errorApi(405,"Error en subcategorias");
                        }
                        $itemData = array(
                            "nombre" => $value["nombre"],
                            "descripcion" => $value["descripcion"]
                        );
                        $dataSubcategorias[] = $itemData;
                    }
                }else{
                    errorApi(405,"Error en subcategorias");
                }
            }
            return $this->categoriaController->registrarCategoria(
                $this->inputs["institucion_id"],
                $this->inputs["nombre"],
                $this->inputs["descripcion"],
                $dataSubcategorias
            );
        }



    }

}