<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_sidebar extends CI_Model 
{
	public $primary		= 'id';
    public $tbl_name	= 'tbl_data';
   
    public function get_all() 
    {
        $this->db->group_by('kategori');
		$this->db->order_by('id', 'ASC');
		$result = $this->db->get($this->tbl_name);

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }    
	
	public function get_judul_all($kategori) 
    {
        $this->db->where('kategori', $kategori);
        $this->db->group_by('judul');
        $this->db->order_by('id', 'ASC');
		$result = $this->db->get($this->tbl_name);

        if ($result->num_rows() > 0) 
        {
            $data = array();
			foreach($result->result_array() as $item){
			$link 		= str_replace(" ","-",$item['judul']);	
				$data[] = array(
									"judul" 			=> $item['judul'],
									"link" 				=> strtolower($link),
								);
			}
			
			return $data;
        } 
        else 
        {
            return array();
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
    
   public function update($key, $data)
    {
        $this->db->where($key);
        $this->db->update($this->tbl_name, $data);
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Memperbaharui '.$this->tbl_name.' item '.json_encode($data),);
		$this->db->insert('users_log', $log);
		return true;
    }
	
	//update ganti
    public function destroy_all($id)
    {       
        $this->db->where($this->primary, $id);
        $result = $this->db->get($this->tbl_name);
		$result = $result->row_array();
		$name 	= $result['judul'];
		
		$this->db->where('judul', $name);
        $this->db->delete($this->tbl_name);
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Menghapus '.$this->tbl_name.' uraian '.json_encode($name),);
		$this->db->insert('users_log', $log);
		return true;
        
    }
	
	public function update_kategori($data, $kategori)
    {       
        $this->db->where('kategori', $kategori);
        $this->db->update($this->tbl_name, $data);
		
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Merubah kategori '.$kategori.' menjadi '.json_encode($data),);
		$this->db->insert('users_log', $log);
		return true;
        
    }
	//end update
}
