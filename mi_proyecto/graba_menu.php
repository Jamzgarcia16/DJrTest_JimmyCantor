<?php
include '../../config_conjunto/config_conjunto6.php';

if (isset($_POST["crud"]) && isset($_POST["id_menu"]) && isset($_POST["titulo"]) && isset($_POST["modulo"]) && isset($_POST["icono"]) && isset($_POST["url"])) {
	switch ($_POST["crud"]) {
		case 'u':
			$sql="UPDATE menus SET titulo='".$_POST["titulo"]."',modulo='".$_POST["modulo"]."',icono='".$_POST["icono"]."',url='".$_POST["url"]."' WHERE id_menu=".$_POST["id_menu"];
			$mensaje="actualizado";
			break;
		case 'd':
			$sql="DELETE FROM menus WHERE id_menu=".$_POST["id_menu"];
			$mensaje="eliminado";
			break;
		case 'c':
			$sql="INSERT INTO menus (titulo,modulo,icono,url) VALUES ('".$_POST["titulo"]."','".$_POST["modulo"]."','".$_POST["icono"]."','".$_POST["url"]."')";
			$mensaje="creado";
			break;
	}
	# echo "$sql";
	$db = new subase();	# Creamos el objeto $db: instancia de la clase subase
	if ($fila=$db->consulta($sql)) {
		if ($_POST["crud"]=='c') {
			$id_menu=$db->ultimo_id();
			$sql="SELECT * FROM menus WHERE id_menu=$id_menu";
			$fila=$db->sub_fila($sql);
			echo json_encode($fila);
		} else {
			echo "Registro $mensaje exitosamente!";
		}
	} else {
		//echo "Error: el registro NO fue $mensaje!";
		echo "Error: el registro NO fue $mensaje! $sql";
	}
} else {
	echo "No hay variables";
}

?>