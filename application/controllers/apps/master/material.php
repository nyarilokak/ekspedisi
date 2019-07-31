<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Material','M_Satuan','M_Jenis'));
		
		if(!$this->session->userdata('ex_logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger">Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){		
		$data['title']='Data Kendaraan';		
		$data['bbm']=$this->M_Satuan->get_Data();
		$data['main']='template/material/material_view'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function update_price(){		
		$data['title']='Pengaturan Harga Material';		
		$data['main']='template/material/update_price_material'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function view_Data(){
        $data=$this->M_Material->get_Data();
        echo json_encode($data);
    }
	
	public function get_Data_by_id(){
        $id=$this->input->get('id');
        $data=$this->M_Material->get_Data_by_id($id);
        echo json_encode($data);
    }
	
	public function add(){		
	
		$errorMSG = "";		
			
			if (empty($_POST["nopol"])) {

				$errorMSG = "<li> &times; Nomor Polisi harus diisi</li>";

			}
			
			if (empty($_POST["equipment"])) {

				$errorMSG .= "<li> &times; Equipment harus diisi</li>";

			}
			
			if (empty($_POST["tipe"])) {

				$errorMSG .= "<li> &times;  Tipe Kendaraan harus diisi</li>";

			}
			if (empty($_POST["silinder"])) {

				$errorMSG .= "<li> &times;  Silinder harus diisi</li>";

			}
			
			if (empty($_POST["bbm"])) {

				$errorMSG .= "<li> &times; BBM harus diisi</li>";

			}
			if (empty($_POST["rasio"])) {

				$errorMSG .= "<li> &times; Rasio harus diisi</li>";

			}
			
			if(empty($errorMSG)){
				// Cek exist data detail
			$this->db->where('nopol',$this->input->post('nopol'));			
			$query = $this->db->get('kendaraan');
			// query update/insert data detail material
			if ($query->num_rows() > 0){	
			 
			echo json_encode(['code'=>404, 'msg'=>' &times; Nomor Polisi sudah digunakan']);

			} else {
	
			 $data = array(
			'nopol'=>$this->input->post('nopol'),
			'equipment'=>$this->input->post('equipment'),
			'tipe'=>$this->input->post('tipe'),
			'silinder'=>$this->input->post('silinder'),
			'rasio'=>$this->input->post('rasio'),
			'idbbm'=>$this->input->post('bbm')			
			  );
			  
			$msg=$this->M_Material->simpan_Data($data);	
			
			echo json_encode(['code'=>200, 'msg'=>$msg]);
			
			}
        
			}  else {
			
			echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
			
		}
		
	}
	
	public function update(){
		
		$data = array(
			'nopol'=>$this->input->post('nopol'),
			'equipment'=>$this->input->post('equipment'),
			'tipe'=>$this->input->post('tipe'),
			'silinder'=>$this->input->post('silinder'),
			'rasio'=>$this->input->post('rasio'),
			'idbbm'=>$this->input->post('bbm')		     
          );
		$id=$this->input->post('id');
        $save=$this->M_Material->update_Data($data,$id);
		
	}
	
	function hapus(){
        $id=$this->input->post('kode');
        $data=$this->M_Material->hapus_Data($id);
       
    }
	
  public function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}
	
 public function do_update_harga() {
	
	$cek =$_POST['idmaterial'];
	$jumlah=count($cek);	
		
	for($i=0;$i<$jumlah;$i++){
	
		if($cek[$i] !="" && $_POST['harga']!="") {
		
				$this->db->query("UPDATE  tbl_material SET  harga_material='".$_POST['harga'][$i]."' WHERE idmaterial='".$cek[$i]."'");		 
	 
	 
					}
				}			
			
	$this->session->set_flashdata('sukses','<div class="alert alert-success"> Pengaturan harga material telah disimpan <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
	redirect('index.php/apps/master/material/update_price');
	
	}
	
}	