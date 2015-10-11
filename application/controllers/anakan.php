<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Anakan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!($this->session->userdata('logged_in'))){
			redirect('login','refresh');
		}
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
	function validasi(){
		$data = $this->input->post('username');
		$result = $this->m_anakan->validasi($data);
		echo $result;
	}
	function saveData(){
		$data['id_indukan'] = $this->input->post('indukan');
		$data['nomor_ring'] = $this->input->post('nomor_ring');
		$data['kode_ring'] = $this->input->post('kode_ring');
		$data['id_kandang'] = $this->input->post('kandang');
		$data['jenis_kelamin'] = $this->input->post('jk');
		$data['status'] = $this->input->post('status');
		$data['tanggal_lahir'] = date('Y-m-d', strtotime($this->input->post('date')));
		$id = @$this->input->post('id_anakan');
		$user = $this->session->userdata('username');
		$date = date('Y-m-d H:i:s');

		$this->m_anakan->saveData($data,$user,$date,$id);
	}

	function inputan(){
		$data['kandang'] = $this->m_anakan->select_listKandang();
		$data['indukan'] = $this->m_anakan->select_listindukan();
		$this->load->view('anakan/inputanakan',$data);
	}
    function get(){
    	$data['kandang'] = $this->m_anakan->select_listKandang();
    	$data['indukan'] = $this->m_anakan->select_listindukan();
    	$id = $this->input->get('id');
        $data['anakan'] = $this->m_anakan->get($id);
		$this->load->view("anakan/editanakan",$data);
    }

    function export_print(){
    	$this->load->view("anakan/printAnakan");
    }

    function cetak(){
    	$periode = $this->input->post('period');
    	$start = date('Y-m-d', strtotime($this->input->post('start')));
    	$end = date('Y-m-d', strtotime($this->input->post('end')));
    	$bln = $this->input->post('bln');
    	$thn = $this->input->post('thn');
    	@$outputType = $this->input->post('btn');

    	
    	$data["data_print"] = $this->m_anakan->cetak($start, $end, $periode, $bln, $thn);
    	$print_view=$this->load->view("indukan/p_m_indukan.php",$data,TRUE);
		if($outputType == 'EXCEL'){
			$print_file=fopen("print/m_indukan_printlist.xls","w+");
		}else{
			$print_file=fopen("print/m_indukan_printlist.html","w+");
		}
		fwrite($print_file, $print_view);
		echo "1";
    }
    
}