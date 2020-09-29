<?php
function socioscontroller(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    }else{
        include("views/sociospage.php");exit();
    }
}