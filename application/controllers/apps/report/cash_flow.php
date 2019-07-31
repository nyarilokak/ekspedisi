<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cash_flow extends CI_Controller {
	
	function __construct(){
		 error_reporting(0);
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Report','M_Group','M_Unit','M_Material'));
		
		if(!$this->session->userdata('logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger">Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){		
		$data['title']='Laporan Cash Flow';
	
    	$data['report']= $this->M_Report->cash_flow();
		
		$data['main']='template/report/cash_flow'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function monthly(){	
	
		$data['title']='Laporan Cash Flow Per Bulan';
	
    	$data['report']= $this->M_Report->cash_flow_by_month();
		
		$data['main']='template/report/cash_flow_by_month'; 
		$this->load->view('template/main_layout',$data);
	}
	
	
		// Set array for PAGINATION LIBRARY, and show view data according to page.
	public function Saldo(){
	$config = array();
	$config["base_url"] = base_url() . "index.php/pagination_controller/contact_info";
	$total_row = $this->M_Report->record_count_Saldo();
	$config["total_rows"] = $total_row;
	$config["per_page"] = 1;
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] = $total_row;
	$config['cur_tag_open'] = '&nbsp;<a class="current">';
	$config['cur_tag_close'] = '</a>';
	$config['next_link'] = 'Next';
	$config['prev_link'] = 'Previous';

	$this->pagination->initialize($config);
	if($this->uri->segment(3)){
	$page = ($this->uri->segment(3)) ;
	}
	else{
	$page = 1;
	}
	$data["results"] = $this->M_Report->fetch_data_saldo($config["per_page"], $page);
	$str_links = $this->pagination->create_links();
	$data["links"] = explode('&nbsp;',$str_links );
	
	$data['main']='template/report/saldo'; 
	// View data according to array.
	$this->load->view('template/main_layout',$data);
	}
	
	public function export ()  {
		
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Export_Cash_flow.xls");		
			
			echo '
			<center> <h3> ARUS KAS PT. BUKIT JUVI PERMATA</h3></center>
			<table width="100%" border="1">
			  <thead>
			  <tr style="color:#efefef; background-color:#0277BD">
				<th>No</th>                                         
				<th>Tanggal </th>													
				<th>Alokasi Biaya</th>
				<th>Penerimaan (Rp)</th>
				<th>Pengeluaran (Rp)</th>
				<th>Saldo Akhir(Rp)</th>													
				</tr>
			  </thead>
			  <tbody> ';
			  
			  $no=1;
			  $data= $this->db->query("CALL ViewSaldoON()");
			 foreach($data->result() as $row ) {
			  
			  echo "<tr>
				<td>  $no </td>									
				<td>  ".tanggal($row->tglflow)."</td>
				<td>  $row->alokasi</td>
				<td style=\"text-align:right\">  $row->debet </td>
				<td style=\"text-align:right\">  $row->Kredit </td>
				<td style=\"text-align:right\"> <b> $row->saldo </b></td>
			  </tr> ";
			  $no++;
			  
			 }
			   
			 echo " </tbody></table>";
			
				
		}


}