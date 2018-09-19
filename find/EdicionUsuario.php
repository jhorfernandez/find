<?php 
  session_start();
  include_once "clases/conexion.php";
  
       $editar_id = $_SESSION['id'];

	   $actualizar_nombre = $_POST['nombre'];
	   $actualizar_correo = $_POST['correo'];
	   $actualizar_contrasena = $_POST['contrasena'];
	   $actualizar_area = $_POST['area'];

	   $actualizar = "UPDATE admin SET nombre='$actualizar_nombre', correo='$actualizar_correo', contrasena='$actualizar_contrasena', area='$actualizar_area' WHERE id='$editar_id'";

	   $ejecutar = mysqli_query($conexion, $actualizar);

	   if ($ejecutar) {
	      header("location: usuarios.php");
	   }

   
?>