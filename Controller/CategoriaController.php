<?php
class CategoriaController extends Controller{
    function __construct(){
        parent::__construct();
    }
    
    function index($parametro=false){
        $params = $this->model->getCategorias();
        $this->view->render("index/catalogo", $params); 
    }
}