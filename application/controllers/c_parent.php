<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_parent extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_parent');
	}

	function index(){
		$menus = $this->m_parent->tampil_menu();
		
		$result = '';
		$result .= '<ul class="tv">';
		$result .= '<li class="tvclosed">';
			$result .= '<a href="#ajaxcontent" onclick="process('. $menus->id_anakan .');">'. $menus->nomor_ring .'</a>';
			$result .= $this->checkParent($menus->id_anakan);
		$result .= '</li>';
		$result .= '</ul>';
		$data['result'] = $result;
		
		$this->load->view('indukan/materiIndukan',$data);
	}
	
	function checkParent($idParent){
		$res = '';
		$parent = $this->m_parent->checkParent($idParent);
		if($parent->num_rows() > 0){
			$res .= '<ul>';
			$records = $parent->result();
			if(count($records) > 0 ){
				foreach($records AS $sub){
					$res .= '<li class="tvclosed">';
						$res .= '<button>Test</button>';
						$res .= '<a href="#" onclick="process('. $sub->id_anakan .');">'. $sub->nomor_ring .'</a>';
						$res .= $this->checkParent($sub->id_anakan);
					$res .= '</li>';
				}
			}
			$res .= '</ul>';
			//$res .= $this->checkChild($idParent);
		}
		return $res;
	}
	
	/*function checkChild($idParent){
		$res = '';
		$child = $this->m_parent->checkChild($idParent);
		if($child->num_rows() > 0){
			$records = $child->result();
			if(count($records) > 0){
					foreach($records AS $sub){
						$res .= '<li>';
						$res .= '<a href="#" onclick="processChild('. $sub->ID .');">' .$sub->NAMA .'</a>';
						$res .= '</li>';
						
					}
				}
			}
		return $res;
	} */
	
	
}