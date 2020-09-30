<?php
function socioscontroller(){
    require_once( "models/socios.php" );
    $socios = new socios();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ispostv = TRUE;
        $arr = $socios->allatr;
        for( $i=0; $i<count($arr); $i++ ){
            $ispostv = $ispostv && isset($_POST[$arr[$i]]);
        }
        if( $ispostv ){
            for( $i=0; $i<count($arr); $i++ ){
                $ispostv = $ispostv && strlen(isset($_POST[$arr[$i]]))>0;
            }
            if( $ispostv ){
                if( $socios->exist($_POST[$arr[3]]) ){
                    $_SESSION['msgerror'] = "Socio existente,\nAcción no aceptada.";
                    $_SESSION['posterror'] = true;
                    header( "Location: / " );
                }else{
                    $res = $socios->insert(
                        $_POST[$arr[0]],
                        $_POST[$arr[1]],
                        (int)(strcmp($_POST[$arr[2]],"Cédula")!=0),
                        $_POST[$arr[3]],
                        $_POST[$arr[4]],
                        $_POST[$arr[5]],
                    );
                    if( !$res ){
                        $_SESSION['msgerror'] = "ERROR INGRESANDO EL SOCIO.";
                        $_SESSION['posterror'] = true;
                    }
                }
            }else{
                $_SESSION['msgerror'] = "Campos faltantes";
                $_SESSION['posterror'] = true;
            }
        }else{
            $_SESSION['msgerror'] = "Transacción Invalida.";
            $_SESSION['posterror'] = true;
        }
    }
    include("views/sociosparts/sociospage.php");exit();
}