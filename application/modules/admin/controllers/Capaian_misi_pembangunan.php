<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capaian_misi_pembangunan extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Capaian Misi Pembangunan';
		
		 
		$this->load->view('content/capaian_misi_pembangunan', $data);
	}
	
	public function script()
	{
		$data 			= '<script>console.log("hai");</script>';
		
		 
		echo json_encode($data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */