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
    <div id="caja20">
        <div id="caja21">
            <div id="caja23">
                <div id="buscar">
                   <form action="BuscarUsuario.php" method="POST" class="form-inline" id="fml1">
                     <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Correo Electrónico" aria-label="Search">
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                   </form>
                </div>
                <div id="agregar">
                   <!--agregar nuevo usuarios-->
                   <button
                        type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modal1"
                        id="bnt2">
                        NUEVO
                   </button>
                   <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">AGREGAR NUEVO USUARIO</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="container">
                            <div class="row">
                               <div class="col-md-12">
                                 <form action="clases/nuevo-usuario.php" method="post">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="nombre" placeholder="NOMBRE">
                                    </div>
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="correo" placeholder="COREO ELECTRÓNICO">
                                    </div>
                                    <div class="form-group">
                                      <input class="form-control" type="password" name="contrasena" placeholder="CONTRASEÑA">
                                    </div>
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="area" placeholder="AREA">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                                      <button type="submit" class="btn btn-primary">AGREGAR USUARIO</button>
                                    </div>
                                 </form>
                               </div>
                            </div>
                          </div>
                        </div>
                        <!--<div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                          <button type="submit" class="btn btn-primary">AGREGAR USUARIO</button>
                        </div>-->
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div id="caja22">
           <!--<form  name="seleccion" action="ConsultarUsuario.php" method="GET">-->
              <table class='table table-bordered'>
                        <thead>
                          <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>NOMBRE</th>
                            <th scope='col'>CORREO ELECTRÓNICO</th>
                            <th scope='col'>ÁREA</th>
                            <th scope='col'></th>
                          </tr>
                        </thead>
                  <?php

                  $busqueda = $_POST['buscar'];

                  $query = "SELECT * FROM admin WHERE correo LIKE '%$busqueda%'";

                  $consultar = mysqli_query($conexion,$query);

                   while ($fila = mysqli_fetch_array($consultar)) {

                      echo  "<tbody>";
                        echo "<tr>";
                              echo "<th scope='row'>$fila[0]</th>";
                              echo "<td>$fila[1]</td>";
                              echo "<td>$fila[2]</td>";
                              echo "<td>$fila[4]</td>";
                              echo "<td>
                                      <div id='btn1'>
                                         <!--<a class='btn btn-warning' data-toggle='modal' data-target='#modal2' href='usuarios.php?editar=$fila[0]'>Editar</a>-->
                                         <button type='button' data-toggle='modal' data-target='#modal2' class='btn btn-warning' id='$fila[0]'>Editar</button>
                                         <input type='button' name='valor' value='Eliminar' id='$fila[0]' class='btn btn-danger'>
                                      </div>
                                    </td>";
                        echo "</tr>";
                      echo  "</tbody>";
                   }
                ?>
              </table>
           <!--</form>-->
           <!--<?php
               //if (isset($_GET['editar'])) {
                  //include_once "EditarUsuario.php";
              // }
           ?>-->
        </div>
        <span id="user"></span>
        <!--Ventana Modal de editar usuario-->
          <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">EDITAR USUARIO</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="container">
                            <div class="row">
                               <div class="col-md-12">
                                  <div id="data"></div>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
          </div>
        <!--fin de Ventana Modal de editar usuario-->
    </div>
    <script>
          $(document).ready(function() {
              $(function() {
                  $(document).on('click', 'input[type="button"]', function(event) {
                     let id = this.id;
                     //console.log("Se presionó el Boton con Id :"+ id)
                     //document.getElementById(id).addEventListener("click", Recargar);
                     console.log(id);
                     $.ajax({
                        type: 'POST',
                        url: 'DeleteUsuario.php',
                        data: {'id':id},
                        success: function(datos){
                          console.log(datos);
                        }
                     })
                  });

               });

               $(function() {
                  $(document).on('click', 'button[type="button"]', function(event) {
                     let id = this.id;
                     //console.log("Se presionó el Boton con Id :"+ id)
                     //document.getElementById(id).addEventListener("click", Recargar);
                     console.log(id);
                     $.ajax({
                        type: 'POST',
                        url: 'EditarUsuario.php',
                        data: {'id':id},
                        success: function(datos){
                          //console.log(datos);
                          document.getElementById("data").innerHTML = datos;
                        }
                     })
                  });

              });

            });
  </script>
</body>
</html>
