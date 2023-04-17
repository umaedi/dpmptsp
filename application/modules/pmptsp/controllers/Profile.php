<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Pmptsp {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'My Profile';
		
		
		$this->load->view('content/profile', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */