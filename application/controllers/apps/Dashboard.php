<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model('M_Home');
		
		if(!$this->session->userdata('ex_logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger"> Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){
		$data['title']='Dashboard';
		$data['material']=$this->M_Home->get_Count_Material();
		$data['group']=$this->M_Home->get_Count_Group();
		$data['unit']=$this->M_Home->get_Count_Unit();
		$data['satuan']=$this->M_Home->get_Count_Satuan();
		$data['masuk']=$this->M_Home->get_Transaksi_In();
		$data['most']=$this->M_Home->get_Most_Ekspedisi();
		$data['driver']=$this->M_Home->get_Most_Driver();
		$data['verifikasi']=$this->M_Home->get_Count_Verifikasi();
		$data['transfer']=$this->M_Home->get_Count_Wait_transfer();
		$data['lastSaldo']=$this->M_Home->get_LastMonthSaldo();
		$data['MonthSaldo']=$this->M_Home->get_MonthSaldo(); 
		$data['main']='template/home'; 				
		$this->load->view('template/main_layout',$data);
		
	}

	

}