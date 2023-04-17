<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmptsp extends MY_Pmptsp {

	function __construct()
	{
		parent::__construct();
		@session_start();
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Dashboard Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu';
		$this->load->model('m_main');
		// update ganti 
		//$data['complete']      = $this->m_main->complete($this->instansi_id); 
		//end update
		$data['alert'] 			= $this->session->flashdata('alert'); 
		$this->load->view('content/home', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */