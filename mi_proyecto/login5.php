<?php
# NameSpace: Espacio de nombres, Contexto
include '../../config_conjunto/config_conjunto5.php';

# Supervariable global    $_POST 		$_GET
$error1="Bienvenido, cuidado con el DOG!";
if (isset($_POST["email"]) && isset($_POST["pwd"])) {
	# Autenticación del usuario
	// print_r($_POST);
	// print_r($_GET);
	$sql="SELECT id,nombre,foto,perfil_id FROM usuarios WHERE cuenta='".$_POST["email"]."' AND clave='".$_POST["pwd"]."' AND estado=1";  # DML
	//echo $sql;
	# API: Aplication Program Interface:  MySQL
	// $db = mysqli_connect(IPSERVER, USERDB, PASSWD, DB, PORTDB); // Conexión a Server BD
	$db = new subase();	# Creamos el objeto $db: instancia de la clase subase
	if ($db->obtener_db()) {	// Conexión exitosa a la B.D.
		if ($fila=$db->sub_fila($sql)) { # Trae los datos
			# Usuario autenticado exitosamente!
			// print_r($fila);
			$_SESSION["autb"]=$fila;
			header("location: ".PROGRAMA); # Redireccionamiento en el lado del servidor
		} else {
			$error1="Error en la cuenta o en la clave!";
		}
	} else {
		$error1="Error: en conexión a Servidor B.D.";
	}
}

include 'setup.php';

$p1->assign("SOFTWARE", SOFTWARE);
$p1->assign("LOGINI", LOGINI);
$p1->assign("error1", $error1);
$p1->assign("EMPRESA", EMPRESA);
$p1->assign("AUTOR", AUTOR);

$p1->display("login".VERSION.".tpl");
?>