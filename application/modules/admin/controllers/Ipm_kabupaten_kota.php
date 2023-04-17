<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipm_kabupaten_kota extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Indeks Pembangunan Manusia Kabupaten / Kota Provinsi Lampung';
		
		 
		$this->load->view('content/ipm_kabupaten_kota', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */