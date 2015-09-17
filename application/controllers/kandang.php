<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kandang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('input');
		$this->load->model('m_kandang');
	}

	function index(){
		$data['kandang'] = $this->m_kandang->select_list();
		$this->load->view('kandang/kandang',$data);
	}

	function delete(){
		$id=$this->input->post('id');
		$data = array(
			"id_kandang" => $id
			);
		$this->m_kandang->delete($data);
		
	}
	function tambahData(){
		$data['nama_kandang'] = $this->input->post('nama_kandang');
		$data['kode_warna'] = $this->input->post('kode_kandang');
		$data['status'] = $this->input->post('status');
		$data['create_by'] = 'Admin';
		$this->m_kandang->tambahData($data);
	}

	function inputan(){
		$result = $this->load->view('kandang/inputkandang');
        return $result;
	}
    function get(){
        $id=$this->input->post('id');
        $data['kandang'] = $this->m_kandang->get($id);
        $result = $this->load->view("kandang/editkandang",$data);
        return $result;
    }
    function edit(){
    $id_kandang = $this->input->post('id_kandang');
      $data['nama_kandang'] = $this->input->post('nama_kandang');
        $data['kode_warna'] = $this->input->post('kode_kandang');
        $data['status'] = $this->input->post('status');
        $data['update_by'] = 'Admin';
        $this->m_kandang->edit($data,$id_kandang);
    }
}
