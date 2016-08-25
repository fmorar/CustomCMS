<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require '../PHPMailer/PHPMailerAutoload.php';

class Pages extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model('Pages_model');
            $this->load->library("pagination");
            $this->load->helper(array('form'));

            if(!$this->session->userdata('logged_in')){
            	redirect('login', 'refresh');
            }

    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){

		$datos = array(
			'section_title' => 'Bienvenido al Administrador',
			'section_page' => 'inicioAdmin',
			//'cotizaciones' => $cotizaciones
			);
		$this->load->view('administrador', $datos);
	}

	public function login(){
		$this->load->view('login');
	}


   // public function obtenerEstado(){
		//echo json_encode($this->Pages_model->obtenerProvincia());
	//}	

	public function verificar_admin(){
		$this->session->set_flashdata('url_redirect_true', 'administrador');
		$this->session->set_flashdata('url_redirect_error', 'administrador/ingreso');
		$this->load->view('administrador/login');
	}

	public function ingreso(){
		$this->load->view('pages/login');
	}

	public function usuarios(){
	 	$tipo = $this->Pages_model->obtenerTipo();
	 	$pagination = 10; 
		$page = ($this->input->get("p") ) ? $this->input->get("p") : 0;
		$config['base_url'] = current_url();        
        $config['per_page'] = $pagination;
        $config['num_links'] = 2; 
		$config['first_link'] = '«Inicio'; //primer link
        $config['next_link'] = 'Siguiente »';
        $config['prev_link'] = '« Anterior';
		$config['last_link'] = 'Fin »'; //último link
	    $config["uri_segment"] = 3;
		$config['query_string_segment']="p";
		$config['page_query_string'] = TRUE;
		if($this->input->post('filtro') || $this->input->get('f')){
			$config['base_url'] = site_url("usuarios")."?pagination=true&f=1";
			if($this->input->post('filtro')) $this->session->set_userdata("filtro",$this->input->post());	
			$data = $this->session->userdata('filtro');			
			$consultas = $this->Pages_model->obtenerUsuariosFiltro($config['per_page'],$page, $data);
			$cantResult = $consultas["cantResult"];
			$consultas = $consultas["restultado"];
			$config['total_rows'] = $cantResult;

		}else{
			$config['total_rows'] = $this->Pages_model->cantidadUsuariosValidos();
			$consultas = $this->Pages_model->obtenerUsuarios($config['per_page'],$page);
		} 
		$this->pagination->initialize($config);
		$this->session->set_userdata('usuarios', $consultas);
		$datos = array (
			'consultas' => $consultas, 
			'section_page' =>'usuarios',
			'section_title' =>'Usuarios',
			'link' => $this->pagination->create_links()
			);

		$this->load->view('administrador', $datos);
	 }

 	public function reporteIngresos(){
 		$fechaIni = $this->input->post('fechaIni');
 		$fechaFin = $this->input->post('fechaFin');
	    $Resultado = $this->Pages_model->reporteIngresos($fechaIni,$fechaFin);
	   	$datos = array('section_page' => 'reporteIngresos', 'section_title' => 'reporteIngresos','reporteIngresos' => $Resultado,'Resultado' => $Resultado);
	   	$this->load->view('administrador', $datos);
	}

	public function exportarReporte(){
		$fechaIni = $this->input->post('fechaIni');
 		$fechaFin = $this->input->post('fechaFin');
		$accion = $this->Pages_model->ExportarReporteCSV($fechaIni,$fechaFin);
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('reporteIngresos', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('reporteIngresos', 'refresh');
		}
	}

	public function editar_usuario(){
		if(!$this->input->get('id')){
			redirect ('usuario', 'refresh');
		}else{
			$usuario = $this->Pages_model->obtenerUsuariosByID($this->input->get('id'));
			$roles = $this->Pages_model->obtenerRoles();
			$estados = $this->Pages_model->obtenerEstados();
			$tienda = $this->Pages_model->obtenerTienda();
			$pdvs = $this->Pages_model->obtenerPDV();
			$datos = array('usuario' => $usuario, 'roles' => $roles,'tienda'=>$tienda, 'pdvs'=>$pdvs, 'estados' => $estados, 'section_page' => 'editar_usuario', 'section_title' => 'Editar Usuarios');
			$this->load->view('administrador', $datos);
		}
	}

	public function updateUsuario(){
		$accion = $this->Pages_model->editarUsuarios();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('usuarios', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('usuarios', 'refresh');
		}
	}

	public function exportarUsuarios(){
		$accion = $this->Pages_model->ExportarUsuariosCSV();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('usuarios', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('usuarios', 'refresh');
		}
	}


	public function insertarUsuario(){
		$accion = $this->Pages_model->InsertarUsuario();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('usuarios', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('usuarios', 'refresh');
		}
	}

public function agregarUsuario(){
		$tienda = $this->Pages_model->obtenerTienda();
		$roles = $this->Pages_model->obtenerRoles();
		$pdvs = $this->Pages_model->obtenerPDV();
		$datos = array(
			'section_page' => 'agregar_usuario',
			'section_title' => 'Agregar Usuario',
			'roles' => $roles,
			'tienda' => $tienda,
			'pdvs' => $pdvs,
			);
		$this->load->view('administrador', $datos);
	}

	public function inactivarUsuario(){
			if(!$this->input->get('id')){
				redirect ('usuarios', 'refresh');
			}else{
				$accion = $this->Pages_model->inactivarUsuario($this->input->get('id'));
				if ($accion) {
					$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
					redirect ('usuarios', 'refresh');
				}
				else{
					$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
					redirect ('usuarios', 'refresh');
				}
			}
	}

	public function borrarUsuario(){
			if(!$this->input->get('id')){
				redirect ('usuarios', 'refresh');
			}else{
				$accion = $this->Pages_model->borrarUsuario($this->input->get('id'));
				if ($accion) {
					$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
					redirect ('usuarios', 'refresh');
				}
				else{
					$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
					redirect ('usuarios', 'refresh');
				}
			}
	}


 	public function importarUsuarios(){
	 	if ($this->input->post('Guardar')){
	 		$this->Pages_model->importarUsuariosCSV($this->input->post('tmpPassword'));
	 		redirect ('usuarios', 'refresh');
	 	}else{
	 		$datos = array (
			'section_page' =>'importarUsuarios',
			'section_title' =>'Usuarios'
			);
		
			$this->load->view('administrador', $datos);
	 	}
	}


	 //*************************************Comunicados******************************************//

	 public function insertarComunicado(){
		$accion = $this->Pages_model->insertarComunicado();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('ComunicadosFiltro', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('ComunicadosFiltro', 'refresh');
		}
	}


	public function agregarComunicado(){
		$medio = $this->Pages_model->obtenerMedio();
		$multimedia = $this->Pages_model->obtenerTipoMultimedia();
		$tienda = $this->Pages_model->obtenerTienda();
		$datos = array(
			'section_page' => 'agregarComunicado',
			'section_title' => 'Agregar Comunicados',
			'multimedia' => $multimedia,
			'medio' => $medio,
			'tienda' => $tienda,

			);
		$this->load->view('administrador', $datos);
	}


	public function editarComunicado(){
		if(!$this->input->get('id')){
			redirect ('ComunicadosFiltro', 'refresh');
		}else{
			$comunicados = $this->Pages_model->obtenerComunicadoByID($this->input->get('id'));
			$medio = $this->Pages_model->obtenerMedio();
			$estados = $this->Pages_model->obtenerEstados();
			$multimedia = $this->Pages_model->obtenerTipoMultimedia();
			$tienda = $this->Pages_model->obtenerTienda();
			$datos = array('comunicados'=> $comunicados,'section_page'=>  'editarComunicado', 'section_title'=> 'Editar Comunicados' ,'estados' => $estados, 'medio' => $medio ,'multimedia' => $multimedia, 'tienda'=>$tienda);
			$this->load->view('administrador', $datos);
		}
	}

	public function updateComunicado(){
		$accion = $this->Pages_model->editarComunicado();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('ComunicadosFiltro', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('ComunicadosFiltro', 'refresh');
		}
	}

	public function inactivarComunicado(){
		if(!$this->input->get('id')){
			redirect ('ComunicadosFiltro', 'refresh');
		}else{
			$accion = $this->Pages_model->inactivarComunicado($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('ComunicadosFiltro', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('ComunicadosFiltro', 'refresh');
			}
		}
	}

	public function borrarComunicado(){
		if(!$this->input->get('id')){
			redirect ('ComunicadosFiltro', 'refresh');
		}else{
			$accion = $this->Pages_model->borrarComunicado($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('ComunicadosFiltro', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('ComunicadosFiltro', 'refresh');
			}
		}
	}


	public function ComunicadosFiltro(){
    $estados = $this->Pages_model->obtenerEstados();
    $Estado = $this->input->post('Estado');
    $Resultado = $this->Pages_model->obtenerComunicadoByEstado($Estado);
   	$datos = array('estados' => $estados,'section_page' => 'Comunicados', 'section_title' => 'Comunicados','Comunicados' => $Resultado,'Resultado' => $Resultado);
   	$this->load->view('administrador', $datos);
   }

//*************************************Activaciones******************************************//

	 public function insertarActivacion(){
		$accion = $this->Pages_model->insertarActivacion();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('ActivacionFiltro', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('ActivacionFiltro', 'refresh');
		}
	}

	public function agregarActivacion(){
		$medio = $this->Pages_model->obtenerMedio1();
		$tienda = $this->Pages_model->obtenerTienda();
		$datos = array(
			'section_page' => 'agregarActivacion',
			'section_title' => 'Agregar Activacion',
			'tienda' => $tienda,
			'medio' => $medio,
			);
		$this->load->view('administrador', $datos);
	}

	public function editarActivacion(){
		if(!$this->input->get('id')){
			redirect ('Activacion', 'refresh');
		}else{
			$activacion = $this->Pages_model->obtenerActivacionByID($this->input->get('id'));
			$medio = $this->Pages_model->obtenerMedio1();
			$tienda = $this->Pages_model->obtenerTienda();
			$estados = $this->Pages_model->obtenerEstados();
			$datos = array('activacion'=> $activacion,'section_page'=> 'editarActivacion', 'section_title'=> 'Editar Activacion' ,'medio'=>$medio ,'tienda'=>$tienda,'estados'=>$estados);
			$this->load->view('administrador', $datos);
		}
	}

	public function updateActivacion(){
		$accion = $this->Pages_model->editarActivacion();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('ActivacionFiltro', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('ActivacionFiltro', 'refresh');
		}
	}

	public function inactivarActivacion(){
		if(!$this->input->get('id')){
			redirect ('ActivacionFiltro', 'refresh');
		}else{
			$accion = $this->Pages_model->inactivarActivacion($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('ActivacionFiltro', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('ActivacionFiltro', 'refresh');
			}
		}
	}

	public function borrarActivacion(){
		if(!$this->input->get('id')){
			redirect ('ActivacionFiltro', 'refresh');
		}else{
			$accion = $this->Pages_model->borrarActivacion($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('ActivacionFiltro', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('ActivacionFiltro', 'refresh');
			}
		}
	}

	public function ActivacionFiltro(){
    $estados = $this->Pages_model->obtenerEstados();
    $Estado = $this->input->post('Estado');
    $Resultado = $this->Pages_model->obtenerActivacionByEstado($Estado);
   	$datos = array('estados' => $estados,'section_page' => 'activaciones', 'section_title' => 'activaciones','activaciones' => $Resultado,'Resultado' => $Resultado);
   	$this->load->view('administrador', $datos);
   }

	 //*************************************Promociones******************************************//

	 public function insertarPromocion(){
		$accion = $this->Pages_model->insertarPromocion();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('filtrarPromociones', 'refresh');
		}
	}

 	public function insertarTienda(){
		$accion = $this->Pages_model->obtenerTienda();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
		}
	}

	public function agregarPromocion(){
		$tienda = $this->Pages_model->obtenerTienda();
		$tipo = $this->Pages_model->obtenerTipo();
		$datos = array(
			'section_page' => 'agregarPromocion',
			'section_title' => 'Agregar Promoción',
			'tienda' => $tienda,
			'tipo' => $tipo,
			);
		$this->load->view('administrador', $datos);
	}

		public function editarPromocion(){
		if(!$this->input->get('id')){
			redirect ('filtrarPromociones', 'refresh');
		}else{
			$promocion = $this->Pages_model->obtenerPromocionByID($this->input->get('id'));
			$tipo = $this->Pages_model->obtenerTipo();
			$tienda = $this->Pages_model->obtenerTienda();
			$estados = $this->Pages_model->obtenerEstados();
			$datos = array('promocion'=> $promocion,'section_page'=> 'editarPromocion', 'section_title'=> 'Editar Promoción' ,'tienda'=>$tienda,'tipo' => $tipo, 'estados'=> $estados,);
			$this->load->view('administrador', $datos);
		}
	}

	public function updatePromocion(){
		$accion = $this->Pages_model->editarPromocion();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('filtrarPromociones', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('filtrarPromociones', 'refresh');
		}
	}


	public function inactivarPromocion(){
		if(!$this->input->get('id')){
			redirect ('filtrarPromociones', 'refresh');
		}else{
			$accion = $this->Pages_model->inactivarPromocion($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('filtrarPromociones', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('filtrarPromociones', 'refresh');
			}
		}
	}

	public function borrarPromocion(){
		if(!$this->input->get('id')){
			redirect ('filtrarPromociones', 'refresh');
		}else{
			$accion = $this->Pages_model->borrarPromocion($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('filtrarPromociones', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('filtrarPromociones', 'refresh');
			}
		}
	}


	public function filtrarPromociones(){
    $estados = $this->Pages_model->obtenerEstados();
    $tipos = $this->Pages_model->obtenerTipo();
    $Estado = $this->input->post('Estado');
    $Categoria = $this->input->post('Categoria');
    $Resultado = $this->Pages_model->filtrarPromocionesbyEstado($Estado);
   	$datos = array('estados' => $estados,'tipos' => $tipos,'section_page' => 'promocion', 'section_title' => 'Promociones','promociones' => $Resultado,'Resultado' => $Resultado);

   	$this->load->view('administrador', $datos);
   }

	public function importarPromociones(){
	 	if ($this->input->post('Guardar')){
	 		$this->Pages_model->importarPromocionesCSV();
	 		redirect ('Promocion', 'refresh');
	 	}else{
	 		$tipoPromo = $this->Pages_model->obtenerTipoPromo();
	 		$datos = array (
			'tipoPromo' => $tipoPromo,
			'section_page' =>'importarPromociones',
			'section_title' =>'Promociones'
			);
		
			$this->load->view('administrador', $datos);
	 	}
	 }

//*************************************Notificaciones******************************************//

	public function insertarNotificacion(){
			$notificacion = $this->Pages_model->insertarNotificacion();
			$this->load->library('notify');
			$msj = $this->input->post('mensaje');
			$titulo = $this->input->post('titulo');
			$type = $this->input->post('plataforma');
			$tienda = ($this->input->post('tienda') == 3) ? false : $this->input->post('tienda');
		   	$this->notify->setNotificationData($notificacion['idNotificacion'],$msj,$notificacion['banner'],$titulo);

			if ($type == 1){
			   	$this->notify->SendAndroid(false,$tienda);
			}else if ($type == 2){
			   	$this->notify->SendiOS(false,$tienda);
			}else{
			   $this->notify->sendNotification(false,$tienda);
			}
			$this->session->set_flashdata('message', $this->notify->debugStr);
			redirect(site_url('NotificacionFiltro'));
	}

	public function agregarNotificacion(){
		$tienda = $this->Pages_model->obtenerTienda();
		$datos = array(
			'section_page' => 'agregarNotificacion',
			'section_title' => 'Agregar Notificación',
			'tienda' => $tienda,
			);
		$this->load->view('administrador', $datos);
	}

		public function editarNotificacion(){
		if(!$this->input->get('id')){
			redirect ('NotificacionFiltro', 'refresh');
		}else{
			$notificacion = $this->Pages_model->obtenerNotificacionByID($this->input->get('id'));
			$tienda = $this->Pages_model->obtenerTienda();
			$estados = $this->Pages_model->obtenerEstados();
			$datos = array('notificacion'=> $notificacion,'section_page'=> 'editarNotificacion', 'section_title'=> 'Editar Notificación' ,'tienda'=>$tienda,'estados'=>$estados);
			$this->load->view('administrador', $datos);
		}
	}

	public function updateNotificacion(){
		$accion = $this->Pages_model->editarNotificacion();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('NotificacionFiltro', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('NotificacionFiltro', 'refresh');
		}
	}


	public function inactivarNotificacion(){
		if(!$this->input->get('id')){
			redirect ('NotificacionFiltro', 'refresh');
		}else{
			$accion = $this->Pages_model->inactivarNotificacion($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('NotificacionFiltro', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('NotificacionFiltro', 'refresh');
			}
		}
	}

	public function borrarNotificacion(){
		if(!$this->input->get('id')){
			redirect ('Notificacion', 'refresh');
		}else{
			$accion = $this->Pages_model->borrarNotificacion($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('NotificacionFiltro', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('NotificacionFiltro', 'refresh');
			}
		}
	}


	public function reEnviarNotificacion(){
		if(!$this->input->get('id')){
			redirect ('NotificacionFiltro', 'refresh');
		}else{
			$datosNoti = $this->Pages_model->obtenerNotificacionByID($this->input->get('id'));			
			$this->load->library('notify');
		   	$this->notify->setNotificationData($this->input->get('id'),$datosNoti->Detalle,$datosNoti->Imagen,$datosNoti->Titulo);
			$notificacion = $this->notify->sendNotification(false,$datosNoti->idTienda);
			$this->session->set_flashdata('message', 'Se ha reenviado correctamente');
			redirect(site_url('NotificacionFiltro'));
		}
	}


	public function NotificacionFiltro(){
    $estados = $this->Pages_model->obtenerEstados();
    $Estado = $this->input->post('Estado');
    $Resultado = $this->Pages_model->obtenerNotificacionByEstado($Estado);
   	$datos = array('estados' => $estados,'section_page' => 'Notificacion', 'section_title' => 'Notificacion','Notificacion' => $Resultado,'Resultado' => $Resultado);
   	$this->load->view('administrador', $datos);
   }

	 // public function Notificacion(){
		// $tipo = $this->Pages_model->obtenerTipo();
	 // 	$pagination = 10; 
		// $page = ($this->input->get("p") ) ? $this->input->get("p") : 0;
		// $config['base_url'] = current_url();             
  //       $config['per_page'] = $pagination;
  //       $config['num_links'] = 2; 
		// $config['first_link'] = '«Inicio'; //primer link
  //       $config['next_link'] = 'Siguiente »';
  //       $config['prev_link'] = '« Anterior';
		// $config['last_link'] = 'Fin »'; //último link
	 //    $config["uri_segment"] = 3;
		// $config['query_string_segment']="p";
		// $config['page_query_string'] = TRUE;
		// if($this->input->get('tipo')){  
		// 	$config['base_url'] = current_url().'?tipo='.$this->input->get('tipo');
		// 	$data = array('idTipo' => $this->input->get('tipo'));
		// 	$this->session->set_userdata("filtro1",$data);
		// 	$data=$this->session->userdata('filtro1');			
		// 	$consultas = $this->Pages_model->obtenerPromocionFiltro($config['per_page'],$page, $data);
		// 	$cantResult = $consultas["cantResult"];
		// 	$consultas = $consultas["restultado"];
		// 	$config['total_rows'] = $v_notificaciones;
		// }else{
		// 	$config['total_rows'] = $this->db->get('Notificacion')->num_rows();
		// 	$consultas = $this->Pages_model->obtenerNotificacionByTienda($config['per_page'],$page);
		// } 
		// if ($page >= $config['total_rows']){
		// 	redirect('Notificacion');
		// 	exit;
		// }
		// $this->pagination->initialize($config);
		// $this->session->set_userdata('v_notificaciones', $consultas);
		// $datos = array (
		// 	'consultas' => $consultas, 
		// 	'section_page' =>'notificacion',
		// 	'section_title' =>'Notificaciones',
		// 	'tipo' => $tipo,
		// 	'link' => $this->pagination->create_links()
		// 	);

		// $this->load->view('administrador', $datos);
	 // }
	 
	 //***********************************************************TipoPromociones*************************************************//

	public function tipoPromo(){
		$tipoPromo = $this->Pages_model->obtenerTipoPromo();

		$datos = array(
			'tipoPromo' => $tipoPromo,
			'section_page' => 'tipoPromo',
			'section_title' => 'Tipo Promociones'
			);
		$this->load->view('administrador', $datos);
	}

	public function editar_tipoPromo(){
		if(!$this->input->get('id')){
			redirect ('tipoPromo', 'refresh');
		}else{
			$tipoPromo = $this->Pages_model->obtenerTipoPromoByID($this->input->get('id'));
			$estados = $this->Pages_model->obtenerEstados();
			$datos = array('tipoPromo' => $tipoPromo,  'estados' => $estados, 'section_page' => 'editarTipoPromo', 'section_title' => 'Editar Menú');
			$this->load->view('administrador', $datos);
		}
	}

	public function updatetipoPromo(){
		$accion = $this->Pages_model->editarTipoPromo();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('tipoPromo', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('tipoPromo', 'refresh');
		}
	}

	public function insertartipoPromo(){
		$accion = $this->Pages_model->InsertarTipoPromo();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('tipoPromo', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('tipoPromo', 'refresh');
		}
	}
public function agregartipoPromo(){
		$datos = array(
			'section_page' => 'agregarTipoPromo',
			'section_title' => 'Agregar Item',
			);
		$this->load->view('administrador', $datos);
	}

	public function inactivar_tipoPromo(){
			if(!$this->input->get('id')){
				redirect ('tipoPromo', 'refresh');
			}else{
				$accion = $this->Pages_model->inactivarTipoPromo($this->input->get('id'));
				if ($accion) {
					$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
					redirect ('tipoPromo', 'refresh');
				}
				else{
					$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
					redirect ('tipoPromo', 'refresh');
				}
			}
		}

		public function borrar_tipoPromo(){
			if(!$this->input->get('id')){
				redirect ('tipoPromo', 'refresh');
			}else{
				$accion = $this->Pages_model->borrarTipoPromo($this->input->get('id'));
				if ($accion) {
					$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
					redirect ('tipoPromo', 'refresh');
				}
				else{
					$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
					redirect ('tipoPromo', 'refresh');
				}
			}
		}

//***********************************************************Rewards*************************************************//

	public function Rewards(){
		$tipo = $this->Pages_model->obtenerTipo();
	 	$pagination = 10; 
		$page = ($this->input->get("p") ) ? $this->input->get("p") : 0;
		$config['base_url'] = current_url();        
        $config['per_page'] = $pagination;
        $config['num_links'] = 2; 
		$config['first_link'] = '«Inicio'; //primer link
        $config['next_link'] = 'Siguiente »';
        $config['prev_link'] = '« Anterior';
		$config['last_link'] = 'Fin »'; //último link
	    $config["uri_segment"] = 3;
		$config['query_string_segment']="p";
		$config['page_query_string'] = TRUE;
		if($this->input->get('tipo')){  
			$config['base_url'] = current_url().'?tipo='.$this->input->get('tipo');
			$data = array('idTipo' => $this->input->get('tipo'));
			$this->session->set_userdata("filtro1",$data);
			$data=$this->session->userdata('filtro1');			
			$consultas = $this->Pages_model->obtenerPromocionFiltro($config['per_page'],$page, $data);
			$cantResult = $consultas["cantResult"];
			$consultas = $consultas["restultado"];
			$config['total_rows'] = $cantResult;
		}else{
			$config['total_rows'] = $this->db->get('Rewards')->num_rows();
			$consultas = $this->Pages_model->obtenerRewards($config['per_page'],$page);
		} 
		if ($page >= $config['total_rows']){
			redirect('Rewards');
			exit;
		}
		$this->pagination->initialize($config);
		$this->session->set_userdata('v_rewards', $consultas);
		$datos = array (
			'consultas' => $consultas, 
			'section_page' =>'rewards',
			'section_title' =>'Premios',
			'tipo' => $tipo,
			'link' => $this->pagination->create_links()
			);

		$this->load->view('administrador', $datos);
	 }

	public function editarRewards(){
		if(!$this->input->get('id')){
			redirect ('Rewards', 'refresh');
		}else{
			$rewards = $this->Pages_model->obtenerRewardsByID($this->input->get('id'));
			$estados = $this->Pages_model->obtenerEstados();
			$tienda = $this->Pages_model->obtenerTienda();
			$datos = array('rewards' => $rewards,  'estados' => $estados, 'tienda'=>$tienda, 'section_page' => 'editarRewards', 'section_title' => 'Editar Premios');
			$this->load->view('administrador', $datos);
		}
	}

	public function updateRewards(){
		$accion = $this->Pages_model->editarRewards();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('Rewards', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('Rewards', 'refresh');
		}
	}

	public function insertarRewards(){
		$accion = $this->Pages_model->InsertarRewards();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('Rewards', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('Rewards', 'refresh');
		}
	}
public function agregarRewards(){
		$tienda = $this->Pages_model->obtenerTienda();
		$datos = array(
			'section_page' => 'agregarRewards',
			'section_title' => 'Agregar Premios',
			'tienda' => $tienda
			);
		$this->load->view('administrador', $datos);
	}

	public function eliminarRewards(){
			if(!$this->input->get('id')){
				redirect ('Rewards', 'refresh');
			}else{
				$accion = $this->Pages_model->eliminarRewards($this->input->get('id'));
				if ($accion) {
					$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
					redirect ('Rewards', 'refresh');
				}
				else{
					$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
					redirect ('Rewards', 'refresh');
				}
			}
		}

//***********************************************************Reglamento*************************************************//

	public function reglamento(){
		$tipo = $this->Pages_model->obtenerTipo();
	 	$pagination = 10; 
		$page = ($this->input->get("p") ) ? $this->input->get("p") : 0;
		$config['base_url'] = current_url();        
        $config['per_page'] = $pagination;
        $config['num_links'] = 2; 
		$config['first_link'] = '«Inicio'; //primer link
        $config['next_link'] = 'Siguiente »';
        $config['prev_link'] = '« Anterior';
		$config['last_link'] = 'Fin »'; //último link
	    $config["uri_segment"] = 3;
		$config['query_string_segment']="p";
		$config['page_query_string'] = TRUE;
		if($this->input->get('tipo')){  
			$config['base_url'] = current_url().'?tipo='.$this->input->get('tipo');
			$data = array('idTipo' => $this->input->get('tipo'));
			$this->session->set_userdata("filtro1",$data);
			$data=$this->session->userdata('filtro1');			
			$consultas = $this->Pages_model->obtenerPromocionFiltro($config['per_page'],$page, $data);
			$cantResult = $consultas["cantResult"];
			$consultas = $consultas["restultado"];
			$config['total_rows'] = $reglamentos;
		}else{
			$config['total_rows'] = $this->db->get('Reglamento')->num_rows();
			$consultas = $this->Pages_model->obtenerReglamento();
		} 
		if ($page >= $config['total_rows']){
			redirect('Contacto');
			exit;
		}
		$this->pagination->initialize($config);
		$this->session->set_userdata('v_rewards', $consultas);
		$datos = array (
			'consultas' => $consultas, 
			'section_page' =>'terminosCondiciones',
			'section_title' =>'Reglamento',
			'tipo' => $tipo,
			'link' => $this->pagination->create_links()
			);

		$this->load->view('administrador', $datos);
	 }

	public function editarReglamento(){
		if(!$this->input->get('id')){
			redirect ('terminosCondiciones', 'refresh');
		}else{
			$reglamento = $this->Pages_model->obtenerReglamentoByID($this->input->get('id'));
			$datos = array('reglamento' => $reglamento,'section_page' => 'editarReglamento', 'section_title' => 'Editar Terminos y Condiciones');
			$this->load->view('administrador', $datos);
		}
	}

	public function updateReglamento(){
		$accion = $this->Pages_model->editarReglamento();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('reglamento', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('reglamento', 'refresh');
		}
	}

	public function insertarReglamento(){
		$accion = $this->Pages_model->InsertarReglamento();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('reglamento', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('reglamento', 'refresh');
		}
	}

//***********************************************************Medios*************************************************//

	public function Medio(){
		$medio = $this->Pages_model->obtenerMedio1();

		$datos = array(
			'medio' => $medio,
			'section_page' => 'medio',
			'section_title' => 'Menu Medios'
			);
		$this->load->view('administrador', $datos);
	}
	
	public function editarMedio(){
		if(!$this->input->get('id')){
			redirect ('Medio', 'refresh');
		}else{
			$medio = $this->Pages_model->obtenerMedioByID($this->input->get('id'));
			$estados = $this->Pages_model->obtenerEstados();
			$datos = array('medio' => $medio,  'estados' => $estados, 'section_page' => 'editarMedio', 'section_title' => 'Editar Medio');
			$this->load->view('administrador', $datos);
		}
	}

	public function updateMedio(){
		$accion = $this->Pages_model->editarMedio();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('Medio', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('Medio', 'refresh');
		}
	}

	public function insertarMedio(){
		$accion = $this->Pages_model->InsertarMedio();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('Medio', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('Medio', 'refresh');
		}
	}

	public function agregarMedio(){
		$datos = array(
			'section_page' => 'agregarMedio',
			'section_title' => 'Agregar Medio',
			);
		$this->load->view('administrador', $datos);
	}

	public function inactivarMedio(){
			if(!$this->input->get('id')){
				redirect ('Medio', 'refresh');
			}else{
				$accion = $this->Pages_model->inactivarMedio($this->input->get('id'));
				if ($accion) {
					$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
					redirect ('Medio', 'refresh');
				}
				else{
					$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
					redirect ('Medio', 'refresh');
				}
			}
		}

	public function borrarMedio(){
			if(!$this->input->get('id')){
				redirect ('Medio', 'refresh');
			}else{
				$accion = $this->Pages_model->borrarMedio($this->input->get('id'));
				if ($accion) {
					$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
					redirect ('Medio', 'refresh');
				}
				else{
					$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
					redirect ('Medio', 'refresh');
				}
			}
		}

//***********************************************************Incentivos/codigos*************************************************//

	public function Incentivos(){
		$Incentivos = $this->Pages_model->obtenerIncentivos();
		$datos = array('section_page' => 'Incentivos', 'section_title' => 'Incentivos','Incentivos' => $Incentivos,'Incentivos' => $Incentivos);
		$this->load->view('administrador', $datos);
	}

	public function editarIncentivos(){
		if(!$this->input->get('id')){
			redirect ('Incentivos', 'refresh');
		}else{
			$Incentivos = $this->Pages_model->obtenerIncentivosByID($this->input->get('id'));
			$estados = $this->Pages_model->obtenerEstados();
			$provedores = $this->Pages_model->obtenerProvedores();
			$tienda = $this->Pages_model->obtenerTienda();
			$redencion = $this->Pages_model->obtenerRedenciones();
			$pdvs = $this->Pages_model->obtenerPDV();
			$pdvsIncentivos = $this->Pages_model->obtenerPdvIncentivos($this->input->get('id'));
			$datos = array('Incentivos' => $Incentivos, 'estados'=> $estados, 'pdvsIncentivos'=>$pdvsIncentivos, 'pdvs'=>$pdvs, 'provedores'=>$provedores, 'tienda'=>$tienda, 'redencion'=>$redencion, 'section_page' => 'editarIncentivos', 'section_title' => 'Editar Incentivos');
			$this->load->view('administrador', $datos);
		}
	}

	public function obtPdvByTienda(){
		$tienda = $this->input->get('tienda');
		$pdvs = $this->Pages_model->obtenerPDV($tienda);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($pdvs));
	}

	public function updateIncentivos(){
		$accion = $this->Pages_model->editarIncentivos();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('Incentivos', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('Incentivos', 'refresh');
		}
	}

	public function agregarIncentivos(){
		$estados = $this->Pages_model->obtenerEstados();
		$provedores = $this->Pages_model->obtenerProvedores();
		$tienda = $this->Pages_model->obtenerTienda();
		$redencion = $this->Pages_model->obtenerRedenciones();
		$datos = array('section_page' => 'agregarIncentivos','section_title' => 'Agregar Incentivos','estados'=> $estados, 'provedores'=>$provedores, 'tienda'=>$tienda, 'redencion'=>$redencion);
		$this->load->view('administrador', $datos);
	}

	public function insertarIncentivos(){
		$accion = $this->Pages_model->agregarIncentivos();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('agregarcontenidoIncentivos?idPromo='.$accion,'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('agregarcontenidoIncentivos?idPromo='.$accion,'refresh');
		}
	}


	public function activarBannerBeacon(){
		if(!$this->input->get('id')){
			redirect ('Incentivos', 'refresh');
		}else{
			$accion = $this->Pages_model->alternarEstadoIncentivos($this->input->get('id'),$this->input->get('estado'));

		}
	}

//***********************************************************contenidoIncentivos*************************************************//
	public function contenidoIncentivos(){
		$contenidoIncentivos = $this->Pages_model->obtenercontenidoIncentivos($this->input->get('id'));
		$datos = array('section_page' => 'contenidoIncentivos', 'section_title' => 'contenidoIncentivos','contenidoIncentivos' => $contenidoIncentivos,'contenidoIncentivos' => $contenidoIncentivos);
		$this->load->view('administrador', $datos);
	}

	public function agregarcontenidoIncentivos(){
		$Premios = $this->Pages_model->obtenerTipoPremio();
		$datos = array('section_page' => 'agregarcontenidoIncentivos','section_title' => 'Agregar Contenido Incentivos','Premios'=>$Premios);
		$this->load->view('administrador', $datos);
	}

	public function insertarcontenidoIncentivos(){
		$accion = $this->Pages_model->agregarcontenidoIncentivos();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('contenidoIncentivos?id='.$accion,'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('contenidoIncentivos?id='.$accion,'refresh');
		}
	}

//***********************************************************Provedores*************************************************//

	public function Provedores(){
		$Provedores = $this->Pages_model->obtenerProvedores();
		$datos = array('section_page' => 'Provedores', 'section_title' => 'Provedores','Provedores' => $Provedores,'Provedores' => $Provedores);
		$this->load->view('administrador', $datos);
	}

	public function editarProvedores(){
		if(!$this->input->get('id')){
			redirect ('Provedores', 'refresh');
		}else{
			$Provedores = $this->Pages_model->obtenerProvedoresByID($this->input->get('id'));
			$estados = $this->Pages_model->obtenerEstados();
			$datos = array('Provedores' => $Provedores, 'estados'=> $estados, 'section_page' => 'editarProvedores', 'section_title' => 'Editar Provedores');
			$this->load->view('administrador', $datos);
		}
	}

	public function updateProvedores(){
		$accion = $this->Pages_model->editarProvedores();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('Provedores', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('Provedores', 'refresh');
		}
	}

	public function agregarProvedores(){
		$datos = array(
			'section_page' => 'agregarProvedores',
			'section_title' => 'Agregar Provedores',
			);
		$this->load->view('administrador', $datos);
	}

	public function insertarProvedores(){
		$accion = $this->Pages_model->agregarProvedores();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('Provedores', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('Provedores', 'refresh');
		}
	}

//************************************************************PDV*******************************************************************************//
	
	public function PDV(){
		$PDV = $this->Pages_model->obtenerPDV();
		$datos = array(
			'PDV' => $PDV,
			'section_page' => 'PDV',
			'section_title' => 'PDV'
			);
		$this->load->view('administrador', $datos);
	}

	public function agregarPdv(){
		$usuario= $this->Pages_model->obtenerUsuariosForPdv();
		$tienda = $this->Pages_model->obtenerTienda();
		$datos = array(
			'section_page' => 'agregarPdv',
			'section_title' => 'Agregar PDV',
			'tienda' => $tienda,
			'usuario' => $usuario,
			);
		$this->load->view('administrador', $datos);
	}

	public function insertarPDV(){
		$accion = $this->Pages_model->agregarPdv();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('PDV', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('PDV', 'refresh');
		}
	}

	public function editarPdv(){
		if(!$this->input->get('id')){
			redirect ('PDV', 'refresh');
		}else{
			$PDV = $this->Pages_model->obtenerPdvByID($this->input->get('id'));
			$estados = $this->Pages_model->obtenerEstados();
			$tienda = $this->Pages_model->obtenerTienda();
			$usuario= $this->Pages_model->obtenerUsuariosForPdv();
			$datos = array(
				'PDV' => $PDV, 
				'estados'=> $estados, 
				'tienda' => $tienda,
				'usuario' => $usuario,
				'section_page' => 'editarPdv', 
				'section_title' => 'Editar Pdv'
				);
			$this->load->view('administrador', $datos);
		}
	}

	public function updatePdv(){
		$accion = $this->Pages_model->editarPdv();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('PDV', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('PDV', 'refresh');
		}
	}


//***********************************************************ventas*************************************************//

	public function ventas(){
		$ventas = $this->Pages_model->obtenerVentas();
		$datos = array(
			'ventas' => $ventas,
			'section_page' => 'ventas',
			'section_title' => 'ventas'
			);
		$this->load->view('administrador', $datos);
	}

	public function DetalleVentas(){
		$detalleVentas = $this->Pages_model->obtenerDetalleVentasByID($this->input->get('id'));
		$datos = array(
			'detalleVentas' => $detalleVentas,
			'section_page' => 'DetalleVentas', 
			'section_title' => 'DetalleVentas'
			);
		$this->load->view('administrador', $datos);
	}

//*******************************************************banners**********************************************//
		public function editarBanner(){
		if(!$this->input->get('id')){
			redirect ('BannersFiltro', 'refresh');
		}else{
			$tienda = $this->Pages_model->obtenerTienda();
			$estados = $this->Pages_model->obtenerEstados();
			$banner = $this->Pages_model->obtenerBannerByID($this->input->get('id'));
			$datos = array('banner' => $banner,'tienda' => $tienda, 'estados' => $estados, 'section_page' => 'editarBanner', 'section_title' => 'Editar Banner');
			$this->load->view('administrador', $datos);
		}
	}

 
 	public function updateBanner(){
		$accion = $this->Pages_model->editarBanner();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('BannersFiltro', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('BannersFiltro', 'refresh');
		}
	}

	public function eliminarBanner(){
		if(!$this->input->get('id')){
			redirect ('BannersFiltro', 'refresh');
		}else{
			$accion = $this->Pages_model->eliminarBanner($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('BannersFiltro', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('BannersFiltro', 'refresh');
			}
		}
	}

	public function agregarBanner(){
		$tienda = $this->Pages_model->obtenerTienda();
		$datos = array(
			'section_page' => 'agregar_banner',
			'section_title' => 'Agregar Banner',
			'tienda' => $tienda,
			);
		$this->load->view('administrador', $datos);
	}

	public function insertarBanner(){
		$accion = $this->Pages_model->InsertarBanner();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('BannersFiltro', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('BannersFiltro', 'refresh');
		}
	}

	public function contenidobanner(){
		$params = $this->uri->uri_to_assoc(3);
		$contenido = $this->Pages_model->obtContenidoBanners($params['tipo'],$params['tienda']);
		$datos = array(
			'contenido' => $contenido,
			'tipo' => $params['tipo']
			);
		$this->load->view('pages/contenidobanners', $datos);
	}


	public function BannersFiltro(){
    $estados = $this->Pages_model->obtenerEstados();
    $Estado = $this->input->post('Estado');
    $Resultado = $this->Pages_model->obtenerBannersByEstado($Estado);
   	$datos = array('estados' => $estados,'section_page' => 'Banners', 'section_title' => 'Banners','Banners' => $Resultado,'Resultado' => $Resultado);
   	$this->load->view('administrador', $datos);
   }

 	public function inactivarBanner(){
		if(!$this->input->get('id')){
			redirect ('banner', 'refresh');
		}else{
			$accion = $this->Pages_model->inactivarBanner($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('banners', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('banners', 'refresh');
			}
		}
	}

	public function borrarBanner(){
		if(!$this->input->get('id')){
			redirect ('banner', 'refresh');
		}else{
			$accion = $this->Pages_model->borrarBanner($this->input->get('id'));
			if ($accion) {
				$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
				redirect ('banners', 'refresh');
			}
			else{
				$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
				redirect ('banners', 'refresh');
			}
		}
	}
//*******************************************************Control de horas**********************************************//
	public function controlHoras(){
	    $Resultado = $this->Pages_model->controlHoras();
	   	$datos = array('section_page' => 'controlHoras', 'section_title' => 'Control de horas','controlHoras' => $Resultado,'Resultado' => $Resultado);
	   	$this->load->view('administrador', $datos);
   	}

	public function editarControlHoras(){
		if(!$this->input->get('id')){
			redirect ('controlHoras', 'refresh');
		}else{
			$controlHoras = $this->Pages_model->obtenerControlHorasByID($this->input->get('id'));
			$datos = array('controlHoras' => $controlHoras, 'section_page' => 'editarControlHoras', 'section_title' => 'Editar Control del Horario de ingreso');
			$this->load->view('administrador', $datos);
		}
	}

	public function updateControlHoras(){
		$accion = $this->Pages_model->editarControlHoras();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('controlHoras', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('controlHoras', 'refresh');
		}
	}

 //*******************************************************Contenido Sección Contacto**********************************************//
	public function editarContacto(){
		if(!$this->input->get('id')){
			redirect ('Contacto', 'refresh');
		}else{
			$tienda = $this->Pages_model->obtenerTienda();
			$ContenidoGeneral = $this->Pages_model->obtenerContactoByID($this->input->get('id'));
			$datos = array('ContenidoGeneral' => $ContenidoGeneral,'section_page' => 'editarSobreNosotros', 'section_title' => 'Editar Contacto', 'tienda' => $tienda);
			$this->load->view('administrador', $datos);
		}
	}
 
 	public function updateContacto(){
		$accion = $this->Pages_model->editarContacto();
		if ($accion) {
			$this->session->set_flashdata('success', 'Se ha actualizado correctamente');
			redirect ('Contacto', 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'No se pudieron actualizar los datos');
			redirect ('Contacto', 'refresh');
		}
	}

	public function agregarContacto(){
		$idenContacto = $this->Pages_model->obteneridTienda();
		$datos = array(
			'section_page' => 'agregarSobreNosotros',
			'section_title' => 'Agregar agregarSobreNosotros',
			'idenContacto' => $idenContacto
			);
		$this->load->view('administrador', $datos);
	}

	 public function Contacto(){
		$tipo = $this->Pages_model->obtenerTipo();
	 	$pagination = 10; 
		$page = ($this->input->get("p") ) ? $this->input->get("p") : 0;
		$config['base_url'] = current_url();         
        $config['per_page'] = $pagination;
        $config['num_links'] = 2; 
		$config['first_link'] = '«Inicio'; //primer link
        $config['next_link'] = 'Siguiente »';
        $config['prev_link'] = '« Anterior';
		$config['last_link'] = 'Fin »'; //último link
	    $config["uri_segment"] = 3;
		$config['query_string_segment']="p";
		$config['page_query_string'] = TRUE;
		if($this->input->post('filtro') || $this->input->get('f')){

			//$data=$this->session->userdata('filtro');

			$config['base_url'] = site_url("Contacto")."?pagination=true&f=1";       

				switch($this->input->post('filtro')){

					case 1: $data = array('TituloNoticia' => $this->input->post('titulo'));

					$this->session->set_userdata("filtro1",$data);

					break;

					case 2: $data = array('AutorNoticia' => $this->input->post('autor'));

					$this->session->set_userdata("filtro1",$data);

					break;

				}			

			$data=$this->session->userdata('filtro1');			

			$Noticias= $this->madministrador->obtenerNoticiaFiltro($config['per_page'],$page, $data);

			$cantResult=$Noticias["cantResult"];

			$Noticias=$Noticias["restultado"];

			$config['total_rows'] = $contenido;

		}else{
			$config['total_rows'] = $this->db->get_where('Contacto')->num_rows();
		} 
		$consultas = $this->Pages_model->obtenerContacto($config['per_page'],$page);
		$this->pagination->initialize($config);
		$datos = array (
			'consultas' => $consultas, 
			'section_page' =>'sobreNosotros',
			'section_title' =>'Sobre Nosotros',
			'link' => $this->pagination->create_links()
			);

		$this->load->view('administrador', $datos);
	 }
}
