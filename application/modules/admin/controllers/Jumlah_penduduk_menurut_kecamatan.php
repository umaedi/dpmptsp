<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jumlah_penduduk_menurut_kecamatan extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Jumlah Penduduk Menurut Kecamatan';
		
		 
		$this->load->view('content/jumlah_penduduk_menurut_kecamatan', $data);
	}
	
	public function script()
	{
		$data 			= '<script>console.log("hai");</script>';
		
		 
		echo json_encode($data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */