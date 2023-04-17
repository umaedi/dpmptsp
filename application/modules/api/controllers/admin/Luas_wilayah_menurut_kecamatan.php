<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Luas_wilayah_menurut_kecamatan extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
         
		$this->load->model('admin/m_luas_wilayah_menurut_kecamatan');
		$this->load->model('m_main');
    }
	
	public function list_get()
    {
			if($this->get('page')){ $page 		= $this->get('page'); } else { $page = 1; } ;
		$perpage	= 20;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		$users 		= $this->m_luas_wilayah_menurut_kecamatan->get_all($limit, $offset);
		$total		= $this->m_luas_wilayah_menurut_kecamatan->count_all();
		$pagecount	=  ceil($total/$perpage);
		$data['data'] = $users;
		$data['_meta'] = array(
        
				'pinStatus' => $this->m_main->pinStatus($this->uri->segment(3)),
				
				'pinPublicStatus' => $this->m_main->pinPublicStatus($this->uri->segment(3)),
				
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
		$users 		= $this->m_luas_wilayah_menurut_kecamatan->get_one($id);
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
			
			$this->auth();
			if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
				
			$id = (int)$this->post('id', TRUE);
			$check = $this->m_luas_wilayah_menurut_kecamatan->get_one($id);
			if (empty($check)){$id = null;}else{$id = $id;};
			$config = array(
						array(
							'field' => 'kecamatan',
							'label' => 'kecamatan',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'ibukota',
							'label' => 'ibukota',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'jumlah_kampung',
							'label' => 'jumlah_kampung',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'km2',
							'label' => 'km2',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'persentase',
							'label' => 'persentase',
							'rules' => 'trim|required'
							), 					
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$data = array(
			
					'kecamatan' => strip_tags($this->post('kecamatan', TRUE)),
				
					'ibukota' => strip_tags($this->post('ibukota', TRUE)),
					
					'jumlah_kampung' => strip_tags($this->post('jumlah_kampung', TRUE)),
				
					'km2' => strip_tags($this->post('km2', TRUE)),
					
					'persentase' => strip_tags($this->post('persentase', TRUE)),
					
				);
				
				if(!$id)
				{ 
				$return = $this->m_luas_wilayah_menurut_kecamatan->save($data); 
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
				$return = $this->m_luas_wilayah_menurut_kecamatan->update($id, $data); 
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

    public function delete_get()
    {
        $this->auth();
			if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
		$id 		= (int)$this->get('id');

        // Validate the id.
        if (!$id)
        {
            // Set the response and exit
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{

        $return = $this->m_luas_wilayah_menurut_kecamatan->destroy($id);
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
	
}
