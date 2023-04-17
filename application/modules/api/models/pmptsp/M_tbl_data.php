<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_tbl_data extends CI_Model 
{
	public $primary		= 'id';
    public $tbl_name	= 'tbl_data';
   
	public function get_one_judul($judul) 
    {
        $this->db->where('LOWER(judul)', $judul);
		 
        
		$result = $this->db->get($this->tbl_name);

       
        return $result->row_array();
        
    }
	
	public function get_all($id, $year) 
    {
        $this->db->where('tbl_data_id', $id);
		 if($year != 'null'){
			$this->db->where('tahun', $year); 
		 }
        
		$result = $this->db->get('tbl_file');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    public function count_all($id, $year)
    {
        $this->db->where('tbl_data_id', $id);
		if($year != 'null'){
			$this->db->where('tahun', $year); 
		 }
		$this->db->from('tbl_file');
        return $this->db->count_all_results();
    } 
	
	public function data_count()
    { 
		$this->db->from('tbl_data');
        return $this->db->count_all_results();
    }
	
	public function file_count()
    { 
		$this->db->from('tbl_file');
        return $this->db->count_all_results();
    }
	
	public function user_count($id)
    { 
		$this->db->from('users');
        return $this->db->count_all_results();
    }
   
	
	//end update
	public function get_one_file($id) 
    {
        //update ganti
		$this->db->where('id', $id);
         
        $result = $this->db->get('tbl_file');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }
	
    public function get_one($id) 
    {
        //update ganti
		$this->db->where($this->tbl_name.'.'.$this->primary, $id);
      
		//end update
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

   
   //update ganti
    public function save($data) 
    {
      
			$this->db->insert('tbl_file', $data);
			$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Menambahkan tbl_file item '.json_encode($data),);
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
		$aspek 	= $result['aspek'];
		$jenis 	= $result['jenis'];
		$uraian = $result['uraian'];
		$tahun 	= $result['tahun'];
		
		 
		$this->db->where("aspek", $data['aspek']);
		$this->db->where("jenis", $data['jenis']);
		$this->db->where("uraian", $data['uraian']);
		$this->db->where("tahun", $tahun);
		$a = $this->db->get($this->tbl_name);
		if ($a->num_rows() == 1) 
        {
			$a = $a->row_array();
			if($a['id'] != $id){
			
			return false;
			
			}
		} 
		
		$this->db->where('aspek', $aspek);
		$this->db->where('jenis', $jenis);
		$this->db->where('uraian', $uraian);
        $this->db->update($this->tbl_name, $data);
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Memperbaharui '.$this->tbl_name.' uraian '.json_encode($uraian).' menjadi '.json_encode($data),);
		$this->db->insert('users_log', $log);
		return true;
		 
        
    }
	//end update

    public function destroy($id)
    {       
        $this->db->where($this->primary, $id);
        $result = $this->db->get($this->tbl_name);
		$result = $result->row_array();
		$aspek 	= $result['aspek'];
		$jenis 	= $result['jenis'];
		$uraian 	= $result['uraian'];
		
		$this->db->where('aspek', $aspek);
		$this->db->where('jenis', $jenis);
		$this->db->where('uraian', $uraian);
        $this->db->delete($this->tbl_name);
		$log = array("user_id" 		=> $this->user_data->id, "description" 		=> 'Menghapus '.$this->tbl_name.' uraian '.json_encode($jenis),);
		$this->db->insert('users_log', $log);
		return true;
        
    }
	
	public function destroy_file($id)
    {       
        $this->db->where('id', $id);
 
        $this->db->delete('tbl_file');
		 
		return true;
        
    }

	
}
