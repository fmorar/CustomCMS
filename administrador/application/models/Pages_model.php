<?php
class Pages_model extends CI_Model{
	var $ImgUrl;
	function __construct(){
		$this->ImgUrl = 'http://'.$_SERVER['HTTP_HOST'].'/unicomer/img/';
	}
	function editarUsuarios(){
		$datos = $this->input->post();
		$data = array(
			'Nombre' => $datos['nombre'],
			'Email' => $datos['email'],
			'Telefono' => $datos['telefono'],
			'Cedula' => $datos['cedula'],
			'Usuario' => $datos['usuario'],
			'Password' => MD5($datos['password']),
			'idRol' => $datos['rol'],
			'idTienda' => $datos['tienda'],
			'idEstado' => $datos['estado'],
			'idPdv' => $datos['pdv'],
		);
		$this->db->where('idUsuario', $datos['id']);
		$this->db->update('Usuario', $data);
	}

	function obtenerUsuariosByID($id){
		$query = $this->db->get_where('Usuario', array('idUsuario' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

 function obtenerUsuarios($per_page,$p){
 	/****************************Change the pass every 60 days*****************************/
     		$this->db->set('TempPass','1');
     		$this->db->set('ChangePassDate','NOW()',false);
     		$this->db->where('DATEDIFF(ChangePassDate,NOW()) <=','60');
			$this->db->update('Usuario');
 	/****************************Get Users*****************************/
			$this->db->where('idEstado !=', '4');
			$query = $this->db->get('v_usuarios',$per_page,$p);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else{
				return false;
			}
}

 function obtenerUsuariosForPdv(){
			$this->db->where('idEstado !=', '4');
			$query = $this->db->get('v_usuarios');
			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else{
				return false;
			}
}


 function reporteIngresos($fechaIni=false,$fechaFin=false){
		$this->db->select('*');
    	if($fechaIni && $fechaFin && !empty($fechaIni) && !empty($fechaFin))	$this->db->where('FechaConexion BETWEEN "'. date('Y-m-d', strtotime($fechaIni)). '" and "'. date('Y-m-d', strtotime($fechaFin)).'"');
		$query = $this->db->get('v_ingresoUsuarios');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
}

function ExportarReporteCSV($fechaIni=false,$fechaFin=false){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "reporteIngresosUnicomer.csv";
        if ('FechaConexion BETWEEN "'. date('Y-m-d', strtotime($fechaIni)). '" and "'. date('Y-m-d', strtotime($fechaFin)).'"') {
	        $query = 'SELECT Usuario, Nombre, Email, idRol, idTienda, Cedula, Telefono, idPdv, idEstado, FechaConexion, Total FROM v_ingresoUsuarios';
        }
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        $data = chr(239) . chr(187) . chr(191) .$data;
        force_download($filename, $data);
}

function cantidadUsuariosValidos(){
	$this->db->where('idEstado in(1,2)',null,false);
	return $this->db->get_where('Usuario')->num_rows();
}

function ExportarUsuariosCSV(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "usuariosUnicomer.csv";
        $query = 'SELECT Usuario, Nombre, Email, idRol, idTienda, Cedula, Telefono, idPdv, idEstado FROM Usuario';
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        $data = chr(239) . chr(187) . chr(191) .$data;
        force_download($filename, $data);
}


function obtenerRoles(){
	$query = $this->db->get('rol');
	if ($query->num_rows() > 0){
		return $query->result();
	}else{
		return false;
	}
}

function obtenerEstados(){
	$this->db->where('idEstado !=', '3');
	$this->db->where('idEstado !=', '4');
	$query = $this->db->get('Estado');
	if ($query->num_rows() > 0){
		return $query->result();
	}else{
		return false;
	}
}

function InsertarUsuario(){
	$datos = $this->input->post();
		$data = array(
				'Nombre' => $datos['nombre'],
				'Cedula' => $datos['cedula'],
				'Email' => $datos['email'],
				'Telefono' => $datos['telefono'],
				'Usuario' => $datos['usuario'],
				'Password' => MD5($datos['password']),
				'idRol' => $datos['rol'],
				'idTienda' => $datos['tienda'],
				'idPdv' => $datos['pdv'],
				'TempPass' => 1,
				'idEstado' => 1,
				);
		$this->db->set('ChangePassDate','NOW()',false);
		$this->db->set('FechaIngreso','NOW()',false);
		$this->db->insert('Usuario',$data);
}

function inactivarUsuario($id){
			$data = array(
				'idEstado' => 2
			);
			$this->db->where('idUsuario', $id);
			$this->db->update('Usuario', $data);
}

function borrarUsuario($id){
			$data = array(
				'idEstado' => 4
			);
			$this->db->where('idUsuario', $id);
			$this->db->update('Usuario', $data);
}

//***********************************importar Usuarios*********************************//


function importarUsuariosCSV($TempPass){
	$this->load->library('CSVReader');                            
	$archivo = $_FILES["importcsv"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);
	$destino =  "tmp/".$prefijo.".csv";
	$usrValidos = array();
	if (copy($_FILES['importcsv']['tmp_name'],$destino)){
	$csv = $this->csvreader->parse_file($destino);
		foreach($csv as $key => $colum){
			if ($key != 0 && count($colum) == 9){
				array_push($usrValidos,$colum[0]);
				$chkuser = $this->db->get_where('Usuario', array('Usuario' => utf8_decode($colum[0])));
				if(!$user = $chkuser->row()){
					$UserData = array(
							'Usuario' => utf8_decode($colum[0]),
							'Nombre' => utf8_decode($colum[1]),
							'Email' => $colum[2],
							'idRol' => $colum[3],
							'idTienda' => $colum[4],
							'Cedula' => $colum[5],
							'Telefono' => $colum[6],
							'idPdv' => $colum[7],
							'Password' => MD5($TempPass),
							'TempPass' => 1,
							'idEstado' => $colum[8]
							);
					$this->db->set('FechaIngreso','NOW()',false);
					$this->db->set('ChangePassDate','NOW()',false);
					$this->db->insert('Usuario', $UserData);
				}else{
					$UserData = array(
							'Email' => $colum[2],
							'idRol' => $colum[3],
							'idTienda' => $colum[4],
							'Telefono' => $colum[6],
							'idPdv' => $colum[7],
							'idEstado' => $colum[8]			
					);
					$this->db->where('idUsuario', $user->idUsuario);
					$this->db->update('Usuario', $UserData);
				}
			}
		}

		if ($usrValidos){
			$this->db->where_not_in('Usuario', $usrValidos);
			$this->db->set('idEstado',4);
			$this->db->set('FechaBaja','NOW()', false);
			$this->db->update('Usuario');
		}
	}
}

//***********************************Comunicados*********************************//

	// function obtenerComunicadoByTienda(){
	// $this->db->where('idEstado !=', '4');
	// $query = $this->db->get('v_comunicado');
	// if ($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	}else{
	// 		return false;
	// 	}
	// }

	function obtenerComunicadoByEstado($Estado=false){
		$this->db->select('Titulo,FechaPublicacion,Tienda,Estado,idMedio,Imagen,NombreComunicado,idComunicado');
		if($Estado && !empty($Estado) && $Estado != '0') $this->db->where('idEstado',$Estado);
		$this->db->where('idEstado !=', '4');
		$query = $this->db->get('v_comunicado');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

    function obtenerComunicadoByID($id){
		$query = $this->db->get_where('Comunicado', array('idComunicado' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function insertarComunicado() {
 		$datos = $this->input->post();
        $Comunicado = array(
				'Titulo' => $datos['titulo'],
				'idMedio' => $datos['medio'],
				'idTienda' => $datos['tienda'],
				'idTipoMultimedia' => $datos['multimedia'],
				'Detalle' => $datos['detalle'],
				'Enlace' => $datos['enlace'],
				'FechaPublicacion' => date('Y-m-d',strtotime($datos['fecha'])),
				'idEstado' => 1
				);
        $this->db->insert('Comunicado', $Comunicado);
        $idComunicado = $this->db->insert_id();    
        if (isset ($_FILES['imagen']) ){
            $file = $this->upload_file('imagen','../img/comunicados/');
            if ( $file ) {
                $data = array(
                   'Imagen' => $file
                );
                $this->db->where('idComunicado', $idComunicado);
                $this->db->update('Comunicado', $data);
            }
        }if (isset ($_FILES['archivo']) ){
        	$archivo = $this->upload_archivo('archivo','../archivos/comunicados/');
        	if ( $archivo ) {
                $data = array(
                   'Archivo' => $archivo
                );
                $this->db->where('idComunicado', $idComunicado);
                $this->db->update('Comunicado', $data);
            }
        }
    }

    function editarComunicado(){
		$datos = $this->input->post();
		$data = array(
		'Titulo' => $datos['titulo'],
		'idMedio' => $datos['medio'],
		'idTienda' => $datos['tienda'],
		'idTipoMultimedia' => $datos['multimedia'],
		'Detalle' => $datos['detalle'],
		'Enlace' => $datos['enlace'],
		'FechaPublicacion' => date('Y-m-d',strtotime($datos['fecha'])),
		'idEstado' => $datos['estado']
		);
		$this->db->where('idComunicado', $datos['id']);
		$this->db->update('Comunicado', $data);
		if (isset ($_FILES['imagen']) ){
            $imagen = $this->upload_img('imagen','../img/comunicados/');
            if ( $imagen ) {
                $data = array(
                   'Imagen' => $imagen
                );
                $this->db->where('idComunicado', $datos['id']);
                $this->db->update('Comunicado', $data);
            }
        }if (isset ($_FILES['archivo']) ){
        	$archivo = $this->upload_archivo('archivo','../archivos/comunicados/');
        	if ( $archivo ) {
                $data = array(
                   'Archivo' => $archivo
                );
                $this->db->where('idComunicado', $datos['id']);
                $this->db->update('Comunicado', $data);
            }
        }
	}
		
	function inactivarComunicado($id){
		$data = array(
			'idEstado' => 2
		);
		$this->db->where('idComunicado', $id);
		$this->db->update('Comunicado', $data);
	}

	function borrarComunicado($id){
		$data = array(
			'idEstado' => 4
		);
		$this->db->where('idComunicado', $id);
		$this->db->update('Comunicado', $data);
	}

	function obtenerMedio(){
		$this->db->where('idEstado !=', '2');
		$query = $this->db->get('v_medio');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	   }

	function obtenerTienda(){
	$query = $this->db->get('Tienda');
	if ($query->num_rows() > 0){
		return $query->result();
	}else{
		return false;
	}
    }

	function upload_img($image, $path){
        $config['upload_path'] = realpath($path);
        $config['remove_spaces'] = true;
        $config['encrypt_name'] = true;
        $config['allowed_types'] = 'gif|jpg|png';           
        $config['max_size'] = '2000';           
        $config['max_width']  = '2000';         
        $config['max_height']  = '2000'; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);         
        if (!$this->upload->do_upload($image)){           
            $this->session->set_flashdata('error', 'No se pudo subir el archivo: No cumple con los requisitos.');
			return false;
        }else{
            $file = $this->upload->data();
            return $file['file_name'];
    	}
	}

	function upload_archivo($archivo, $path){
        $config['upload_path'] = realpath($path);
        $config['remove_spaces'] = true;
        $config['encrypt_name'] = true;
        $config['allowed_types'] = 'pdf|ppt|pptx|doc';           
        $config['max_size'] = '10000';  
        $this->load->library('upload', $config);
        $this->upload->initialize($config);         
        if (!$this->upload->do_upload($archivo)){           
            $this->session->set_flashdata('error', 'No se pudo subir el archivo: No cumple con los requisitos.');
	            return false;
        }else{
            $file = $this->upload->data();
            return $file['file_name'];
    	}
    }

//**********************************************Activaciones****************************************//

  //    function obtenerActivacion(){
  //    		$this->db->set('idEstado','3');
  //    		$this->db->where('DATEDIFF(FechaFinal,NOW()) <=','+1');
		// 	$this->db->update('Activacion');

		// 	$this->db->where('idEstado <=', '2');
		// 	$query = $this->db->get('v_activaciones');
		// 	if ($query->num_rows() > 0)
		// 	{
		// 		return $query->result();
		// 	}
		// 	else{
		// 		return false;
		// 	}
		// }


	function obtenerActivacionByEstado($Estado=false){
     	/**************	Desactiva las vencidas *********************/
		$this->db->set('idEstado','3');
		$this->db->where('DATEDIFF(FechaFinal,NOW()) <=','0');
		$this->db->update('Activacion');
		/**************	Obtiene los datos *********************/	
		$this->db->select('Titulo, Descripcion, Fecha,Tienda,Nombre,Estado, idTienda,FechaIngreso, idActivacion, Banner');
		if($Estado && !empty($Estado) && $Estado != '0') $this->db->where('idEstado',$Estado);
		$query = $this->db->get('v_activaciones');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

    function obtenerActivacionByID($id){
		$query = $this->db->get_where('Activacion', array('idActivacion' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function insertarActivacion() {
 		$datos = $this->input->post();
        $Activacion = array(
				'Titulo' => $datos['titulo'],
				'Descripcion' => $datos['descripcion'],
				'Fecha' => date('Y-m-d',strtotime($datos['fechainicio'])),
				'FechaFinal' => date('Y-m-d',strtotime($datos['fechafinal'])),
				'idTienda' => $datos['tienda'],
				'idMedio' => $datos['medio'],
				'idEstado' => 1
				);
        $this->db->insert('Activacion', $Activacion);
        $this->db->set('FechaIngreso','NOW()',false);        
        $idActivacion = $this->db->insert_id();    
        if (isset ($_FILES['imagen']) ){
            $imagen = $this->upload_img('imagen','../img/activaciones/');
            if ( $imagen ) {
                $data = array(
                   'Banner' => $imagen
                );
                $this->db->where('idActivacion', $idActivacion);
                $this->db->update('Activacion', $data);
            }
        }
    }

    function editarActivacion(){
		$datos = $this->input->post();
		$data = array(
		'Titulo' => $datos['titulo'],
		'Descripcion' => $datos['descripcion'],
		'Fecha' => date('Y-m-d',strtotime($datos['fechainicio'])),
		'FechaFinal' => date('Y-m-d',strtotime($datos['fechafinal'])),
		'idTienda' => $datos['tienda'],
		'idEstado' => $datos['estado']
		);
		$this->db->where('idActivacion', $datos['id']);
		$this->db->update('Activacion', $data);
		if (isset ($_FILES['imagen']) ){
            $imagen = $this->upload_img('imagen','../img/activaciones/');
            if ( $imagen ) {
                $data = array(
                   'Banner' => $imagen
                );
                $this->db->where('idActivacion', $datos['id']);
                $this->db->update('Activacion', $data);
            }
        }
	}
		
	function inactivarActivacion($id){
		$data = array(
			'idEstado' => 2
		);
		$this->db->where('idActivacion', $id);
		$this->db->update('Activacion', $data);
	}

	function borrarActivacion($id){
		$data = array(
			'idEstado' => 4
		);
		$this->db->where('idActivacion', $id);
		$this->db->update('Activacion', $data);
	}


//**********************************************Promociones****************************************/

 //     function obtenerPromocion($per_page,$p){

 //     		$this->db->set('idEstado','3');
 //     		$this->db->where('DATEDIFF(FechaFinal,NOW()) <','NOW()');
	// 		$this->db->update('Promocion');

	// 		$this->db->where('idEstado !=', '3');
	// 		$this->db->where('idEstado !=', '4');
	// 		$query = $this->db->get('v_promociones',$per_page,$p);
	// 		if ($query->num_rows() > 0)
	// 		{
	// 			return $query->result();
	// 		}   
	// 		else{
	// 			return false;
	// 		}
	// }

	function filtrarPromocionesbyEstado($Estado=false,$Categoria=false){
	/**************	Desactiva las vencidas *********************/
	$this->db->set('idEstado','3');
	$this->db->where('DATEDIFF(FechaFinal,NOW()) <','0');
	$this->db->update('Promocion');
	/**************	Obtiene las promociones *********************/	
     $this->db->select('idPromocion,idEstado,Titulo,Descripcion,Codigo,Precio,Ahora,Tienda,Estado,FechaIngreso,Banner,Categoria');
     if($Estado && !empty($Estado) && $Estado != '0') $this->db->where('idEstado',$Estado);
     if($Categoria && !empty($Categoria) && $Categoria != '0') $this->db->where('idCategoria',$Categoria);
	 $query = $this->db->get('v_promociones');
	 if ($query->num_rows() > 0){
	  return $query->result();
	 }else{
	  return false;
	 }
	}

    function obtenerPromocionByID($id){
		$query = $this->db->get_where('Promocion', array('idPromocion' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function insertarPromocion() {
 		$datos = $this->input->post();
        $Promocion = array(
				'Titulo' => $datos['titulo'],
				'Descripcion' => $datos['descripcion'],
				'Regalia' => $datos['regalia'],
				'Precio' => $datos['precio'],
				'Ahora' => $datos['ahora'],
				'Marca' => $datos['marca'],
				'Codigo' => $datos['codigo'],
				'idTienda' => $datos['tienda'],
				'idTipo' => $datos['tipo'],
				'FechaInicio' => date('Y-m-d',strtotime($datos['fechainicio'])),
				'FechaFinal' => date('Y-m-d',strtotime($datos['fechafinal'])),
				'FechaIngreso' => date('Y-m-d',strtotime($datos['fecha'])),
				'idEstado' => 1
				);

        $this->db->insert('Promocion', $Promocion);
        $idPromocion = $this->db->insert_id();    
        if (isset ($_FILES['imagen']) ){
            $imagen = $this->upload_img('imagen','../img/promociones/');
            if ( $imagen ) {
                $data = array(
                   'Banner' => $imagen
                );
                $this->db->where('idPromocion', $idPromocion);
                $this->db->update('Promocion', $data);
            }
        }
    }

function importarPromocionesCSV(){

	$this->load->library('CSVReader');                            
	$archivo = $_FILES["importcsv"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);
	$destino =  "tmp/".$prefijo.".csv";
	$destinoImg =  "tmp/".$prefijo."_img.zip";

	if (copy($_FILES['importcsv']['tmp_name'],$destino)){
	$csv = $this->csvreader->parse_file($destino);
		foreach($csv as $key => $colum){
			if ($key != 0){
				$FechaInicio = DateTime::createFromFormat('j/m/Y', $colum[8]);
				$FechaFinal = DateTime::createFromFormat('j/m/Y', $colum[9]);
				$Promocion = array(
						'Titulo' => utf8_decode($colum[0]),
						'Descripcion' => utf8_decode($colum[1]),
						'Regalia' => utf8_decode($colum[2]),
						'Precio' => $colum[3],
						'Ahora' => $colum[4],
						'Marca' => utf8_decode($colum[5]),
						'idTienda' => $colum[6],
						'idTipo' => $colum[7],
						'FechaInicio' => $FechaInicio->format('Y-m-d'),
						'FechaFinal' => $FechaFinal->format('Y-m-d'),
						'Codigo' => $colum[10],
						'Banner' => $colum[11],
						'idEstado' => 1
						);
				$this->db->set('FechaIngreso','NOW()',false);
				$this->db->insert('Promocion', $Promocion);
			}
		}
	}
	if (copy($_FILES['importImg']['tmp_name'],$destinoImg)){
		return ($this->unzip($destinoImg,'../img/promociones/')) ? true : false;
	}
}

    function unzip($fileName,$outputPath){
    	$zip = new ZipArchive;
		if ($zip->open($fileName) === TRUE) {
		    $zip->extractTo($outputPath);
		    $zip->close();
		    return true;
		} else {
		    return false;
		}
    }

    function editarPromocion(){
		$datos = $this->input->post();
		$data = array(
		'Titulo' => $datos['titulo'],
		'Codigo' => $datos['codigo'],
		'Precio' => $datos['precio'],
		'Ahora' => $datos['ahora'],
		'Marca' => $datos['marca'],
		'Descripcion' => $datos['descripcion'],
		'Regalia' => $datos['regalia'],
		'FechaInicio' => date('Y-m-d',strtotime($datos['fechainicio'])),
		'FechaFinal' => date('Y-m-d',strtotime($datos['fechafinal'])),
		'FechaIngreso' => date('Y-m-d',strtotime($datos['fecha'])),
		'idTipo' => $datos['tipo'],
		'idTienda' => $datos['tienda']
		);
		$this->db->where('idPromocion', $datos['id']);
		$this->db->update('Promocion', $data);
		if (isset ($_FILES['imagen']) ){
            $imagen = $this->upload_img('imagen','../img/promociones/');
            if ( $imagen ) {
                $data = array(
                   'Banner' => $imagen
                );
                $this->db->where('idPromocion', $datos['id']);
                $this->db->update('Promocion', $data);
            }
        }
	}
		
	function inactivarPromocion($id){
		$data = array(
			'idEstado' => 2
		);
		$this->db->where('idPromocion', $id);
		$this->db->update('Promocion', $data);
	}

	function borrarPromocion($id){
		$data = array(
			'idEstado' => 4
		);
		$this->db->where('idPromocion', $id);
		$this->db->update('Promocion', $data);
	}

	function obtenerTipo(){
	$this->db->where('idEstado !=', '2');
	$query = $this->db->get('Tipo');
	if ($query->num_rows() > 0){
		return $query->result();
	}else{
		return false;
	}
   }

	//**********************************************Notificaciones****************************************//
 //     function obtenerNotificacionByTienda(){
	//     $query = $this->db->get_where('v_notificaciones');
	// if ($query->num_rows() > 0)
	// 	{
	// 		return $query->result();
	// 	}else{
	// 		return false;
	// 	}
	// 	}


   	function obtenerNotificacionByEstado($Estado=false){	
		$this->db->select('Titulo, Detalle, idTienda,Tienda,Estado,FechaEnvio, idNotificacion, Imagen');
		if($Estado && !empty($Estado) && $Estado != '0') $this->db->where('idEstado',$Estado);
		$query = $this->db->get('v_notificaciones');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

    function obtenerNotificacionByID($id){
		$query = $this->db->get_where('Notificacion', array('idNotificacion' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function insertarNotificacion() {
 		$datos = $this->input->post();
        $Notificacion = array(
				'Titulo' => $datos['titulo'],
				'Detalle' => $datos['detalle'],
				'idTienda' => $datos['tienda'],
				'idEstado' => 1
				);
		$this->db->set('FechaEnvio','NOW()',false);
        $this->db->insert('Notificacion', $Notificacion);
        $idNotificacion = $this->db->insert_id();    
        if (isset ($_FILES['imagen']) ){
            $imagen = $this->upload_img('imagen','../img/notificaciones/');
            if ( $imagen ) {
                $data = array(
                   'Imagen' => $imagen
                );
                $this->db->where('idNotificacion', $idNotificacion);
                $this->db->update('Notificacion', $data);
            }
        }
        return array('idNotificacion' => $idNotificacion, 'banner' => $this->ImgUrl.'notificaciones/'.$imagen);
    }


    function editarNotificacion(){
		$datos = $this->input->post();
		$data = array(
		'Titulo' => $datos['titulo'],
		'Detalle' => $datos['detalle'],
		'FechaEnvio' => date('Y-m-d',strtotime($datos['fecha'])),
		'idEstado' => $datos['estado'],
		'idTienda' => $datos['tienda']
		);
		$this->db->where('idNotificacion', $datos['id']);
		$this->db->update('Notificacion', $data);
		if (isset ($_FILES['imagen']) ){
            $imagen = $this->upload_img('imagen','../img/notificaciones/');
            if ( $imagen ) {
                $data = array(
                   'Imagen' => $imagen
                );
                $this->db->where('idNotificacion', $datos['id']);
                $this->db->update('Notificacion', $data);
            }
        }
	}
		
	function inactivarNotificacion($id){
		$data = array(
			'idEstado' => 2
		);
		$this->db->where('idNotificacion', $id);
		$this->db->update('Notificacion', $data);
	}

	function borrarNotificacion($id){
		$data = array(
			'idEstado' => 4
		);
		$this->db->where('idNotificacion', $id);
		$this->db->update('Notificacion', $data);
	}


//***************************************************FIltros***************************************//

		function obtenerUsuariosFiltro($por_pagina,$offset,$data){
			switch ($data['tipoBusqueda']) {
				case 'cedula':
					$this->db->like('Cedula',$data['filtro_usuario']);
					break;
				case 'pdv':
					$this->db->like('PDV',$data['filtro_usuario']);
					break;
				case 'nombre':
					$this->db->like('Nombre',$data['filtro_usuario']);
					break;
			}
			$query = $this->db->get("v_usuarios",$por_pagina,$offset);
			if ($cantResult = $query->num_rows() > 0)
			{
				$resultT=array('cantResult' => $cantResult, 'restultado' => $query->result() );
				return $resultT;
			}
			else{
				return false;
			}
		}

	function obtenerPromocionFiltro($por_pagina,$offset,$data){

			if(isset($data['idTipo'])){
				$this->db->like('idTipo',$data['idTipo']);				
			}else{
				return false;
			}			
			$query = $this->db->get("v_promociones",$por_pagina,$offset);
			if(isset($data['idTipo'])){
				$this->db->like('idTipo',$data['idTipo']);				
			}else{
				return false;
			}	
			$query2 = $this->db->get("v_promociones");
		    $resutadoFiltro = $query2->num_rows();
			if ($resutadoFiltro > 0)
			{
				$resultT=array('cantResult' => $resutadoFiltro, 'restultado' => $query->result() );
				return $resultT;
			}
			else{
				return false;
			}
		}

//***************************************************TipoPromociones***************************************//

	function editarTipoPromo(){
		$datos = $this->input->post();
		$data = array(
			'Nombre' => $datos['nombre'],
			'idEstado' => $datos['estado'],
		);
		$this->db->where('idTipo', $datos['id']);
		$this->db->update('Tipo', $data);
	}

	function obtenerTipoPromoByID($id){
		$query = $this->db->get_where('Tipo', array('idTipo' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	function obtenerTipoPromo(){
		$this->db->where('idEstado !=', '4');
		$query = $this->db->get('v_menuPromo');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	   }

	function InsertarTipoPromo(){
		$datos = $this->input->post();
			$data = array(
					'Nombre' => $datos['nombre'],
					'idEstado' => 1,
					);
			$this->db->insert('Tipo',$data);
	}

	function inactivarTipoPromo($id){
				$data = array(
					'idEstado' => 2
				);
				$this->db->where('idTipo', $id);
				$this->db->update('Tipo', $data);
	}

	function borrarTipoPromo($id){
				$data = array(
					'idEstado' => 4
				);
				$this->db->where('idTipo', $id);
				$this->db->update('Tipo', $data);
	}

//***************************************************Rewards***************************************//

	function editarRewards(){
		$datos = $this->input->post();
		$data = array(
			'Premio' => $datos['premio'],
			'Puntos' => $datos['puntos'],
			'idTienda' => $datos['tienda'],
			'Descripcion' => $datos['descripcion']
		);
		$this->db->where('idRewards', $datos['id']);
		$this->db->update('Rewards', $data);
		if (isset ($_FILES['imagen']) ){
	            $imagen = $this->upload_img('imagen','../img/rewards/');
	            if ( $imagen ) {
	                $data = array(
	                   'Imagen' => $imagen
	                );
	                $this->db->where('idRewards', $datos['id']);
	                $this->db->update('Rewards', $data);
	            }
	        }
		}

	function obtenerRewardsByID($id){
		$query = $this->db->get_where('Rewards', array('idRewards' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


	function obtenerRewards(){
		$query = $this->db->get('v_rewards');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	   }


	function InsertarRewards() {
	 		$datos = $this->input->post();
	        $Rewards = array(
					'Premio' => $datos['premio'],
					'Puntos' => $datos['puntos'],
					'Descripcion' => $datos['descripcion'],
					'idTienda' => $datos['tienda'],
					'idEstado' => 1
					);
	        $this->db->insert('Rewards', $Rewards);
	        $idRewards = $this->db->insert_id();    
	        if (isset ($_FILES['imagen']) ){
	             $imagen = $this->upload_img('imagen','../img/rewards/');
	            if ( $imagen ) {
	                $data = array(
	                   'Imagen' => $imagen
	                );
	                $this->db->where('idRewards', $idRewards);
	                $this->db->update('Rewards', $data);
	            }
	        }
	    }

	function eliminarRewards($id){
				$data = array(
					'idEstado' => 2
				);
				$this->db->where('idRewards', $id);
				$this->db->update('Rewards', $data);
			}

	//***************************************************Reglamento***************************************//

	function obtenerReglamento(){
		$query = $this->db->get_where('Reglamento');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function obtenerReglamentoByID($id){
		$query = $this->db->get_where('Reglamento', array('idReglamento' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function editarReglamento(){
		$datos = $this->input->post();
		$data = array(
			'reglamento' => $datos['reglamento']
		);
		$this->db->where('idReglamento', $datos['id']);
		$this->db->update('Reglamento', $data);
	}

	function InsertarReglamento(){
		$datos = $this->input->post();
			$data = array(
				'reglamento' => $datos['reglamento']
					);
			$this->db->insert('Reglamento',$data);
	}

//***************************************************Medios***************************************//

	function editarMedio(){
		$datos = $this->input->post();
		$data = array(
			'Nombre' => $datos['nombre'],
			'idEstado' => $datos['estado']
		);
		$this->db->where('idMedio', $datos['id']);
		$this->db->update('Medio', $data);
	}

	function obtenerMedioByID($id){
		$query = $this->db->get_where('v_medio', array('idMedio' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function obtenerMedio1(){
		$this->db->where('idEstado !=', '4');
		$query = $this->db->get('v_medio');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	   }

	function InsertarMedio(){
		$datos = $this->input->post();
			$data = array(
					'Nombre' => $datos['nombre'],
					'idEstado' => 1,
					);
			$this->db->insert('Medio',$data);
	}

	function inactivarMedio($id){
				$data = array(
					'idEstado' => 2
				);
				$this->db->where('idMedio', $id);
				$this->db->update('Medio', $data);
	}

	function borrarMedio($id){
				$data = array(
					'idEstado' => 4
				);
				$this->db->where('idMedio', $id);
				$this->db->update('Medio', $data);
	}

	//***************************************************Incentivos/Codigos***************************************//

	function obtenerIncentivos(){
		$this->db->select('*');
		$query = $this->db->get('v_incentivos');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function obtenerRedenciones(){
		$this->db->select('*');
		$query = $this->db->get('TipoRedencion');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function obtenerPdvIncentivos($id){
		$this->db->select('*');
		$query = $this->db->get_where('v_pdvIncentivos', array('idPromo' => $id));
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}	

	function obtenerIncentivosByID($id){
		$query = $this->db->get_where('v_incentivos', array('idPromo' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function editarIncentivos(){
		$datos = $this->input->post();
		$data = array(
            'NombreIncentivo' => $datos['NombreIncentivo'],
            'Descripcion' => $datos['Descripcion'],
            'FechaInicio' => $datos['FechaInicio'],
            'FechaFinal' => $datos['FechaFinal'],
            'idProvedor' => $datos['Provedor'],
            'FechaRend' => $datos['FechaRend'],
            'idEstado' => $datos['estado'],
            'idTienda' => $datos['Tienda'],
            'idTipoRedencion' => $datos['idTipoRedencion'],
            'Fechainclusion' => $datos['Fechainclusion'],
            'Fechainclusion' => $datos['Fechainclusion'],
            'Reglamento' => $datos['reglamento'],

		);

		$this->db->where('idPromo', $datos['id']);
		$this->db->update('Incentivos', $data);
		//insert pdvs
			$id = $this->db->insert_id();

			if ($datos["pdvs"] != Undefined){
			    for($i=0; $i<count($datos["pdvs"]); $i++){
			    $pdvs=$datos["pdvs"][$i];
			      $data = array(
				       'idPdv' => ($pdvs),
				       'idPromo' => $id
				   );
			    $this->db->insert('PdvIncentivos', $data);
			    } 
			}      
		    //return $this->db->insert_id();
		    return $id;
	}

	function agregarIncentivos(){
		$datos = $this->input->post();
			$data = array(
            'NombreIncentivo' => $datos['NombreIncentivo'],
            'Descripcion' => $datos['Descripcion'],
            'FechaInicio' => $datos['FechaInicio'],
            'FechaFinal' => $datos['FechaFinal'],
            'idProvedor' => $datos['Provedor'],
            'FechaRend' => $datos['FechaRend'],
            'idTienda' => $datos['Tienda'],
            'idTipoRedencion' => $datos['idTipoRedencion'],
            'Fechainclusion' => $datos['Fechainclusion'],
            'Fechainclusion' => $datos['Fechainclusion'],
            'Reglamento' => $datos['reglamento'],
			'idEstado' => 1,
			);
			$this->db->insert('Incentivos',$data);
			//insert pdvs

			$id = $this->db->insert_id();
			if ($datos["pdvs"]){
			    for($i=0; $i<count($datos["pdvs"]); $i++){
			    $pdvs=$datos["pdvs"][$i];
			      $data = array(
				       'idPdv' => ($pdvs),
				       'idPromo' => $id
				   );
			    $this->db->insert('PdvIncentivos', $data);
			    } 
			}
		    //return $this->db->insert_id();
		    return $id;
	}

	function alternarEstadoIncentivos($idEstado,$estado){
	   $idEstado = ($estado == 1)? 2:1;
	   $data = array(
	                   'idEstado' => $idEstado
	   );
	   $this->db->where('idEstado', $idEstado);
	   $this->db->update('Incentivos', $data);
    }

//***************************************************contenidoIncentivos***************************************//
	function obtenercontenidoIncentivos($id){
		$this->db->select('*');
		$query = $this->db->get_where('v_ContenidoIncentivos', array('idPromo' => $id));
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function obtenerTipoPremio(){
		$this->db->select('*');
		$query = $this->db->get('TipoPremio');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function agregarContenidoIncentivos(){
		$datos = $this->input->post();
			$data = array(
            'SKU' => $datos['SKU'],
            'Articulo' => $datos['Articulo'],
            'Marca' => $datos['Marca'],
            'Modelo' => $datos['Modelo'],
            'Medida' => $datos['Medida'],
            'CuotaMinima' => $datos['CuotaMinima'],
            'idTipoPremio' => $datos['TipoPremio'],
            'Premio'=> $datos['Premio'],
            'DescArticulo'=> $datos['DescArticulo'],
            'idPromo' => $datos['idPromo'],
			'idEstado' => 1
			);
			$this->db->insert('ContenidoIncentivos',$data);
			return $datos['idPromo'];
	}

//***********************************************PDV****************************************//

	function obtenerPDV($idTienda = false){
		$this->db->select('*');
		if ($idTienda && ($idTienda != 3) ){
			$this->db->where('idTienda', $idTienda);
		}
		$query = $this->db->get('v_PDV');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function agregarPdv(){
		$datos = $this->input->post();
			$data = array(
					'NombrePdv' => $datos['pdv'],
					'idTienda' => $datos['tienda'],
					'idUsuario' => $datos['usuario'],
					'idEstado' => 1,
			);
			$this->db->insert('PDV',$data);
	}

	function obtenerPdvByID($id){
		$query = $this->db->get_where('PDV', array('idPdv' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function editarPdv(){
		$datos = $this->input->post();
		$data = array(
			'NombrePdv' => $datos['pdv'],
			'idTienda' => $datos['tienda'],
            'idEstado' => $datos['estado'],
			'idUsuario' => $datos['usuario'],
		);
		$this->db->where('idPdv', $datos['id']);
		$this->db->update('PDV', $data);
	}

//***********************************************Provedores****************************************//

	function obtenerProvedores(){
		$this->db->select('*');
		$query = $this->db->get('v_provedores');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function editarProvedores(){
		$datos = $this->input->post();
		$data = array(
            'Nombre' => $datos['Nombre'],
            'Telefono' => $datos['Telefono'],
            'Correo' => $datos['Correo'],
            'idEstado' => $datos['estado']
		);
		$this->db->where('idProvedor', $datos['id']);
		$this->db->update('Provedores', $data);
	}

	function obtenerProvedoresByID($id){
		$query = $this->db->get_where('Provedores', array('idProvedor' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function agregarProvedores(){
		$datos = $this->input->post();
			$data = array(
					'Nombre' => $datos['Nombre'],
					'Telefono' => $datos['Telefono'],
					'Correo' => $datos['Correo'],
					'idEstado' => 1,
			);
			$this->db->insert('Provedores',$data);
	}


//***************************************************Ventas***************************************//
	function obtenerVentas(){
		$this->db->select('*');
		$query = $this->db->get('v_ventas');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function obtenerDetalleVentasByID($id){
		$this->db->select('*');
		$query = $this->db->get_where('v_detalleVenta', array('idVenta' => $id));
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

//**************************************************************Banners******************************************************//
function InsertarBanner() {
        $datos = $this->input->post();  
        $banner = array(
            'Titulo'=> $datos['titulo'],
            'idTienda' => $datos['tienda'],
            'idTipoBanner' => $datos['tipo'],
            'idContenido' => $datos['idContenido'],
            'EnlaceExterno' => $datos['enlaceExterno'],
            'idEstado'=> 1
            );
        $this->db->set('FechaCreacion','NOW()',false);
        $this->db->insert('Banner', $banner);
        $idBanner = $this->db->insert_id();    
        if (isset ($_FILES['imagen']) ){
            $imagen = $this->upload_img('imagen','../img/banners/');
            if ( $imagen ) {
                $data = array(
                   'Imagen' => $imagen
                );
                $this->db->where('idBanner', $idBanner);
                $this->db->update('Banner', $data);
            }
        }
    }

	function obtenerBannersByEstado($Estado=false){
		$this->db->select('Titulo, idTienda, Tienda, idTipoBanner, Estado, Imagen, idBanner, idContenido');
		if($Estado && !empty($Estado) && $Estado != '0') $this->db->where('idEstado',$Estado);
		$this->db->order_by('FechaCreacion','DESC');
		$this->db->where('idEstado !=', '4');;
		$query = $this->db->get('v_banner');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

    function obtenerBannerByID($id){
		$query = $this->db->get_where('Banner', array('idBanner' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function editarBanner(){
		$datos = $this->input->post();
		$data = array(
			'Titulo' => $datos['titulo'],
			'idTienda' => $datos['tienda'],
            'idTipoBanner' => $datos['tipo'],
            'idContenido' => $datos['idContenido'],
            'EnlaceExterno' => $datos['enlaceExterno'],
			'idEstado' => $datos['estado']
		);
		$this->db->where('idBanner', $datos['id']);
		$this->db->update('Banner', $data);
		if (isset ($_FILES['imagen']) ){
            $imagen = $this->upload_img('imagen','../img/banners/');
            if ( $imagen ) {
                $data = array(
                   'Imagen' => $imagen
                );
                $this->db->where('idBanner', $datos['id']);
                $this->db->update('Banner', $data);
            }
        }
	}	

	function obtenerTipoMultimedia(){
	$query = $this->db->get('TipoMultimedia');
	if ($query->num_rows() > 0){
		return $query->result();
	}else{
		return false;
	}
    }

    function upload_file($file, $path){
        $config['upload_path'] = realpath($path);
        $config['remove_spaces'] = true;
        $config['encrypt_name'] = true;
        $config['allowed_types'] = 'mp3|wav|aif|aiff|ogg|gif|jpg|png';           
        $config['max_size'] = '10000';  

        $this->load->library('upload', $config);
        $this->upload->initialize($config);         
        if (!$this->upload->do_upload($file)){           
            $this->session->set_flashdata('error', 'No se pudo subir el archivo: No cumple con los requisitos.');
            return false;
        }else{
            $file = $this->upload->data();
            return $file['file_name'];
    	}
    }

	function inactivarBanner($id){
		$data = array(
			'idEstado' => 2
		);
		$this->db->where('idBanner', $id);
		$this->db->update('Banner', $data);
	}	

	function borrarBanner($id){
		$data = array(
			'idEstado' => 4
		);
		$this->db->where('idBanner', $id);
		$this->db->update('Banner', $data);
	}

//**************************************************************Sección Cantacto******************************************************//

    function obtenerContacto($per_page,$p){
			//$this->db->where('idEstado !=', '2');
			$query = $this->db->get('v_contactenos',$per_page,$p);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else{
				return false;
			}
		}
  
    function obtenerContactoByID($id){
		$query = $this->db->get_where('v_contactenos', array('idContacto' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function editarContacto(){
		$datos = $this->input->post();
		$data = array(
            'idTienda'=> $datos['tienda'],
            'Direccion'=> $datos['direccion'],
            'Telefono1' => $datos['telefono1'],
            'Telefono2' => $datos['telefono2'],
            'Email' => $datos['email'],
		);
		$this->db->where('idContacto', $datos['id']);
		$this->db->update('Contacto', $data);
	}

	function obteneridTienda(){
		$this->db->where('idTienda !=', '3');
		$query = $this->db->get('Tienda');
		if ($query->num_rows() > 0){
			return $query->result();
	}else{
		return false;
	}
}	

	function obtContenidoBanners($tipoContenido,$tienda){
		$tabla = '';
		switch ($tipoContenido) {
			case '1':
				$tabla = 'v_comunicado';
				$this->db->select('*, FechaPublicacion as FechaIngreso, idComunicado as idContenido');
				break;
			case '2':
				$tabla = 'v_promociones';
				$this->db->select('*, idPromocion as idContenido');
				break;
			case '3':
				$tabla = 'v_activaciones';
				$this->db->select('*, idActivacion as idContenido');
				break;
		}
		$query = $this->db->get_where($tabla,array('idTienda' => $tienda));
		return $query->result();
	}
//**************************************************************Control de horas******************************************************//

	function controlHoras(){
		$this->db->select('idAccesoApp,HoraInicio, HoraFinal');
		$query = $this->db->get('AccesoApp');
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function editarControlHoras(){
		$datos = $this->input->post();
		$data = array(
            'HoraInicio' => $datos['HoraInicio'],
            'HoraFinal' => $datos['HoraFinal'],
		);
		$this->db->where('idAccesoApp', $datos['id']);
		$this->db->update('AccesoApp', $data);
	}

	function obtenerControlHorasByID($id){
		$query = $this->db->get_where('AccesoApp', array('idAccesoApp' => $id));
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
}
?>