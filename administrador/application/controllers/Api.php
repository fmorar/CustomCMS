<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
class Api extends REST_Controller
{

var $tokenData;

    function __construct()
    {
        // Construct the parent class

        parent::__construct();
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	    header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, X-Auth-Token, x-requested-with, X-PINGOTHER");
	    header("Access-Control-Max-Age: 1728000");
        if ($this->input->method(TRUE) == 'OPTIONS') die();
        $this->load->model('Pages_model');
        $this->load->model('Api_model');
        $this->load->helper('jwt_helper');
        $this->Api_model->destroyUserSession();
        try {
        	$this->tokenData = $this->chkToken();
        } catch (Exception $e) {
        	$this->response(array('message' => 'Error: '.$e->getMessage()),401);
        	exit;
        }
    }

    private function chkToken(){
       $headers = $this->input->request_headers();
       if(!isset($headers['X-Auth-Token']) && empty($headers['X-Auth-Token'])){
            throw new Exception('No existe el token.');
       }else{
	       $user = JWT::decode(trim($headers['X-Auth-Token']),$this->config->item('encryption_key'));
	       if($this->Api_model->chkUsuarioValido($user)){
	       	if ( time() > $user->exp ) throw new Exception('El token es inválido.');
	       		$this->Api_model->actualizarActividadUsuario($user);
				$user->iat = time();
				$user->exp = time() + 900;
				$jwt = JWT::encode($user, $this->config->item('encryption_key'));
				$response = array('user' => $user, 'token' => $jwt);
				return $response;
	       }else{
				throw new Exception('El token es inválido.');
	       }
       }
	}
	public function logout_get(){
		$this->Api_model->logout($this->tokenData['user']);
	}

	public function actualizarpswd_post(){
		$datos = $this->Api_model->actualizarUsuarioPass($this->tokenData['user'],$this->angularpostdata);
		if ($datos){
			$this->response('success');
		}else{
			$this->response('error',500);
		}
	}

	public function comunicados_get(){
		$datos = $this->Api_model->comunicados($this->tokenData['user']->idTienda);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function promociones_get(){
		$datos = $this->Api_model->promociones($this->tokenData['user']->idTienda);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function menuPromociones_get(){
		$datos = $this->Api_model->menuPromociones($this->tokenData['user']->idTienda);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function activaciones_get(){
		$datos = $this->Api_model->activacion($this->tokenData['user']->idTienda);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function notificaciones_get(){
		$datos = $this->Api_model->notificaciones($this->tokenData['user']->idTienda);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function banner_get(){
		$datos = $this->Api_model->banner($this->tokenData['user']->idTienda);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function contacto_get(){
		$datos = $this->Api_model->contacto();
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function resumenplanvendedor_get(){
		$idUsuario = $this->tokenData['user']->idUsuario;
		$datos = $this->Api_model->resumenPlanVendedor($idUsuario);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function incentivos_get(){
		$datos = $this->Api_model->incentivos($this->tokenData['user']->idTienda);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function incentivosContenido_get(){
		$datos = $this->Api_model->incentivosContenido($this->tokenData['user']);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}

	public function ventas_get(){
		$datos = $this->Api_model->ventas($this->tokenData['user']->idUsuario);
		$respuesta = array('token' => $this->tokenData['token'], 'data' => $datos);
		$this->response($respuesta);
	}


}
?>