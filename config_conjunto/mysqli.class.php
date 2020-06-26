<?php
/**
 * Archivo: mysqli.class.php
 * Clase: base
 */
class base
{
	private $db;
	private $id_resultado;
	private $error1;
	function __construct($server=IPSERVER,$user=USERDB,$pass=PASSWD,$basedatos=DB,$port=PORTDB,$connection_type="N")	# Constructor
	{
		$this->db = null;
		$this->id_resultado = null;
		$this->error1 = "";
		$this->conectar($server,$user,$pass,$basedatos,$port,$connection_type);
	} # Fin constructor
	function conectar($server=IPSERVER,$user=USERDB,$pass=PASSWD,$basedatos=DB,$port=PORTDB,$connection_type="N") {
		switch (strtoupper($connection_type)) {
			case 'N':	// Conexión no persistente
				$this->db = mysqli_connect($server,$user,$pass,$basedatos,$port);
				break;
			case 'P':	// Conexión persistente
				$this->db = mysqli_pconnect($server,$user,$pass,$basedatos,$port);
				break;
			default:
				$this->db = mysqli_connect($server,$user,$pass,$basedatos,$port);
				break;
		}
		if ($this->db) {
			$this->db->set_charset("utf8");
		}
		return($this->db);
	}
	function consulta($query) {
		return($this->id_resultado = $this->db->query($query));
	}
	function trae_fila($index_type="A") {
		switch ($index_type) {
			case 'A':	# Indice asociativo para el array de datos
				$fila = mysqli_fetch_array($this->id_resultado,MYSQLI_ASSOC);
				break;
			case 'N':	# Indice numérico para el array de datos
				$fila = mysqli_fetch_array($this->id_resultado,MYSQLI_NUM);
				break;
			default:	# Los dos tipos de indice, datos duplicados
				$fila = mysqli_fetch_array($this->id_resultado,MYSQLI_BOTH);
				break;
		}
		return($fila);	// Retornamos los datos
	}

	function obtener_db() {
		return($this->db);
	}
	
	function ultimo_id() {
		return($this->db->insert_id);
	}
} # Fin de la clase base

/**
 * Subclase: subase
 */
class subase extends base
{
	function __construct($server=IPSERVER,$user=USERDB,$pass=PASSWD,$basedatos=DB,$port=PORTDB,$connection_type="N")
	{
		# Llamamos al constructor de la clase padre: base
		parent::__construct($server,$user,$pass,$basedatos,$port,$connection_type);
	} # Fin del constructor

	function sub_fila($query, $index_type="A") {
		if (!empty($query)) {
			if ($this->consulta($query)) {
				return($this->trae_fila($index_type));
			} else {
				return null;
			}	
		}
	}
	function sub_tuplas($query, $index_type="A") {
		if (!empty($query)) {
			if ($this->consulta($query)) {
				$tabla=array();
				while ($fila=$this->trae_fila($index_type)) {
					$tabla[]=$fila;
				}
				return($tabla);
			} else {
				return null;
			}	
		}
	}
} # Fin de la subclase: subase
?>