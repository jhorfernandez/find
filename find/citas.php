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
    <div id="caja24">
        <div id="caja21">
            <div id="caja23">
                <div id="buscar">
                  <form action="BuscarCita.php" method="POST" class="form-inline" id="fml1">
                    <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="BUSCAR ESPECIALIDAD" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
                <div id="agregar">
                    <button type="button" class="btn btn-success" id="nueva" data-toggle="modal" data-target="#modal3">Nueva</button>
                    <!--<button type="button" class="btn btn-warning" id="editar">Editar</button>-->
                    <!--<button type="button" class="btn btn-danger" id="eliminar">Eliminar</button>-->
                </div>
            </div>
        </div>
        <!--Inicio de la ventana modal de nuevos registros-->
        <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">AGREGAR NUEVAS CITAS MÉDICAS</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="container">
                            <div class="row">
                               <div class="col-md-12">
                                 <form action="NuevaCita.php" method="post">
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="especialidad" placeholder="ESPECIALIDAD">
                                      </div>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="lugar" placeholder="LUGAR">
                                      </div>
                                      <div class="form-group">
                                        <input class="form-control" type="date" id="date" name="fecha" placeholder="MM/DD/YYY" >
                                      </div>
                                      <div class="form-group">
                                        <input class="form-control" type="time" name="hora" value="11:45:00" max="22:30:00" min="10:00:00" step="1">
                                      </div>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="doctor" placeholder="DOCTOR">
                                      </div>
                                      <div class="form-group">
                                          <select class="form-control" name="estado">
                                              <option>ESTADO</option>
                                              <option value="activo">Activo</option>
                                              <option value="inactivo">Inactivo</option>
                                          </select>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                                        <button type="submit" class="btn btn-primary">AGREGAR CITA</button>
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
        <!--Fin de la ventana modal de nuevos registros-->
        <div id="caja22">
            <form id="formDatos">
                  <table class='table table-bordered'>
                    <thead>
                      <tr>
                        <th scope='col'>ESPECIALIDAD</th>
                        <th scope='col'>LUGAR</th>
                        <th scope='col'>FECHA</th>
                        <th scope='col'>HORA</th>
                        <th scope='col'>DOCTOR</th>
                        <!--<th scope='col'>ESTADO</th>-->
                        <th scope='col'></th>
                      </tr>
                    </thead>
                    <?php
                     $query = "SELECT * FROM doctores";
                     $consulta = mysqli_query($conexion,$query);
                     echo  "<tbody>";
                     while ($fila = mysqli_fetch_array($consulta)) {
                          echo "<tr>";
                                echo "<th scope='row'>$fila[1]</th>";
                                echo "<td>$fila[2]</td>";
                                echo "<td>$fila[3]</td>";
                                echo "<td>$fila[4]</td>";
                                echo "<td>$fila[5]</td>";
                                //echo "<td>$fila[6]</td>";
                                echo "<td>
                                        <div id='btn1'>
                                             <button type='button' data-toggle='modal' data-target='#modal2' class='d-block p-2 w-100 btn btn-warning' id='$fila[0]'>Editar</button>
                                             <input type='button' name='valor' value='Eliminar' id='$fila[0]' class='d-block p-2 mt-1 btn btn-danger'>
                                        </div>
                                      </td>";
                          echo "</tr>";
                     }
                     echo  "</tbody>";
                   ?>
                  </table>
            </form>
            <!--VENTANA MODAL EDITAR CITAS MEDICAS-->
               <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">EDITAR CITA MÉDICA</h5>
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
                s</div>
            <!--FINAL DE VENTANA MODAL EDITAR CITAS MEDICAS-->
        </div>
    </div>
    <script>
          $(document).ready(function() {

                  $(document).on('click', 'input[type="button"]', function(event) {
                     let id = this.id;
                     //console.log("Se presionó el Boton con Id :"+ id)
                     //document.getElementById(id).addEventListener("click", Recargar);
                     console.log(id);
                     $.ajax({
                        type: 'POST',
                        url: 'DeleteCita.php',
                        data: {'id':id},
                        success: function(datos){
                          console.log(datos);
                        }
                     })

                     setTimeout(function(){
                       location.reload();
                     },);

                  });


                  $(document).on('click', 'button[type="button"]', function(event) {
                     let id = this.id;
                     //console.log("Se presionó el Boton con Id :"+ id)
                     //document.getElementById(id).addEventListener("click", Recargar);
                     console.log(id);
                     $.ajax({
                        type: 'POST',
                        url: 'EditarCita.php',
                        data: {'id':id},
                        success: function(datos){
                          //console.log(datos);
                          document.getElementById("data").innerHTML = datos;
                        }
                     })
                  });

            });
    </script>
    <div id="actualizar"></div>
</body>
</html>
