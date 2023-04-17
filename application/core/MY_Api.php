<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
require_once APPPATH . 'libraries/JWT.php';
require_once APPPATH . 'libraries/BeforeValidException.php';
require_once APPPATH . 'libraries/ExpiredException.php';
require_once APPPATH . 'libraries/SignatureInvalidException.php';

use \Firebase\JWT\JWT;
class MY_Api extends REST_Controller
{
	private $user_credential;
	function __construct()
    {
        parent::__construct();
		$this->load->model('M_main');
		
    }
	
  	public function auth()
    {
		try {
			$token = $this->session->userdata('token');
			$kunci = $this->config->item('thekey');
			$decoded = JWT::decode($token, $kunci, array('HS256'));
			if($decoded->iat > $decoded->exp){
						   $this->M_main->sess_destroy($token);
						   $message = ['status' => FALSE, 'message' => 'Expired token'];
						   $this->response($message, REST_Controller::HTTP_UNAUTHORIZED);
					   }
			$this->user_data = $decoded;
			
		} catch (Exception $e) {
            $invalid = ['status' => $e->getMessage()]; //Respon if credential invalid
			$this->M_main->sess_destroy($token);
            $this->response(null, REST_Controller::HTTP_UNAUTHORIZED);
        }
	}
}