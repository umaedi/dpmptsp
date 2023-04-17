<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peranan_pdrb_menurut_lapangan_usaha extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Peran PDRB Menurut Lapangan Usaha';
		
		 
		$this->load->view('content/peranan_pdrb_menurut_lapangan_usaha', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */