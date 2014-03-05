<?php 
// This all will be into an autoloader
require_once("config/config.php");
require_once(ROOT . "lib/Bootstrap.php");
require_once(ROOT . "lib/Model.php");
require_once(ROOT . "lib/Controller.php");
require_once(ROOT . "lib/View.php");

try{
    $app = new Bootstrap();
}
catch(Exception $e){
    echo $e->getMessage();
}
