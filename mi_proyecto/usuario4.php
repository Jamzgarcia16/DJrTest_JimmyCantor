<?php
defined("TOKEN_L34567") or die("Acceso no autorizado!");
?>
		Usuario: <?php echo $_SESSION["autb"]["nombre"]; ?><br/>
		<img src="<?php echo $_SESSION["autb"]["foto"]; ?>" alt="Logo" height="50"><br/>
<a href="<?php echo PROGRAMA.'?cerrar='.session_id(); ?>" class="btn btn-primary">&laquo; Salir &raquo;</a>