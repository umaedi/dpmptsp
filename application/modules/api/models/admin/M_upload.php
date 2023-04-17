<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class M_upload extends CI_Model 
{
 
	
    public function get_all($id) 
    {
		$this->db->where('instansi_id', $id);
		$this->db->limit(10, 0);
		$result = $this->db->get('tbl_kegiatan_skpd');

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
	
    public function get_one($id) 
    {
        $this->db->where('foto_id', $id);
        $result = $this->db->get('tbl_kegiatan_skpd');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }
	
	 
    public function save_kegiatan($data) 
    {
        $this->db->insert('tbl_kegiatan_skpd', $data);

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
        $this->db->where('foto_id', $id);
        $this->db->delete('tbl_kegiatan_skpd');

		return true;
        
    } 


	
}
