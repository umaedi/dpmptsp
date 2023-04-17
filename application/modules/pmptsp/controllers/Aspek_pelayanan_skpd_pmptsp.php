<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspek_pelayanan_skpd_pmptsp extends MY_Pmptsp {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Aspek Pelayanan Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu';
		
		 
		$this->load->view('content/aspek_pelayanan_skpd_pmptsp', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */