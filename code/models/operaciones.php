<?php
require_once("models/createconnection.php");
class operaciones
{
    public $allatr = ["matricula",  "fecha_salida", "tiempo_salida", "destino", "idsocios", "idcapitanes"];
    private $matricula;
    private $fecha_salida;
    private $tiempo_salida;
    private $destino;
    private $idsocios;
    private $idcapitanes;
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

    public function exist($matricula)
    {
        if(!$this->conn->ping()){
            return false;
        }
        return ($this->conn->query("select operaciones.matricula from operaciones where operaciones.matricula=$matricula ")->fetch_array() != null);
    }

    function getall()
    {
        return ($this->conn->query("select * from operaciones"));
    }

    function insert($matricula, $fecha_salida, $tiempo_salida, $destino, $idsocios, $idcapitanes)
    {
        $query =
            "insert into operaciones( matricula, fecha_salida, tiempo_salida, destino, idsocios, idcapitanes )
        values(
            $matricula, '$fecha_salida', '$tiempo_salida', '$destino', $idsocios, $idcapitanes
        );
        ";
        echo $query . "<br><br>";
        $v2r = $this->conn->query($query);
        echo $this->conn->error;
        return $v2r;
    }
}
