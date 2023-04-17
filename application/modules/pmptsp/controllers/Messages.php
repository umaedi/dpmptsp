<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends MY_Pmptsp {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Messages';
		
		
		$this->load->view('content/messages', $data);
	}
	
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */