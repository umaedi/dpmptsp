<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Pages extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
			
		$this->load->model('admin/m_pages');
    }
	
	public function list_get()
    {

		$draw 		= $this->get('draw');
		$offset		= $this->get('start'); if ($offset == ''){$offset = 0; };
		$limit		= $this->get('length'); if ($limit == ''){$limit = 25; };
		$search		= $this->get('search')['value']; if ($search == ''){$search = ''; };		
		$order		= $this->get('order')[0]['column']; 
		$sort 		= $this->get('order')[0]['dir']; if ($sort == ''){$sort = 'DESC'; };
		$columns	= $this->get('columns')[$order]['data'];  if ($columns == ''){$columns = 'id'; }elseif($columns == 'kategori'){$columns = 'kategori_id'; };
		
		$data 		= $this->m_pages->get_all($limit, $offset, $columns, $sort, $search);
		$total		= $this->m_pages->count_all($search);
		
		$result['draw']            = $draw ;
		$result['recordsTotal']    = $total;
		$result['recordsFiltered'] = $total;
		$result['data']            = $data;
        
		$this->response($result, REST_Controller::HTTP_OK);
			
       
	}
	public function view_get($id){

		$result['data'] 		= $this->m_pages->get_one($id);
		if (is_null($result['data'])) {
		   $message 	= 'Your request couldn`t be found';
		   return $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
		}

		return $this->response($result, REST_Controller::HTTP_OK);
       
	}
	

    public function create_post()
    {
        	if ($this->user_data->privilege == 'super admin'){
			
			$config = array(
						array(
							'field' => 'judul',
							'label' => 'judul',
							'rules' => 'trim|required'
							));
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$data = array(
					'judul' => $this->post('judul'),
					'slug' => url_title($this->post('slug')),
					'content' => $this->post('content'),
					'keyword' => $this->post('keyword'),
					'description' => $this->post('description'),
					'status' => $this->post('status'),
				);
			
			$return = $this->m_pages->save($data); 	
	
				 
				if($return == true){
					$message['data'] = [
							'status' => 'ok',
							'message' => 'Added a resource'
						];
						$this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
				}else{
					$message['data'] = [
							'status' => 'ok',
							'message' => 'Save failed'
						];	
						$this->response($message, REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
				}
			
			}else{
					$message['data'] = [
							'status' => 'ok',
							'message' => 'Required field',
						];
					$this->response($message, REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
			
			}
			}else{
				$message['data'] = [
							'status' => 'ok',
							'message' => 'Unable To Access NON AUTHORITATIVE',
						];
				$this->set_response($message, REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
			}
    }
	
	public function update_post($id =NULL)
    {
        	
			$check = $this->m_pages->get_one($id);
			if (empty($check)){$id = null;}else{$id = $id;};
			$config = array(
						array(
							'field' => 'judul',
							'label' => 'judul',
							'rules' => 'trim|required'
							),
			
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				if ($this->user_data->privilege == 'super admin'){ $privilege = strip_tags($this->post('privilege', TRUE)); }else{ $privilege = 'admin view';}
				$data = array(
					'judul' => $this->post('judul'),
					'slug' => url_title($this->post('slug')),
					'content' => $this->post('content'),
					'keyword' => $this->post('keyword'),
					'description' => $this->post('description'),
					'status' => $this->post('status'),
				);
				
				if(!$id)
				{ 
				 $this->response([
							'status' => FALSE,
							'message' => 'Update failed'
						], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
			}else{
				$return = $this->m_pages->update($id, $data); 
				if($return == true){
						$message['data'] = [
							'status' => 'ok',
							'message' => 'Update a resource'
						];
						$this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
				}else{
						$message['data'] = [
							'status' => FALSE,
							'message' => 'Update failed'
						];
						$this->response($message, REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
				}
				
			}
			}else{
					$message['data'] = [
							'status' => FALSE,
							'message' => 'Required field',
						];
					$this->response($message, REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
			
			}
			
    }

    public function delete_get($id)
    {
        if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
		 

			// Validate the id.
			if (!$id)
			{
				$message['data'] = null;
				$this->response($message, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}else{

				$return = $this->m_pages->destroy($id);
				$message['data'] = [
							'status' => 'ok',
							'message' => 'Success delete',
						];
				$this->set_response($message, REST_Controller::HTTP_OK); // NO_CONTENT (204) being the HTTP response code
				
			}
		}else{
				$message['data'] = [
							'status' => FALSE,
							'message' => 'Unable To Access NON AUTHORITATIVE',
						];
				$this->set_response($message, REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
			}
    }
	
	public function upload_post(){
		
       if ($_FILES['file']['name']) 
		{
			$this->load->library('upload');
			if (!$_FILES['file']['error']) {

                $filename = $_FILES['file']['name'];
                
				$config = array(
						'encrypt_name'  => TRUE,
                        'file_name'		=> $filename,
						'upload_path'   => realpath('assets/images/'),
						'allowed_types' => 'jpg|gif|png|jpeg|JPG|PNG',
						'max_size'      => '200000',
						"overwrite"	=> TRUE,
						);
						
						$this->upload->initialize($config);
						
						if (!$this->upload->do_upload('file'))
						{
							 
							 $message['data'] = [
								'status' => FALSE,
								'message' => $this->upload->display_errors()
							];
							$this->response($message, REST_Controller::HTTP_BAD_REQUEST);
							  
						}else
						{
							$message['data'] = [
								'status' => 'ok',
								'message' => 'Upload a resource',
								'image' => base_url('assets/images/'.$this->upload->data('file_name')),
							];
							$this->set_response($message, REST_Controller::HTTP_CREATED);
						}
						
                
            }
            else
            {
			 
				$message['data'] = [
								'status' => FALSE,
								'message' => $_FILES['file']['error']
							];
							$this->response($message, REST_Controller::HTTP_BAD_REQUEST);
            }
		}
	}
	
	public function unupload_post(){
		

        if($this->post("file")){
			
             @unlink(realpath('assets/images/'.$this->post("file")));
			 
				$message['data'] = [
							'status' => 'ok',
							'message' => 'Success delete',
						];
				$this->set_response($message, REST_Controller::HTTP_OK);			
        }
		else
		{
		 
			$message['data'] = [
							'status' => FALSE,
							'message' => $_FILES['file']['error']
						];
						$this->response($message, REST_Controller::HTTP_BAD_REQUEST);
		}
	
	}
	
}
