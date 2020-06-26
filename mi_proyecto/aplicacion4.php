<?php
# NameSpace: Espacio de nombres, Contexto
include '../../config_conjunto/config_conjunto4.php';

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

$db = new subase();	# Creamos el objeto $db: instancia de la clase subase

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My FrameWork</title>
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
	  	<?php include "encabezado".VERSION.".php"; ?>
	  </div>
	  <div class="col-sm-3" style="text-align: center;">
		<?php include "usuario".VERSION.".php"; ?>
	  </div>
	</div>

  </div>
  <div class="card-body">
	<div class="row">
		<div class="col-sm-2" style="text-align: left;">
			<?php include "menu".VERSION.".php"; ?>
		</div>
		<div class="col-sm-10" style="text-align: center;">
			<?php include "contenido".VERSION.".php"; ?>
		</div>
	</div>
  </div> 
  <div class="card-footer" style="text-align: center;">
	<?php include "pie".VERSION.".php"; ?>
  </div>
</div>
</body>
</html>