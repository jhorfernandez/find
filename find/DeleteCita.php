<?php
  session_start();
  include_once "clases/conexion.php";

  echo $id = $_POST['id'];

  $consulta = "DELETE FROM doctores WHERE id='$id'";

  $query = mysqli_query($conexion,$consulta);

  if (!$query) {
    die("No se pudo eliminar el registro".mysqli_error($conexion));
  }

?>