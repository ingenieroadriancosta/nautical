<?php
require_once( "models/createconnection.php" );
class socios{
    public $allatr=[   "nombres","apellidos", "tipo_documento", 
                            "documento", "telefono", "celular"];
    private $nombres;
    private $apellidos;
    private $tipo_documento;
    private $documento;
    private $telefono;
    private $celular;
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
        return ($this->conn->query("select * from socios"));
    }

    function fillall( $nombres, $apellidos, $tipo_documento, $documento, $telefono, $celular ) {
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->tipo_documento = $tipo_documento;
        $this->documento = $documento;
        $this->telefono = $telefono;
        $this->celular = $celular;
    }

    function insert( $nombres, $apellidos, $tipo_documento, $documento, $telefono, $celular ) {
        $query = 
        "insert into socios( nombres, apellidos, tipo_documento, documento, telefono, celular )
        values(
            '$nombres', '$apellidos', $tipo_documento, $documento, $telefono, $celular
        );
        ";
        echo $query."<br><br>";
        $v2r = $this->conn->query($query);
        return $v2r;
    }

    public function exist( $documento ){
        if(!$this->conn->ping()){
            return false;
        }
        return ($this->conn->query("select socios.documento from socios where socios.documento=$documento ")->fetch_array()!=null);
    }

    public function consultar( $documento ){
        if(!$this->conn->ping()){
            return false;
        }
        $consu = $this->conn->query("select * from socios where socios.documento=$documento")->fetch_array();
        if( $consu!=null ){
            var_dump($consu);
            echo "\nCont ".count($consu)."\n\n";
            $this->nombres = $consu['nombres'];
            $this->apellidos = $consu['apellidos'];
            $this->tipo_documento = $consu['tipo_documento'];
            $this->documento = $consu['documento'];
            $this->telefono = $consu['telefono'];
            $this->celular = $consu['celular'];
        }
        return $consu!=null;
    }


    function error(){
        return $this->conn->error;
    }
}
