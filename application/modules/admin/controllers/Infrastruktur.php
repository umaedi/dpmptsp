<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infrastruktur extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Kondisi Infrastruktur Kabupaten Tulang Bawang';
		
		 
		$this->load->view('content/infrastruktur', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */