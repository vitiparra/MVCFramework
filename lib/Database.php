<?php
class Database{
    protected $conn;
    protected $db;
    
    public function __construct() {
        $this->conn = $this->crearConexion(DB_HOST,DB_USER, DB_PASS);
        $db = $this->seleccionarDB(DB_NAME);
    }
    
    function crearConexion($servidor, $usuario, $clave){
        return mysql_connect($servidor, $usuario, $clave);
    }

    public function seleccionarDB($db){
        mysql_select_db($db, $this->conn);
    }

    function cerrarConexion(){
        mysql_close($this->conn);
    }

    public function consulta($query, $db = DB_NAME){
        $this->seleccionarDB($db);
        $res = mysql_query($query, $this->conn);
        if(!$res || mysql_error()){
            throw new Exception("DB Error: " . mysql_error());
        }
        return $res;
    }

    public function getResultado($res, $tipo = MYSQL_ASSOC){
        return mysql_fetch_array($res, $tipo);
    }

    public function getArrayResultado($res, $tipo = MYSQL_ASSOC){
        $aux = array();
        while($fila = $this->getResultado($res)){
            $aux[] = $fila;
        }
        return $aux;
    }
}

