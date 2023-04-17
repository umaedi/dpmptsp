<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';

require_once APPPATH . 'libraries/JWT.php';
require_once APPPATH . 'libraries/BeforeValidException.php';
require_once APPPATH . 'libraries/ExpiredException.php';
require_once APPPATH . 'libraries/SignatureInvalidException.php';
use \Firebase\JWT\JWT;

class Auth extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('m_main');
		@session_start();
		 
    }

    

    public function login_post()
    {
       
		$username = $this->post('username'); //Username Posted
        $password = $this->post('password'); //Pasword Posted
        
        $kunci = $this->config->item('thekey');
        $invalid = ['status' => 'Invalid username and password']; //Respon if login invalid
        $empty = ['status' => 'Empty username and password']; //Respon if login invalid
        $val = $this->m_main->get_user($username, $password); //Model to get single data row from database base on username
		
        if($val['is_login'] == false){
			$this->response($invalid, REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
		}
		elseif($val['is_login'] == true){  //Condition if password matched
		
			
        	$token['id'] 		= $val['id'];  //From here
        	$token['lvl'] 		= $val['lvl'];  //From here
        	$token['privilege'] = $val['privilege'];  //From here
            $token['username'] 	= $username;
            $date 				= new DateTime();
            $token['iat'] 		= $date->getTimestamp();
            $token['exp'] 		= strtotime('+120 minutes'); //To here is to generate token
            $output['token'] 	= JWT::encode($token,$kunci); //This is the output token
			$exp 				= $token['exp'];
			$data 				= $this->m_main->sess_user($token['id'], $output['token']);
            $this->set_response($data, REST_Controller::HTTP_OK); //This is the respon if success
        }
        else {
            $this->set_response($empty, REST_Controller::HTTP_NOT_FOUND); //This is the respon if failed
        }
    }
	
	public function signout_get()
    {
		if($this->session->userdata('is_login'))
		{
				$token = $this->session->userdata('token');
				$this->m_main->sess_destroy($token);
				$this->session->sess_destroy();
				$this->set_response(['message' => 'success signout'], REST_Controller::HTTP_OK);
		}
		else{
				$this->set_response(null, REST_Controller::HTTP_NOT_FOUND);
		
        }			 
	}

}
