<?php
defined("TOKEN_L34567") or die("Acceso no autorizado!");

$sql="SELECT * FROM tareas ORDER BY id_tarea";
$tabla=$db->sub_tuplas($sql);
$p1->assign("tabla_tareas",$tabla);
?>