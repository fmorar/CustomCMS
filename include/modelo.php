<?php
ini_set('default_socket_timeout', 100000000);
class Model {

var $db;
var $query;

	function __construct() {
		$this->db = DataBase::getInstance();
	}

	function validarUsuario($postdata){
		$this->db->setQuery("SELECT * FROM Usuario WHERE Usuario = '".$this->db->escape($postdata->user)."' AND Password = MD5('".$postdata->pass."')");
		return ($this->db->loadObject()) ? $this->db->loadObject() : false;
	}

	function obtenerBanners($tienda){
		$tienda = $this->db->escape($tienda);
		if ($_GET['fecha']) {
			$this->db->setQuery("SELECT Titulo, CONCAT('http://smmcr.net/clientes/unicomer/img/banners/',Imagen) AS URL, idTienda FROM Banner WHERE FechaModificacion > date('".$_GET['fecha']."')");
		}else{
			$this->db->setQuery("SELECT Titulo, CONCAT('http://smmcr.net/clientes/unicomer/img/banners/',Imagen) AS URL, idTienda FROM Banner WHERE idTienda = '".$tienda."' ");
		}
			return $this->db->loadObjectlist();
	}

	function obtenerComunicados($postdata){
		$this->db->setQuery("SELECT * FROM v_comunicado WHERE idEstado = 1 AND idTienda = '".$postdata->idTienda."' ");
		return $this->db->loadObjectlist();
	}

	function obtenerPromociones($postdata){
		$this->db->setQuery("SELECT * FROM v_promociones WHERE idEstado = 1 AND idTienda = '".$postdata->idTienda."' ");
		return $this->db->loadObjectlist();
	}

	function obtenerNotificaciones($postdata){
		$this->db->setQuery("SELECT * FROM Notificacion WHERE idTienda = '".$postdata->idTienda."' ");
		return $this->db->loadObjectlist();
	}

	function obtenerActivaciones($postdata){
		$this->db->setQuery("SELECT * FROM Activacion WHERE idTienda = '".$postdata->idTienda."' ");
		return $this->db->loadObjectlist();
	}

	function obtenerUsuarios($postdata){
		$this->db->setQuery("SELECT * FROM Usuario WHERE Nombre = '".$postdata->Nombre."' ");
		return $this->db->loadObjectlist();
	}

}
?>