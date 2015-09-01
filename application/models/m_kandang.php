<?php 
Class M_kandang extends CI_Model{
	function __construt(){
		parent::__construt();
	}
	function select_list(){
		$sql = "SELECT * FROM m_kandang";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
	function delete($data){
		$this->db->delete('m_kandang',$data);
	}
}
?>