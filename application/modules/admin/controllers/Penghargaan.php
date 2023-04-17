<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghargaan extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Penghargaan Kabupaten Tulang Bawang';
		
		 
		$this->load->view('content/penghargaan', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */