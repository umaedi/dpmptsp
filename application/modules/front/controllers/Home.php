<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Public {

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
		
		 
			$data['halaman'] = 'Portal Data';
			$data['info']      = $this->m_main->get_one_pages('mini-info');
			$this->load->view('contents/home', $data);
	 
		
	}
	 
}

/* End of file login.php */
/* Location: ./application/modules/dashboard/controllers/login.php */