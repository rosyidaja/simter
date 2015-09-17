<?php 
Class M_anakan extends CI_Model{
	function __construt(){
		parent::__construt();
	}
	function select_list(){
		$sql = "SELECT * FROM m_anakan order by kode_ring asc";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
	function select_listKandang(){
		$sql = "SELECT * FROM m_kandang order by nama_kandang asc";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
	function select_listindukan(){
		$sql = "SELECT * FROM m_indukan";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
    function get($id){
        $sql = "SELECT * from m_anakan where id_anakan = $id";
        $rootquery = $this->db->query($sql);
        return $rootquery->row();
    }
    function getIndukan($id){
    	$sql = "SELECT * from m_indukan where id_indukan = $id";
        $rootquery = $this->db->query($sql);
        return $rootquery->result();
    }
	
	function tambahData($data, $date, $datum){
		$data['tanggal_lahir'] = $date;
		$this->db->insert('m_anakan',$data);
		$id_anakan = $this->db->insert_id();

		if($this->db->affected_rows()){
			$this->db->set('id_indukan',$id_anakan)
					->where_in('nomor_ring',$datum)
					->update('m_anakan');
		}
	}
	function delete($data){
		$this->db->delete('m_anakan',$data);
	}

	function edit($data,$id_anakan){
        $this->db->where('id_anakan',$id_anakan);
        $this->db->update('m_anakan',$data);
    }
}
?>