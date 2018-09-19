<?php
  session_start();
  session_unset($_SESSION['correo']);
  session_destroy();
  header("Location: control.php");
?>
