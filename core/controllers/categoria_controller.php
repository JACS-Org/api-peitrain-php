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

    public function registrarCategoria(int $institucion_id, string $nombre, string $descripcion, array $subcategorias = []) {
        $categoria = $this->categoriaModel->registrarCategoria(
            $institucion_id, $nombre, $descripcion
            );
        $dataSubcategorias = array();
        foreach ($subcategorias as $item) {
            $subcategoria = $this->categoriaModel->registrarSubCategoria(
                $categoria["id"],
                $item["nombre"], 
                $item["descripcion"]
            );
            $dataSubcategorias[] = $subcategoria;
        }
        $categoria["subcategorias"] = $dataSubcategorias;
        return $categoria;
    }

}