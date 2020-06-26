<?php
include '../../config_conjunto/config_conjunto6.php';
$db = new subase();	# Creamos el objeto $db: instancia de la clase subase

if (isset($_POST["id_menu"])) {	// Casos: Editar y Eliminar
	$sql="SELECT * FROM menus WHERE id_menu=".$_POST["id_menu"];
	if ($fila=$db->sub_fila($sql)) {
		$sql="SELECT icono FROM iconos ORDER BY icono";
		$tabla=$db->sub_tuplas($sql);
		$fila["iconos"]=$tabla;
		echo(json_encode($fila));
	}
} else {	// Caso adicionar
	$sql="SELECT icono FROM iconos ORDER BY icono";
	$tabla=$db->sub_tuplas($sql);
	$fila["iconos"]=$tabla;
	echo(json_encode($fila));
}

?>