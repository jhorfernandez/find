<!DOCTYPE html>
<html>
<head>
	<title>Agenda tu cita con find</title>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
</head>
<body>
     <div id="contenido">
     	<img src="img/admin.png" id="logo3" alt="logo admin" title="logo admin">
     	<div id="caja">
     		<form action="validacion.php" method="POST">
			  <div class="form-group">
			    <label class="lb" for="Número de identificación">Correo Electrónico</label>
			    <input type="text" name="correo" class="form-control" id="Número de identificación" placeholder="Correo Electrónico">
			  </div>
			  <div class="form-group">
			    <label class="lb" for="Demuestra que no eres un robot">Introduce Tu Contraseña</label>
			    <input type="password" name="contrasena" class="form-control" id="Demuestra que no eres un robot" placeholder="Introduce Tu Contraseña">
			  </div>
			  <button type="submit" class="btn btn-primary" id="boton">OK</button>
			</form>
     	</div>
     </div>
     <?php
		error_reporting(E_ALL ^ E_NOTICE);
		$error = $_GET['mensaje'];
		echo $error;
	?>
</body>
</html>
