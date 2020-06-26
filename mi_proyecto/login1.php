<?php 
# Supervariable global    $_POST 		$_GET
$error1="Bienvenido, cuidado con la Niña!, Quieta Niña!! Quieta!!";
if (isset($_POST["email"]) && isset($_POST["pwd"])) {
	# Autenticación del usuario
	// print_r($_POST);
	// print_r($_GET);
else {
		$error1="Error: en conexión a Servidor B.D.";
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Acceso</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="card">
  		<div class="card-header"><h1>Conjuntos Residenciales V.1</h1></div>
  		<div class="card-body">
		  	<form action="login1.php" method="post">
		  		<div class="form-group">
		    		<label for="email">Cuenta:</label>
		    		<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
		  		</div>
		  		<div class="form-group">
		    		<label for="pwd">Contraseña:</label>
		    		<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Clave">
		  		</div>
		  		<div class="form-group form-check">
		    		<label class="form-check-label">
		      		<input class="form-check-input" type="checkbox"> Recordar
		    		</label>
  				</div>
  			<button type="submit" class="btn btn-primary">Aceptar</button>
		</form>
		<hr/>
		<?php echo $error1; ?>
  		</div> 
  		<div class="card-footer">ConjuntoSeguro.com - 2018<br/>
  			<small><strong>Autor:</strong> Desarrollado por Jamz development Software Company SAS - &copy;</small>

  		</div>
	</div>
	</div>
</body>
</html>