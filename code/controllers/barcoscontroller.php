<?php
function barcoscontroller(){
    require_once( "models/socios.php" );
    require_once( "models/barcos.php" );
    $socios = new socios();
    $barcos = new barcos();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ispostv = TRUE;
        $arr = $barcos->allatr;
        for( $i=0; $i<count($arr); $i++ ){
            $ispostv = $ispostv && isset($_POST[$arr[$i]]);
        }
        if( $ispostv ){
            for( $i=0; $i<count($arr); $i++ ){
                $ispostv = $ispostv && strlen(isset($_POST[$arr[$i]]))>0;
            }
            if( $ispostv ){
                if( $barcos->exist($_POST[$arr[0]]) ){
                    $_SESSION['msgerror'] = "Barco existente, Acción no aceptada.";
                    $_SESSION['posterror'] = true;
                    header( "Location: /barcos" );
                }else{
                    if( !$socios->exist($_POST[$arr[4]]) ){
                        $_SESSION['msgerror'] = 
                            "El propietario no existe, registre primero al socio y luego ingrese los datos del barco.";
                        $_SESSION['posterror'] = true;
                        header( "Location: /barcos" );
                    }
                    $res = $barcos->insert(
                        $_POST[$arr[0]],
                        $_POST[$arr[1]],
                        $_POST[$arr[2]],
                        $_POST[$arr[3]],
                        $_POST[$arr[4]],
                    );
                    // echo $socios->error()."";
                    header( "Location: /barcos " );
                }
            }else{
                $_SESSION['msgerror'] = "Campos faltantes";
                $_SESSION['posterror'] = true;
            }
        }else{
            $_SESSION['msgerror'] = "Transacción Invalida.";
            $_SESSION['posterror'] = true;
        }
        header( "Location: /barcos " );
    }
    include("views/barcosparts/barcospage.php");exit();
}