<?php 
  session_start();
  include_once "clases/conexion.php";
  
       $editar_id = $_SESSION['id2'];
       $especialidad = $_POST['especialidad'];
       $lugar = $_POST['lugar'];
       $fecha = $_POST['fecha'];
       $hora = $_POST['hora'];
       $doctor = $_POST['doctor'];
       $estado = $_POST['estado'];

	   $actualizar = "UPDATE doctores SET especialidad='$especialidad', lugar='$lugar', fecha='$fecha', hora='$hora', doctor='$doctor', estado='$estado' WHERE id='$editar_id'";

	   $ejecutar = mysqli_query($conexion, $actualizar);

	   if ($ejecutar) {
	      header("location: citas.php");
	   }

   
?>