<?php 
Class M_indukan extends CI_Model{
	function __construt(){
		parent::__construt();
	}
	function select_list(){
		$sql = "SELECT * FROM m_indukan";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
	function select_listKandang(){
		$sql = "SELECT * FROM m_kandang order by nama_kandang asc";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
	function select_listanakanjantan(){
		$sql = "SELECT * FROM m_anakan where jenis_kelamin = 'j' ";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
	function select_listanakanbetina(){
		$sql = "SELECT * FROM m_anakan where jenis_kelamin = 'b' ";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
    function get($id){
        $sql = "SELECT * from m_anakan where id_anakan = $id";
        $rootquery = $this->db->query($sql);
        return $rootquery->row();
    }
	function delete($data){
		$this->db->delete('m_indukan',$data);
	}

	function tambahData($data){
		$this->db->insert('m_indukan',$data);
	}

	function edit($data,$id_anakan){
        $this->db->where('id_anakan',$id_anakan);
        $this->db->update('m_anakan',$data);
    }
}
?>