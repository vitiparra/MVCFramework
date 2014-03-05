<?php
require PATH_LIB . "Database.php";
class Model {
    public $db;
    
    function __construct() {
        $this->db = new Database();
    }

}