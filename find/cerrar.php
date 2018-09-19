<?php 
  session_start();
  unset($_SESSION['cedula']); 
  session_destroy();
  header("Location: index.php");
  exit;
?>