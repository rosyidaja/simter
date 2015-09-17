<?php 
class M_parent extends CI_Model {
		function __construct(){
		parent::__construct();
	}
	function tampil_menu(){
		$sql = "SELECT * FROM m_anakan WHERE id_anakan = 10";
		$rootquery = $this->db->query($sql);
		return $rootquery->row();
	}
	function checkParent($idParent){
		$sql = "SELECT * FROM m_anakan WHERE id_indukan = $idParent";
		$queryCheckParent = $this->db->query($sql);
		return $queryCheckParent;
	}
	function checkChild($idParent){
		$sql = "SELECT * FROM CHILD WHERE PARENT_ID = $idParent ORDER by ANAK_KE ASC ";
		$queryCheckChild = $this->db->query($sql);
		return $queryCheckChild;
	}
}
?>