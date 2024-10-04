<?php

class CategoriaModel extends Database{
    
    public function __construct(){
        parent::__construct();
    }


    public function getCategorias(int $limit){
        $sql = "SELECT c.id, c.institucion_id, i.titulo,   
            c.nombre, c.descripcion, c.estado, c.fecha_creacion
            FROM categoria c
            LEFT JOIN institucion i ON i.id=c.institucion_id
            LIMIT ?
        ";

        $data_categorias = $this->select($sql, ["i", [$limit]]);
        foreach ($data_categorias as $categoria){
            $categoria["subcategorias"]=$this->getSubCategorias($categoria["id"]);
        }
        return $data_categorias;
    }

    public function getCategoria(int $id){
        $sql = "SELECT c.id, c.institucion_id, i.titulo,
            c.nombre, c.descripcion, c.estado, c.fecha_creacion
            FROM categoria c
            LEFT JOIN institucion i ON i.id=c.institucion_id
            where c.id=?
        ";

        $data_categorias = $this->select($sql, ["i", [$id]]);
        foreach ($data_categorias as $categoria){
            $categoria["subcategorias"]=$this->getSubCategorias($categoria["id"]);
        }
        return $data_categorias;
    }

    public function getSubCategorias(int $id){
        $sql = "SELECT * FROM subcategoria WHERE categoria_id = ?";
        $data_categorias = $this->select($sql, ["i", [$id]]);
        return $data_categorias;
    }

    public function registrarCategoria(int $institucion_id, string $nombre, string $descripcion){
        $sql = "INSERT INTO categoria (institucion_id,nombre,descripcion)  values (?,?,?)";
        $id = $this->register(
            $sql, ["iss",[$institucion_id, $nombre, $descripcion]]
        );

        if($id==0){
            errorApi(405,"Error en registrar datos");
        }
        return [
            "id"=>$id,
            "institucion_id"=>$institucion_id,
            "nombre" => $nombre,
            "descripcion"=>$descripcion
        ];
    }

    public function registrarSubCategoria(int $categoria_id, string $nombre, string $descripcion){
        $sql = "INSERT INTO subcategoria (categoria_id,nombre,descripcion)  values (?,?,?)";
        $id = $this->register(
            $sql, ["iss",[$categoria_id, $nombre, $descripcion]]
        );

        if($id==0){
            errorApi(405,"Error en registrar datos");
        }
        return [
            "id"=>$id,
            "categoria_id"=>$categoria_id,
            "nombre" => $nombre,
            "descripcion"=>$descripcion
        ];
    }
}