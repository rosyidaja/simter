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
	function select_listburungjantan(){
		$sql = "SELECT * FROM m_burung where jenis_kelamin = 'j' ";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
	function select_listburungbetina(){
		$sql = "SELECT * FROM m_burung where jenis_kelamin = 'b' ";
		$rootquery = $this->db->query($sql);
		return $rootquery->result();
	}
    function get($id){
        $sql = "SELECT * from m_indukan where id_indukan = $id";
        $rootquery = $this->db->query($sql);
        return $rootquery->row();
    }
	function delete($data){
		$this->db->delete('m_indukan',$data);
	}

	function saveData($data, $user, $date, $id_indukan){
		if($id_indukan == 0){
			$data['created_by'] = $user;
			$data['created_date'] = $date;
			$this->db->insert('m_indukan',$data);
			$id = $this->db->insert_id();
			$this->processPrah($id);
		}else{
			$data['update_by'] = $user;
			$data['update_date'] = $date;
			$this->db->set('indukan_revised', '(indukan_revised+1)', FALSE);
			$this->db->where('id_indukan', $id_indukan);
			$this->db->update('m_indukan', $data);
			$this->processPrah($id_indukan);
		}
		if($this->db->affected_rows()){
			return '1';
		}else{
			return '0';
		}
		
	}

	function processPrah($id){
		$sql = "select ring_jantan,ring_betina from m_indukan where id_indukan='$id' ";
		$rootquery = $this->db->query($sql);
		$rows = $rootquery->row();
		$ring_jantan = $rows->ring_jantan;
		$ring_betina = $rows->ring_betina;
		$id_indukan = $id;

		$this->cekPrahBetina($ring_betina,$id_indukan);
		$this->cekPrahJantan($ring_jantan,$id_indukan);
	}

	function cekPrahBetina($ring_betina, $id_indukan){
		$sql = "select indukan_jantan,indukan_betina from m_burung where nomor_ring='$ring_betina' and jenis_kelamin='b' ";
		$rootquery = $this->db->query($sql);
		if($rootquery->num_rows() > 0){
			$rows = $rootquery->row();
			$jantan = $rows->indukan_jantan;
			$betina = $rows->indukan_betina;

		}else{
			$sql = "select id_indukan from m_anakan where nomor_ring='$ring_betina' and jenis_kelamin='b' ";
			$rootquery = $this->db->query($sql)->row();
			$id = $rootquery->id_indukan;

			$sql2 = "select ring_jantan,ring_betina from m_indukan where id_indukan='$id' ";
			$rootquery2 = $this->db->query($sql2)->row();
			$jantan = $rootquery2->ring_jantan;
			$betina = $rootquery2->ring_betina;
		}
		$data = array(
				"prah_betina" =>$jantan .' x '. $betina
				);
			$this->db->where('id_indukan', $id_indukan);
			$this->db->update('m_indukan',$data);
	
	}
	function cekPrahJantan($ring_betina, $id_indukan){
		$sql = "select indukan_jantan,indukan_betina from m_burung where nomor_ring='$ring_betina' and jenis_kelamin='j' ";
		$rootquery = $this->db->query($sql);
		if($rootquery->num_rows() > 0){
			$rows = $rootquery->row();
			$jantan = $rows->indukan_jantan;
			$betina = $rows->indukan_betina;

		}else{
			$sql = "select id_indukan from m_anakan where nomor_ring='$ring_betina' and jenis_kelamin='j' ";
			$rootquery = $this->db->query($sql)->row();
			$id = $rootquery->id_indukan;

			$sql2 = "select ring_jantan,ring_betina from m_indukan where id_indukan='$id' ";
			$rootquery2 = $this->db->query($sql2)->row();
			$jantan = $rootquery2->ring_jantan;
			$betina = $rootquery2->ring_betina;
		}
		$data = array(
				"prah_jantan" =>$jantan .' x '. $betina
				);
			$this->db->where('id_indukan', $id_indukan);
			$this->db->update('m_indukan',$data);
	
	}
}
?>