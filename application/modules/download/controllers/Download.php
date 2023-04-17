<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('captcha','date','text_helper'));
		$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data); 
		@session_start();
		
	}
	
	public function index()
	{
		
			$loc = site_url();
			
			header("Location:$loc");
		
	}
	
	public function data()
	{
		if($this->input->post())
		{
			 
			echo "<script>window.onload = window.print()</script>";
			 
			$data['judul']		= $this->input->post('judul')." ".$this->input->post('year');		
			$data['content']	= $this->input->post('content');
			$data['instansi']	= $this->input->post('instansi');
			$this->load->view('print', $data); 
		}
		else
		{
			$loc = site_url();
			
			header("Location:$loc");
		}
	}
	 
	
}

/* End of file login.php */
/* Location: ./application/modules/dashboard/controllers/login.php */