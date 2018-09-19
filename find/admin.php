<?php
  session_start();
  include_once "clases/conexion.php";
  $correo = $_SESSION['correo'];

  if(empty($correo)){
     header("Location: control.php");
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
    <div id="caja5">
        <div id="caja11">
            <h2 id="texto1">administrador</h2>
        </div>
        <div id="caja10">
            <a href="salir.php"><i class="Large material-icons" id="tamaño4">settings_power</i></a>
        </div>
    </div>
    <div id="caja6">
         <div id="caja8">
            <i class="Large material-icons" id="tamaño">account_circle</i>
         </div>
         <div id="caja9">
             <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link text-primary" href="admin.php"><i class="material-icons">account_balance</i>Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-warning" href="usuarios.php"><i class="material-icons">person</i>Usuarios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-warning" href="agenda.php"><i class="material-icons">today</i>Agenda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-success" href="citas.php"><i class="material-icons">assignment</i>Citas</a>
                </li>
                <li class="nav-itemt">
                  <a class="nav-link text-danger" href="salir.php"><i class="material-icons">settings_power</i>Salir</a>
                </li>
              </ul>
         </div>
    </div>
    <div id="caja7">
       <div id="caja12">
           <div id="caja16">
              <div id="caja17">
                <h2><i class="Large material-icons" id="tamaño1">people</i>
                    <?php
                       $query2 = "SELECT COUNT(id) FROM pacientes";
                       $consulta2 = mysqli_query($conexion,$query2);
                       while ($fila1 = mysqli_fetch_array($consulta2)) {
                         echo $fila1[0];
                       }
                    ?>
                </h2>
                <p class="texto2">Pacientes</p>
              </div>
              <div id="caja18">
                <h2><i class="Large material-icons" id="tamaño2">account_circle</i>
                  <?php
                     $query2 = "SELECT COUNT(id) FROM admin";
                     $consulta2 = mysqli_query($conexion,$query2);
                     while ($fila1 = mysqli_fetch_array($consulta2)) {
                       echo $fila1[0];
                     }
                  ?>
                </h2>
                <p class="texto2">Usuarios</p>
              </div>
              <div id="caja19">
                <h2><i class="Large material-icons" id="tamaño3">notifications_active</i>
                  <?php
                     $fecha2 = date('Y-m-d');
                     $query2 = "SELECT COUNT(*) FROM citas WHERE fecha='$fecha2'";
                     $consulta2 = mysqli_query($conexion,$query2);
                     while ($fila1 = mysqli_fetch_array($consulta2)) {
                       echo $fila1[0];
                     }
                  ?>
                </h2>
                <p class="texto2">Citas</p>
              </div>
           </div>
       </div>
       <div id="caja13">
           <div id="caja14">
               <div class="card border-primary mb-3" style="max-width: 18rem;">
                  <div class="card-header">Ultimos Pacientes Registrados</div>
                  <div class="card-body text-primary">
                    <!--<h5 class="card-title">Primary card title</h5>-->
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NOMBRE</th>
                          <th scope="col">TELÉFONO</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>EMILIO</td>
                          <td>3156896734</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
           </div>
           <div id="caja15">
               <div class="card border-primary mb-3" style="max-width: 18rem;">
                  <div class="card-header">Citas Para Hoy</div>
                  <div class="card-body text-primary">
                    <!--<h5 class="card-title">Primary card title</h5>-->
                    <?php
                      $fecha1 = date('Y-m-d');
                      $query = "SELECT DISTINCT citas.estado, pacientes.nombre FROM citas INNER JOIN pacientes ON citas.cedula = pacientes.cedula AND citas.fecha='$fecha1'";
                      //$query = "SELECT DISTINCT citas.estado, pacientes.nombre FROM citas INNER JOIN pacientes ON citas.fecha='2018-06-27' ";
                      $consulta = mysqli_query($conexion,$query);

                     while ($fila = mysqli_fetch_array($consulta)) {
                       echo "<table class='table'>
                               <thead>
                                 <tr>
                                   <th scope='col'>#</th>
                                   <th scope='col'>PACIENTE</th>
                                   <th scope='col'>ESTADO</th>
                                 </tr>
                               </thead>";
                            echo "<tbody>";
                            echo "<tr>";
                              echo "<th scope='row'>1</th>";
                              echo "<td>$fila[1]</td>";
                              echo "<td>$fila[0]</td>";
                            echo"</tr>";
                            echo "</tbody>";
                        echo "</table>";
                     }
                    ?>
                  </div>
              </div>
           </div>
       </div>
    </div>
</body>
</html>
