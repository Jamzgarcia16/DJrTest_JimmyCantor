<?php
/**
* Clase: base
* Motor: PostgreSQL
* Autor: Su nombre
*/
class base
{
	public $db;		// var o public, protected, private
	private $id_resultado;
	private $error1;

	function __construct ($server=IPSERVER,$user=USERDB,$passwd=PASSWD,$based=DB,$port=PORTDB,$conection_type="N")	// Método constructor
	{
		# Se autoejecuta en el momento de la instanciación del objeto
		# Inicializar las propiedades
		$this->db = null;
		$this->id_resultado = null;
		$this->error1 = "";
		$this->conectar($server,$user,$passwd,$based,$port,$conection_type); // LLamamos al método conectar
	}

	function conectar ($server=IPSERVER,$user=USERDB,$passwd=PASSWD,$based=DB,$port=PORTDB,$conection_type="N") {
		try {
			switch (strtoupper($conection_type)) {
				case 'N': // Conexión no persistente. Recomendada para aplicaciones WEB
					$this->db = @pg_connect("host=$server port=$port dbname=$based user=$user password=$passwd options='--client_encoding="."utf8"."'");
					break;
				case 'P': // Conexión persistente
					$this->db = @pg_pconnect("host=$server port=$port dbname=$based user=$user password=$passwd options='--client_encoding="."utf8"."'");
					break;
				default: // Conexión no persistente
					$this->db = @pg_connect("host=$server port=$port dbname=$based user=$user password=$passwd options='--client_encoding="."utf8"."'");
					break;
			}
			if (!$this->db) {
				throw new Exception("Error: 1 en conexión a B.D.");
			}
		} catch (Exception $e) {
		    //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    $this->error1 = $e->getMessage();
		    return null;
		}
		return ($this->db);	// Retorna el Objeto obtenido tras la conexión
	}

	function consulta ($query) {	// Ejecuta la consulta o Query
		try {
//			$this->id_resultado = $this->db->query($query);
			$this->id_resultado = pg_query($this->db,$query);
			if (!$this->id_resultado) {
				throw new Exception("Error: 2 en Query");
			} else {
				return ($this->id_resultado);
			}
		} catch (Exception $e) {
		    $this->error1 = $e->getMessage();
		    return null;
		}
	} 

	function trae_fila ($index_type="A") {
		try {
			switch (strtoupper($index_type)) {
				case 'A':	// Indice asociativo para el array de datos
					$fila = @pg_fetch_array($this->id_resultado,null,PGSQL_ASSOC);
					break;
				case 'N':	// Indice numérico para el array de datos
					$fila = @pg_fetch_array($this->id_resultado,null,PGSQL_NUM);
					break;
				default:	// Indice asociativo para el array de datos
					$fila = @pg_fetch_array($this->id_resultado,null,PGSQL_ASSOC);
					break;
			}
			if (!$fila) {
				throw new Exception("Error: 3 al obtener datos");
			}
		} catch (Exception $e) {
		    $this->error1 = $e->getMessage();
		    return null;
		}
		return ($fila); // Retornamos los datos en el array $fila
	}

	function obtener_error() { 
		return($this->error1);
	}
	function obtener_db() {
		return($this->db);
	}
}	// Fin de la clase base

/**
* Subclase subbase
* Hereda de la clase padre: base
*/
class subase extends base
{
	
	function __construct($server=IPSERVER,$user=USERDB,$passwd=PASSWD,$based=DB,$port=PORTDB,$conection_type="N")	// Método constructor
	{
		# LLamamos al constructor de la clase padre: base
		parent::__construct($server,$user,$passwd,$based,$port,$conection_type);
	}
	function sub_fila($query,$index_type="A") {
		if (!empty($query)) {
			if ($this->consulta($query)) {
				return($this->trae_fila($index_type));
			} else {
				return(null);
			}
		} else {
			return(null);
		}
	}

	function sub_tuplas($query,$index_type="A") {
		if (!empty($query)) {
			if ($this->consulta($query)) {
				$tabla=array();
				while ($fila=$this->trae_fila($index_type)) {
					$tabla[]=$fila;
				}
				return($tabla);
			}
		}		
	}
}	// Fin subclase subbase

?>