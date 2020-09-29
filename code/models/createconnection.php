<?php
//
// NOMBRE DE LA BASE DE DATOS.
function getdatabase(){ return "nautica_adriancosta"; }
//
//
function table_exists( $conn, $table ){
    return ($conn->query("select * from $table"));
}


function connect2db(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "";
    mysqli_report(MYSQLI_REPORT_STRICT);
    $conn = null;
    try {
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
        if($conn->error!=null){
            echo "ERROR".$conn->error."<br>";
            return $conn;
        }
        $conn->query( "create database if not exists ".getdatabase() );
        $conn->query( "use ".getdatabase() );
        if( !table_exists($conn, "socios") ){
            $conn->multi_query( getfilecont("models/creacion_tablas.sql") );
            while ($conn->next_result()) {;}
            $conn->multi_query( getfilecont("models/insertar_semillas.sql") );
            while ($conn->next_result()) {;}
        }
    } catch (Exception $e) {
        $err = $e->getMessage()."";
        echo    "<br><br>
                    <a style='background-color:red;' >
                    $err
                    </a>
                    <br><br>
                    REVISE LA CONFIGURACION LAMP";
        exit();
    }
    return $conn;
}
