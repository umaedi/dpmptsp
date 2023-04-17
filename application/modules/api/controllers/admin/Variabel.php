<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Variabel extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
         
		$this->load->model('admin/m_variabel');
    }
	
	public function kecamatan_get()
    {
		
		$get 		= $this->m_variabel->get_kecamatan();
		$total		= $this->m_variabel->count_kecamatan();
		$result		= $get;
		
		$data['data'] 	= $result;
		
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($data)
            {
                // Set the response and exit
                $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
       
	}
	
	public function bagian_get()
    {
		
		$get 		= $this->m_variabel->get_bagian();
		$total		= $this->m_variabel->count_bagian();
		$result		= $get;
		
		$data['data'] 	= $result;
		
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($data)
            {
                // Set the response and exit
                $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
       
	}

}
