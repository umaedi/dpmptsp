<?php 

class MY_Bagsda extends CI_Controller {

// tambah dan isi id sesuai instansi	
public $instansi_id		= 43;

// update ganti 
public $data = array();
	function __construct() {

		parent::__construct();
        $logged_in  = $this->session->userdata('is_login');
		$lvl 		= $this->session->userdata('lvl');
		$privilege  = $this->session->userdata('privilege');
		 
		if((!$logged_in) OR ($lvl != $this->instansi_id) AND ($lvl != 1)){
			header("location: ".base_url(''));
		}
		$this->load->model('m_main');
		
		
		$data['instansi_id']    = $this->instansi_id; 
		$data['meta']      		= $this->m_main->meta();
		$data['instansi']      	= $this->m_main->get_one_instansi($this->instansi_id);
		$this->load->view('meta',$data);    
	}
//update ganti	
	
}
 