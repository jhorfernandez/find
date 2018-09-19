<?php
  session_start();
  include_once "clases/conexion.php";
  $cedulav = $_SESSION['cedula'];

  if(empty($cedulav)){
     header("Location: index.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Agenda tu cita con find</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div id="contenido1">
    	<div id="caja1">
    		<img src="img/logo.png" class="img-fluid logo" title="logo" alt="logo">
        <h2 id="nombre">
         <?php
              include_once "clases/conexion.php";

              $query = "SELECT * FROM pacientes WHERE cedula='$cedulav'";

              $consulta = mysqli_query($conexion,$query);

              while ($fila = mysqli_fetch_array($consulta)) {
                echo "$fila[2] $fila[3]";
              }
         ?>
        </h2>
        <a href="cerrar.php" id="mover" class="badge badge-primary">Cerrar sesión</a>
    	</div>
      <div id="caja2">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input-group listas">
              <select name="especialidad" class="custom-select" id="inputGroupSelect04">
                <option selected>Especialidad</option>
                <?php
                     include_once "clases/conexion.php";
                     $query = "SELECT * FROM doctores";

                     $consulta = mysqli_query($conexion,$query);

                     while ($fila = mysqli_fetch_array($consulta)) {
                        echo "<option value='$fila[1]'>$fila[1]</br></option>";
                      }
                ?>
              </select>
            </div>
            <div class="input-group listas1">
              <select name="lugar" class="custom-select" id="inputGroupSelect04">
                <option selected>Ubicacion</option>
                <?php
                     include_once "clases/conexion.php";
                     $query = "SELECT * FROM doctores";

                     $consulta = mysqli_query($conexion,$query);

                     while ($fila = mysqli_fetch_array($consulta)) {
                        echo "<option value='$fila[2]'>$fila[2]</br></option>";
                      }
                ?>
              </select>
            </div>
            <input type="submit" name="submit"  class="btn btn-primary boton1" value="Consultar">
         </form>
      </div>
    </div>
    <!--<div id="caja4">
    </div>-->
    <div id="caja3">
        <?php
           if(isset($_POST['submit']))
            {

              $especialidad = $_POST['especialidad'];
              $lugar = $_POST['lugar'];

              $query1 = "SELECT * FROM doctores WHERE (especialidad='$especialidad') AND (lugar='$lugar')";

              $consulta1 = mysqli_query($conexion,$query1);

              if (!empty($consulta1)) {
                while ($fila = mysqli_fetch_array($consulta1)) {
                   $_SESSION['fecha'] = $fila[3];
                   $_SESSION['hora'] = $fila[4];
                   $_SESSION['doctor'] = $fila[5];
                   $_SESSION['especialidad'] = $fila[1];
                   $_SESSION['estado'] = $fila[6];
                   $_SESSION['lugar'] = $fila[2];

                   echo "<table class='table'>
                        <thead class='thead-dark'>
                          <tr>
                            <th scope='col'>Fecha</th>
                            <th scope='col'>Hora</th>
                            <th scope='col'>Lugar</th>
                            <th scope='col'>Doctor</th>
                            <th scope='col'>Especialidad</th>
                             <th scope='col'>Estado</th>
                            <th scope='col'>Asignar Cita</th>
                          </tr>
                        </thead>";
                    echo "<tbody>";
                    echo "<tr>";
                            echo "<td>$fila[3]<br></td>";
                            echo "<td>$fila[4]<br></td>";
                            echo "<td>$fila[2]<br></td>";
                            echo "<td>$fila[5]<br></td>";
                            echo "<td>$fila[1]<br></td>";
                            echo "<td>$fila[6]<br></td>";
                            echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#Modal'>Agendar Cita</button><br></td>";
                    echo "</tr>";
                    echo "</tbody>";
                   echo "</table>";
                }
              } else{
                echo "Error en la ejecucion del programa";
              }

            }

        ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agendar Su Cita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <table class="table">
                <thead class='thead-dark'>
                  <tr>
                    <th scope="col">FECHA</th>
                    <th scope="col">HORA</th>
                    <th scope="col">MEDICOS</th>
                    <th scope="col">ESPECIALIDAD</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $_SESSION['fecha']?></td>
                    <td><?php echo $_SESSION['hora']?></td>
                    <td><?php echo $_SESSION['doctor']?></td>
                    <td><?php echo $_SESSION['especialidad']?></td>
                  </tr>
                </tbody>
              </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            <button type="button" id='boton' class="btn btn-primary">AGENDAR</button>
          </div>
        </div>
      </div>
    </div>
    <script>
    function Registro(){
       var ajax = new XMLHttpRequest();
       var url = "agendar.php";
       ajax.open("GET",url,true);
       ajax.send();
       ajax.onreadystatechange = function(){
         if(ajax.readyState==4 && ajax.status == 200){
           document.getElementById("actualizar").innerHTML =ajax.responseText;
         }
       }
    }
    document.getElementById("boton").addEventListener("click", Registro);

    /*setInterval(function(){
       var ajax = new XMLHttpRequest();
       var url = "citas.php";
       ajax.open("GET",url,true);
       ajax.send();
       ajax.onreadystatechange = function(){
         if(ajax.readyState==4 && ajax.status == 200){
           document.getElementById("actualizar").innerHTML =ajax.responseText;
         }
       }
    },1000);*/
  </script>
  <div id="actualizar"></div>
</body>
</html>
