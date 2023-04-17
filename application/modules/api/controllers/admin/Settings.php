<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Settings extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
		$this->load->library('upload');	 
		$this->load->model('admin/m_setting');
    }
	
	public function list_get()
    {


		$result 	= $this->m_setting->get_all();
		$total		= $this->m_setting->count_all();
		 
		
		
		$data['data'] = $result;
		
        
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
	
	public function save_post($id =NULL)
    {
        	 
			if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
			$id = (int)$this->post('id', TRUE);
		
			$config = array(
                    array(
                        'field' => 'judul',
                        'label' => 'Judul',
						'rules' => 'required',
						'errors' => array(
                        'required' => 'You must provide a Title', ),
                        ), 
                  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$name = $this->post('logo');
				 
				if (!empty($_FILES['userfile']['name']))
					{			 
						 
						@unlink("assets/images/web/".$name); 
						
						$files  = $_FILES['userfile']['name'];
						 
						$tmp = explode('.',$files);
						$ext = end($tmp);
						$nama = 'logo.'.$ext;
						
						 
						$config = array(
						'file_name'		=> $nama,
						'upload_path'   => realpath('assets/images/web/'),
						'allowed_types' => 'gif|jpg|png',
						'max_size'      => '1000',
						"overwrite"	=> TRUE,
						);
						
						$this->upload->initialize($config);
						
						if (! $this->upload->do_upload('userfile'))
						{
							 $name = '';
							  
						}else
						{ 
							$name = $nama;
						}
					}
					
				$data = array(
				
                'googlecode' => $this->post('googlecode'),
        
                'judul' => $this->post('judul'),
        
                'deskripsi' => $this->post('deskripsi'),
        
                'metatag' => $this->post('metatag'),
        
                'footer' => $this->post('footer'),
        
                'metadesc' => $this->post('metadesc'),
        
                'metakey' => $this->post('metakey'),
				
				'alamat' => $this->post('alamat'),
        
                'telp' => $this->post('telepon'),
        
                'email' => $this->post('email'),
				
				'fb' => $this->post('fb'),
				
				'twitter' => $this->post('twitter'),
				
				'linked' => $this->input->post('linked'),
				
                'logo' => $name,
				);
				
			if($id)
			{ 
				$return = $this->m_setting->update($id, $data); 
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
			}else{
				$this->set_response([
							'status' => false,
							'message' => 'Unable To Access NON AUTHORITATIVE'
						], REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
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

        $return = $this->m_setting->destroy($id);
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
        if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
		
        $return = $this->m_setting->drop_log();
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
