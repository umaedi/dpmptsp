<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Messages extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
			 
		$this->load->model('admin/m_messages');
    }
	
	public function list_in_get()
    {

		if(($this->get('page')) AND (is_numeric($this->get('id')))){ $page 		= $this->get('page'); $id = $this->get('id');} else { $page = 1; $id = 0;} ;
		$perpage	= 10;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		$messages 	= $this->m_messages->get_all($limit, $offset, $id, "in");
		$total		= $this->m_messages->count_all($id, "in");
		$pagecount	=  ceil($total/$perpage);
		
		
		$data['data'] = $messages;
		$data['_meta'] = array(
        
				'totalCount' => $total,
				
				'pageCount' => $pagecount,
				
                'currentPage' => $page,
				
				'perPage' => $perpage,
				
        );
		
        
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

	public function list_out_get()
    {

		if(($this->get('page')) AND (is_numeric($this->get('id')))){ $page 		= $this->get('page'); $id = $this->get('id');} else { $page = 1; $id = 0;} ;
		$perpage	= 10;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		$messages 	= $this->m_messages->get_all($limit, $offset, $id, "out");
		$total		= $this->m_messages->count_all($id, "out");
		$pagecount	=  ceil($total/$perpage);
		
		
		$data['data'] = $messages;
		$data['_meta'] = array(
        
				'totalCount' => $total,
				
				'pageCount' => $pagecount,
				
                'currentPage' => $page,
				
				'perPage' => $perpage,
				
        );
		
        
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

	
	public function view_get()
    {

		$id 		= $this->get('id');
		$users 		= $this->m_users->get_one($id);
		$data['data'] = $users;
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
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
	
	public function send_post($id =NULL)
    {
        	 
			$id = (int)$this->post('id', TRUE);
		
			$config = array(
						array(
							'field' => 'message',
							'label' => 'message',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'object',
							'label' => 'object',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'id',
							'label' => 'id',
							'rules' => 'trim'
							),				
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$data = array(
			
					'instansi_id' => strip_tags($this->post('id', TRUE)),
					
					'object' => strip_tags($this->post('object', TRUE)),
				
					'message' => strip_tags($this->post('message', TRUE)),
				);
				
			if($id)
			{ 
				$return = $this->m_messages->save($data); 
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
			
    }

    public function delete_get()
    {
        if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
		$id 		= (int)$this->get('id');

        // Validate the id.
        if (!$id)
        {
            // Set the response and exit
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{

        $return = $this->m_messages->destroy($id);
		if($return == true){
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
	
	public function drop_get()
    {
        if ($this->user_data->privilege == 'super admin'){
		$id = $this->get('id_instansi');
        $return = $this->m_messages->drop_messages($id);
		if($return == true){
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
		}else{
				$this->set_response([
							'status' => false,
							'message' => 'Unable To Access NON AUTHORITATIVE'
						], REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
			}
    
	}
}
