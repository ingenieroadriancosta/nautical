<?php
function parseinit(){
    $request=$_SERVER['REQUEST_URI'];
    if( strlen($request)>2 ){
        if( $request[1]!='?' ){
            include('views/error.html');
        }
        exit(0);
    }
}


