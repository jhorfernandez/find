<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  include_once "clases/conexion.php";

  //$id = $_POST['id'];

  if (isset($_POST['id'])) {

     $editarId = (int) $_POST['id'];

     $query = "SELECT * FROM citas WHERE id='$editarId'";

     $consulta = mysqli_query($conexion, $query);

     $fila = mysqli_fetch_array($consulta);

     $_SESSION['id3'] = $fila[0];
     $fecha = $fila[3];
     $hora = $fila[4];

  }

?>

<form action="EdicionAgenda.php" method="POST">
  <div class="form-group">
    <input class="form-control" type="date" id="date" name="fecha" placeholder="MM/DD/YYY" value="<?php echo $fecha ?>">
  </div>
  <div class="form-group">
    <input class="form-control" type="time" name="hora" max="22:30:00" min="10:00:00" step="1" value="<?php echo $hora ?>">
  </div>
	<input class="btn btn-warning" type="submit" name="actualizarDatos" value="Actualizar">
</form>
