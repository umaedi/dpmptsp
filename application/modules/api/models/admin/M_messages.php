<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class M_messages extends CI_Model 
{
	public $primary		= 'messages_id';
    public $tbl_name	= 'tbl_messages';

	public function get_all($limit, $offset, $id, $type) 
    {
		
       if($type == "in"){
		$this->db->join('tbl_instansi', 'tbl_messages.instansi_id = tbl_instansi.id', 'left');
		$this->db->where('object', $id);
		}else{
		 
		$this->db->join('tbl_instansi', 'tbl_messages.object = tbl_instansi.id', 'left');
		$this->db->where('instansi_id', $id);	
		}
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
	
	public function count_all($id, $type)
    {
        $this->db->from($this->tbl_name);
		if($type == "in"){
		$this->db->where('object', $id);
		}else{
		$this->db->where('instansi_id', $id);	
		}
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
		
		return true;
    }
    
    public function update($id, $data)
    {
        $this->db->where($this->primary, $id);
        $this->db->update($this->tbl_name, $data);
	
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
	
	public function drop_messages($id)
    {       
        $this->db->where('instansi_id', $id);
        $this->db->delete($this->tbl_name);
		
		return true;
        
    }

	
}
