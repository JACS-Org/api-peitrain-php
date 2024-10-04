<?php

class ProductosController extends BaseController {
    protected $productoModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();
    }

    public function getAllProductos(int $limit){
        return $this->productoModel->getProductoes($limit);
    }

    public function crearProducto(int $subcategoria_id, int $usuario_id, string $titulo, string $descripcion,string $resumen){
        return $this->productoModel->crearProducto(
            $subcategoria_id, $usuario_id, $titulo, $descripcion,$resumen
        );
    }

}