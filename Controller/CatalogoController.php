<?php
class CatalogoController extends Controller{
    function __construct(){
        parent::__construct();
    }
    
    function index($parametro=false){
        $this->view->render("index/catalogo"); 
    }
}