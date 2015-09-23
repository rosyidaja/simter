<?php 
Class M_anakan extends CI_Model{
	function __construt(){
		parent::__construt();
	}
	function select_list(){
		$sql = "SELECT a.*,
		ring_jantan,
		ring_betina,
		prah_jantan,
		prah_betina
		 FROM m_anakan a
		 LEFT JOIN m_indukan b ON a.id_indukan = b.id_indukan
		  order by kode_ring asc";
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
        $sql = "SELECT * from m_anakan where id_anakan = '$id' ";
        $rootquery = $this->db->query($sql);
        return $rootquery->row();
    }

	function validasi($data){
		
		$sql = "SELECT * FROM m_anakan where nomor_ring = '$data' ";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return '0';
		}else{
			return '1';
		}

	}
	function saveData($data,$user,$date,$id_anakan){
		if($id_anakan == 0){
			$data['created_by'] = $user;
			$data['created_date'] = $date;
			$this->db->insert('m_anakan',$data);
		}else{
			$data['update_by'] = $user;
			$data['update_date'] = $date;
			$this->db->set('anakan_revised', '(anakan_revised+1)', FALSE);
			$this->db->where('id_anakan', $id_anakan);
			$this->db->update('m_anakan', $data);
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