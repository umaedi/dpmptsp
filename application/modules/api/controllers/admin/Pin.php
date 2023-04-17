<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Pin extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->auth();
			
		$this->load->model('m_main');
    }
	
	public function pinthis_get()
    {
		if((is_numeric($this->get('instansi_id'))) AND ($this->get('param'))){ 
		$instansi_id 	= $this->get('instansi_id'); 
		$param 			= $this->get('param'); 
		} else { 
		$instansi_id 	= null;
		$param 			= null;		
		} ;
		if($this->get('sub')){
			$sub = $this->get('sub');
		}else{
			$sub = "";
		}
		$pin = array(
        
				'instansi_id' => $instansi_id,
				
				'sub' => $sub,
				
				'param' => $param,
				
                'path' => $this->get('path'),
				
                'title' => $this->get('title'),
				
        );
		
		$return 		= $this->m_main->pin_this($pin);

		if($return['status'] == true){
					
				$this->set_response([
							'status' => 'ok',
							'message' => $return['message']
						], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
				}else{
						
						$this->response([
							'status' => FALSE,
							'message' => $pin
						], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
				}
       
	}
	
	public function pinPublicThis_get()
    {
		if((is_numeric($this->get('instansi_id'))) AND ($this->get('param'))){ 
		$instansi_id 	= $this->get('instansi_id'); 
		$param 			= $this->get('param'); 
		} else { 
		$instansi_id 	= null;
		$param 			= null;		
		} ;
		 
		$pin = array(
        
				'instansi_id' => $instansi_id,
				
				'param' => $param,
				
                'path' => $this->get('path'),
				
        );
		
		$return 		= $this->m_main->pinPublic_this($pin);

		if($return['status'] == true){
					
				$this->set_response([
							'status' => 'ok',
							'message' => $return['message']
						], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
				}else{
						
						$this->response([
							'status' => FALSE,
							'message' => $pin
						], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
				}
       
	}
	
	
	
}
