<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jumlah_pencari_kerja extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Jumlah Pencari Kerja Menurut Tingkat Pendidikan';
		
		 
		$this->load->view('content/jumlah_pencari_kerja', $data);
	}
	
	public function script()
	{
		$data 			= '<script>console.log("hai");</script>';
		
		 
		echo json_encode($data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */