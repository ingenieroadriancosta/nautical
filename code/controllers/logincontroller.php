<?php
function logincontroller(){
    require('allconfig.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['msgerror'] = "Administrador o contraseña inválida";
        $_SESSION['posterror'] = false;
        $_SESSION['is_open'] = FALSE;
        $idus = $_POST['idusuario'];
        $psus = $_POST['passwordusuario'];
        if( $idus===($admin_name) ){
            if( $psus===$admin_pass ){
                $_SESSION['is_open'] = TRUE;
                $_SESSION['msgerror'] = "Sesión iniciada.";
                $_SESSION['posterror'] = true;
                header("Location: /");
            }
        }
        $_SESSION['posterror'] = true;
        header("Location: / ");
    }else{
        if( isset($_GET['acc']) && isset($_SESSION['is_open']) ){
            if( $_SESSION['is_open'] ){
                $_SESSION['is_open'] = FALSE;
                $_SESSION['posterror'] = true;
                $_SESSION['msgerror'] = "Sesión finalizada";
            }
        }
    }
    include("views/mainpage.php");exit();
}

