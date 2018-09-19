<?php
  session_start();
  include_once "clases/conexion.php";

  echo $id = $_POST['id'];

  $consulta = "DELETE FROM admin WHERE id='$id'";

  $query = mysqli_query($conexion,$consulta);

  if (!$query) {
    die("no se pudo ingresar".mysqli_error($conexion));
  }

?>
