<?php 
Class M_burung extends CI_Model{
	var $main_sql = "Select id_burung,
						nomor_ring,
						indukan_jantan,
						indukan_betina,
						burung_aktif
					From m_burung
					Where id_burung IS NOT NULL";
	function __construt(){
		parent::__construt();
	}
	function select_list(){
		$sql = $this->main_sql;
		$query = $this->db->query($sql);
		return $query->result();

	}
	function validasi($data){
		$sql = $this->main_sql;
		$sql .= " and nomor_ring = '$data' ";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return '0';
		}else{
			return '1';
		}

	}
	function saveData($data,$user,$date,$id_burung){
		if($id_burung == 0){
			$data['burung_create_by'] = $user;
			$data['burung_create_date'] = $date;
			$this->db->insert('m_burung',$data);
		}else{
			$data['burung_create_by'] = $user;
			$data['burung_create_date'] = $date;
			$this->db->set('burung_revised', '(burung_revised+1)', FALSE);
			$this->db->where('id_burung', $id_burung);
			$this->db->update('m_burung', $data);
		}
	}
}
?>