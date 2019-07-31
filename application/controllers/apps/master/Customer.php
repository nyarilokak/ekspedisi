<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Customer','M_Group'));
		
		if(!$this->session->userdata('ex_logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger">Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){	
		$data['title']='Data Customer';	
		$data['main']='template/customer/customer_view'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function view_Data(){
        $data=$this->M_Customer->get_Data();
        echo json_encode($data);
    }
	
	public function get_Data_by_id(){
        $id=$this->input->get('id');
        $data=$this->M_Customer->get_Data_by_id($id);
        echo json_encode($data);
    }
	
	public function add(){		
	
		 $data = array(
        'cabang'=>$this->input->post('cabang'),
		'cmd'=>$this->input->post('cmd'),
		'customer'=>$this->input->post('customer')
          );
        $save=$this->M_Customer->simpan_Data($data);		
        
		   	 
		
	}
	
	public function update(){
		
	 $data = array(
        'cabang'=>$this->input->post('cabang'),
		'cmd'=>$this->input->post('cmd'),
		'customer'=>$this->input->post('customer')		     
          );
		$id=$this->input->post('id');
        $save=$this->M_Customer->update_Data($data,$id);
		
	}
	
	function hapus(){
        $id=$this->input->post('kode');
        $data=$this->M_Customer->hapus_Data($id);
       
    }

}