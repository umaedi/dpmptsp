<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paritas_daya_beli_kabupaten extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Paritas Daya Beli Kabupaten / Kota Provinsi Lampung';
		
		 
		$this->load->view('content/paritas_daya_beli_kabupaten', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */