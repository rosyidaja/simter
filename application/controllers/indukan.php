<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Indukan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!($this->session->userdata('logged_in'))){
			redirect('login','refresh');
		}
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
			"id_indukan" => $id
			);
		$this->m_indukan->delete($data);
		
	}
	function saveData(){
		$data['ring_jantan'] = $this->input->post('jantan');
		$data['ring_betina'] = $this->input->post('betina');
		$data['id_kandang'] = $this->input->post('kandang');
		$data['status'] = $this->input->post('status');
		$user = $this->session->userdata('username');
		$date =  date('Y-m-d H:i:s');
		$id   = @$this->input->post('id_indukan');
		$result = $this->m_indukan->saveData($data, $user, $date, $id);
		
		if($result == 1){
			echo "<script>alert('Berhasil Input');</script>";
			redirect(site_url('indukan'));
		}else{
			echo "<script>alert('Gagal Input');</script>";
			redirect(site_url('indukan/inputan'));
		}
	}

	function inputan(){
		$data['kandang'] = $this->m_indukan->select_listKandang();
		$data['anakan_jantan'] = $this->m_indukan->select_listanakanjantan();
		$data['anakan_betina'] = $this->m_indukan->select_listanakanbetina();
		$data['burung_jantan'] = $this->m_indukan->select_listburungjantan();
		$data['burung_betina'] = $this->m_indukan->select_listburungbetina();
		$this->load->view('indukan/inputindukan',$data);
	}
    function get(){
    	$data['anakan_jantan'] = $this->m_indukan->select_listanakanjantan();
		$data['anakan_betina'] = $this->m_indukan->select_listanakanbetina();
		$data['burung_jantan'] = $this->m_indukan->select_listburungjantan();
		$data['burung_betina'] = $this->m_indukan->select_listburungbetina();
    	$data['kandang'] = $this->m_indukan->select_listKandang();
    	$id = $this->input->get('id');
        $data['indukan'] = $this->m_indukan->get($id);
		$result = $this->load->view("indukan/editindukan",$data);
		echo $result;
    }
    function export_print(){
    	$this->load->view("indukan/printIndukan");
    }
    function cetak(){
    	$periode = $this->input->post('period');
    	$start = date('Y-m-d', strtotime($this->input->post('start')));
    	$end = date('Y-m-d', strtotime($this->input->post('end')));
    	$bln = $this->input->post('bln');
    	$thn = $this->input->post('thn');
    	@$outputType = $this->input->post('btn');

    	
    	$data["data_print"] = $this->m_indukan->cetak($start, $end, $periode, $bln, $thn);
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