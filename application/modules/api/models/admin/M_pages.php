<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class M_pages extends CI_Model 
{
	public $primary		= 'id';
    public $tbl_name	= 'pages';

	
	public function get_all($limit, $offset, $columns, $sort, $search) 
    {
		if ($search != ''){
			$this->db->like("judul", $search);
		}
        $this->db->order_by($columns, $sort);
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
	
	public function count_all($search)
    {
        if ($search != ''){
			$this->db->like("judul", $search);
		}
		$this->db->from($this->tbl_name);
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


    public function save($data) 
    {
		
        $this->db->insert($this->tbl_name, $data);
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Menambahkan '.$this->tbl_name);
		$this->db->insert('users_log', $log);
		
		return true;
    }
    
    public function update($id, $data)
    {
        $this->db->where($this->primary, $id);
        $this->db->update($this->tbl_name, $data);
		
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Memperbaharui '.$this->tbl_name);
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

	
}
