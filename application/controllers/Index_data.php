<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_data extends CI_Controller {
	function __construct()
    {
        parent::__construct();
		$this->load->model('m_main');
    }

	public function index()
	{
		header('Content-Type: application/json');
		if($this->input->get('page')){ $page = $this->input->get('page'); } else { $page = 1; } ;
		$perpage	= 200;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		$keyword = $this->input->get('keyword');
		$result  = $this->m_main->get_index($keyword, $limit, $offset);
		 
		echo json_encode($result);
		
		
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
}
