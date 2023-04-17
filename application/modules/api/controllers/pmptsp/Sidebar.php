<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Sidebar extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
       
		$this->load->model('pmptsp/m_sidebar');
		$this->load->model('m_main');
    }
	
	public function list_get()
    {


		$result 	= $this->m_sidebar->get_all();
		$item		= array();
		foreach ($result as $items){
					$item[] = array(
									"kategori" 				=> $items['kategori'],
									"judul" 				=> $this->m_sidebar->get_judul_all($items['kategori']),
								);
				
				}
				
		$data['data'] = $item;

        
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
       
	}
	
	public function save_post($id =NULL)
    {
        	$this->auth();
			if ((($this->user_data->lvl == 19) OR ($this->user_data->lvl == 1)) AND ($this->user_data->privilege == 'super admin')){
			$id = (int)$this->post('id', TRUE);
			$check = $this->m_sidebar->get_one($id);
			if (empty($check)){$id = null;}else{$id = $id;};
			$config = array(
						array(
							'field' => 'kategori',
							'label' => 'kategori',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'judul',
							'label' => 'judul',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'uraian',
							'label' => 'uraian',
							'rules' => 'trim|required'
						 )							
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$kategori = str_replace(array(':', '-', '.', '*'), '', strip_tags($this->post('kategori', TRUE)));
				$judul = str_replace(array(':', '-', '.', '*'), '', strip_tags($this->post('judul', TRUE)));
				$data = array(
			
					'kategori' => $kategori,
					
					'judul' => $judul,
					
					'uraian' => $this->post('uraian', TRUE),
				
					'tahun' => date('Y'),
					
				);
				
			if(!$id)
			{ 
				$return = $this->m_sidebar->save($data); 
				if($return == true){
					
						$this->set_response([
							'status' => 'ok',
							'message' => 'Added a resource'
						], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
				}else{
						
						$this->response([
							'status' => FALSE,
							'message' => 'Save failed'
						], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
				}
			}else{
				$kategori = str_replace(array(':', '-', '.', '*'), '', strip_tags($this->post('kategori', TRUE)));
				$judul = str_replace(array(':', '-', '.', '*'), '', strip_tags($this->post('judul', TRUE)));
				$data = array(
			
					'kategori' => $kategori,
					
					'judul' => $judul,
					
					'uraian' => $this->post('uraian', TRUE),
					
				);
				$key['kategori'] = $check['kategori'];
				$key['judul'] = $check['judul'];
				$return = $this->m_sidebar->update($key, $data); 
				if($return == true){
					
						$this->set_response([
							'status' => 'ok',
							'message' => 'Update a resource'
						], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
				}else{
						
						$this->response([
							'status' => FALSE,
							'message' => 'Update failed'
						], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
				}
				
			}
			}else{
					$this->response([
						'status' => FALSE,
						'message' => 'Required field',
						'items' => $this->form_validation->error_array()
					], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
			
			}
			}else{
				$this->set_response([
							'status' => false,
							'message' => 'Unable To Access NON AUTHORITATIVE'
						], REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
			}
    }
	
	// update tambah lvl sesuai instansi
	public function drop_all_get()
    {
        $this->auth();
		if ((($this->user_data->lvl == 19) OR ($this->user_data->lvl == 1)) AND ($this->user_data->privilege == 'super admin')){
		$id 		= (int)$this->get('id');

       
        if (!$id)
        {
           
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{

         
		if($this->m_sidebar->destroy_all($id) == true){
        $this->set_response([
							'status' => 'ok',
							'message' => 'Success delete'
						], REST_Controller::HTTP_CREATED); // NO_CONTENT (204) being the HTTP response code
		}else{
		$this->response([
						'status' => FALSE,
						'message' => 'Required id'	
					], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code	
		}
		}
		}else{
				$this->set_response([
							'status' => false,
							'message' => 'Unable To Access NON AUTHORITATIVE'
						], REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
			}
    }
	
	public function update_aspek_post($id =NULL)
    {
        $this->auth();
		if ((($this->user_data->lvl == 19) OR ($this->user_data->lvl == 1)) AND ($this->user_data->privilege == 'super admin')){
	
			$config = array(
						array(
							'field' => 'old_aspek',
							'label' => 'old_aspek',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'aspek',
							'label' => 'aspek',
							'rules' => 'trim|required'
							)		
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$aspek = str_replace(array(':', '-', '.', '*'), '', strip_tags($this->post('aspek', TRUE)));
				$data = array(
			
					'kategori' => $aspek
					
				);
				
				if($this->post('old_aspek', TRUE))
				{ 
				 
					if($this->m_sidebar->update_kategori($data, $this->post('old_aspek', TRUE)) == true){
						
							$this->set_response([
								'status' => 'ok',
								'message' => 'Added a resource'
							], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
					}else{
							
							$this->response([
								'status' => FALSE,
								'message' => 'Save failed'
							], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
					}
				}else{

							
							$this->response([
								'status' => FALSE,
								'message' => 'Update failed'
							], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
					
					
				}
			}else{
					$this->response([
						'status' => FALSE,
						'message' => 'Required field',
						'items' => $this->form_validation->error_array()
					], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
			
			}
		}else{
			$this->set_response([
						'status' => false,
						'message' => 'Unable To Access NON AUTHORITATIVE'
					], REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
		}
    }
	// end update
}
