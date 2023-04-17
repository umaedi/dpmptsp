<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edata extends MY_Edata {

	function __construct()
	{
		parent::__construct();
		@session_start();
	}
	
	public function index()
	{
		redirect(base_url().'edata/index_data');
	}
	
	public function index_data()
	{
		
		$data['halaman'] 			= 'Dashboard E-Data';
	 
		$this->load->view('content/edata', $data);
	}
	
	public function open()
	{
		#guzzle library add to use guzzle
		$this->load->library('guzzless');
		
		if(!$this->uri->segment(3)){
			
		}else{
		$path 			  = $this->uri->segment(3);
		$jenis 			  = $this->input->get('jenis');
		if($jenis != ''){ $path = $path.'?jenis='.$jenis; };
		
		$server = $this->get_index();
		$json = file_get_contents($server.'index_data/find/'.$path);
		

		  # guzzle client define
		  $client     = new GuzzleHttp\Client();
		  
		  #This url define speific Target for guzzle
		  $url        = $server.'/index_data/find/'.$path;

		  #guzzle
		  try {
			# guzzle post request example with form parameter
			$response = $client->request( 'POST', 
										   $url, 
										  [ 'form_params' 
												=> [ 'processId' => '2' ] 
										  ]
										);
			#guzzle repose for future use
			if($response->getStatusCode() == 200){
				$response->getReasonPhrase(); // OK
				$response->getProtocolVersion(); // 1.1
				$response->getBody();
				var_dump($response);
				$view = $this->uri->segment(3);
				$data['instansi'] 			= ucwords($key['instansi']);
				$data['halaman'] 			= 'Data '.ucwords($key['title']);
				$data['alert'] 			= $this->session->flashdata('alert'); 
				$this->load->view('content/'.$view, $data);
			}else{
				redirect(base_url().'edata/');
			}; // 200
			
		  } catch (GuzzleHttp\Exception\BadResponseException $e) {
			#guzzle repose for future use
			redirect(base_url().'edata/');
		  }
	}
	
	public function openss()
	{
		if(!$this->uri->segment(3)){
			
		}else{
		$path 			  = $this->uri->segment(3);
		$jenis 			  = $this->input->get('jenis');
		if($jenis != ''){ $path = $path.'?jenis='.$jenis; };
		
		$server = $this->get_index();
		$json = file_get_contents($server.'index_data/find/'.$path);
		$key = json_decode($json, TRUE);
		  
			if ($key['status'] == true) {
			$view = $this->uri->segment(3);
			$data['instansi'] 			= ucwords($key['instansi']);
			$data['halaman'] 			= 'Data '.ucwords($key['title']);
			$data['alert'] 			= $this->session->flashdata('alert'); 
			$this->load->view('content/'.$view, $data);
			}else{
				//var_dump($path);
				redirect(base_url().'edata/');
			}
		}
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */