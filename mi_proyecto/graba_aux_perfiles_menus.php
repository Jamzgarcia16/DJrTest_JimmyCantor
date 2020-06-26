<?php
include '../../config_conjunto/config_conjunto6.php';

if (isset($_POST["crud"]) && isset($_POST["id_aux"]) && isset($_POST["perfil_id"]) && isset($_POST["menu_id"])) 
 {
	switch ($_POST["crud"]) {
		case 'u':
			$sql="UPDATE aux_perfiles_menus SET perfil_id='".$_POST["perfil_id"].", menu_id='".$_POST["menu_id"]."' WHERE id_aux=".$_POST["id_aux"];
			$mensaje="actualizado";
			break;
		case 'd':
			$sql="DELETE FROM aux_perfiles_menus WHERE id_aux=".$_POST["id_aux"];
			$mensaje="eliminado";
			break;
			case 'c':
			#$sql="INSERT INTO perfiles (nombre_perfil) VALUES '".$_POST["nombre_perfil"]."')";
			$sql="INSERT INTO aux_perfiles_menus (perfil_id,menu_id) VALUES ('".$_POST["perfil_id"]."','".$_POST["menu_id"]."')";
			$mensaje="creado";
			break;
	}
	//echo "$sql";
	$db = new subase();	# Creamos el objeto $db: instancia de la clase subase
	if ($fila=$db->consulta($sql)) {
		if ($_POST["crud"]=='c') {
			$id_perfil=$db->ultimo_id();
			$sql="SELECT menu_id , perfil_id FROM aux_perfiles_menus ax LEFT JOIN menus m ON m.id_menu=ax.menu_id LEFT JOIN perfiles p ON p.id_perfil=ax.perfil_id";
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