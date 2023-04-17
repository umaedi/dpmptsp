<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_variabel extends CI_Model 
{

    public function get_kecamatan() 
    {
     
        $result = $this->db->get('tbl_kecamatan');

        if ($result->num_rows() >= 1) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }
	
	public function count_kecamatan()
    {
    
		$this->db->from('tbl_kecamatan');
        return $this->db->count_all_results();
    }
	
	public function get_bagian() 
    {
     
        $result = $this->db->get('tbl_bagian');

        if ($result->num_rows() >= 1) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }
	
	public function count_bagian()
    {
    
		$this->db->from('tbl_bagian');
        return $this->db->count_all_results();
    }
}
