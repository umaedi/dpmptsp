<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		@session_start();
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Global Setting';
		 
		$data['alert'] 			= $this->session->flashdata('alert'); 
		$this->load->view('content/setting', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */