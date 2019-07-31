<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {
	
	function __construct(){
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

	public function in(){		
		$data['title']='Report Material Masuk';
		if(isset($_GET['query'])) { 
    	$data['report']= $this->M_Report->laporan_masuk();
		}
		$data['main']='template/report/transaksi_masuk'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function out(){		
		$data['title']='Report Material Keluar';
		$data['group']=$this->M_Group->get_Data();
		$data['unit']=$this->M_Unit->get_Data();
		if(isset($_GET['query'])) { 
    	$data['report']= $this->M_Report->laporan_keluar();
		}
		$data['main']='template/report/transaksi_keluar'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function stock_on_hand(){		
		$data['title']=' Stock On Hand  Material';
		$data['material']=$this->M_Material->get_Data();				
		$data['main']='template/report/stock_on_hand'; 
		$this->load->view('template/main_layout',$data);
	}

	public function batal(){		
		$data['title']='Report Transaksi Batal';
		if(isset($_GET['query'])) { 
    	$data['report']= $this->M_Report->batal_transaksi();
		}
		$data['main']='template/report/transaksi_batal'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function rab_vs_actual(){		
		$data['title']='Report RAB VS Actual';    	
		$data['unit']= $this->M_Unit->get_Data();
		$data['main']='template/report/rab_vs_actual'; 
		$this->load->view('template/main_layout',$data);
	}

}