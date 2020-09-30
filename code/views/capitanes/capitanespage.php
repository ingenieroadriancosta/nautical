<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NAUTICA(CAPITANES)</title>
  <link rel="stylesheet" href="views/static/css/bootstrap.css">
  <script src="views/static/js/jquery.js"></script>
  <script src="views/static/js/bootstrap.js"></script>
</head>

<body background="/views/static/img/capitanesbk.jpg" style="background-size:100% 100vh;">
  <?php
  include("views/static/navbar.php");
  include("views/capitanes/addform.php");
  ?>
  <!-- -->
  <!-- -->
  <!-- <table style="border:solid 1px #000;background-color: #ffffff;"> -->
  <div class="container">&nbsp;</div>
  <div class="container">
    <div class="container">
      <input type="text" id="myInput" onkeyup="tablefuns()" placeholder="Buscar por documento..." title="Type in a name">
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
        Agregar capitan
      </button>
    </div>
    <div class="container">&nbsp;</div>

    <table class="table table-dark" id="myTable">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Tipo de documento</th>
        <th scope="col">Documento</th>
      </tr>
      <?php
      require_once("models/capitanes.php");
      $capitanes = new capitanes();
      $capall = $capitanes->getall();
      $count = 1;
      $doctype = ["Cedula", "Pasaporte"];
      while ($value = $capall->fetch_array()) {
        echo "<th scope='row'>$count</th>";
        echo "<td>" . $value['nombres'] . "</td>";
        echo "<td>" . $value['apellidos'] . "</td>";
        echo "<td>" . $doctype[$value['tipo_documento']] . "</td>";
        echo "<td>" . $value['documento'] . "</td>";
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
        td = tr[i].getElementsByTagName("td")[3];
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