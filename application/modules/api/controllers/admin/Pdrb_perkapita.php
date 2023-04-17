<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Pdrb_perkapita extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
         
		$this->load->model('admin/m_pdrb_perkapita');
		$this->load->model('m_main');
    }
	
	public function list_get()
    {
		$year 		= $this->get('year');
		$end 		= (int)$year - 5;
		if($this->get('page')){ $page 		= $this->get('page'); } else { $page = 1; } ;
		$perpage	= 100 ;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		$result 	= $this->m_pdrb_perkapita->get_all($limit, $offset, $end, $year);
		$total		= $this->m_pdrb_perkapita->count_all($end, $year);
		$pagecount	=  ceil($total/$perpage);
		$item		=  array();
		foreach ($result as $items){
			if(($items['harga_berlaku'] != '') AND ($items['harga_konstant'] != '' ) AND ($items['harga_berlaku'] != 0) AND ($items['harga_konstant'] != 0 )){
			$getold		= $this->m_pdrb_perkapita->getold(((int)$items['tahun']-1));
			if(!$getold){$getold['harga_konstant'] = $items['harga_konstant']; }else{$getold['harga_konstant'] = $getold['harga_konstant'];};
			$x			= ((int)$items['harga_konstant'] - (int)$getold['harga_konstant'])* 100;
			$cagr		= ($x / (int)$getold['harga_konstant']);
			}else{
			$cagr		= '';	
			}
			$item[] = array(
									"id" 					=> $items['id'],
									"tahun" 				=> $items['tahun'],
									"harga_berlaku" 		=> $items['harga_berlaku'],
									"harga_konstant" 		=> $items['harga_konstant'],
									"avg" 					=> round($cagr, 2),
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
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
       
	}
	
	public function view_get()
    {

		$id 		= $this->get('id');
		$result 		= $this->m_pdrb_perkapita->get_one($id);
		$data['data'] = $users;
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($result)
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
			$check = $this->m_pdrb_perkapita->get_one($id);
			if (empty($check)){$id = null;}else{$id = $id;};
			$config = array(
						array(
							'field' => 'year2',
							'label' => 'year2',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'harga_berlaku',
							'label' => 'harga_berlaku',
							'rules' => 'trim|required'
							),
						array(
							'field' => 'harga_konstant',
							'label' => 'harga_konstant',
							'rules' => 'trim|required'
							),			
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
				
				$tahun 		= $this->post('year2', TRUE);
				$getold		= $this->m_pdrb_perkapita->getold(((int)$tahun-1));
				
				$data = array(
			
					'tahun' => strip_tags($this->post('year2', TRUE)),
				
					'harga_berlaku' => strip_tags($this->post('harga_berlaku', TRUE)),
					
					'harga_konstant' => strip_tags($this->post('harga_konstant', TRUE)),
				);
				
				if(!$id)
				{ 
				$return = $this->m_pdrb_perkapita->save($data); 
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
				$return = $this->m_pdrb_perkapita->update($id, $data); 
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

        $return = $this->m_pdrb_perkapita->destroy($id);
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
