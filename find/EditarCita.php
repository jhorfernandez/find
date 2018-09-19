<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  include_once "clases/conexion.php";

  //$id = $_POST['id'];

  if (isset($_POST['id'])) {

     $editarId = (int) $_POST['id'];

     $query = "SELECT * FROM doctores WHERE id='$editarId'";

     $consulta = mysqli_query($conexion, $query);

     $fila = mysqli_fetch_array($consulta);

     $_SESSION['id2'] = $fila[0];
     $especialidad = $fila[1];
     $lugar = $fila[2];
     $fecha = $fila[3];
     $hora = $fila[4];
     $doctor = $fila[5];
     $estado = $fila[6];

  }

?>

<form action="EdicionCita.php" method="POST">
	<div class="form-group">
    <input class="form-control" type="text" name="especialidad" value="<?php echo $especialidad ?>">
  </div>
  <div class="form-group">
    <input class="form-control" type="text" name="lugar" placeholder="LUGAR" value="<?php echo $lugar ?>">
  </div>
  <div class="form-group">
    <input class="form-control" type="date" id="date" name="fecha" placeholder="MM/DD/YYY" value="<?php echo $fecha ?>">
  </div>
  <div class="form-group">
    <input class="form-control" type="time" name="hora" max="22:30:00" min="10:00:00" step="1" value="<?php echo $hora ?>">
  </div>
  <div class="form-group">
    <input class="form-control" type="text" name="doctor" placeholder="DOCTOR" value="<?php echo $doctor ?>">
  </div>
  <div class="form-group">
    <select class="form-control" name="estado">
        <option>ESTADO ACTUAL:<?php echo $estado ?></option>
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select>
  </div>
	<input class="btn btn-warning" type="submit" name="actualizarDatos" value="Actualizar">
</form>
