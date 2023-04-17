<?php 

class MY_Admin extends CI_Controller {

public $data = array();
	function __construct() {

		parent::__construct();
		
        $logged_in  = $this->session->userdata('is_login');
		$lvl 		= $this->session->userdata('lvl');
		$privilege  = $this->session->userdata('privilege');
				
		if((!$logged_in) OR ($lvl != 1)){
			$this->redirect($lvl);
		}
		$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		
		
		$this->load->view('meta',$data);   
	}
	
	private function redirect($lvl){
		
		switch ($lvl) {
			case 1:
				$home = "admin";
				break;
			
			case 19:
				$home = "pmptsp";
				break;
			
		}
		
		header("location: ".base_url($home));
	}
	
	
}
 