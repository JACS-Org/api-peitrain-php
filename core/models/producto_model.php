<?php
class ProductoModel extends Database
{
    public function __construct(){
        parent::__construct();
    }
    public function getProductoes(int $limit)
    {
        return $this->select("SELECT * FROM producto ORDER BY id ASC LIMIT ?", ["i",[$limit]]);
    }

    public function crearProducto($subcategoria_id, $usuario_id, $titulo, $descripcion, $resumen){

        $id =  $this->register( "INSERT into producto (subcategoria_id, usuario_id, titulo, descripcion, resumen)  values (?, ?, ?, ? ,?)",
            ["iisss",[$subcategoria_id, $usuario_id ,$titulo, $descripcion, $resumen]]
        );
        if($id==0){
            errorApi(405,"Error en registrar datos");
        }
        return [
            "id"=>$id,
            "subcategoria_id"=> $subcategoria_id,
            "usuario_id"=> $usuario_id,
            "titulo"=>$titulo,
            "resumen" => $resumen,
            "descripcion"=>$descripcion
        ];
    }
}