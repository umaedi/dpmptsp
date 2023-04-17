<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Users extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
			
		$this->load->model('admin/m_users');
    }
	
	public function list_get()
    {

		if($this->get('page')){ $page 		= $this->get('page'); } else { $page = 1; } ;
		$perpage	= 200;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		$instansi 	= $this->m_users->get_instansi();
		$total		=	$this->m_users->count_all();
		$pagecount	=  ceil($total/$perpage);
		$item		= [];
		foreach ($instansi as $items){
					$get 	= $this->m_users->get_all($limit, $offset, $items['id']);
					$series		= [];
					foreach ($get as $itemd){
					$series[] = array(
									"id" 			=> $itemd['id'],
									"nama" 		=> $itemd['nama'],
									"alamat" 	=> $itemd['alamat'],
									"email" 	=> $itemd['email'],
									"status" 	=> $itemd['status'],
									"lvl" 		=> $itemd['privilege'],
									"telp" 		=> $itemd['telp'],
								);
					}
					$item[] = array(
									"id" 		=> $items['id'],
									"instansi" 	=> $items['instansi'],
									"data" 		=> $series,
								);
				
				}
		
		
		$data['data'] = $item;
		$data['_attr'] = array(
        
				'online' =>  $this->m_users->get_status(1),
				
				'offline' =>  $this->m_users->get_status(0),
				
        );
		$data['_meta'] = array(
        
				'totalCount' => $total,
				
				'pageCount' => $pagecount,
				
                'currentPage' => $page,
				
				'perPage' => $perpage,
				
        );
		
        
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($item)
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
	
	public function list_instansi_get()
    {


		$item 	= $this->m_users->get_instansi();
		$data['data'] = $item;
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($item)
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
	
	public function check_email_get()
    {
	if ($this->user_data->privilege == 'super admin'){
		$email 		= $this->get('email');
		$item 		= $this->m_users->check_email($email);
		$data['data'] = $item;
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($item)
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
			}else{
				$this->set_response([
							'status' => false,
							'message' => 'Unable To Access NON AUTHORITATIVE'
						], REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
			}
	}
	
	public function log_get()
    {

		if(is_numeric($this->get('page'))){ $page 		= $this->get('page'); } else { $page = 1; } ;
		if(is_numeric($this->get('id'))){ $id 		= $this->get('id'); } else { $id = null; } ;
		$perpage	= 10;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		$item 		= $this->m_users->get_log($limit, $offset, $id);
		$total		= $this->m_users->count_log($id);
		$pagecount	=  ceil($total/$perpage);

		$data['data'] = $item;
		$data['_meta'] = array(
        
				'totalCount' => $total,
				
				'pageCount' => $pagecount,
				
                'currentPage' => $page,
				
				'perPage' => $perpage,
				
        );
		
        
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($item)
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
			$check = $this->m_users->get_one($id);
			if (empty($check)){$id = null; $rule_username = 'trim|required|is_unique[users.username]'; }else{$id = $id; $rule_username = 'trim|required'; };
			$config = array(
						array(
							'field' => 'message',
							'label' => 'message',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'user_id',
							'label' => 'user id',
							'rules' => 'trim'
							),				
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$data = array(
			
					'user_id' => strip_tags($this->post('user_id', TRUE)),
				
					'message' => strip_tags($this->post('message', TRUE)),
				);
				
			if(!$id)
			{ 
				$return = $this->m_users->save($data); 
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

    public function save_post($id =NULL)
    {
        	if ($this->user_data->privilege == 'super admin'){
			$id = (int)$this->post('id', TRUE);
			$check = $this->m_users->get_one($id);
			if (empty($check)){$id = null; $rule_username = 'trim|required|is_unique[users.username]'; }else{$id = $id; $rule_username = 'trim|required'; };
			$config = array(
						array(
							'field' => 'nama',
							'label' => 'nama',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'alamat',
							'label' => 'alamat',
							'rules' => 'trim'
							),
						array(
							'field' => 'telp',
							'label' => 'telp',
							'rules' => 'trim'
							),
						array(
							'field' => 'email',
							'label' => 'email',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'username',
							'label' => 'username',
							'rules' => $rule_username
							),
						array(
							'field' => 'type',
							'label' => 'instansi id',
							'rules' => 'trim|required'
							), 
						array(
							'field' => 'password',
							'label' => 'password',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'privilege',
							'label' => 'privilege',
							'rules' => 'trim|required'
							),							
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$data = array(
			
					'nama' => strip_tags($this->post('nama', TRUE)),
				
					'alamat' => strip_tags($this->post('alamat', TRUE)),
				
					'email' => strip_tags($this->post('email', TRUE)),
				
					'telp' => strip_tags($this->post('telp', TRUE)),
					
					'instansi_id' => strip_tags($this->post('type', TRUE)),
					
					'privilege' => strip_tags($this->post('privilege', TRUE)),
				
					'username' => strip_tags($this->post('username', TRUE)),
				
					'password' => strip_tags($this->post('password', TRUE)),
					
				);
				
			if(!$id)
			{ 
				$return = $this->m_users->save($data); 
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
				$return = $this->m_users->update($id, $data); 
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
	
	public function update_post($id =NULL)
    {
        	
			$id = (int)$this->post('id', TRUE);
			$check = $this->m_users->get_one($id);
			if (empty($check)){$id = null;}else{$id = $id;};
			$config = array(
						array(
							'field' => 'nama',
							'label' => 'nama',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'email',
							'label' => 'email',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'username',
							'label' => 'username',
							'rules' => 'trim|required'
							), 
						array(
							'field' => 'password',
							'label' => 'password',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'privilege',
							'label' => 'privilege',
							'rules' => 'trim|required'
							),							
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				if ($this->user_data->privilege == 'super admin'){ $privilege = strip_tags($this->post('privilege', TRUE)); }else{ $privilege = 'admin view';}
				$data = array(
			
					'token' =>'',
					
					'status' =>'0',
					
					'nama' => strip_tags($this->post('nama', TRUE)),
				
					'alamat' => strip_tags($this->post('alamat', TRUE)),
				
					'telp' => strip_tags($this->post('telp', TRUE)),
					
					'privilege' => $privilege,
				
					'username' => strip_tags($this->post('username', TRUE)),
				
					'password' => strip_tags($this->post('password', TRUE)),
					
				);
				
				if(!$id)
				{ 
				 $this->response([
							'status' => FALSE,
							'message' => 'Update failed'
						], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
			}else{
				$return = $this->m_users->update($id, $data); 
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

        $return = $this->m_users->destroy($id);
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
	
	public function drop_log_get()
    {
        if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
		
        $return = $this->m_users->drop_log();
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
