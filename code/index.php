<?php
// VERSION        7.4.8
//
//require_once('phpresources.php');
//parseinit();


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
$conn->query( "create database if not exists nautica;" );
$conn->query( "use nautica;" );
echo "".$conn->error."\n";
echo "Ok.";

 exit();
/*
session_start();
session_unset();
session_destroy();
session_write_close();
session_commit();
//*/

// session_destroy();
// echo phpversion();



//inicio de sesion
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

exit();

echo "SESS: ".session_status()."<br>";
session_name("nautica");
session_start();
session_destroy();
$_SESSION['is_open'] = TRUE;
/*
if( session_status()==PHP_SESSION_ACTIVE ){
  echo "<br>PHP_SESSION_ACTIVE: ".PHP_SESSION_ACTIVE."<br>";
  session_destroy();
  session_name("nautica");
  session_start(['cookie_lifetime' => (6)]);
}else{
  echo "<br>NOT PHP_SESSION_ACTIVE: ".PHP_SESSION_ACTIVE."<br>";
  session_name("nautica");
  session_start(['cookie_lifetime' => (6)]);
}
//*/


echo "SNAME: ".session_name()."<br><br>";
// session_start([ 'cookie_lifetime' => 86400, 'read_and_close'  => true,]);
// echo "SID: ".session_id();
exit();

$aa = @parse_url($_SERVER['REQUEST_URI'])['path'];
echo $aa."!!!<br>";

echo strlen($request)."<br>";
//var_dump(http_response_code(404));
var_dump( $request );

// echo "Count" + strlen($request) + "<br>";
echo $request;


if(strstr($_SERVER['REQUEST_URI'],'index.php')){
  header('HTTP/1.0 404 Not Found');
  readfile('404missing.html');
  exit();
}


$request=$_SERVER['REQUEST_URI'];
echo $request;
