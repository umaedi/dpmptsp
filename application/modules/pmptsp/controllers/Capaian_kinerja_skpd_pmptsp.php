<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capaian_kinerja_skpd_pmptsp extends MY_Pmptsp {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Capaian Kinerja Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu';
		
		 
		$this->load->view('content/capaian_kinerja_skpd_pmptsp', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */