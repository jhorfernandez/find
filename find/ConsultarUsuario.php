<?php
  session_start();
  include_once "clases/conexion.php";

 // echo $id = $_GET['id'];

  $form = $_GET['form'];

 /* $consulta = "SELECT * FROM admin WHERE id='$id'";

  $query = mysqli_query($conexion,$consulta);

  if (!$query) {
    die("no se pudo ingresar".mysqli_error($conexion));
  }

  while ($fila = mysqli_fetch_array($query)) {
       //echo $fila[0];
        //echo $fila[1];
        // echo $fila[2];
         // echo $fila[3];
          // echo $fila[4];
     //echo json_encode($fila, JSON_FORCE_OBJECT);
  
        echo json_encode($fila);


  }*/
  
?>