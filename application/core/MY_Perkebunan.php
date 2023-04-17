<?php 

class MY_Perkebunan extends CI_Controller {

public $data = array();
	function __construct() {

		parent::__construct();
        $logged_in  = $this->session->userdata('is_login');
		$lvl 		= $this->session->userdata('lvl');
		$privilege  = $this->session->userdata('privilege');
		 
		if((!$logged_in) OR ($lvl != 16) AND ($lvl != 1)){
			header("location: ".base_url('admin'));
		}
		$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data);    
	}

}
 