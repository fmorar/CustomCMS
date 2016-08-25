<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
class Auth extends REST_Controller
{

    function __construct()
    {
        // Construct the parent class

        parent::__construct();
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	    header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, auth-token, x-requested-with, X-PINGOTHER");
	    header("Access-Control-Max-Age: 1728000");
        header('Access-Control-Allow-Origin: *');
        if ($this->input->method(TRUE) == 'OPTIONS') die();
        $this->load->model('Api_model');
        $this->load->helper('jwt_helper');
        $this->Api_model->destroyUserSession();
    }
	public function login_post(){
		
		if (!$this->angularpostdata){
			$this->response(false);
			return false;
		}

		$user = $this->Api_model->validarUsuario($this->angularpostdata);
		if($user){
			if ($user == 'islogged'){
				$response =  'La sesión se encuentra activa, por favor espere 15 minutos y vuelva a intentarlo';
				$status = 401;
			}else{
				$this->Api_model->insertarPushToken($user,$this->angularpostdata);
				$user->iat = time();
				$user->exp = time()+900;
				$jwt = JWT::encode($user, $this->config->item('encryption_key'));
				$response = array('token' => $jwt);
				$status = 200;
			}
		}else{
			$response = 'Usuario no válido';
			$status = 401;
		}
		$this->response($response,$status);
	}
}
?>