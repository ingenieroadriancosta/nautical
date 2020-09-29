<?php
function parseinit(){
    $request=@parse_url($_SERVER['REQUEST_URI'])['path'];
    $endpoints = array("/","/login");
    if (!in_array($RQURI, $endpoints)){
        include("views/error404.php");
        exit();
    }
}
