<?php
class Bootstrap{
	function __construct(){
		if(!isset($_GET["url"])){
			$clase = "IndexController";
			require_once "Controller/" . $clase . ".php";
			$controller = new $clase;
			$controller->index();
			return false;
		}

		// Capturamos todas las partes de la URL que se ha introducido
		$args = explode("/", rtrim($_GET["url"],"/"));
		$args = array_filter($args);

		// La primera parte será la clase que queremos instanciar
		$clase = array_shift($args);
		$clase = ucfirst(strtolower($clase));
		$clase = $clase . "Controller";
		
		if(file_exists("Controller/" . $clase . ".php") && is_readable("Controller/" . $clase . ".php")) {
			require_once "Controller/" . $clase . ".php";
			$controller = new $clase;
		}
		else{
			echo "No se puede procesar esta URL"; // Aquí se redigirá a una página 404 o a la home
		}
		// La segunda parte, si existe, corresponde al método que queremos ejecutar
		if(count($args) > 0){
			// La segunda parte será el método que queremos ejecutar
			$metodo = array_shift($args);
			$metodo = strtolower($metodo);
			
			if(count($args)>0){
				$params = $args;
			}
			else{
				$params = array();
			}
		}
		else{
			$metodo = "index";
			$params = array();
		}
		
		// Array que identifica el controlador y método que vamos a invocar
		$callback = array($controller, $metodo);
		
		if(method_exists($controller,$metodo) && is_callable($callback)){
			if(count($params) > 0){
				call_user_func_array($callback, $params);
			}
			else{
				call_user_func($callback);
			}
		}
		else{
			throw New Exception ("No se reconoce la URL");
		}
	}
}