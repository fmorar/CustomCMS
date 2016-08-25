<?php
$ImgUrl = '';
$siteUrl = '';
class Api_model extends CI_Model{

 	function __construct(){
		$this->ImgUrl = 'http://'.$_SERVER['HTTP_HOST'].'/unicomer/img/';
		$this->siteUrl = 'http://'.$_SERVER['HTTP_HOST'].'/unicomer/';
	}

	function validarUsuario($postdata){
 	/****************************Change the pass every 60 days*****************************/
		$this->db->set('TempPass','1');
		$this->db->where('DATEDIFF(NOW(),ChangePassDate) >','60');
		$this->db->update('Usuario');
	/**************************CHECK USER************************************/
			$this->db->select("idTienda,idRol,idUsuario,TempPass, UsuarioActivo,HoraInicio,HoraFinal");
			$this->db->where("Usuario", $postdata->user);
			$this->db->where("Password = MD5('".$postdata->pass."')", NULL, FALSE);
			$query = $this->db->get('v_usuarios');
			if($result = $query->row()){
				date_default_timezone_set("America/Costa_Rica"); 
				if ( (time() <= strtotime($result->HoraInicio)) || (time() >= strtotime($result->HoraFinal))) return 'isOff';
				if ($result->UsuarioActivo == 1) return 'islogged';
			$this->db->set('FechaConexion', 'NOW()', false);
			$this->db->set('idUsuario', $result->idUsuario);
			$this->db->insert('Ingresousuarios');	
		/**************************ONLY ONE USER************************************/
				$this->db->set('LastActivity', 'NOW()', false);
				$this->db->set('UsuarioActivo', '1');
				$this->db->where('idUsuario', $result->idUsuario);
				$this->db->update('Usuario');	
				return $result;
				}else{
					return false;
				}

	}
	
	function actualizarUsuarioPass($user,$data){
		$this->db->set('ChangePassDate','NOW()',false);
		$this->db->set('Password', md5($data->password));
		$this->db->set('TempPass', 0);
		$this->db->set('usuarioActivo', 0);
		$this->db->where('idUsuario', $user->idUsuario);	
		$this->db->update('Usuario');	
		if ($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function destroyUserSession(){
			$this->db->set('usuarioActivo', 0);
			$this->db->where('usuarioActivo', 1);
			$this->db->where('TIMESTAMPDIFF(MINUTE,LastActivity,NOW()) > 15', NULL, FALSE);
			$this->db->update('Usuario');	
	}

	function logout($usuario){
			$this->db->set('usuarioActivo', 0);
			$this->db->where('usuarioActivo', 1);
			$this->db->where('idUsuario', $usuario->idUsuario);
			$this->db->update('Usuario');	
	}

	function actualizarActividadUsuario($usuario){
			$this->db->set('LastActivity', 'NOW()', false);
			$this->db->where('idUsuario', $usuario->idUsuario);
			$this->db->update('Usuario');	
	}


	function insertarPushToken($user,$data){
		$query = $this->db->get_where('clientespush', array('uuid' => $data->uuid ));
		$this->db->set('idUsuario', $user->idUsuario);
		$this->db->set('uuid', $data->uuid);
		$this->db->set('token', $data->pushtoken);
		$this->db->set('tipo', $data->type);
		if ($query->row()){
			$this->db->where(array('uuid' => $data->uuid ));	
			$this->db->update('clientespush');	
		}else{
			$this->db->insert('clientespush');
		}
	}
	function chkUsuarioValido($postdata){
		$this->db->select("idTienda,idRol,idUsuario");
		$this->db->where("idUsuario", $postdata->idUsuario);
		$this->db->where("idTienda", $postdata->idTienda);
		$this->db->where("idRol", $postdata->idRol);
		$query = $this->db->get('Usuario');
		return ($query->row()) ? $query->row() : false;
	}

	function comunicados($idTienda = 1){
		$this->db->select("*,CONCAT('".$this->ImgUrl.'comunicados/'."',Imagen) as Imagen, CONCAT('".$this->siteUrl.'archivos/comunicados/'."',Archivo) as Archivo");
		$tiendas = array(3,$idTienda);
		$this->db->where_in('idTienda', $tiendas);
		$this->db->where('idEstado', '1');
		$query = $this->db->get('v_comunicado');
		if ($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
	}

	function promociones($idTienda = 1){
 	/**************	Desactiva las vencidas *********************/
 		$this->db->set('idEstado','3');
 		$this->db->where('DATEDIFF(FechaFinal,NOW()) <','+1');
		$this->db->update('Promocion');
	/**************	Obtiene los datos *********************/
		$this->db->select("*,CONCAT('".$this->ImgUrl.'promociones/'."',Banner) as Banner");
		$tiendas = array(3,$idTienda);
		$this->db->where_in('idTienda', $tiendas);
		$this->db->where('idEstado', '1');
		$query = $this->db->get('Promocion');
			if ($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
		}
	}

	function menuPromociones(){
		$query = $this->db->get_where('v_menuPromo',array('idEstado' => 1));
			if ($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
		}
	}

	function activacion($idTienda = 1){
	/**************	Desactiva las vencidas *********************/
 		$this->db->set('idEstado','3');
		$this->db->where("DATEDIFF(NOW(),FechaFinal) >=",1);
		$this->db->update('Activacion');
	/**************	Obtiene los datos *********************/
		$this->db->select("*,CONCAT('".$this->ImgUrl.'activaciones/'."',Banner) as Banner, MONTH(fecha) as Mes, DAY(fecha) as Dia");
		$tiendas = array(3,$idTienda);
		$this->db->where_in('idTienda', $tiendas);
		$this->db->where('idEstado', '1');
		$query = $this->db->get('Activacion');
		if ($query->num_rows() > 0)
			{
				return $query->result();
			}else{
				return false;
			}
	}

	function notificaciones($idTienda = 1){
		$this->db->select("*,CONCAT('".$this->ImgUrl.'notificaciones/'."',Imagen) as Imagen");
		$tiendas = array(3,$idTienda);
		$this->db->where_in('idTienda', $tiendas);
		$this->db->where('idEstado', '1');
		$query = $this->db->get('Notificacion');
		if ($query->num_rows() > 0)
			{
				return $query->result();
			}else{
				return false;
			}
	}

	function banner($idTienda = 1){
		$this->db->select("*,CONCAT('".$this->ImgUrl.'banners/'."',Imagen) as Imagen");
		$tiendas = array(3,$idTienda);
		$this->db->where_in('idTienda', $tiendas);
		$this->db->where('idEstado', '1');
		$query = $this->db->get('v_banner');
		if ($query->num_rows() > 0)
			{
				return $query->result();
			}else{
				return false;
			}
	}

	function contacto(){
		$query = $this->db->get('Contacto',array('idEstado' => 1));
		if ($query->row())
			{
				return $query->row();
			}else{
				return false;
			}
	}

/****************************************************** Plan vendedores*****************************************************************/

	function incentivos($idTienda){
		$this->db->where("idTienda", $idTienda);
		$query = $this->db->get('v_incentivos');
		if ($query->num_rows() > 0)
			{
				return $query->result();
			}else{
				return false;
			}
	}

	function incentivosContenido(){
		$query = $this->db->get('v_ContenidoIncentivos');
		if ($query->num_rows() > 0)
			{
				return $query->result();
			}else{
				return false;
			}
	}

	function ventas($idUsuario){
		$this->db->where("idUsuario", $idUsuario);
		$query = $this->db->get('v_ventas');
		if ($query->num_rows() > 0)
			{
				return $query->result();
			}else{
				return false;
			}
	}


	function upload_img($image, $path){
        $config['upload_path'] = realpath($path);
        $config['remove_spaces'] = true;
        $config['encrypt_name'] = true;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';           
        //$config['max_size'] = '2000';           
        // $config['max_width']  = '2000';         
        // $config['max_height']  = '2000'; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);         
        if (!$this->upload->do_upload($image)){
			var_dump($this->upload->display_errors());
        	exit;
            return false;
        }else{
            $file = $this->upload->data();
            return $file['file_name'];
    	}
    }
}
?>