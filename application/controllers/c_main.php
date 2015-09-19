<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_main extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		if (!($this->session->userdata('logged_in'))){
			redirect('login','refresh');
		}
	}

	public function index(){
		$this->load->view('dashboard/dashboard');
	}
}