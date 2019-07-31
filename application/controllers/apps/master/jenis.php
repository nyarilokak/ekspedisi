<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Jenis'));
		
		if(!$this->session->userdata('ex_logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger">Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){		     
		$data['title']='Rute Ekspedisi';
		$data['main']='template/jenis/jenis_view'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function view_Data(){
        $data=$this->M_Jenis->get_Data();
        echo json_encode($data);
    }
	
	public function get_Data_by_id(){
        $id=$this->input->get('id');
        $data=$this->M_Jenis->get_Data_by_id($id);
        echo json_encode($data);
    }
	
	public function add(){		
	
		 $data = array(
        'namarute'=>$this->input->post('satuan')		
          );
        $save=$this->M_Jenis->simpan_Data($data);		
        
		   	 
		
	}
	
	public function update(){
		
	 $data = array(
        'namarute'=>$this->input->post('satuan')		     
          );
		$id=$this->input->post('id');
        $save=$this->M_Jenis->update_Data($data,$id);
		
	}
	
	function hapus(){
        $id=$this->input->post('kode');
        $data=$this->M_Jenis->hapus_Data($id);
       
    }

}