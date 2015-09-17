<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Indukan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('input');
		$this->load->model('m_indukan');
	}
	function index(){
		$data['indukan'] = $this->m_indukan->select_list();
		$this->load->view('indukan/indukan',$data);
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
		$data['ring_jantan'] = $this->input->post('jantan');
		$data['ring_betina'] = $this->input->post('betina');
		$data['id_kandang'] = $this->input->post('kandang');
		$data['status'] = $this->input->post('status');
		$data['created_by'] = 'Admin';
		$this->m_indukan->tambahData($data);
		redirect(site_url('indukan'));
	}

	function inputan(){
		$data['kandang'] = $this->m_indukan->select_listKandang();
		$data['jantan'] = $this->m_indukan->select_listanakanjantan();
		$data['betina'] = $this->m_indukan->select_listanakanbetina();
		$this->load->view('indukan/inputindukan',$data);
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