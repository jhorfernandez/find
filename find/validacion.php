<?php
  session_start();
  include_once "clases/conexion.php";

  echo $correo = $_POST['correo'];
  echo $contrasena = $_POST['contrasena'];

  $query = "SELECT correo,contrasena FROM admin";

  $peticion = mysqli_query($conexion,$query);

      while($fila = mysqli_fetch_array($peticion)){

          echo $db_correo = $fila[0];
          echo $db_contrasena = $fila[1];

          if($correo == $db_correo && $contrasena == $db_contrasena){

              $_SESSION['correo'] = $db_correo;

              header("location: admin.php");
              echo "entro";
              exit;
          }else{
            echo "entro";
            $error = "<div class='alert alert-danger' role='alert'><p class='text-center'>Correo electrónico o contraseña incorrectos</p></div>";
            header("location: control.php?mensaje=$error");
          }
      }


?>
