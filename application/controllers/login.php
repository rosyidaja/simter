<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_login');
		$this->load->helper('url');
		$this->load->library('input');
	}
	function index(){
		$this->load->view('dashboard/login.html');
	}

	function ceklogin(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$temp_account = $this->m_login->cek_account($username, $password)->row();
		$num_account = count($temp_account);
 
		if($num_account > 0)
		{
			$array_items = array( 
				'id_user' => $temp_account->user_id, 
				'username' => $temp_account->username,
				'level' => $temp_account->level, 
				'logged_in' => true ); 

			$this->session->set_userdata($array_items);
			
			 echo "1";	
		}
		else
		{
			echo "0";
		}
	}

	function logout(){
		$array_items = array( 
				'id_user' => '', 
				'username' => '',
				'level' => '', 
				'logged_in' => FALSE );
		$this->session->unset_userdata($array_items);
		redirect('login','refresh');
	}

	function saveData(){
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		$data['nama_lengkap'] = $this->input->post('nama_lengkap');
		$data['email'] = $this->input->post('email');
		$data['alamat'] = $this->input->post('alamat');
		$data['level'] = $this->input->post('level');
		$id = @$this->input->post('user_id');
		$user = $this->session->userdata('username');
		$date = date('Y-m-d H:i:s');

		$this->m_login->saveData($data,$user,$date,$id);
	}

	function delete(){
		$id=$this->input->post('id');
		$data = array(
			"user_id" => $id
			);
		$this->m_login->delete($data);
	}

	function get(){
		$id = $this->input->get('id');
		$data['user'] = $this->m_login->select_id($id);
		$this->load->view("dashboard/editUser",$data);
	}
}