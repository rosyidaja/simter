<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_main extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('dashboard/dashboard');
	}
}