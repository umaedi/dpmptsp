<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class M_users extends CI_Model 
{
	public $primary		= 'id';
    public $tbl_name	= 'users';
	
    public function get_instansi() 
    {

		$result = $this->db->get('tbl_instansi');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }
	
	public function get_all($limit, $offset, $id) 
    {

        $this->db->where('instansi_id', $id);
		$result = $this->db->get($this->tbl_name, $limit, $offset);

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }
	
	public function count_all()
    {
        $this->db->from($this->tbl_name);
        return $this->db->count_all_results();
    }
	
	public function get_status($id)
    {
         $this->db->where('status', $id);
		$this->db->from($this->tbl_name);
        return $this->db->count_all_results();
    }
	
	public function get_log($limit, $offset, $id) 
    {
		$this->db->select('*');
		$this->db->select('users.nama, users.id AS users_id');
		$this->db->select('tbl_instansi.instansi, tbl_instansi.id AS instansi_id');
		$this->db->from('users_log');
		$this->db->join('users', 'users_log.user_id = users.id', 'left');
		$this->db->join('tbl_instansi', 'users.instansi_id = tbl_instansi.id', 'left');
		if ($id != null){
		$this->db->where('users_log.user_id', $id);
		}
        $this->db->order_by('users_log.date', 'DESC');
        $this->db->limit($limit, $offset);
		$result = $this->db->get();

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    public function count_log($id)
    {
        if ($id != null){
		$this->db->where('user_id', $id);
		}
		$this->db->from('users_log');
        return $this->db->count_all_results();
    }
   
    public function get_one($id) 
    {
        $this->db->where($this->primary, $id);
        $result = $this->db->get($this->tbl_name);

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }
	
	public function check_email($email) 
    {
        $this->db->where('email', $email);
        $result = $this->db->get($this->tbl_name);

        if ($result->num_rows() == 1) 
        {
			$data = array(
									"result" 		=> false,
									"status" 		=> 'Unavailable',);
			return $data;
        } 
        else 
        {
           $data = array(
									"result" 		=> true,
									"status" 		=> 'available',);
			return $data;
        }
    }

    public function save($data) 
    {
		
        $this->db->insert($this->tbl_name, $data);
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Menambahkan '.$this->tbl_name.' '.$data['nama'],);
		$this->db->insert('users_log', $log);
		
		return true;
    }
    
    public function update($id, $data)
    {
        $this->db->where($this->primary, $id);
        $this->db->update($this->tbl_name, $data);
		
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Memperbaharui '.$this->tbl_name.' '.$data['nama'],);
		$this->db->insert('users_log', $log);
		return true;
    }

    public function destroy($id)
    {       
        $this->db->where($this->primary, $id);
        $this->db->delete($this->tbl_name);
		
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Menghapus '.$this->tbl_name,);
		$this->db->insert('users_log', $log);
		return true;
        
    } 
	
	public function drop_log()
    {       
        $this->db->truncate('users_log');
		
		return true;
        
    }

	
}
