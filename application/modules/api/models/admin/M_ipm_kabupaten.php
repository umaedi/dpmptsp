<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_ipm_kabupaten extends CI_Model 
{
	public $primary		= 'id';
    public $tbl_name	= 'tbl_ipm_kabupaten';
   
    public function get_all($limit, $offset) 
    {
        $this->db->group_by('uraian');
        $this->db->order_by('id', 'ASC');
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
        $this->db->group_by('uraian');
		$this->db->from($this->tbl_name);
        return $this->db->count_all_results();
    }
   
	public function get_items($year, $end, $like) 
    {
		$this->db->where('tahun >=', $end);
		$this->db->where('tahun <=', $year);
		$this->db->where('uraian', $like);
        $this->db->order_by('tahun', 'ASC');
        $result = $this->db->get($this->tbl_name);

        if ($result->num_rows() > 0) 
        {
            $result = $result->result_array();
			foreach ($result as $items){
				$item[$items['tahun']] = array(
									"id" 		=> $items['id'],
									"value" 	=> $items['value'],
									);
			
			}
			 
			return $item;
        } 
        else 
        {
            return array();
        }
    }
	
	public function get_end_value($y, $like) 
    {
        $this->db->where('uraian', $like);
        $this->db->where('tahun <', $y);
		$this->db->where('value != 0', null);
		$this->db->order_by('tahun', 'DESC');
		$this->db->limit(1);
        $result = $this->db->get($this->tbl_name);

        if ($result->num_rows() == 1) 
        {
            $result = $result->row_array();
			return $result['value'];
        } 
        else 
        {
            return 0;
        }
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
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Menambahkan '.$this->tbl_name.' item '.json_encode($data),);
		$this->db->insert('users_log', $log);
		return true;
    }
    
    public function update($id, $data)
    {
        $this->db->where($this->primary, $id);
        $this->db->update($this->tbl_name, $data);
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Memperbaharui '.$this->tbl_name.' item '.json_encode($data),);
		$this->db->insert('users_log', $log);
		return true;
    }

   public function update_name($id, $data)
    {       
        $this->db->where($this->primary, $id);
        $result = $this->db->get($this->tbl_name);
		$result = $result->row_array();
		$name 	= $result['uraian'];
		
		$this->db->where('uraian', $name);
         $this->db->update($this->tbl_name, $data);
		 $log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Memperbaharui '.$this->tbl_name.' uraian '.json_encode($name).' menjadi '.json_encode($data),);
		$this->db->insert('users_log', $log);
		return true;
        
    }

    public function destroy($id)
    {       
        $this->db->where($this->primary, $id);
        $result = $this->db->get($this->tbl_name);
		$result = $result->row_array();
		$name 	= $result['uraian'];
		
		$this->db->where('uraian', $name);
        $this->db->delete($this->tbl_name);
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Menghapus '.$this->tbl_name.' uraian '.json_encode($name),);
		$this->db->insert('users_log', $log);
		return true;
        
    }

	
}
