<?php
include '../../config_conjunto/config_conjunto6.php';

if (isset($_POST["crud"]) && isset($_POST["id_tarea"]) && isset($_POST["nombre_tarea"]) && isset($_POST["descripcion_tarea"]) && isset($_POST["estado"]) && isset($_POST["observacion"])) {
	switch ($_POST["crud"]) {
		case 'u':
			$sql="UPDATE tareas SET nombre_tarea='".$_POST["nombre_tarea"]."',descripcion_tarea='".$_POST["descripcion_tarea"]."',estado='".$_POST["estado"]."',observacion='".$_POST["observacion"]."' WHERE id_tarea=".$_POST["id_tarea"];
			$mensaje="actualizado";
			break;
		case 'd':
			$sql="DELETE FROM tareas WHERE id_tarea=".$_POST["id_tarea"];
			$mensaje="eliminado";
			break;
		case 'c':
			$sql="INSERT INTO tareas (nombre_tarea,descripcion_tarea,estado,observacion) VALUES ('".$_POST["nombre_tarea"]."','".$_POST["descripcion_tarea"]."','".$_POST["estado"]."','".$_POST["observacion"]."')";
			$mensaje="creado";
			break;
	}
	# echo "$sql";
	$db = new subase();	# Creamos el objeto $db: instancia de la clase subase
	if ($fila=$db->consulta($sql)) {
		if ($_POST["crud"]=='c') {
			$id_tarea=$db->ultimo_id();
			$sql="SELECT * FROM tareas WHERE id_tarea=$id_tarea";
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