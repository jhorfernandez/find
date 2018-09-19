<?php
   include_once "conexion.php";

   echo $nombre = $_POST['nombre'];
   echo $correo = $_POST['correo'];
   echo $contrasena = $_POST['contrasena'];
   echo $area = $_POST['area'];

   $query = "INSERT INTO admin(nombre, correo, contrasena, area) VALUES ('$nombre','$correo','$contrasena','$area')";

   $consulta = mysqli_query($conexion,$query);

   if (isset($consulta)) {
     header("location: ../usuarios.php");
   }

?>
