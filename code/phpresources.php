<?php
$endpoints = array("/", "/socios", "/barcos", "/capitanes", "/operaciones" );
function parseinit($endpoints){
    $request=@parse_url($_SERVER['REQUEST_URI'])['path'];
    // $endpoints = array("","/","/login", "/socios", "/barcos", "/operaciones" );
    if (!in_array($request, $endpoints)){
        include("views/error404.php");
        exit();
    }
    return $request;
}


function getfilecont( $filename ){
    $handle = fopen( $filename, "r" );
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;
}


function parsefail( $request, $endpoints ){
        if( !isset($_SESSION['is_open']) && $request!=$endpoints[0] ){
            header("Location: /");
            exit();
        }
        if( isset($_SESSION['is_open']) ){
            if( $_SESSION['is_open']==FALSE && $request!=$endpoints[0] ){
                header("Location: /");
            }else{
                $_SESSION['is_open'] = TRUE;
            }
        }
}