<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat_kemiskinan_kabupaten extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Tingkat Kemiskinan Kabupaten Tulang Bawang';
		
		 
		$this->load->view('content/tingkat_kemiskinan_kabupaten', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */