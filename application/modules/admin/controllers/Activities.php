<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Users Activities';
		
		
		$this->load->view('content/activities', $data);
	}
	
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */