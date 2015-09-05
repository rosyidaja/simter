<?php 
Class M_kandang extends CI_Model{
	function __construt(){
		parent::__construt();
	}
	function select_list(){
		$sql = "SELECT * FROM m_kandang order by nama_kandang asc";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
    function get($id){
        $sql = "SELECT * from m_kandang where id_kandang = $id";
        $rootquery = $this->db->query($sql);
        return $rootquery->row();
    }
	function delete($data){
		$this->db->delete('m_kandang',$data);
	}

	function tambahData($data){
		$this->db->insert('m_kandang',$data);
	}

	function edit($data,$id_kandang){
        $this->db->where('id_kandang',$id_kandang);
        $this->db->update('m_kandang',$data);
    }
}
?>