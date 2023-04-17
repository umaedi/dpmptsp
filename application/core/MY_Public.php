<?php 

class MY_Public extends CI_Controller {
	
public $data = array();
	function __construct() {

		parent::__construct();
		$this->load->model('m_main');
		$this->visitor();
		$this->load->library('user_agent');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data); 
	}
	
	public function visitor(){
	
	$data['ip']   = $this->input->ip_address(); 
	$data['date'] = date("Y-m-d"); 
	$data['waktu'] = time(); 
	$data['timeinsert']  = date("Y-m-d H:i:s");
	
	$this->m_main->visitor($data);
	
	}
	

}
 