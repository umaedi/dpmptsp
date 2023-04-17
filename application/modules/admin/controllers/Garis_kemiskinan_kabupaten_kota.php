<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garis_kemiskinan_kabupaten_kota extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Garis Kemiskinan Kabupaten / Kota Provinsi Lampung';
		
		 
		$this->load->view('content/garis_kemiskinan_kabupaten_kota', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */