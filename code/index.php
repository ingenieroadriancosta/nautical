<?php
// PHP VERSION        7.4.8
// SQL VERSION        10.4.13-MariaDB
// Bootstrap          v4.5.2
//
require('allconfig.php');
session_name("nautica");
session_start(['cookie_lifetime' => ($timesession_sec)]);
//
require_once('phpresources.php');
$request = parseinit($endpoints);
require_once( "controllers/logincontroller.php" );
require_once( "controllers/socioscontroller.php" );
require_once( "controllers/barcoscontroller.php" );
require_once( "controllers/operacionescontroller.php" );
require_once( "controllers/capitanescontroller.php" );
//
parsefail( $request, $endpoints );
// 
switch( $request ){
  case $endpoints[0]:
    logincontroller();
    break;
  case $endpoints[1]:
    socioscontroller();
    break;
  case $endpoints[2]:
    barcoscontroller();
    break;
  case $endpoints[3]:
      capitanescontroller();
      break;
  case $endpoints[4]:
      operacionescontroller();
      break;
  default:
    header("Location: /");
    break;
}
exit();
