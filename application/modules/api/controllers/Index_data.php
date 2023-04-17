<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_data extends MY_Api {
	function __construct()
    {
        parent::__construct();
		$this->load->model('m_main');
    }

	public function index_get()
	{
		$this->auth();
		header('Content-Type: application/json');
		if($this->input->get('page')){ $page = $this->input->get('page'); } else { $page = 1; } ;
		$perpage	= 100;
		$int		= $page - 1;
		$offset		= ($int * $perpage);
		$limit		= $perpage;
		$keyword = $this->input->get('keyword');
		$result  = $this->m_main->get_index($keyword, $limit, $offset);
		 
		echo json_encode($result);
		
		
	}
	
}
