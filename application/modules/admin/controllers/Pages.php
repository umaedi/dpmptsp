<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		@session_start();
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Pages';
		 
		$data['alert'] 			= $this->session->flashdata('alert'); 
		$this->load->view('content/pages/pages', $data);
	}
	
	public function add()
	{
		$data['halaman'] 			= 'Add Pages';
		 
		$data['alert'] 			= $this->session->flashdata('alert'); 
		$this->load->view('content/pages/add', $data);
	}
	
	public function update()
	{
		$data['halaman'] 			= 'Update Pages';
		 
		$data['alert'] 			= $this->session->flashdata('alert'); 
		$this->load->view('content/pages/add', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */