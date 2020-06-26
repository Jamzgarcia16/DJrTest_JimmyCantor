<?php
/* 
	Parámetros de configuración
	VERSION: 3
*/
define("VERSION", "3");

$motor = "mariadb";
// $motor = "postgresql";
switch ($motor) {
	case 'mariadb':
		define("IPSERVER", "127.0.0.1");
		define("USERDB", "root");
		define("PASSWD", "");
		define("DB", "mi_proyecto");
		define("PORTDB", "3306");
		define("DRIVER","mysqli.class.php");
		break;
	case 'postgresql':
		define("IPSERVER", "127.0.0.1");
		define("USERDB", "postgres");
		define("PASSWD", "123456");
		define("DB", "php_noche");
		define("PORTDB", "5432");
		define("DRIVER","postgresql.class.php");
		break;
}

define("EMPRESA", "Jamz Deveploment Sofwate S.A.S. - 2.018");
define("SOFTWARE", "Conjuntos Residenciales Ver.".VERSION);
define("AUTOR", "Jamz Garcia &copy;");

define("PROGRAMA", "aplicacion".VERSION.".php");
define("LOGINI", "login".VERSION.".php");

session_start();	// Activa el registro de las variables en la sessión

require_once DRIVER;

?>