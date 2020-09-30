<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAUTICA(OPERACIONES)</title>
    <link rel="stylesheet" href="views/static/css/bootstrap.css">
    <script src="views/static/js/jquery.js"></script>
    <script src="views/static/js/bootstrap.js"></script>
</head>

<body background="/views/static/img/Primera-parte.jpg" style="background-size:100% 100vh;">
    <?php
    include("views/static/navbar.php");
    include("views/operaciones/addform.php");
    ?>
    <!-- -->
    <!-- -->
    <!-- -->
    <div class="container">
        <div class="container mb-4">
            <input type="text" id="myInput" onkeyup="tablefuns()" placeholder="Buscar por matrícula..." title="Type in a name">
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                Agregar operación
            </button>
        </div>
        <table class="table table-dark" id="myTable">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Matrícula</th>
                <th scope="col">Fecha de salida</th>
                <th scope="col">Hora de salida</th>
                <th scope="col">Destino</th>
                <th scope="col">ID socio ó capitán</th>
            </tr>
            <?php
            require_once("models/operaciones.php");
            $operaciones = new operaciones();
            $sosall = $operaciones->getall();
            $count = 1;
            while ($value = $sosall->fetch_array()) {
                echo "<th scope='row'>$count</th>";
                echo "<td>" . $value['matricula'] . "</td>";
                echo "<td>" . $value['fecha_salida'] . "</td>";
                echo "<td>" . $value['tiempo_salida'] . "</td>";
                echo "<td>" . $value['destino'] . "</td>";
                if( $value['idsocios']!=null ){
                    echo "<td>" . $value['idsocios'] . "</td>";
                }else{
                    echo "<td>" . $value['idcapitanes'] . "</td>";
                }
                echo "</tr>";
                $count++;
            }
            ?>
        </table>
    </div>
    <!-- -->
    <!-- -->
    <script>
        function tablefuns() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($_SESSION['posterror']) {
                $ern = $_SESSION['msgerror'];
                echo "alert('$ern')";
                $_SESSION['posterror'] = false;
            }
        }
        ?>
    </script>


    <!-- -->
    <!-- -->
</body>

</html>