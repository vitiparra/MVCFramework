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
		$nombre = array_shift($args);
		$nombre = ucfirst(strtolower($nombre));
		$clase = $nombre . "Controller";
                $modelo = $nombre . "Model";
	        echo "Cargando Controlador $clase<br/>";
	        echo "Cargando Model $modelo<br/>";

                $path = PATH_CONTROLLER . $clase . ".php";
		if(file_exists($path) && is_readable($path)) {
			require_once $path;
			$controller = new $clase;
                        $controller->loadModel($modelo);
		}
		else{
			echo "No se puede procesar esta URL"; // Aquí se redigirá a una página 404 o a la home
			return false;
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