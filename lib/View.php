<?php
class View{
    function __construct(){
    }

    public function render($page){
        if(!empty($page)){
            $ruta = PATH_VIEW . $page . ".php";

            if(is_readable($ruta)){
                require $ruta;
            }
            else{
                throw new Exception("No accesible $modelo")
            }
        }
    }
}
