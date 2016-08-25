<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	class Login extends CI_Controller {
 
		function __construct()
	 		{
	   			parent::__construct();
	   			$this->load->model('user');
	 		}
	 
		function index()
	 		{
	 			$this->load->helper(array('form'));
	 			if ($this->input->post() ){
	 				$this->_login();
	 			}else{
				   	$this->load->view('pages/login');
	 			}
	 		}

		function _login()
			 {
			   //This method will have the credentials validation
			   $this->load->library('form_validation');

			   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

			   if($this->form_validation->run() == FALSE)
			   {
			     //Field validation failed.  User redirected to login page
			     $this->load->view('pages/login');
			   }
			   else
			   {
			     //Go to private area
			     redirect('dashboard', 'refresh');
			   }

			 }

		function check_database($password = null)
			 {
			 	if (!$password) return false;
			   //Field validation succeeded.  Validate against database
			   $username = $this->input->post('username');

			   //query the database
			   $result = $this->user->login($username, $password);

			   if($result)
			   {
			     $sess_array = array();
			     foreach($result as $row)
			     {
			       $sess_array = array(
			          'idUsuario' => $row->idUsuario,
			          'Usuario' => $row->Usuario,
			          'idTienda' => $row->idTienda,
			          'idRol' => $row->idRol,
			          'logged_in' => true
			       );
			       $this->session->set_userdata($sess_array);
			       $this->user->udpdateLogin();
			     }
			     return TRUE;
			   }
			   else
			   {
			     $this->form_validation->set_message('check_database', 'Usuario o contraseña incorrecta');
			     return false;
			   }
			 }
		
		function logout(){
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('login', 'refresh');
		}
 
}
 
?>