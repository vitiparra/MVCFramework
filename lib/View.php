<?php
class View{
	function __construct(){
	}
	
	public function render($page){
		if(!empty($page) && is_readable("View/" . $page . ".php")){
			require_once "View/" . $page . ".php";
		}
	}
}
