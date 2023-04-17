<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perkembangan_apbd extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Perkembangan APBD Kabupaten Tulang Bawang';
		
		 
		$this->load->view('content/perkembangan_apbd', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */