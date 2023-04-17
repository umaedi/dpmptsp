<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdrb_atas_dasar_harga_berlaku extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'PDRB Atas Dasar Harga Berlaku';
		
		 
		$this->load->view('content/pdrb_atas_dasar_harga_berlaku', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */