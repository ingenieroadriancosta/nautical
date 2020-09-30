<?php
require_once("models/createconnection.php");
class barcos
{
    public $allatr = ["matricula",  "nombres", "idamarre", "costoamarre", "id_socios"];
    private $matricula;
    private $nombres;
    private $idamarre;
    private $costoamarre;
    private $id_socios;
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
        return ($this->conn->query("select barcos.matricula from barcos where barcos.matricula=$matricula ")->fetch_array()!=null);
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
