<?php 
// This all will be into an autoloader
require_once("config/config.php");
require_once("lib/Bootstrap.php");
require_once("lib/Controller.php");
require_once("lib/View.php");

try{
	$app = new Bootstrap();
}
catch(Exception $e){
	echo $e->getMessage();
}
