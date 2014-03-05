<?php
class Controller{
    function __construct(){
        $this->view = new View();
    }

    function loadModel($modelo){
        $ruta = PATH_MODEL . $modelo . ".php";

        if(is_readable($ruta)){
            require $ruta;
            $this->model = new $modelo();
        }
        else{
            throw new Exception("No accesible $modelo")
        }
    }
}
