<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		@session_start();
	}
	
	public function index()
	{
		$this->load->model('m_main');
		$data['halaman'] 			= 'Dashboard Admin';
		//$data['complete']      = $this->m_main->complete(1);
		$data['alert'] 			= $this->session->flashdata('alert'); 
		$this->load->view('content/home', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */