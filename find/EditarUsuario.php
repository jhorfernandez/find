<?php
  error_reporting(E_ALL ^ E_NOTICE); 
  session_start();
  include_once "clases/conexion.php";

  //echo $id = $_POST['id'];

  if (isset($_POST['id'])) {
     $editar_id = $_POST['id'];

     $query = "SELECT * FROM  admin WHERE id='$editar_id'";

     $consulta = mysqli_query($conexion, $query);

     $fila = mysqli_fetch_array($consulta);

     $_SESSION['id'] = $fila[0];
     $nombre = $fila[1];
     $correo = $fila[2];
     $contrasena = $fila[3];
     $area = $fila[4];

  }

?>

<form action="EdicionUsuario.php" method="POST">
	<div class="form-group">
      <input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>">
  </div>
	<div class="form-group">
      <input class="form-control" type="text" name="correo" value="<?php echo $correo ?>">
  </div>
  <div class="form-group">
      <input class="form-control" type="password" name="contrasena" value="<?php echo $contrasena ?>">    
  </div>
  <div class="form-group">
      <input class="form-control" type="text" name="area" value="<?php echo $area ?>">  
  </div>
	<input class="btn btn-warning" type="submit" name="actualizarDatos" value="Actualizar">
</form>

<?php 
/*
  if (isset($_POST['actualizarDatos'])) {
	   $actualizar_nombre = $_POST['nombre'];
	   $actualizar_correo = $_POST['correo'];
	   $actualizar_contrasena = $_POST['contrasena'];
	   $actualizar_area = $_POST['area'];

	   $actualizar = "UPDATE admin SET nombre='$actualizar_nombre', correo='$actualizar_correo', contrasena='$actualizar_contrasena', area='$actualizar_area' WHERE id='$editar_id'";

	   $ejecutar = mysqli_query($conexion, $actualizar);

	   if ($ejecutar) {
	      //echo "<script>alert('Datos Actualizados')</script>";
	      //echo "<script>window.open('usuarios.php')</script>";
        // echo "<script>location.reload()</script>";
	     

	   }
  }  */
   
?>