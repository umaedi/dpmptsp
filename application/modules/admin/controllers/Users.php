<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Admin {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Users List';
		
		
		$this->load->view('content/users', $data);
	}
	
	public function view($id)
	{
		$idon = $this->session->userdata('id');
		if($id != $idon){
		if($this->session->userdata('privilege') != 'super admin'){ 
			header("location: ".base_url('admin/users'));
		}
		$data['halaman'] 			= 'View Users';
		
		
		$this->load->view('content/view_user', $data);
		}else{
		redirect(base_url().'admin/profile');
		}
	}
	
	public function create()
	{
		if($this->session->userdata('privilege') != 'super admin'){ 
			header("location: ".base_url('admin/users'));
		}
		$data['halaman'] 			= 'Create Users';
		
		
		$this->load->view('content/create_user', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */