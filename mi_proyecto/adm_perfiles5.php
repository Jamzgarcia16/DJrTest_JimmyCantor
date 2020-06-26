<?php
defined("TOKEN_L34567") or die("Acceso no autorizado!");

$mensaje="";
if (isset($_POST["operacion"]) && isset($_POST["aceptar"])) {	// Nivel 3
	if ($_POST["aceptar"] != "Regresar") {
		print_r($_FILES);

		switch ($_POST["operacion"]) {
			case 'u':	// Update
				$sql="UPDATE perfiles SET nombre_perfil='".$_POST["nombre_perfil"]."' WHERE id_perfil=".$_POST["id_perfil"];
				$mensaje="Perfil Actualizado";
				break;
			case 'd':	// Delete
				$sql="DELETE FROM perfiles WHERE id_perfil=".$_POST["id_perfil"];
				$mensaje="Perfil Eliminado";
				break;
			case 'c':	// Create
				$sql="INSERT INTO perfiles (nombre_perfil) VALUES ('".$_POST["nombre_perfil"]."')";
				echo $sql;
				$mensaje="Creado";
				break;
		}
		echo "$sql";
		if ($db->consulta($sql)) {	# Ejecutamos el Query
			$mensaje="Registro del  $mensaje exitosamente!";
		} else {
			$mensaje="Error: el registro no fue  $mensaje! satisfactoriamente";
		}
	}
}

if (isset($_GET["crud"])) {	# Nivel 2
	$p1->assign("crud", $_GET["crud"]);
	switch ($_GET["crud"]) {
		case 'u':	// Editar
			$sql="SELECT id_perfil,nombre_perfil FROM perfiles WHERE id_perfil=".$_GET["idu"];
			$boton="Actualizar";
			$subtitulo="Edición de Datos de perfiles";
			$at1=" readonly";
			$at2="";
			$at3="";
			break;
		case 'd':	// Eliminar
			$sql="SELECT id_perfil,nombre_perfil FROM perfiles WHERE id_perfil=".$_GET["idu"];
			$boton="Eliminar";
			$subtitulo="Eliminar el Registro del perfil";
			$at1=" readonly";
			$at2=" readonly";
			$at3=" readonly";
			$at4=" readonly";
			break;
		case 'c':	// Crear
			$sql="";
			$boton="Grabar";
			$subtitulo="Creación de nuevo Registro de perfiles ";
			$at1=" readonly";
			$at2="";
			$at3="";			
			break;
	}
	$fila=array("id_perfil"=>"","nombre_perfil"=>"");
	if ($sql != "") {	# Ejecutamos el Query: $sql
		if (!$fila=$db->sub_fila($sql)) {
			$fila=array("id_perfil"=>"","nombre_perfil"=>"");
		}
	}
	$p1->assign("subtitulo",$subtitulo);
	$p1->assign("boton",$boton);
	$p1->assign("at1",$at1);
	$p1->assign("at2",$at2);
	$p1->assign("at3",$at3);
	$p1->assign("fila",$fila);

	$sql = "SELECT id_perfil,nombre_perfil FROM perfiles ORDER BY id_perfil";
	$tabla = $db->sub_tuplas($sql);
	$p1->assign("tabla_perfiles",$tabla);

} else {	# Nivel 1
	$p1->assign("crud", "");
	$p1->assign("mensaje",$mensaje);
	$sql = "SELECT id_perfil,nombre_perfil FROM perfiles ORDER BY id_perfil ASC";
	$tabla=$db->sub_tuplas($sql);
	$p1->assign("tabla_perfiles", $tabla);
}

?>