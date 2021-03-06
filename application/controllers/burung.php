<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Burung extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!($this->session->userdata('logged_in'))){
			redirect('login','refresh');
		}
		$this->load->helper('url');
		$this->load->library('input');
		$this->load->model('m_burung');
	}
	function index(){
		$data['burung'] = $this->m_burung->select_list();
		$this->load->view('burung/burung',$data);
	}
	function input(){
		$this->load->view('burung/inputburung');
	}
	function get(){
		$id = $this->input->get('id');
		$data['burung'] = $this->m_burung->select_id($id);
		$this->load->view("burung/editburung",$data);
	}

	function validasi(){
		$data = $this->input->post('username');
		$result = $this->m_burung->validasi($data);
		echo $result;
	}
	function saveData(){
		$data['nomor_ring'] = $this->input->post('nomor_ring');
		$data['indukan_jantan'] = $this->input->post('ring_jantan');
		$data['indukan_betina'] = $this->input->post('ring_betina');
		$data['jenis_kelamin'] = $this->input->post('jk');
		$id = @$this->input->post('id_burung');
		$user = $this->session->userdata('username');
		$date = date('Y-m-d H:i:s');

		$this->m_burung->saveData($data,$user,$date,$id);
		
	}
	function delete(){
		$id=$this->input->post('id');
		$data = array(
			"id_burung" => $id
			);
		$this->m_burung->delete($data);
		
	}
}