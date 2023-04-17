<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Laju_pertumbuhan_riil extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Laju Pertumbuhan RIIL Menurut Lapangan Usaha Kabupaten Tulang Bawang';
		
		 
		$this->load->view('content/laju_pertumbuhan_riil', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */