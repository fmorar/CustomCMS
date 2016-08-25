<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( PHP_SAPI !== 'cli' ) exit('No web access allowed');
set_time_limit(0);

class Cron extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model('Pages_model');
    }

	public function index(){

		$this->db->where('Comunicado');
		$this->db->update('Comunicado');
	}
	
	}
?>