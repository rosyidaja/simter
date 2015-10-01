<?php 
Class M_setting extends CI_Model{
	function __construt(){
		parent::__construt();
	}
	function select_list(){
		$sql = "Select * From m_user";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
	function validasi($data){
		
		$sql = "SELECT * FROM m_user where username = '$data' ";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return '0';
		}else{
			return '1';
		}

	}
}