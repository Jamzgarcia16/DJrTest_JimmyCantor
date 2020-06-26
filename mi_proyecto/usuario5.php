<?php
defined("TOKEN_L34567") or die("Acceso no autorizado!");

$p1->assign("nombre",$_SESSION["autb"]["nombre"]);
$p1->assign("nombre_perfil",$_SESSION["autb"]["perfil_id"]);
$p1->assign("foto",$_SESSION["autb"]["foto"]);
$p1->assign("session_id",session_id());
?>