<?php

require_once( "models/createconnection.php" );
class capitanes{
    public $allatr=[   "nombres","apellidos", "tipo_documento", 
                            "documento"];
    private $nombres;
    private $apellidos;
    private $tipo_documento;
    private $documento;
    private $conn;

    function __construct() {
        $this->conn = connect2db();
    }

    function __destruct() {
        if($this->conn!=null){
            if ($this->conn->ping()) {
                $this->conn->close();
            }
        }
    }

    function getall(){
        return ($this->conn->query("select * from capitanes"));
    }

    function insert( $nombres, $apellidos, $tipo_documento, $documento ) {
        $query = 
        "insert into capitanes( nombres, apellidos, tipo_documento, documento )
        values(
            '$nombres', '$apellidos', $tipo_documento, $documento
        );
        ";
        $v2r = $this->conn->query($query);
        return $v2r;
    }

    public function exist( $documento ){
        if(!$this->conn->ping()){
            return false;
        }
        return ($this->conn->query("select capitanes.documento from capitanes where capitanes.documento=$documento ")->fetch_array()!=null);
    }

    public function consultar( $documento ){
        if(!$this->conn->ping()){
            return false;
        }
        $consu = $this->conn->query("select * from capitanes where capitanes.documento=$documento")->fetch_array();
        if( $consu!=null ){
            $this->nombres = $consu['nombres'];
            $this->apellidos = $consu['apellidos'];
            $this->tipo_documento = $consu['tipo_documento'];
            $this->documento = $consu['documento'];
        }
        return $consu!=null;
    }


    function error(){
        return $this->conn->error;
    }
}



