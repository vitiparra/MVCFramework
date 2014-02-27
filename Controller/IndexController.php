<?php
class IndexController extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index($parametro=false){
		echo "<br/>Ejecutando método por defecto";
		if($parametro){
			echo " con el parámetro $parametro";
		}
	}
}