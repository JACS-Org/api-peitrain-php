<?php

class CategoriaController extends BaseController {
    public $categoriaModel;
    public function __construct() {
        $this->categoriaModel = new CategoriaModel();
    }

    public function getCategoria($id) {
        return $this->categoriaModel->getCategoria( $id);
    }

    public function getCategorias(){
        $limit = 10;
        return $this->categoriaModel->getCategorias($limit);
    }

    public function registrarCategoria(int $institucion_id, string $nombre, string $descripcion){
        return $this->categoriaModel->registrarCategoria(
            $institucion_id, $nombre, $descripcion
            );
    }

}