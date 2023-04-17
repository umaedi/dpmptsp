<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipm_kabupaten extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Indeks Pembangunan Manusia Kabupaten Tulang Bawang';
		
		 
		$this->load->view('content/ipm_kabupaten', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */