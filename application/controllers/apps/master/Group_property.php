<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_property extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Group'));
		
		if(!$this->session->userdata('ex_logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger">Anda harus login dahulu <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){		     
		$data['title']='Master Group Property';
		$data['main']='template/property/property_view'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function view_Data(){
        $data=$this->M_Group->get_Data();
        echo json_encode($data);
    }
	
	public function get_Data_by_id(){
        $id=$this->input->get('id');
        $data=$this->M_Group->get_Data_by_id($id);
        echo json_encode($data);
    }
	
	public function add(){		
	
		 $data = array(
        'group_rumah'=>$this->input->post('nama'),
		'alamat'=>$this->input->post('alamat'),	
		'luas_tanah'=>$this->input->post('luas')	
          );
        $save=$this->M_Group->simpan_Data($data);		
        
		   	 
		
	}
	
	public function update(){
		
	 $data = array(
        'group_rumah'=>$this->input->post('nama'),
		'alamat'=>$this->input->post('alamat'),	
		'luas_tanah'=>$this->input->post('luas'),
		'aktif'=>$this->input->post('aktif')		     
          );
		$id=$this->input->post('id');
        $save=$this->M_Group->update_Data($data,$id);
		
	}
	
	function hapus(){
        $id=$this->input->post('kode');
        $data=$this->M_Group->hapus_Data($id);
       
    }

}