<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_data extends MY_Pmptsp {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Sistem Informasi Penilaian Pelayanan Publik';
		
		 
		$this->load->view('content/arsip_data', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */