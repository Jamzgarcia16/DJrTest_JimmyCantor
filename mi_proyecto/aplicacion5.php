	<?php
	# NameSpace: Espacio de nombres, Contexto
	include '../../config_conjunto/config_conjunto5.php';

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

	include 'setup.php';

	$p1->assign("PROGRAMA",PROGRAMA);
	$p1->assign("LOGINI",LOGINI);
	$p1->assign("EMPRESA",EMPRESA);
	$p1->assign("SOFTWARE",SOFTWARE);
	$p1->assign("AUTOR",AUTOR);
	$p1->assign("VERSION",VERSION);

	include "encabezado".VERSION.".php";
	include "usuario".VERSION.".php";
	include "menu".VERSION.".php";
	include "contenido".VERSION.".php";
	include "pie".VERSION.".php";

	$p1->display("aplicacion".VERSION.".tpl");
	?>