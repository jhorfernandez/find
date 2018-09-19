<?php
   session_start();
   include_once "clases/conexion.php";
   echo $especialidad = $_POST['especialidad'];
   echo $lugar = $_POST['lugar'];
   echo $fecha = $_POST['fecha'];
   echo $hora = $_POST['hora'];
   echo $doctor = $_POST['doctor'];
   echo $estado = $_POST['estado'];

   $query = "INSERT INTO doctores(especialidad, lugar, fecha, hora, doctor, estado) VALUES ('$especialidad','$lugar','$fecha','$hora','$doctor','$estado')";

   $consulta = mysqli_query($conexion,$query);

   if (isset($consulta)) {
     header("location: citas.php");
   }

?>