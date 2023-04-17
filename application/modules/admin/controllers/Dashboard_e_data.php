<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_e_data extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		@session_start();
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Dashboard E Data';
		 
		$data['alert'] 			= $this->session->flashdata('alert'); 
		$this->load->view('content/dashboard_e_data', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */