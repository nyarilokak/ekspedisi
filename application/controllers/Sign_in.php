<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_in extends CI_Controller {


// Load View Login
public function index() {
$this->load->view('login_form');
}

/*
// Load View Login
public function reset_password() {
$this->load->view('reset_password');
}
 // Fungsi login
public function do_login() {

 $username = $this->input->post('username');
 $password = $this->input->post('password');
 
 $query = $this->db->get_where('master_employee',array('STATUS_LAMAR'=>3,'USERNAME'=>$username,'PASSWORD' => password_verify($password)));
 if($query->num_rows() == 1) {
 $row = $this->CI->db->query('SELECT * FROM master_employee WHERE USERNAME = "'.$username.'"');
 $admin = $row->row();
 
 if(password_verify($password,$admin->PASSWORD)==true) {
 $id = $admin->IDEMPLOYEE;
 $this->CI->session->set_userdata('USEREMPLOYEE', strtoupper($username));
 $this->CI->session->set_userdata('NAMEEMPLOYEE', $admin->FCNAME);
 $this->CI->session->set_userdata('UNITEMPLOYEE', $admin->UNITCODE);
 $this->CI->session->set_userdata('CODEEMPLOYEE', $admin->FCCODE);
 $this->CI->session->set_userdata('JABATANEMPLOYEE', $admin->JABATAN);
 $this->CI->session->set_userdata('STTS_APPROVE', $admin->STATUS_APPS_USER);
 $this->CI->session->set_userdata('IPUSER', $this->input->ip_address());
 $this->CI->session->set_userdata('UNIXID', uniqid(rand()));
 $this->CI->session->set_userdata('IDEMPLOYEE', $id);
 $this->CI->session->set_userdata('IDABSEN', $admin->IDABSEN);
 redirect('index.php/system/dashboard');
 
 } else {
	 
 $this->CI->session->set_flashdata('sukses','<div class="text-danger">  Password yang anda masukan salah <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <i class="fa fa-times"></i> </button>  </div>');
 redirect('index.php/front_end/sign_in');	 
 }
 }else {
	 
 $this->CI->session->set_flashdata('sukses','<div class="text-danger">  Username yang anda masukan salah <button type="button" class="close"   data-dismiss="alert" aria-hidden="true"> <i class="fa fa-times"></i> </button>  </div>');
 redirect('index.php/front_end/sign_in');
 }

 
 }

 // Proteksi halaman
 public function cek_login() {
 if($this->session->userdata('iduser') == '') {
 $this->session->set_flashdata('sukses','Anda harus login terlebih dahulu');
 redirect('index.php/front_end/sign_in');
 }
 }
 // Fungsi logout
 public function logout() {
	 
 $this->session->unset_userdata('USEREMPLOYEE');
 $this->session->unset_userdata('NAMEEMPLOYEE');
 $this->session->unset_userdata('UNITEMPLOYEE');
 $this->session->unset_userdata('UNIXID');
 $this->session->unset_userdata('IDEMPLOYEE');
 $this->session->unset_userdata('CODEEMPLOYEE');
 $this->session->unset_userdata('IPUSER');
 $this->session->unset_userdata('IDABSEN');
 $this->session->unset_userdata('STTS_APPROVE');
 $this->session->unset_userdata('JABATANEMPLOYEE');
 
 $this->session->set_flashdata('sukses',' <div class="text-success">  Anda telah keluar dari sistem  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
 redirect('index.php/front_end/sign_in');
 }

 public function forgot_password() {
 $email=$this->input->post('email');
 $username=$this->input->post('username');
 $query = $this->db->get_where('users',array('username'=>$username,'email' => $email));
 $row=$query->row();
 if($query->num_rows() == 1) {
 
 		$isi="Dear ".$row->nama." <br> Silahkan lakukan reset password melalui link dibawah ini : <br> <a href='".base_url()."index.php/front_end/reset_password/".md5($row->id_user)."'>".base_url()."index.php/front_end/reset_password/".md5($row->id_user)."</a>";
		$mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';	
						
	// set smtp
        $mail->isSMTP();
        $mail->Host = 'exchnlb.trac.astra.co.id';
        $mail->Port = '25';
        $mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";
        $mail->Username = 'trac\adminga_palembang';
        $mail->Password = 'semangat6@';
      //  $mail->WordWrap = 50;  	
 
		
		$recipients = array(
        $row->email => $row->nama
         );	
        $mail->setFrom('adminga_palembang@trac.astra.co.id', 'Reset Password');
        foreach($recipients as $email => $name) {
        $mail->AddAddress($email, $name);
        }
        $mail->Subject ='Reset Password';		
		$mail->isHTML(true);
        $mail->MsgHTML($isi);
		if($mail->send()) 
  	{
			
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Link reset password telah dikirim ke Email  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div> ');
			 redirect('index.php/front_end/sign_in');	
			
				
            }  else {
		
			$this->session->set_flashdata('sukses','<div class="alert alert-error"> '.$mail->ErrorInfo.' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>');
         redirect('index.php/front_end/sign_in');
			
		 
		 }

}else {
 $this->session->set_flashdata('sukses','<div class="alert alert-error"> Data tidak ditemukan <button type="button" class="close"                data-dismiss="alert" aria-hidden="true"> &times; </button>  </div>');
 redirect('index.php/front_end/sign_in');
   }
   
}

public function proccess_reset() {
			if(isset($_POST['reset'])) {
			 $pwd=$this->input->post('password');
			 $x = array(
			 'password'  =>md5($pwd)
			 );

            $id['md5(id_user)'] = $this->input->post('id');  

            $this->model_order->password_update($x,$id);
                
            $this->session->set_flashdata('sukses','<div class="alert alert-success"> Sukses, Silahkan login kembali<button type=\'button\' class="close" data-dismiss="alert" aria-hidden=\'true\'><i class=\'fa fa-times-circle\'></i></button></div>');
				
           redirect('index.php/front_end/sign_in');
	}
}

*/
}
