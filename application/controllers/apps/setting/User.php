<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_User'));
		
		if(!$this->session->userdata('ex_logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger">Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function index(){
		
		$data['title']='Setting User';     
		$data['user']=$this->M_User->get_User();
		$data['main']='template/user/user_view'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function reset_password(){
		
		$data['title']='Reset Password';     
		$data['user']=$this->M_User->get_User();
		$data['main']='template/user/reset_password'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function view_user(){
        $data=$this->M_User->get_User();
        echo json_encode($data);
    }
	
	public function get_user_by_id(){
        $id=$this->input->get('id');
        $data=$this->M_User->get_user_by_id($id);
        echo json_encode($data);
    }
	
	public function add(){	

		$errorMSG = "";		
			
			if (empty($_POST["nama"])) {

				$errorMSG = "<li> &times; Nama lengkap harus diisi</li>";

			}
			if (empty($_POST["dept"])) {

				$errorMSG = "<li> &times; Department harus diisi</li>";

			}
			
			if (empty($_POST["email"])) {

				$errorMSG .= "<li> &times; Email harus diisi</li>";

			}
			if (empty($_POST["level"])) {

				$errorMSG .= "<li> &times; Level user harus diisi</li>";

			}
			if (empty($_POST["user"])) {

				$errorMSG .= "<li> &times; Username harus diisi</li>";

			}
			if (empty($_POST["pwd"])) {

				$errorMSG .= "<li> &times; Password harus diisi</li>";

			}
			
			if(empty($errorMSG)){
				// Cek exist data detail			
			$this->db->where('username',$this->input->post('user'));			
			$query = $this->db->get('tbl_user');
			// query update/insert data detail material
			if ($query->num_rows() > 0){	
			 
			echo json_encode(['code'=>404, 'msg'=>' &times; Username sudah digunakan']);

			} else {
				
			$password=password_hash($this->input->post('pwd'),PASSWORD_BCRYPT);	
			
			 $data = array(
			'nama'=>$this->input->post('nama'),
			'email'=>$this->input->post('email'),
			'dept'=>$this->input->post('dept'),
			'level'=>$this->input->post('level'),
			'aktif'=>'1',
			'username'=>$this->input->post('user'),
			'password'=>$password
			  );
			$msg=$this->M_User->simpan_Data($data);		
        
		   	 echo json_encode(['code'=>200, 'msg'=>$msg]);
			}
        
			}  else {
			
			echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
			
		}
		
	}
	
	public function update(){
		
	 $data = array(
        'nama'=>$this->input->post('nama'),
		'email'=>$this->input->post('email'),
		'dept'=>$this->input->post('dept'),
		'level'=>$this->input->post('level'),
		'aktif'=>$this->input->post('aktif'),
		'username'=>$this->input->post('user')        
          );
		$id=$this->input->post('id');
        $save=$this->M_User->update_Data($data,$id);
		
	}
	
	function hapus(){
        $id=$this->input->post('kode');
        $data=$this->M_User->hapus_Data($id);
       
    }
	
	function do_reset(){
		
		$password=password_hash($this->input->post('password'),PASSWORD_BCRYPT);		
        $data = array(        
		'password'=>$password		
          );
		  
		$id=$this->input->post('iduser');
        $save=$this->M_User->update_Data($data,$id);
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success"> Password berhasil direset <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
		redirect('index.php/apps/setting/user/reset_password');
       
    }

}