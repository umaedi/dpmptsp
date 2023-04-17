<?php 

class MY_Edata extends CI_Controller {
	
public $data = array();
	function __construct() {

		parent::__construct();
        $logged_in = $this->session->userdata('is_login');
		

        if(!$logged_in){
			
            header("location: ".base_url());
		
	}
	
	$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data); 
	}
	
	public function Get_index(){
	$data = base_url();

		return $data;
	}
	

}
 