<?php
class Controller{
    public $view;
    public $model;
    
    function __construct(){
        $this->view = new View();
    }

    function loadModel($modelo){
        $ruta = PATH_MODEL . $modelo . ".php";

        if(is_readable($ruta)){
            require $ruta;
            $this->model = new $modelo();
        }
/*       
 * Maybe a Controller does not have a Model associated 
        else{
            throw new Exception("No accesible $modelo")
        }
 */
    }
}
