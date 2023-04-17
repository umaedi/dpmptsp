<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rata_rata_lama_sekolah extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Rata-Rata Lama Sekolah Kabupaten / Kota Provinsi Lampung';
		
		 
		$this->load->view('content/rata_rata_lama_sekolah', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */