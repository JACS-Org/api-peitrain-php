<?php

class ProductosApi extends BaseAPI{
    protected $productosController;

    public function __construct() {
        parent::__construct();
        $this->productosController  = new ProductosController();
    }

    public function index() {
        
        if ($this->method == 'GET') {
            return $this->getAllProductos();
        }else if ($this->method == 'POST') {
            return $this->postProductos();
        }
    }

    function getAllProductos(){
        $productos = $this->productosController->getAllProductos(10);
        return $productos;
    }

    public function postProductos(){
        $this->validarParams(['subcategoria_id','usuario_id','titulo','descripcion','resumen']);
        $subcategoria_id = $this->inputs['subcategoria_id'];
        $usuario_id = $this->inputs['usuario_id'];
        $titulo = $this->inputs['titulo'];
        $descripcion = $this->inputs['descripcion'];
        $resumen = $this->inputs['resumen'];

        return $this->productosController->crearProducto($subcategoria_id, $usuario_id, $titulo, $descripcion, $resumen);
    }



}


