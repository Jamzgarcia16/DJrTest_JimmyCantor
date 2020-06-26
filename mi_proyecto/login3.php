
<!-- 
Documentacion.

Autor: Jamz Garcia
Fecha: 23 Nov 2018
Descripcion del sitio: 

Sitio Login del Proyecto Conjuntos Residenciales Con Smarty PHP, en el cual definimos atravez de CONSTANTES las cuales se definen en un archivo de seguridad traido en el include,medio por el cual son llamadas en este archivo y remplazadas por su valor ya definidos en el archivo de seguridad.

en esta version numero 3 del proyecto mejoramos el metodo de conexion a la DB, ya que incluimos una Constate llamada DRIVER a la cual se le asigna el nombre del archivo mysqli.class.php ubicado en la carpeta de configuracion del proyecto junto a el archivo nuevo llamada config_conjunto3.php

-->
<?php
# NameSpace: Espacio de nombres, Contexto
include '../../config_conjunto/config_conjunto3.php';

# Supervariable global    $_POST 		$_GET
$error1="Cuellos Rotos al Rugir de los Motores!";
if (isset($_POST["email"]) && isset($_POST["pwd"])) {
	# Autenticación del usuario
	// print_r($_POST);
	// print_r($_GET);
	$sql="SELECT id,nombre,foto FROM usuarios WHERE cuenta='".$_POST["email"]."' AND clave='".$_POST["pwd"]."'";  # DML
	 echo $sql;
	# API: Aplication Program Interface:  MySQL
	// $db = mysqli_connect(IPSERVER, USERDB, PASSWD, DB, PORTDB); // Conexión a Server BD
	$db = new base();	# Creamos el objeto $db: instancia de la clase base
	if ($db->obtener_db()) {	// Conexión exitosa a la B.D.
		if ($db->consulta($sql)) {	# Ejecuta el Query
			if ($fila=$db->trae_fila()) { # Trae los datos
				# Usuario autenticado exitosamente!
				// print_r($fila);

				$_SESSION["autb"]=$fila;
				header("location: ".PROGRAMA); # Redireccionamiento en el lado del servidor
			} else {
				$error1="Error en la cuenta o en la clave!";
			}
		} else {
			$error1="Error: en Query: $sql";
		}
	} else {
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
  		<div class="card-header"><h1><?php echo SOFTWARE; ?></h1></div>
  		<div class="card-body">
		  	<form action="<?php echo LOGINI ?>" method="post">
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
  		<div class="card-footer"><?php echo EMPRESA; ?><br/>
  			<small><strong>Autor: <?php echo AUTOR; ?></strong></small>
  		</div>
	</div>
	</div>
</body>
</html>