<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdrb_perkapita extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'PDRB Perkapita Kabupaten Tulang Bawang';
		
		 
		$this->load->view('content/pdrb_perkapita', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */