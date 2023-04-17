<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketenagakerjaan extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Ketenagakerjaan Kabupaten Tulang Bawang';
		
		 
		$this->load->view('content/ketenagakerjaan', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */