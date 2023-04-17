<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Luas_wilayah_menurut_kecamatan extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Luas Wilayah Menurut Kecamatan';
		
		 
		$this->load->view('content/luas_wilayah_menurut_kecamatan', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */