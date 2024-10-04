<?php

class InstitucionModel extends Database
{
    public function __construct(){
        parent::__construct();
    }
    public function getInstituciones(int $limit)
    {
        return $this->select("SELECT * FROM institucion ORDER BY id ASC LIMIT ?", ["i",[$limit]]);
    }

    public function crearInstitucion($titulo, $resumen, $mision, $vision){

        $id =  $this->register("INSERT into institucion (titulo, resumen, vision, mision)  values (?, ?, ?, ?)",
            ["ssss",[$titulo,$resumen ,$mision, $vision]]
        );
        if($id==0){
            errorApi(405,"Error en registrar datos");
        }
        return [
            "id"=>$id,
            "titulo"=>$titulo,
            "resumen" => $resumen,
            "vision"=>$vision,
            "mision" => $mision
        ];
    }
}