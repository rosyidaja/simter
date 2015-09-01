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
		$this->load->view('kandang',$data);
	}

	function delete(){
		$id=$this->input->post('id');
		$data = array(
			"id_kandang" => $id
			);
		$this->m_kandang->delete($data);
		
	}
	function inputan(){
		$this->load->view('testing');
	}

}