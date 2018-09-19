<?php 
  session_start();
  include_once "clases/conexion.php";

  $cedula = $_POST['cedula'];
  $captcha = $_POST['captcha'];
  
  $query = "SELECT pacientes.cedula, captcha.palabras FROM pacientes INNER JOIN captcha WHERE (pacientes.id <= pacientes.id) AND (captcha.id <= captcha.id)";

  $peticion = mysqli_query($conexion,$query);

   while($fila = mysqli_fetch_array($peticion)){
       
       echo $db_cedula = $fila[0];
       echo $db_captcha = $fila[1];

       if($cedula == $db_cedula && $captcha == $db_captcha){
           
           $_SESSION['cedula'] = $db_cedula;
          
           header("location: cpanel.php");
           exit;
       }else{
           
           $error = "<div class='alert alert-danger' role='alert'><p class='text-center'>Cédula o Captcha incorrecto</p></div>";
           header("location: index.php?mensaje=$error");
           
       }

   }

?>