<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_chart extends CI_Model 
{
	
    public function get_makro($jenis, $year) 
    {
        $this->db->where('uraian', $jenis);
		$this->db->where('tahun <=', $year);
        $this->db->order_by('tahun', 'DESC');
		$result = $this->db->get('tbl_perkembangan_data_makro_kabupaten', 4, 0);

        if ($result->num_rows() > 0) 
        {
            return array_reverse($result->result_array());
        } 
        else 
        {
            return array();
        }
    }


}
