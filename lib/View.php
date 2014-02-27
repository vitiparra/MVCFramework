<?php
class View{
	function __construct(){
		echo "Esta es la vista";
	}
	
	public function render($page){
		if(!empty($page)){
			require_once "View/" . $page . ".php";
		}
	}
}
