<?php
# NameSpace: Espacio de nombres, Contexto
include '../../config/config2.php';

if (isset($_GET["cerrar"])) {
	if ($_GET["cerrar"]==session_id()) {
		# Cerrar la sesión
		session_unset();	# Elimina las variables de la memoria
		session_destroy();	# Desregistra las variables de la sesión
	}
}

if (!isset($_SESSION["autb"]["id"])) {
	# Usuario no está autenticado
	header("location: ".LOGINI);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ConjuntoSeguro.com</title>
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
<div class="card">
  <div class="card-header">

	<div class="row">
	  <div class="col-sm-9" style="text-align: center;">
	  	<img src="imagenes/logo.jpg" alt="Logo" width="75%">
	  </div>
	  <div class="col-sm-3" style="text-align: center;">
		Usuario: <?php echo $_SESSION["autb"]["nombre"]; ?><br/>
		<img src="<?php echo $_SESSION["autb"]["foto"]; ?>" alt="Logo" height="50"><br/>
		<a href="<?php echo PROGRAMA.'?cerrar='.session_id(); ?>" class="btn btn-primary">&laquo; Salir &raquo;</a>
	  </div>
	</div>

  </div>
  <div class="card-body">
	<div class="row">
		<div class="col-sm-2" style="text-align: left;">
			<!-- Menu -->
			<a href="#">Admón Usuarios</a><br/>
			<a href="#">Admón Menús</a><br/>
			<a href="#">Admón Perfile</a><br/>
			<a href="#">Admón Clientes</a><br/>
			<a href="#">Admón Banners</a><br/>
			<a href="#">Estadísticas Banners</a><br/>
		</div>
		<div class="col-sm-10" style="text-align: center;">
			<img src="imagenes/fondo.jpg" width="80%">
		</div>
	</div>
  </div> 
  <div class="card-footer" style="text-align: center;">
  	ABC SAS - 2018<br/>
  	<small><strong>Autor:</strong> Su nombre - &copy;</small>
  </div>
</div>
</body>
</html>