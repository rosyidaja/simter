<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Anakan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('input');
		$this->load->model('m_anakan');
	}
	function index(){
		$data['anakan'] = $this->m_anakan->select_list();
		$this->load->view('anakan/anakan',$data);
	}
	function delete(){
		$id=$this->input->post('id');
		$data = array(
			"id_anakan" => $id
			);
		$this->m_anakan->delete($data);
		
	}
	function tambahData(){
		/* $data['nama_kandang'] = $this->input->post('nama_kandang');
		$data['kode_warna'] = $this->input->post('kode_kandang');
		$data['status'] = $this->input->post('status');
		$data['create_by'] = 'Admin';
		$this->m_anakan->tambahData($data); */
		$id_indukan = $this->input->post('indukan');
		$induk = $this->m_anakan->getIndukan($id_indukan);
		foreach($induk as $row){
			$datum['ring_jantan'] = $row->ring_jantan;
			$datum['ring_betina'] = $row->ring_betina;
		}
		$data['nomor_ring'] = $this->input->post('nomor_ring');
		$data['kode_ring'] = $this->input->post('kode_ring');
		$data['id_kandang'] = $this->input->post('kandang');
		$data['jenis_kelamin'] = $this->input->post('jk');
		$date = $this->input->post('date');
		$data['status'] = $this->input->post('status');
		$data['created_by'] = 'Admin';

		$this->m_anakan->tambahData($data, $date, $datum);
		redirect(site_url('anakan'));
	}

	function inputan(){
		$data['kandang'] = $this->m_anakan->select_listKandang();
		$data['indukan'] = $this->m_anakan->select_listindukan();
		$this->load->view('anakan/inputanakan',$data);
	}
    function get(){
    	$data['kandang'] = $this->m_anakan->select_listKandang();
    	$id = $this->input->get('id');
        $data['anakan'] = $this->m_anakan->get($id);
		$result = $this->load->view("anakan/editanakan",$data);
		echo $result;
    }
    function edit(){
    $id_anakan = $this->input->post('id_anakan');
     	$data['nomor_ring'] = $this->input->post('nomor_ring');
		$data['kode_ring'] = $this->input->post('kode_ring');
		$data['id_indukan'] = $this->input->post('indukan');
		$data['id_kandang'] = $this->input->post('kandang');
		$date = $this->input->post('date');
		$data['status'] = $this->input->post('status');
        $data['update_by'] = 'Admin';
        $this->m_anakan->edit($data,$id_anakan);
        redirect(site_url('anakan'));
    }
}