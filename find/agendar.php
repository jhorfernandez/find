<?php
  session_start();
  include_once "clases/conexion.php";

   $fecha = $_SESSION['fecha'];
   $hora = $_SESSION['hora'];
   $lugar = $_SESSION['lugar'];
   $doctor = $_SESSION['doctor'];
   $especialidad = $_SESSION['especialidad'];
   $estado = $_SESSION['estado'];
   $cedula = $_SESSION['cedula'];

  $query = "INSERT INTO citas(especialidad, lugar, fecha, hora, doctor, estado, cedula) VALUES ('$especialidad','$lugar','$fecha','$hora','$doctor','$estado','$cedula')";

  $datos = mysqli_query($conexion,$query);

  if(isset($datos)){
    unset($_SESSION['cedula']);
    session_destroy();
    $mensaje = "<div class='alert alert-primary' role='alert'><p class='text-center'>SU CITA SE AGENDO CON ÉXITO</p></div>";
    echo $mensaje;
  }else{
    die("no se pudo ingresar los registros".mysqli_error($conexion));
  }

?>