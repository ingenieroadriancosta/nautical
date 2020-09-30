<?php
require_once("models/createconnection.php");
class operaciones
{
    public $allatr = ["matricula",  "fecha_salida", "tiempo_salida", "destino", "id_socios_or_capitanes"];
    private $matricula;
    private $fecha_salida;
    private $tiempo_salida;
    private $destino;
    private $id_socios_or_capitanes;
    private $conn;

    function __construct()
    {
        $this->conn = connect2db();
    }

    function __destruct()
    {
        if ($this->conn != null) {
            if ($this->conn->ping()) {
                $this->conn->close();
            }
        }
    }

    public function exist( $matricula ){
        if(!$this->conn->ping()){
            return false;
        }
        return ($this->conn->query("select operaciones.matricula from operaciones where operaciones.matricula=$matricula ")->fetch_array()!=null);
    }

    function getall(){
        return ($this->conn->query("select * from barcos"));
    }

    function insert( $matricula, $nombres, $idamarre, $costoamarre, $id_socios ) {
        $query = 
        "insert into barcos( matricula, nombres, idamarre, costoamarre, id_socios )
        values(
            $matricula, '$nombres', '$idamarre', $costoamarre, $id_socios
        );
        ";
        echo $query."<br><br>";
        $v2r = $this->conn->query($query);
        return $v2r;
    }

}
