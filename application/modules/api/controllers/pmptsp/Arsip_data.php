<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Arsip_data extends MY_Api {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
       
		$this->load->model('pmptsp/m_tbl_data');
		$this->load->model('m_main');
    }
	
	public function list_get()
    {

		$judul 		= str_replace("-"," ",$this->get('judul'));
		 
		$year 		= $this->get('year');
		
		if($this->get('page')){ $page = $this->get('page'); } else { $page = 1; } ;
		$perpage	= 100;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		
		$tbl_data 	= $this->m_tbl_data->get_one_judul($judul);
		if(empty($tbl_data)){
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		}
		$tbl_data_id = $tbl_data['id'];
		
		$result 	= $this->m_tbl_data->get_all($tbl_data_id, $year);
		$total		= $this->m_tbl_data->count_all($tbl_data_id, $year);
		
		$pagecount	= ceil($total/$perpage);
		$item		= array();
		foreach ($result as $key=>$val){
					 
					$result[$key]['full_url'] = base_url('assets/dokumen/'.$val['url_file']);
				
				}
		$tbl_data['result']	= $result;
		$data['data'] = $tbl_data;
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
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }
       
	}
	
	public function report_get()
    {
		$instansi_id 		= $this->get('id');
		$x['data_count'] 		= $this->m_tbl_data->data_count();
		$x['file_count'] 		= $this->m_tbl_data->file_count();
		$x['user_count'] 		= $this->m_tbl_data->user_count($instansi_id);
		 
		$data['data'] = $x;
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($x)
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
			if ((($this->user_data->lvl == 19) OR ($this->user_data->lvl == 1)) AND ($this->user_data->privilege == 'super admin')){
			$id = (int)$this->post('id', TRUE);
			$check = $this->m_data_sektoral_skpd_pmptsp->get_one($id);
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
				$data = array(
			
					'kategori' => strip_tags($this->post('kategori', TRUE)),
					
					'judul' => strip_tags($this->post('judul', TRUE)),
					
					'uraian' => strip_tags($this->post('uraian', TRUE)),
					
				
					
				);
				
				if(!$id)
				{ 
				$return = $this->m_tbl_data->save($data); 
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
				$return = $this->m_tbl_data->update($id, $data); 
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

	public function insert_post($id = NULL)
    {
        	$this->auth();
			if ((($this->user_data->lvl == 19) OR ($this->user_data->lvl == 1)) AND ($this->user_data->privilege == 'super admin')){
			$id = (int)$this->post('id', TRUE);
			$check = $this->m_tbl_data->get_one($id);
			if (empty($check)){
				$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
			}
			$this->load->library('upload');
			$config = array(
						array(
							'field' => 'id',
							'label' => 'id',
							'rules' => 'trim|required'
							),				
					  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == TRUE) 
			{
							$name = '';
			
			if (!empty($_FILES['berkaslampiran']['name']))
			{			 
				
				$originalPath = "assets/dokumen/";
				if(!is_dir($originalPath)) {
					mkdir($originalPath, 0755, true);
				}
	
				$files  = $_FILES['berkaslampiran']['name'];
				 
				
				$config = array(
						'encrypt_name' => TRUE,
						'file_name'		=> $files,
						'upload_path'   => realpath($originalPath),
						'allowed_types' => 'pdf|doc|docx|jpg|jpeg|png|xlsx|csv|xls|ppt|pptx',
						'max_size'      => '150000',
						"overwrite"	=> TRUE,
						);
				
				$this->upload->initialize($config);
				
				if (!$this->upload->do_upload('berkaslampiran'))
				{
					$name = '';
					 
					$this->response([
								'status' => 'ok',
								'message' => $this->upload->display_errors()
							], REST_Controller::HTTP_OK);
					  
				}else
				{ 
					$name = $this->upload->data('file_name');
					$file_type = $this->upload->data('file_type');
					
				}
			}
			
				$data = array(
			
					'tbl_data_id' => strip_tags($this->post('id', TRUE)),
					
					'nama_file' => strip_tags($this->post('nama_file', TRUE)),
					
					'keterangan' => strip_tags($this->post('keterangan', TRUE)),
					
					'tahun' => strip_tags($this->post('year', TRUE)),
					
					'url_file' => $name,
					
					'type_file' => $file_type,
					
				);
				$return = $this->m_tbl_data->save($data); 
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
	
    
	
	 public function delete_file_get()
    {
        $this->auth();
		if ((($this->user_data->lvl == 19) OR ($this->user_data->lvl == 1)) AND ($this->user_data->privilege == 'super admin')){
		$id 		= (int)$this->get('id');

        // Validate the id.
        if (!$id)
        {
            // Set the response and exit
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
				$data 		= $this->m_tbl_data->get_one_file($id);
				$file 		= $data['url_file'];
				@unlink(".storage/lampiran/".$file);
				
				 
         
		if($this->m_tbl_data->destroy_file($id)){
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
