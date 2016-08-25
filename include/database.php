<?php
class DataBase {

	private $mysqli;
	private $resource;
	private $sql;
	private $result;
	private $host = 'smmcr.net';
	private $user = 'UnicomerAdm';
	private $pass = 'Un1c0#m3r$8D2015';
	private $db_name = 'appgollo';
	public  $queries;
	private static $_singleton;
	public $error;
	public $affectedRows = 0;
	public $numRows = 0;
	public $lastid = 0;

	public static function getInstance(){
		if (is_null (self::$_singleton)) {
			self::$_singleton = new DataBase();
		}
		return self::$_singleton;
	}

	private function __construct(){
		$this->mysqli = new mysqli($this->host, $this->user, $this->pass,$this->db_name);
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		$this->mysqli->query("SET NAMES 'utf8'");
		$this->queries = 0;
		$this->resource = null;
	}

	public function execute(){
		if(!($this->resource = $this->mysqli->query($this->sql) )){
			$this->error = $this->mysqli->error;
			$this->affectedRows = 0;
			$this->numRows = 0;
			return false;
		}
		$this->queries++;
		//$this->lastid =
		$this->affectedRows = $this->mysqli->affected_rows;
		return $this->resource;
	}

	public function executeSP(){
		if ($this->mysqli->multi_query($this->sql)) {
			do {
				/* almacenar primer juego de resultados */
				if ($result = $this->mysqli->store_result()) {
					while ($row = $result->fetch_object()) {
						$this->result[] = $row;
					}
					$result->free();
				}
			} while ($this->mysqli->next_result());
		}
		return $this->result;
	}

	public function setQuery($sql){
		if(empty($sql)){
			return false;
		}
		$this->sql = $sql;
		return true;
	}

	public function loadObjectList(){
		if (!$this->execute()){
			return null;
		}
		$array = array();
		while ($row = $this->resource->fetch_object()){
			$array[] = $row;
		}
		$this->resource->close();
		return $array;
	}

	public function cantidad(){
		if (!$this->execute()){
			return null;
		}
	//	var_dump($this->resource->fetch_object());
		/*$array = array();
		while ($row = $this->resource->fetch_object()){
			$array[] = $row;
		}*/
		$cuenta=count($this->resource->fetch_object());
		$this->resource->close();
		return $cuenta;
	}

	public function loadObject(){
		if (!$this->execute()){
					return null;
		}
		$object = $this->resource->fetch_object();
		$this->resource->close();
		return $object;
	}
	
	public function freeResults(){
		$this->resource->close();
	}

	public function escape($param){
		return $this->mysqli->real_escape_string($param);
	}

	public function last_id(){
		return $this->mysqli->insert_id;
	}

	function __destruct(){
		$this->mysqli->close();
	}
}
?>