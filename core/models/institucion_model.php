<?php
require_once PROJECT_ROOT_PATH . "/core/database/conexion.php";
class InstitucionModel extends Database
{
    public function getInstituciones(int $limit)
    {
        return $this->select("SELECT * FROM institucion ORDER BY id ASC LIMIT ?", ["i",[$limit]]);
    }

    public function crearInstitucion($titulo, $resumen, $mision, $vision){

        $id =  $this->register("INSERT into institucion (titulo, resumen, vision, mision)  values (?, ?, ?, ?)",
            ["ssss",[$titulo,$resumen ,$mision, $vision]]
        );
        if($id==0){
            $response = errorApi(405,"Error en registrar datos");
            echo json_encode($response);
            die();
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