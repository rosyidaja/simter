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
	function tambahData(){
		$data['nama_kandang'] = $this->input->post('nama_kandang');
		$data['kode_warna'] = $this->input->post('kode_kandang');
		$data['status'] = $this->input->post('status');
		$data['create_by'] = 'Admin';
		$this->m_kandang->tambahData($data);
	}

	function inputan(){
		$this->load->view('inputkandang');
	}
    function get(){
        $id=$this->input->post('id');
        $data['kandang'] = $this->m_kandang->get($id);
        $result = $this->load->view("editkandang",$data);
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
	
/*======================================= ssp_tm_alkes ===================================
	function list_kandang(){
		$aColumns = array('id_kandang', 'nama_kandang', 'kode_warna', 'status', 'add_data');
        
        $sIndexColumn = "id_kandang";

         // paging
        $sLimit = "";
        if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
            $sLimit = "LIMIT ".mysqli_real_escape_string( $_GET['iDisplayStart'] ).", ".
                mysqli_real_escape_string( $_GET['iDisplayLength'] );
        }
        $numbering = mysqli_real_escape_string( $_GET['iDisplayStart'] );
        $page = 1;
        
        // ordering
        if ( isset( $_GET['iSortCol_0'] ) ){
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ){
                if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ){
                    $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                        ".mysqli_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
                }
            }
            
            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" ){
                $sOrder = "";
            }
        }
        // filtering
        $sWhere = "";
        if ( $_GET['sSearch'] != "" ){
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ ){
                $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string( $_GET['sSearch'] )."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }
         // individual column filtering
        for ( $i=0 ; $i<count($aColumns) ; $i++ ){
            if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ){
                if ( $sWhere == "" ){
                    $sWhere = "WHERE ";
                }
                else{
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($_GET['sSearch_'.$i])."%' ";
            }
        }
        $rResult = $this->m_kandang->list_kandang($aColumns, $sWhere, $sOrder, $sLimit);
        $iFilteredTotal = 10;

        $rResultTotal = $this->m_kandang->list_kandang_total($sIndexColumn);
        $iTotal = $rResultTotal->num_rows();
        $iFilteredTotal = $iTotal;

        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        foreach ($rResult->result_array() as $aRow){
            $row = array();
            for ( $i=0 ; $i<count($aColumns) ; $i++ ){
                
                if($i < 1)
                    $row[] = $numbering+$page.'|'.$aRow[ $aColumns[$i] ];
                else
                    $row[] = $aRow[ $aColumns[$i] ];
            }
            $page++;
            $output['aaData'][] = $row;
        }
        
        echo json_encode( $output );

	}
	
    
    ======================================= end of ssp_tm_alkes =================================== */
}
