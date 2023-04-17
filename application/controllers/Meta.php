<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta extends CI_Controller {
	function __construct()
    {
        parent::__construct();
		$this->load->model('m_main');
    }
	
	public function find()
	{
		header('Content-Type: application/json');
		$path 			  = $this->uri->segment(3);
		$jenis 			  = $this->input->get('jenis');
		if($jenis != ''){ $path = $path.'?jenis='.$jenis; };
		$result = $this->m_main->find_index($path);
		
		echo json_encode($result);
		
		
	}

	public function About()
	{
		header('Content-Type: application/json');

		$result  = $this->m_main->Meta();
		$data['judul']  = $result['judul'];
		$data['deskripsi']  = $result['deskripsi'];
		$data['Copyright']  = $result['footer'];
		echo json_encode($data);
		
		
	}
	
	public function get_visitor()
	{
		header('Content-Type: application/json');
		$data['date'] = date("Y-m-d");

		$data['visitor']  = $this->m_main->get_visitor($data);

		echo json_encode($data);
		
		
	}
	
}
