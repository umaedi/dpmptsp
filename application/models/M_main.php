<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_main extends CI_Model{
	public function __construct() 
    {
        parent::__construct();
    }
	
	
	function Meta()
	{
		$data = $this->db->get('setting')->row_array();; 
		return $data;	
	}
	
	function get_one_pages($slug)
	{
		$data = $this->db->where('slug', $slug);
		$data = $this->db->get('pages')->row_array();; 
		return $data;	
	}
	
	function visitor($data)
	{
		$check_ip = $this->db->query("SELECT * FROM visitor WHERE ip='".$data['ip']."' AND date='".$data['date']."'")->num_rows();
		$result_ip = isset($check_ip)?($check_ip):0;
		
		if($result_ip == 0){
			
		$this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$data['ip']."','".$data['date']."','1','".$data['waktu']."','".$data['timeinsert']."')");
		
		}else{
			
		$this->db->query("UPDATE visitor SET hits=hits+1, online='".$data['waktu']."' WHERE ip='".$data['ip']."' AND date='".$data['date']."'");
		
		}
		
	}
	
	function get_visitor($data)
	{
		
		$pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='".$data['date']."' GROUP BY ip")->num_rows();
		
		$this->db->select_sum('hits');
		$this->db->where('date', $data['date']);
		//$this->db->group_by('ip');
		$totalhit = $this->db->get('visitor')->row_array();
		
		//$totalhit  = $this->db->query("SELECT SUM(hits) FROM visitor WHERE date='".$data['date']."' GROUP BY ip")->get();
 
		$pengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row(); 
		 
		$totalpengunjung = isset($pengunjung->hits)?($pengunjung->hits):0;
		 
		$bataswaktu = time() - 300;
		 
		$pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '".$bataswaktu."'")->num_rows();
		  
		 
		$result['pengunjunghariini']=$pengunjunghariini;
		$result['totalpengunjung']=$totalpengunjung;
		$result['totalhit']=$totalhit;
		$result['pengunjungonline']=$pengunjungonline;
		return $result;
	}
	
	
	public function count_all_instansi() 
    {
        $this->db->from('tbl_instansi');
		$result = $this->db->count_all_results();
       
            return $result;
       
    }
	
	
	public function count_all_user() 
    {
        $this->db->from('users');
		$result = $this->db->count_all_results();
       
            return $result;
       
    }
	
	
	function get_user($username, $password) {
		
			$data = array(
   							'username' 		=> $username,
   							'password' 		=> $password);
							

			$this->db->where('users.username', $username);			
			$this->db->where('users.password', $password);			
			$result	=	$this->db->get('users');				
			if($result->num_rows()== 1)
			{
				$row =	$result->row();
				$sess_array = array(
				'is_login'		=>  true,
				'id'			=>	$row->id,
				'lvl'			=>	$row->instansi_id,
				'privilege'		=>	$row->privilege,
				);

				//exit();
				return $sess_array;
			}
			else{
				
				$sess_array = array(
				'is_login'		=> false,
				'id'			=>	null,
				);
			return $sess_array;
			}
	}
	
	function sess_user($id, $token) {
		
				$datestring = "%Y-%m-%d";
				$tgl = mdate($datestring);
				$ip = $this->input->ip_address(); 
				
				$sess = array(
				'token'			=> $token,
				'last_login'	=> $tgl,
				'last_ip'		=>	$ip,
				'status'		=>	'1',
				); 
				
				$this->db->where('id', $id);
				$this->db->update('users', $sess);
				
				$log = array("user_id" 		=> $id, "description" 		=> 'Melakukan login ke sistem');
				$this->db->insert('users_log', $log);
				
				$this->db->select('*');
				$this->db->select('tbl_instansi.instansi');
				$this->db->join('tbl_instansi', 'users.instansi_id = tbl_instansi.id', 'right');
				$this->db->where('users.id', $id);
				$this->db->from('users');
				$result = $this->db->get();
				$result = $result->row_array();
				
				$data = array(
				'is_login'		=> true,
				'id'			=>	$id,
				'name'			=>	$result['nama'],
				'alamat'		=>	$result['alamat'],
				'email'			=>	$result['email'],
				'telp'			=>	$result['telp'],
				'token'			=>	$result['token'],
				'username'		=>	$result['username'],
				'password'		=>	$result['password'],
				'lvl'			=>	$result['instansi_id'],
				'privilege'		=>	$result['privilege'],
				'status'		=>	$result['status'],
				'instansi'		=>	$result['instansi'],
				'last_ip'		=>	$result['last_ip'],
				);
				$this->session->set_userdata($data);
				return $data;
		
	}
	
	public function get_user_token($token) 
    {

     
		$this->db->where('token',$token);
		$result = $this->db->get('users');
		if($result->num_rows()== 1)
		{ 
		$row =	$result->row_array();
		$data = array(
				'result'		=> true,
				'token'			=> $row['token'],
				);
				
		return $data;
		}else{
		$data = array(
				'result'		=> false,
				'token'			=> null,
				);
				
		return $data;	
		}
    }
	
	public function get_one_instansi($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('tbl_instansi');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }
	
	public function get_pages($pages) 
    {

       
		$this->db->like('slug', $pages);
		$result = $this->db->get('pages');

        
		return $result->row_array();
        
    }
	
	function sess_destroy($token) {
		
				$ip = $this->input->ip_address(); 
				$sess = array(
				'token'			=> '',
				'last_ip'		=>	$ip,
				'status'		=>	'0',
				); 
				
				$this->db->where('token', $token);
				$this->db->update('users', $sess);
				
		
	}
	
}