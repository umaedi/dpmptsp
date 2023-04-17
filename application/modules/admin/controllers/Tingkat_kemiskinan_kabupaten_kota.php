<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat_kemiskinan_kabupaten_kota extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Tingkat Kemiskinan Kabupaten / Kota Provinsi Lampung';
		
		 
		$this->load->view('content/tingkat_kemiskinan_kabupaten_kota', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */