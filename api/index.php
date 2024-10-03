<?php
require  "../core/inc/bootstrap.php";
require  "./instituciones_api.php";

$response = new ResponseApi();


parse_str($_SERVER['QUERY_STRING'],$query);
if(isset($query['action'])){
    
    $action = $query['action'];
    if($action=="instituciones"){
        $api = new InstitucionApi();
        $response->data = $api->getInfo();
    }else{
        $response = errorApi(404,"Action no encontrado"); 
    }


   
}else{
    $response = errorApi(405,"error en action");
}





echo(json_encode($response));