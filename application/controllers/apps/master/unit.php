<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Unit','M_Group'));
		
		if(!$this->session->userdata('ex_logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger">Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){	
		$data['title']='Data Driver';	
		$data['main']='template/unit/unit_view'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function view_Data(){
        $data=$this->M_Unit->get_Data();
        echo json_encode($data);
    }
	
	public function get_Data_by_id(){
        $id=$this->input->get('id');
        $data=$this->M_Unit->get_Data_by_id($id);
        echo json_encode($data);
    }
	
	public function add(){		
	
		 $data = array(
        'nama'=>$this->input->post('nama'),
		'email'=>$this->input->post('email'),
		'nrp'=>$this->input->post('type'),	
		'npwp'=>$this->input->post('group'),
		'bank'=>$this->input->post('luas'),
		'norek'=>$this->input->post('norek'),
		'atasnama'=>$this->input->post('bangunan')
          );
        $save=$this->M_Unit->simpan_Data($data);		
        
		   	 
		
	}
	
	public function update(){
		
	 $data = array(
        'nama'=>$this->input->post('nama'),
		'email'=>$this->input->post('email'),
		'nrp'=>$this->input->post('nrp'),	
		'npwp'=>$this->input->post('npwp'),
		'bank'=>$this->input->post('bank'),
		'norek'=>$this->input->post('norek'),
		'atasnama'=>$this->input->post('atasnama')		     
          );
		$id=$this->input->post('id');
        $save=$this->M_Unit->update_Data($data,$id);
		
	}
	
	function hapus(){
        $id=$this->input->post('kode');
        $data=$this->M_Unit->hapus_Data($id);
       
    }

}