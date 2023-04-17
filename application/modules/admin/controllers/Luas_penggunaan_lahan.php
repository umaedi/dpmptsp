<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Luas_penggunaan_lahan extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Luas Penggunaan Lahan';
		
		 
		$this->load->view('content/luas_penggunaan_lahan', $data);
	}
	
	public function script()
	{
		$data 			= '<script>console.log("hai");</script>';
		
		 
		echo json_encode($data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */