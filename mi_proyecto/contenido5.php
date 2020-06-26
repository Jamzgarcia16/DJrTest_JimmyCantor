<?php
defined("TOKEN_L34567") or die("Acceso no autorizado!"); // Para denegar el acceso al archivo sin autenticacion
if (isset($_REQUEST["opcion"])) {
	$p1->assign("opcion",$_REQUEST["opcion"]);
	# Cargar un módulo/opción de la aplicación
	# $sql="SELECT modulo FROM menus WHERE id_menu=".$_REQUEST["opcion"];
	$sql="SELECT m.modulo FROM aux_perfiles_menus a LEFT JOIN menus m ON a.menu_id=m.id_menu WHERE a.perfil_id=".$_SESSION["autb"]["perfil_id"]." AND a.menu_id=".$_REQUEST["opcion"]; 
	if ($fila=$db->sub_fila($sql)) {
		$p1->assign("modulo",$fila["modulo"]);
		include($fila["modulo"].VERSION.".php");
	} else {
		$p1->assign("modulo","");
	}
} else {
	$p1->assign("opcion","");
}
?>