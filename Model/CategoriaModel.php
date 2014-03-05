<?php
class CategoriaModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function getCategorias(){
        $res = $this->db->consulta("SELECT * FROM Categorias WHERE active=1");
        return $this->db->getArrayResultado($res);
    }
}