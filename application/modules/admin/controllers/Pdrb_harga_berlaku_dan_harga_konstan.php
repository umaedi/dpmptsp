<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdrb_harga_berlaku_dan_harga_konstan extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'PDRB Harga Berlaku dan Harga Konstan';
		
		 
		$this->load->view('content/pdrb_harga_berlaku_dan_harga_konstan', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */