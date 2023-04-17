<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perkembangan_data_makro_provinsi extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Perkembangan Data Makro Ekonomi Provinsi';
		
		 
		$this->load->view('content/perkembangan_data_makro_provinsi', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */