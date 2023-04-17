<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jumlah_penduduk_menurut_jenis_kegiatan extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Jumlah Penduduk Menurut Jenis Kegiatan';
		
		 
		$this->load->view('content/jumlah_penduduk_menurut_jenis_kegiatan', $data);
	}
	
	public function script()
	{
		$data 			= '<script>console.log("hai");</script>';
		
		 
		echo json_encode($data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */