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
     	<img src="img/form.png" id="logo2" alt="logo" title="logo">
     	<div id="caja">
     		<form action="validar.php" method="POST">
			  <div class="form-group">
			    <label class="lb" for="Número de identificación">Número de identificación</label>
			    <input type="text" name="cedula" class="form-control" id="Número de identificación" placeholder="Número de identificación">
			  </div>
			  <div class="form-group">
			    <label class="lb" for="Demuestra que no eres un robot">Demuestra que no eres un robot</label>
			    <?php 
			      session_start();
                  include_once "clases/conexion.php";
                  $min = 0;
                  $max = 6;
                  $numero = mt_rand($min, $max);
                  //echo $numero;
                  switch ($numero) {
                  	case '0':
                  		echo "<h2 class='tc'>tiesast</h2>";
                  		break;
                    case '1':
                  	    echo "<h2 class='tc'>uva8</h2>";
                  	    break;
                  	case '2':
                  	    echo "<h2 class='tc'>sitca</h2>";
                  	    break;
                  	case '3':
                  	    echo "<h2 class='tc'>isaac</h2>";
                  	    break;
                  	case '4':
                  		echo "<h2 class='tc'>seddina</h2>";
                  		break;
                    case '5':
                    	 echo "<h2 class='tc'>crowded</h2>";
                    	break;
                    case '6':
                         echo "<h2 class='tc'>l@t@2018</h2>";
                        break;
                  	default:
                  		echo "No hay ninguna coincidencia";
                  		break;
                  }
			    ?>
			    <input type="text" name="captcha" class="form-control" id="Demuestra que no eres un robot" placeholder="Demuestra que no eres un robot">
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