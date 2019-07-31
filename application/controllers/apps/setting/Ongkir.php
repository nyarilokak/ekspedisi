<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Jenis','M_Ongkir'));
		
		if(!$this->session->userdata('ex_logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger">Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){		     
		$data['title']='Biaya Kirim';
		$data['bbm']=$this->M_Jenis->get_Data();
		$data['main']='template/ongkir/view'; 
		$this->load->view('template/main_layout',$data);
	}
	
public function view_Data(){
        $data=$this->M_Ongkir->get_Data();
        echo json_encode($data);
    }
	
	public function get_Data_by_id(){
        $id=$this->input->get('id');
        $data=$this->M_Ongkir->get_Data_by_id($id);
        echo json_encode($data);
    }
	
	public function add(){		
	
		$errorMSG = "";		
			
			if (empty($_POST["dari"])) {

				$errorMSG = "<li> &times; Kota Asal harus diisi</li>";

			}
			
			if (empty($_POST["tujuan"])) {

				$errorMSG .= "<li> &times; Kota Tujuan  harus diisi</li>";

			}
			
			if (empty($_POST["km"])) {

				$errorMSG .= "<li> &times;  Kilometer harus diisi</li>";

			}
			
				if (empty($_POST["transport"])) {

				$errorMSG .= "<li> &times; Biaya Transport harus diisi</li>";

			}
			
			/*
			if (empty($_POST["driver"])) {

				$errorMSG .= "<li> &times;  Jasa Driver harus diisi</li>";

			}
			
		
			if (empty($_POST["asdp"])) {

				$errorMSG .= "<li> &times; Biaya ASDP harus diisi</li>";

			}
			if (empty($_POST["tol"])) {

				$errorMSG .= "<li> &times; Biaya Tol harus diisi</li>";

			} */
			if (empty($_POST["lain"])) {

				$errorMSG .= "<li> &times; Biaya Lain-lain harus diisi</li>";

			}
			
			if(empty($errorMSG)){
				// Cek exist data detail
			$this->db->where('dari',$this->input->post('dari'));	
			$this->db->where('tujuan',$this->input->post('tujuan'));	
			$query = $this->db->get('ongkir');
			// query update/insert data detail material
			if ($query->num_rows() > 0){	
			 
			echo json_encode(['code'=>404, 'msg'=>' &times; Biaya kirim  dari dan tujuan kota  sudah ada']);

			} else {
	
			 $data = array(
			'dari'=>$this->input->post('dari'),
			'tujuan'=>$this->input->post('tujuan'),
			'km'=>$this->input->post('km'),
			'jasa_driver'=>$this->input->post('driver'),
			'biaya_transport'=>$this->input->post('transport'),
			'biaya_asdp'=>$this->input->post('asdp'),
			'biaya_tol'=>$this->input->post('tol'),
			'biaya_lain'=>$this->input->post('lain')
			  );
			  
			$msg=$this->M_Ongkir->simpan_Data($data);	
			
			echo json_encode(['code'=>200, 'msg'=>$msg]);
			}
        
			}  else {
			
			echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
			
		}
		
	}
	
	public function update(){
		
		$data = array(
			'dari'=>$this->input->post('dari'),
			'tujuan'=>$this->input->post('tujuan'),
			'km'=>$this->input->post('km'),
			'jasa_driver'=>$this->input->post('driver'),
			'biaya_transport'=>$this->input->post('transport'),
			'biaya_asdp'=>$this->input->post('asdp'),
			'biaya_tol'=>$this->input->post('tol'),
			'biaya_lain'=>$this->input->post('lain')		     
          );
		$id=$this->input->post('id');
        $save=$this->M_Ongkir->update_Data($data,$id);
		
	}
	
	function hapus(){
        $id=$this->input->post('kode');
        $data=$this->M_Ongkir->hapus_Data($id);
       
    }
	

}