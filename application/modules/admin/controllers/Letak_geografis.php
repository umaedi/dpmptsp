<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letak_geografis extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Letak Geografis';
		
		 
		$this->load->view('content/letak_geografis', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */