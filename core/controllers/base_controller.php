<?php
class BaseController
{
    
    public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }

    // example  $path = "/public/photos/";
    public function savePhotoServer($file, $path, $name){
        $type = $file['type'];
        if ($type != "image/jpeg" && $type != "image/png") {
            errorApi(405,"El formato de la foto no es valido");
        }
        $type = explode("/",$type);

        $url_photo = $path.$name.".".$type[1];

        $folder = PROJECT_ROOT_PATH.$path;
        $target = $folder.$name.".".$type[1];
 
        if(!file_exists($folder)){
            mkdir($folder,0777,true);
        }

        if(!move_uploaded_file($file['tmp_name'],$target)){
            errorApi(500,"Error al subir la foto");
        }else{
            return $url_photo;
        }
    }


}