<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angka_harapan_hidup extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Angka Harapan Hidup Kabupaten / Kota Provinsi Lampung';
		
		 
		$this->load->view('content/angka_harapan_hidup', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */