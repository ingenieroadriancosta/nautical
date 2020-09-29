<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAUTICA</title>
    <link   rel="stylesheet" href="views/static/css/bootstrap.css">
    <script src="views/static/js/jquery.js" ></script>
    <script src="views/static/js/bootstrap.js" ></script>
</head>
<body background="/views/static/img/0.jpg" 
            style="background-size: contain;background-repeat: no-repeat;background-size: cover;" >
    <?php
        if( isset($_SESSION['is_open']) ){
            if ($_SESSION['is_open']===TRUE){
                include("views/static/navbar.php");
                include("views/mpagepath.html");
            }else{
                include("views/static/login.php");
            }
        }else{
            include("views/static/login.php");
        }
    ?>
    <script>
        <?php
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                if($_SESSION['posterror']){
                    $ern = $_SESSION['msgerror'];
                    echo "alert('$ern')";
                    $_SESSION['posterror'] = false;
                }
            }
        ?>
    </script>
</body>
</html>
