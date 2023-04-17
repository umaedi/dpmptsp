<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 
 
class M_root extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


	function check_login($options)
		{
		
			$username		= $options['username'];
			$password		= $options['password'];
			$data = array(
   							'username' 		=> $username,
   							'password' 		=> $password);
							
			$result	=	$this->db->get_where('admin', $data);				
			if($result->num_rows()>0)
			{
				$row =	$result->row();
				
                
				
				$sess_array = array(
				'is_login'		=> true,
				'id_adm'			=>	$row->idadm,
				'admin'			=>	$row->nama,
				'alamat'		=>	$row->alamat,
				'email'			=>	$row->email,
				'telp'			=>	$row->telp,
				'bbm'			=>	$row->bbm,
				'email'			=>	$row->email,
				'photo'			=>	$row->photo,
				'username'			=>	$row->username,
				'password'			=>	$row->password,
				'lvl'			=>	$row->lvl,
				);

				$datestring = "%Y-%m-%d";
				$tgl = mdate($datestring);
				$ip = $this->input->ip_address();
				$id = $row->idadm;
				
				$sess = array(
				'last_login'		=> $tgl,
				'status'		=>	'online',
				'last_ip'		=>	$ip,
				); 
				
				$this->db->where('idadm', $id);
				$this->db->update('admin', $sess);
				
				$this->session->set_userdata($sess_array);
				
				//exit();
				return 'true';
			}
			else 
			return 'failed';
		}
		
		function check_email_exists($email)
		{

			$this->db->where('email',$email);
			$result = $this->db->get('users');
			
			if($result->num_rows()>0)
			return "1";
			else
			return "0";
			
		}





    



}
