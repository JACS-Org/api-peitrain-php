<?php

class ResponseApi{
    public $data;
    public bool $success;
    public int $code;
    public string $message;

    public function __construct() {
        $this->data = null;
        $this->success = true;
        $this->code = 200;
        $this->message = "Proceso exitoso";
    }
}

function errorApi(int $code,string $msg){
    $response = new ResponseApi();
    $response->data = null;
    $response->success = false;
    $response->code = $code;
    $response->message = $msg;
    return $response;
}