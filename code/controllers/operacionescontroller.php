<?php
function operacionescontroller(){
    require_once( "models/socios.php" );
    require_once( "models/barcos.php" );
    require_once( "models/capitanes.php" );
    require_once( "models/operaciones.php" );
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $socios     = new socios();
        $barcos     = new barcos();
        $capitanes  = new capitanes();
        $operaciones  = new operaciones();
        //
        $ispostv = TRUE;
        $arr = $operaciones->allatr;
        for( $i=0; $i<count($arr)-1; $i++ ){
            $ispostv = $ispostv && isset($_POST[$arr[$i]]);
        }
        if( $ispostv ){
            for( $i=0; $i<count($arr)-1; $i++ ){
                $ispostv = $ispostv && strlen(isset($_POST[$arr[$i]]))>0;
            }
            if( $ispostv ){
                $soc_or_cap = $_POST[$arr[4]];
                $soc = $soc_or_cap;
                $cap = null;
                if( !$socios->exist($soc_or_cap) ){
                    $soc = null;
                    $cap = $soc_or_cap;
                    if( !$capitanes->exist($soc_or_cap) ){
                        $_SESSION['msgerror'] = "ERROR: El comandante no es capitán o socio y no está regitrado.";
                        $_SESSION['posterror'] = true;
                        header( "Location: /operaciones" );
                    }
                }
                if( !$barcos->exist($_POST[$arr[0]]) ){
                    $_SESSION['msgerror'] = "ERROR: La matricula del barco no existe.";
                    $_SESSION['posterror'] = true;
                    header( "Location: /operaciones" );
                }
                //
                //
                if( $soc==null ){ $soc = 'null';}
                if( $cap==null ){ $cap = 'null';}
                //
                $res = $operaciones->insert(
                    $_POST[$arr[0]], 
                    $_POST[$arr[1]], 
                    $_POST[$arr[2]], 
                    $_POST[$arr[3]], 
                    $soc, 
                    $cap
                );
                if( !$res ){
                    $_SESSION['msgerror'] = "ERROR INGRESANDO LA OPERACION.";
                    $_SESSION['posterror'] = true;
                }
                //
                //
                header( "Location: /operaciones " );
            }else{
                $_SESSION['msgerror'] = "Campos faltantes";
                $_SESSION['posterror'] = true;
            }
        }else{
            $_SESSION['msgerror'] = "Transacción Invalida.";
            $_SESSION['posterror'] = true;
        }
        header( "Location: /operaciones " );
    }
    include("views/operaciones/operacionespage.php");exit();
}

