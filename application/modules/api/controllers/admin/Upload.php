<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';
class Upload extends MY_Api {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/m_upload');
	}
	
	public function list_get()
    {
		$id	= $this->get('id');

		$get 	= $this->m_upload->get_all($id);
		$result		= [];
		$i 			= 0;
		
		foreach ($get as $item) {
			$img = base_url('assets/images/'.$item['instansi_id'].'/'.$item['img']);
			$result[] =	array(
						'no' => $i++,
						'image' => $img,
						'id' => $item['foto_id'],
						'title' => $item['kegiatan'],
						);
			
		};
		
		$data['data'] 	= $result;
		
		
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
	
	public function save_kegiatan_post()
	{
		$this->load->library('upload');
		if (empty($_FILES['files'])) {
			echo json_encode(['error'=>'No files found for upload.']);  
			return ;  
		}
		else
		{
			if($this->post('title')){
			$filenames = $_FILES['files']['name'];
			$instansi_id = $this->post('id');
			$title = $this->post('title');
			$dataInfo = array();
			 
			if (!is_dir('assets/images/'.$instansi_id)) {
				 mkdir('./assets/images/'.$instansi_id, 0777, TRUE);
			};
			
				$config = array(
                        'encrypt_name' => TRUE,
                        'file_name'		=> $filenames,
						'upload_path'   => realpath('assets/images/'.$instansi_id),
						'allowed_types' => 'gif|jpg|png',
						'max_size'      => '10000',
						"overwrite"	=> TRUE,
						);
						
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('files'))
				{
					$error = "Upload Error";  
					$dataInfo = [];  
							  
				}else{
					$error =[];
					$dataInfo = $this->upload->data();
					$data = array(
								'instansi_id' => $instansi_id,
								'kegiatan' => $title,
								'img' => $dataInfo['file_name']
								);
					$return = $this->m_upload->save_kegiatan($data);
				}
				
			$this->set_response([
								'status' => 'ok',
								'error' => []
							], REST_Controller::HTTP_CREATED);	
				
			}else{
			$this->set_response([
								'status' => 'ok',
								'error' => 'Judul tidak boleh Kosong'
							], REST_Controller::HTTP_CREATED);
			}
		}
	}
	
	public function remove_get()
    {
        $this->auth();
		$instansi_id 		= (int)$this->get('instansi_id');
		if (($this->user_data->lvl == $instansi_id) AND ($this->user_data->privilege == 'super admin')){
		$id 		= (int)$this->get('id');

        // Validate the id.
        if (!$id)
        {
            // Set the response and exit
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{

        $return =$this->m_upload->get_one($id);
		if($return){
		@unlink('assets/images/'.$return['instansi_id'].'/'.$return['img']);	
		$this->m_upload->destroy($id);
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

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */