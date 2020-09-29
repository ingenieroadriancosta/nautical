<?php
function getdatabase(){ return "nautica_adriancosta"; }
function table_exists( $conn, $table ){
    return ($conn->query("select * from $table"));
}

function getfilecont( $filename ){
    $handle = fopen( $filename, "r" );
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;
}

function connect2db(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
    if($conn->error!=null){
        return $this->conn;
    }
    $conn->query( "create database if not exists ".getdatabase() );
    $conn->query( "use ".getdatabase() );
    if( !table_exists($conn, "socios") ){
        $conn->multi_query( getfilecont("models/creacion_tablas.sql") );
    }
    return $conn;
}
