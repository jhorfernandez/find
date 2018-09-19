<?php
  session_start();
  include_once "clases/conexion.php";

     $editar_id = $_SESSION['id3'];
     $fecha = $_POST['fecha'];
     $hora = $_POST['hora'];

	   $actualizar = "UPDATE citas SET fecha='$fecha', hora='$hora' WHERE id='$editar_id'";

	   $ejecutar = mysqli_query($conexion, $actualizar);

	   if ($ejecutar) {
	      header("location: agenda.php");
	   }

?>
