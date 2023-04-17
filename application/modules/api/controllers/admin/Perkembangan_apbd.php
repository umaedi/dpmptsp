<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Perkembangan_apbd extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
         
		$this->load->model('admin/m_perkembangan_apbd');
		$this->load->model('m_main');
    }
	
	public function list_get()
    {

		$year 		= $this->get('year');
		$end 		= (int)$year - 2;
		if($this->get('page')){ $page = $this->get('page'); } else { $page = 1; } ;
		$perpage	= 100;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		$result 	= $this->m_perkembangan_apbd->get_type();
		$total		= $this->m_perkembangan_apbd->count_all();
		$pagecount	= ceil($total/$perpage);
		$item		=  array();
		
		foreach ($result as $items){
					$get 	= $this->m_perkembangan_apbd->get_all($limit, $offset, $items['id']);
					$series		= [];
					foreach ($get as $itemd){
					$series[] = array(
									"id" 		=> $itemd['id'],
									"uraian" 	=> $itemd['uraian'],
									"type" 		=> $itemd['type'],
									"year" 		=> $this->m_perkembangan_apbd->get_items($year, $end, $itemd['uraian'], $items['id']),
								);
					}
					$item[] = array(
									"id" 		=> $items['id'],
									"type" 		=> $items['type'],
									"data" 		=> $series,
									"value" 	=> $this->m_perkembangan_apbd->get_sum($year, $end, $items['id']),
								);
				
				}

		$data['data'] = $item;
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
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }
       
	}
	
    public function save_post($id =NULL)
    {
        	$this->auth();
			if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
			$id = (int)$this->post('id', TRUE);
			$check = $this->m_perkembangan_apbd->get_one($id);
			if (empty($check)){$id = null;}else{$id = $id;};
			$config = array(
						array(
							'field' => 'value',
							'label' => 'value',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'name',
							'label' => 'name',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'type',
							'label' => 'type',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'year',
							'label' => 'year',
							'rules' => 'trim|required'
							), 					
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$data = array(
			
					'uraian' => strip_tags($this->post('name', TRUE)),
				
					'value' => strip_tags($this->post('value', TRUE)),
				
					'type' => strip_tags($this->post('type', TRUE)),
					
					'tahun' => strip_tags($this->post('year', TRUE)),
					
				);
				
				if(!$id)
				{ 
				$return = $this->m_perkembangan_apbd->save($data); 
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
				$return = $this->m_perkembangan_apbd->update($id, $data); 
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
	
	public function save_type_post($id =NULL)
    {
        	$this->auth();
			if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
			$id = (int)$this->post('id', TRUE);
			$check = $this->m_perkembangan_apbd->get_one($id);
			if (empty($check)){$id = null;}else{$id = $id;};
			$config = array(
						array(
							'field' => 'id',
							'label' => 'id',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'type',
							'label' => 'type',
							'rules' => 'trim|required'
							),					
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				$data = array(
			
					'type' => strip_tags($this->post('type', TRUE)),	
					
				);
				
				if($id)
				{ 
					$return = $this->m_perkembangan_apbd->save_type($id, $data); 
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
								'message' => 'Save failed'
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
	
	public function insert_post($id = NULL)
    {
        	$this->auth();
			if (($this->user_data->lvl == 1) AND ($this->user_data->privilege == 'super admin')){
			$id = (int)$this->post('id', TRUE);
			$check = $this->m_perkembangan_apbd->get_one($id);
			if (empty($check)){$id = null;}else{$id = $id;};
			$config = array(
						array(
							'field' => 'name',
							'label' => 'name',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'type',
							'label' => 'type',
							'rules' => 'trim|required'
							),
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				
				if(!$id)
				{ 
			
				$data = array(
				
						'uraian' 				=> strip_tags($this->post('name', TRUE)),
						
						'type' 				=> strip_tags($this->post('type', TRUE)),
						
						'tahun' 			=>  strip_tags($this->post('year', TRUE)),
						
					);	
				$return = $this->m_perkembangan_apbd->save($data); 
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
				$data = array(
			
					'uraian' 				=> strip_tags($this->post('name', TRUE)),
					
					'type' 				=> strip_tags($this->post('type', TRUE)),
					
				);
				$return = $this->m_perkembangan_apbd->update_name($id, $data); 
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

        $return = $this->m_perkembangan_apbd->destroy($id);
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
