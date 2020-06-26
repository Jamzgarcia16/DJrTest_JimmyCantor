<?php
defined("TOKEN_L34567") or die("Acceso no autorizado!");
?>
<!-- Menu -->
<?php
$sql="SELECT id_menu,titulo FROM menus ORDER BY id_menu";
if ($tabla=$db->sub_tuplas($sql)) {
	foreach ($tabla as $key => $fila) {
		echo "<a href=\"".PROGRAMA."?opcion=".$fila["id_menu"],"\">".$fila["titulo"]."</a><br/>";
	}
}
?>