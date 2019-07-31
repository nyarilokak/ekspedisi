<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cash_flow extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Transaction','M_Material','M_Report'));
		
		if(!$this->session->userdata('logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger"> Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}
	
	public function index(){		
		$data['title']='Transaksi Cash Flow';
		$data['kode_masuk']=$this->M_Transaction->get_Kode_CashFlow();
		if(isset($_GET['query'])) { 
    	$data['report']= $this->M_Report->laporan_cash_flow();
		}
		$data['main']='template/transaction/transaksi_cash_flow'; 
		$this->load->view('template/main_layout',$data);
	}

	
	public function save_cash_flow() {
		
		if(isset($_POST['simpan'])) {	
		
		// variabel post input header 
			// Simpan transaksi Header
			$notransaksi=$this->input->post('notransaksi');	
			$tgltransaksi=$this->input->post('tanggal');	
			$jenis=$this->input->post('jenis');	
			$alokasi=$this->input->post('alokasi');				
			$biaya=$this->input->post('biaya');	
			
			$sql=$this->db->query("SELECT saldo FROM tbl_saldo WHERE flag='$jenis' AND saldo < '$biaya' ");
			
			$row=$sql->result();
			
			if($sql->num_rows() > 0) {
							
			$this->session->set_flashdata('sukses','<div class="alert alert-danger"> Sisa saldo tidak mencukupi jumlah biaya pengeluaran <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/cash_flow');				
					
			}  else {
			
			$data = array(
			'no_trx'=>$notransaksi,
			'tglflow'=>$tgltransaksi,		
			'type'=>$jenis,
			'alokasi'=>strtoupper($alokasi),
			'nominal'=>$biaya,			
			'iduser'=>$this->session->userdata('iduser')
			  );
			$save=$this->M_Transaction->simpan_cash_flow($data);			
			
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Transaksi berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/cash_flow');
			
			
			}
			
		}
		
	}
	
	public function failed($id) {
		
			$this->db->query("DELETE FROM tbl_cash_flow WHERE idcashflow='$id'");
		
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Transaksi telah dibatalkan <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/cash_flow');	
		
	}
	
	
}