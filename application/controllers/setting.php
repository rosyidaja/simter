<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!($this->session->userdata('logged_in'))){
			redirect('login','refresh');
		}
		$this->load->helper('url');
		$this->load->library('input');
		$this->load->model('m_setting');
	}
	function index(){
		$data['user'] = $this->m_setting->select_list();
		$this->load->view('dashboard/setting',$data);
	}
	function header(){
		$this->load->view('dashboard/header');
	}
	function inputan(){
		$this->load->view('dashboard/tambahUser');
	}
	function validasi(){
		$data = $this->input->post('username');
		$result = $this->m_setting->validasi($data);
		echo $result;
	}
}