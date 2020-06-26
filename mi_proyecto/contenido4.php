<?php
defined("TOKEN_L34567") or die("Acceso no autorizado!"); // Para denegar el acceso al archivo sin autenticacion
if (isset($_GET["opcion"])) {
	# Cargar un módulo/opción de la aplicación
	$sql="SELECT modulo FROM menus WHERE id_menu=".$_GET["opcion"];
	if ($fila=$db->sub_fila($sql)) {
		include($fila["modulo"].VERSION.".php");
	} else {
		?>
		<img src="imagenes/perro_bravo.jpg" width="40%">
		<?php
	}
} else {
	?>
	<img src="imagenes/fondo.jpg" width="80%">
	<?php
}
?>