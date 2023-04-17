<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Root extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('captcha','date','text_helper'));
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data); 
		@session_start();
		
	}
	
	public function index()
	{
		if($this->session->userdata('is_login'))
		{
			if($this->session->userdata('privilege') == 'admin view')
			{ 
				$loc = site_url('edata/index_data');
				header("Location:$loc");
			}else{
				$loc = site_url('admin');
				header("Location:$loc");
			}
		}
		else
		{
			
			$data['action']	= 'root/checking_login';
			 
			$this->load->view('login', $data);
		}
	}
	
	public function terms()
	{

			$data['halaman']	= 'Terms & Conditions';
			 
			$this->load->view('terms', $data);

	}
	
}

/* End of file login.php */
/* Location: ./application/modules/dashboard/controllers/login.php */