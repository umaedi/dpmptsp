<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Public {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data); 
		@session_start();
	}
	
	public function index()
	{
		redirect(base_url());
	}
	
	public function index_data()
	{
		$keyword 			  = $this->input->get("keyword");
		if($keyword){
			$data['halaman'] 			= 'Data '.$keyword;
		}else{
			$data['halaman'] 			= 'Index Dataset';
		}
		$this->load->view('contents/feature', $data);
	}
	public function open()
	{
		#guzzle library add to use guzzle
		$this->load->library('guzzle');
		
		if(!$this->uri->segment(4)){
			
		}else{
		$path 			  = $this->uri->segment(4);
		$jenis 			  = $this->input->get('jenis');
		if($jenis != ''){ $path = $path.'?jenis='.$jenis; };
		
		$server = base_url();
		$json = file_get_contents($server.'index_data/find/'.$path);
		

		  # guzzle client define
		  $client     = new GuzzleHttp\Client();
		  
		  #This url define speific Target for guzzle
		  $url        = $server.'/index_data/find/'.$path;

		  #guzzle
		  try {
			# guzzle post request example with form parameter
			$response = $client->request( 'GET', 
										   $url
										);
			#guzzle repose for future use
			if($response->getStatusCode() == 200){
				$response = $response->getBody()->getContents(); //mengambil value dari $response yang berupa JSON
				$key = (array)json_decode($response);
				 
				$data['halaman'] 			= 'Data '.ucwords($key['title']);
				$data['description'] 		=  $key['description'];
				$data['instansi'] 			= ucwords($key['instansi']);
				switch($key['sub']){
					case "admin/":
						switch($key['path']){
							case "luas_penggunaan_lahan":
							$this->load->view('contents/luas_penggunaan_lahan', $data);
							break;
							case "luas_wilayah_menurut_kecamatan":
							$this->load->view('contents/luas_wilayah_menurut_kecamatan', $data);
							break;
							default:
							$this->load->view('contents/data_sektoral_admin', $data);
							break;
						};
					break;
						
					default:
						
						$this->load->view('contents/data_sektoral_skpd', $data);
					break;					
				}
			}else{
				redirect(base_url().'edata/');
			}; // 200
			
		  } catch (GuzzleHttp\Exception\BadResponseException $e) {
			#guzzle repose for future use
			redirect(base_url().'edata/');
		  }
		}
	}
	
	public function openss()
	{
		if(!$this->uri->segment(4)){
			
		}else{
		$path 			  = $this->uri->segment(4);
		$jenis 			  = $this->input->get('jenis');
		if($jenis != ''){ $path = $path.'?jenis='.$jenis; };
		
		$server = base_url();
		$json = file_get_contents($server.'index_data/find/'.$path);
		$key = json_decode($json, TRUE);
		  
			if ($key['status'] == true) {
					$data['halaman'] 			= 'Data '.ucwords($key['title']);
					$data['description'] 		=  $key['description'];
					$data['instansi'] 			= ucwords($key['instansi']);
					
				switch($key['sub']){
					case "admin/":
						switch($key['path']){
							case "luas_penggunaan_lahan":
							$this->load->view('contents/luas_penggunaan_lahan', $data);
							break;
							case "luas_wilayah_menurut_kecamatan":
							$this->load->view('contents/luas_wilayah_menurut_kecamatan', $data);
							break;
							default:
							$this->load->view('contents/data_sektoral_admin', $data);
							break;
						};
					break;
						
					default:
						
						$this->load->view('contents/data_sektoral_skpd', $data);
					break;					
				}

			}else{
				
				//redirect(base_url().'edata/');
			}
		}
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */