<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Lists extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
       
		//$this->load->model('report/m_list');
		$this->load->model('m_main');
    }
	
	public function index_get()
    {
		$keyword = $this->get("keyword");
		if($keyword){
		switch($keyword){
				case "kependudukan":
					$keyword	  = "penduduk";
					$data['data'] = $this->search($keyword);
					break;
				
				case "infrastruktur":
					$data['data'] = $this->infrastruktur();
					break;
					
				default:
					$data['data'] = $this->search($keyword);
					break;
				}
      
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
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }
		}else{
			$data['data'] = $this->search($keyword);
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}
	
	public function search($keyword)
	{
		if($this->input->get('page')){ $page = $this->input->get('page'); } else { $page = 1; } ;
		$perpage	= 200;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		 
		$result  = $this->m_main->get_frontByInstansi($keyword, $limit, $offset);
		 
		return $result;
	}
	
	
	private function kesehatan(){
		$item[] 	= $this->m_main->find_index('data_sektoral_skpd_pendidikan?jenis=sarana-dan-prasarana-seni-dan-budaya');
		
		$result[] = array(
							"instansi"	=> "Gabungan",
							"instansi_icon"	=> base_url('assets/images/app/icon_instansi2.png'),
							"instansi_id"	=> null,
							"item" 		=>$item
							);

		return $result;
	}
	
	private function kependudukan(){
		$result[] 	= $this->m_main->find_index('data_sektoral_skpd_pendidikan?jenis=sarana-dan-prasarana-seni-dan-budaya');
	 

		return $result;
	}	
	
	private function infrastruktur(){
		$result[] 	= $this->m_main->find_index('data_sektoral_skpd_pendidikan?jenis=sarana-dan-prasarana-seni-dan-budaya');
	 

		return $result;
	}
	
	public function counter_get(){
		$result['dataset'] 		= $this->m_main->count_all_table();
		$result['available'] 	= $this->m_main->count_all_available_table();
		$result['instansi'] 	= $this->m_main->count_all_instansi();
		$result['users'] 		= $this->m_main->count_all_user();
	 
		$this->response($result, REST_Controller::HTTP_OK);
	}
	
}
