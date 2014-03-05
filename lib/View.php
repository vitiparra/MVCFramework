<?php
class View{
    function __construct(){
    }

    public function render($page, $params = array()){
        if(!empty($page)){
            $ruta = PATH_VIEW . $page . ".php";

            if(is_readable($ruta)){
                require $ruta;
            }
            else{
                throw new Exception("No visible $page");
            }
        }
    }
}
