<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class M_setting extends CI_Model 
{
	public $primary		= 'idset';
    public $tbl_name	= 'setting';
	

	public function get_all() 
    {

        $this->db->limit(1, 0);
		$result = $this->db->get($this->tbl_name);

        if ($result->num_rows() > 0) 
        {
            return $result->row_array();
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
		
		return true;
        
    } 

	
}
