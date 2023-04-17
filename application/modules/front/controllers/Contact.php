<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Public {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data); 
		@session_start();
		
	}
	
	public function index()
	{
		
		 
			$data['halaman'] = 'Kontak Kami';
			
			$this->load->view('contents/contact', $data);
	 
		
	}
	
}

/* End of file login.php */
/* Location: ./application/modules/dashboard/controllers/login.php */