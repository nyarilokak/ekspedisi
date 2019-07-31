<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct() {
		
 	    parent::__construct();
        $this->load->library('session');
		$this->load->helper('url');
		

 }
	
	public function index()
	{
		$this->load->view('login_form');
	}
	
		 // Fungsi login
	public function do_login() {

	 $username = $this->input->post('username');
	 $password = $this->input->post('password');
	 
	 $query = $this->db->get_where('tbl_user',array('aktif'=>'1','username'=>$username,'password' => password_verify($password)));
	 if($query->num_rows() == 1) {
	 $row = $this->db->query("SELECT * FROM tbl_user WHERE username ='".$username."' ");
	 $data = $row->row();
	 
	 if(password_verify($password,$data->password)==true) {
	
	
	// Add  data in session
	$this->session->set_userdata('ex_nama', $data->nama);
	$this->session->set_userdata('ex_iduser', $data->iduser);
	$this->session->set_userdata('levelapps', $data->level);
	$this->session->set_userdata('ex_logged_in',true);
	 
	 redirect('index.php/apps/dashboard');
	 
	 } else {
		 
	 $this->session->set_flashdata('sukses','<div class="alert alert-warning"> Password anda salah <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>');
	 redirect('index.php/welcome');	 
	 }
	 }else {
		 
	 $this->session->set_flashdata('sukses','<div class="alert alert-warning"> Username anda salah <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>');
	 redirect('index.php/welcome');
	 }

	 
	 }
	 
function logout()
{
    $user_data = $this->session->all_userdata();
	
        foreach ($user_data as $key => $value) {
            if ($key == 'ex_logged_in' && $key == 'ex_nama' && $key == 'ex_iduser' && $key == 'level_akses') {
                $this->session->unset_userdata($key);
            }
        }
    $this->session->sess_destroy();
    redirect('index.php/welcome');
}

}
