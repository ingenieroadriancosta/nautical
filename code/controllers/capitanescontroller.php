<?php
function capitanescontroller(){
    require_once( "models/capitanes.php" );
    $capitanes = new capitanes();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ispostv = TRUE;
        $arr = $capitanes->allatr;
        for( $i=0; $i<count($arr); $i++ ){
            $ispostv = $ispostv && isset($_POST[$arr[$i]]);
        }
        if( $ispostv ){
            for( $i=0; $i<count($arr); $i++ ){
                $ispostv = $ispostv && strlen(isset($_POST[$arr[$i]]))>0;
            }
            if( $ispostv ){
                if( $capitanes->exist($_POST[$arr[3]]) ){
                    $_SESSION['msgerror'] = "Capitán existente, Acción no aceptada.";
                    $_SESSION['posterror'] = true;
                    header( "Location: /capitanes" );
                }else{
                    $res = $capitanes->insert(
                        $_POST[$arr[0]],
                        $_POST[$arr[1]],
                        (!( $_POST[$arr[2]]==="Cédula" )+0),
                        $_POST[$arr[3]],
                    );
                    if( !$res ){
                        $_SESSION['msgerror'] = "ERROR INGRESANDO EL CAPITAN.";
                        $_SESSION['posterror'] = true;
                    }
                    header( "Location: /capitanes " );
                }
            }else{
                $_SESSION['msgerror'] = "Campos faltantes";
                $_SESSION['posterror'] = true;
            }
        }else{
            $_SESSION['msgerror'] = "Transacción Invalida.";
            $_SESSION['posterror'] = true;
        }
        header( "Location: /capitanes " );
    }
    include("views/capitanes/capitanespage.php");exit();
}
