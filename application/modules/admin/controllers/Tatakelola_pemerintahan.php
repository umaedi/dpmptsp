<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tatakelola_pemerintahan extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Kondisi Tatakelola Pemerintahan';
		
		 
		$this->load->view('content/tatakelola_pemerintahan', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */