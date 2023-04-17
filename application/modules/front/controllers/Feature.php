<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feature extends MY_Public {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data); 
		@session_start();
		
	}
	
	public function index($page)
	{
		$page = $this->uri->segment(2);
		$result = $this->m_main->get_pages($page);
		
			if ($result){
			
					
			switch($page){
				case "gambaran-umum":
					$data['pages'] = $result;
					$data['halaman'] = ucwords(str_replace("-"," ",$page));
					$this->load->view('contents/gambaran', $data);
					break;
					
				default:
					$data['pages'] = $result;
					$data['halaman'] = $result['judul'];	
					$this->load->view('contents/pages', $data);
					break;
				}
			}
			else
			{
				switch($page){
				case "data-makro":
					$data['halaman'] = ucwords('Perkembangan Data Makro');
					$this->load->view('contents/makro', $data);
					break;
				case "penghargaan":
					$data['halaman'] = ucwords(str_replace("-"," ",$page));
					$this->load->view('contents/penghargaan', $data);
					break;
				case "data-opd":
					$data['halaman'] = ucwords(str_replace("-"," ",$page));
					$this->load->view('contents/opd', $data);
					break;
					
				default:
					redirect(base_url());
					break;
				}
			}
		
	}
	
}

/* End of file login.php */
/* Location: ./application/modules/dashboard/controllers/login.php */