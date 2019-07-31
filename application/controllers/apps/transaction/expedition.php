<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class expedition extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination','PHPMailerAutoload'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Transaction','M_Jenis','M_Material','M_Unit','M_Customer'));
		
		if(!$this->session->userdata('ex_logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger"> Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}
	
	public function index(){		
		$data['title']='Request Ekspedisi';
		$data['bbm']=$this->M_Jenis->get_Data();
		$data['nopol']=$this->M_Material->get_Data();			
		$data['result']= $this->M_Transaction->cek_ongkir();
		$data['driver']= $this->M_Unit->get_Data();		
		$data['customer']= $this->M_Customer->get_Data();				
		$data['main']='template/transaction/form_ekspedisi'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function view(){		
		$data['title']='Data Ekspedisi';		
    	$data['result']= $this->M_Transaction->get_Data_Request_By_User();				
		$data['main']='template/transaction/data_request'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function request($slug,$flag){		
		$data['title']='Data Request Ekspedisi';		
        $data['result']= $this->M_Transaction->get_Data_Request_By_PDI($slug,$flag);
		if($slug=='1') {	
		$data['main']='template/transaction/data_request_pending_pdi'; 
		} elseif($slug=='2' || $slug=='3') {
		$data['main']='template/transaction/data_request_verifikasi_pdi'; 
		}		
		$this->load->view('template/main_layout',$data);
	}
	
	public function history(){		
		$data['title']='History Ekspedisi';		
    $data['result']= $this->M_Transaction->get_Data_Report_By();		
		$data['main']='template/transaction/history_request'; 				
		$this->load->view('template/main_layout',$data);
	}
	

	public function detail($id){		
		$data['title']='Detail Ekspedisi';		
    $data['result']= $this->M_Transaction->get_Data_Detail($id);	
		$data['driver']= $this->M_Unit->get_Data();	
		$data['main']='template/transaction/detail_request_ekspedisi'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function print_out($id){		
		$data['title']='Detail Ekspedisi';		
    $data['result']= $this->M_Transaction->get_Data_Detail($id);		
		$this->load->view('template/transaction/cetak_ekspedisi',$data);
	}

	public function download(){		
		
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Download_Ekspedisi_".date('Y-m-d').".xls");		
			
			echo '
			<center> <h2>  Laporan Ekspedisi </h2></center>
			<table width="100%" border="1">
				  <tr style="color:#fff">
					<td rowspan="2" bgcolor="#003399">No</td>
					<td rowspan="2" bgcolor="#003399">No. Voucher</td>
					<td rowspan="2" bgcolor="#003399">Tipe Ekspedisi</td>
					<td rowspan="2" bgcolor="#003399">Status Ekspedisi</td>
					<td rowspan="2" bgcolor="#003399">Pembebanan</td>
					<td rowspan="2" bgcolor="#003399">Mode Transport</td>
					<td rowspan="2" bgcolor="#003399">Waktu Request</td>
					<td rowspan="2" bgcolor="#003399">Tanggal Berangkat</td>
					<td rowspan="2" bgcolor="#003399">Estimasi Sampai</td>
					<td rowspan="2" bgcolor="#003399">Asal Pengiriman</td>
					<td rowspan="2" bgcolor="#003399">Tujuan Pengiriman</td>
					<td rowspan="2" bgcolor="#003399">Rincian Alamat</td>
					<td rowspan="2" bgcolor="#003399">Customer</td>
					<td rowspan="2" bgcolor="#003399">Nopol 1</td>
					<td rowspan="2" bgcolor="#003399">Nopol 2</td>
					<td rowspan="2" bgcolor="#003399">Catatan</td>
					<td colspan="7" bgcolor="#FF6600"><center>Rincian Biaya Keberangkatan </center> </td>
					<td colspan="7" bgcolor="#FF6600"><center>Rincian Biaya Kepulangan </center> </td>
					<td rowspan="2" bgcolor="#003399">Nama Driver</td>
					<td rowspan="2" bgcolor="#003399">Bank</td>
					<td rowspan="2" bgcolor="#003399">Norek</td>
					<td rowspan="2" bgcolor="#003399">Atas Nama</td>
					<td rowspan="2" bgcolor="#003399">Ada NPWP?</td>
					<td rowspan="2" bgcolor="#003399">Total Biaya</td>
					<td rowspan="2" bgcolor="#003399">PPH 21</td>
					<td rowspan="2" bgcolor="#003399">Gross Up</td>
				  </tr>
				  <tr style="color:#fff">
					<td bgcolor="#003399">Transport</span></td>
					<td bgcolor="#003399">ASDP</span></td>
					<td bgcolor="#003399">Tol</span></td>
					<td bgcolor="#003399">Lain-lain</span></td>
					<td bgcolor="#003399">Jasa Driver</span></td>
					<td bgcolor="#003399">BBM</span></td>
					<td bgcolor="#003399">Subtotal</span></td>
					<td bgcolor="#003399">Transport</span></td>
					<td bgcolor="#003399">ASDP</span></td>
					<td bgcolor="#003399">Tol</span></td>
					<td bgcolor="#003399">Lain-lain</span></td>
					<td bgcolor="#003399">Jasa Driver</span></td>
					<td bgcolor="#003399">BBM</span></td>
					<td bgcolor="#003399">Subtotal</span></td>
				  </tr> ';
  
			  
			  $no=1;
			  
			  $total_transport=0;
			  $total_asdp=0;
			  $total_tol=0;
			  $total_lain=0;
			  $total_bbm=0;
			  $total_driver=0;
			  $total_subtotal=0;
			  
			  $total_transport2=0;
			  $total_asdp2=0;
			  $total_tol2=0;
			  $total_lain2=0;
			  $total_bbm2=0;
			  $total_driver2=0;
			  $total_subtotal2=0;
			  
			  $total_biaya=0;
			  $total_pph21=0;
			  $total_grossup=0;
			  
			  $data= $this->db->query("SELECT *,SUM(biaya_transport + biaya_asdp + biaya_tol + biaya_lain + biaya_bbm + jasa_driver) as subtotal1, SUM(biaya_transport2 + biaya_asdp2 + biaya_tol2 + biaya_lain2 + biaya_bbm2 + jasa_driver2) as subtotal2 FROM trx_ekspedisi WHERE DATE(waktu) >='".$this->input->post('start')."' AND DATE(waktu) <='".$this->input->post('end')."' GROUP BY idekspedisi ORDER BY idekspedisi ASC ");
			  foreach($data->result() as $row ) {
				 
			  $total_transport +=$row->biaya_transport;
			  $total_asdp +=$row->biaya_asdp;
			  $total_tol +=$row->biaya_tol;
			  $total_lain +=$row->biaya_lain;
			  $total_bbm +=$row->biaya_bbm;
			  $total_driver +=$row->jasa_driver;
			  $total_subtotal +=$row->subtotal1;
			  
			  $total_transport2 +=$row->biaya_transport2;
			  $total_asdp2 +=$row->biaya_asdp2;
			  $total_tol2 +=$row->biaya_tol2;
			  $total_lain2 +=$row->biaya_lain2;
			  $total_bbm2 +=$row->biaya_bbm2;
			  $total_driver2 +=$row->jasa_driver2;
			  $total_subtotal2 +=$row->subtotal2;
			  
			  $total_biaya += $row->biaya_ekspedisi;
			  $total_pph21 += $row->pph21;
			  $total_grossup += $row->biaya_pph21;
				 
			  
			  echo "<tr>
					<td>$no</td>
					<td>$row->no_ekspedisi</td>
					<td>$row->type_ekspedisi</td>
					<td>$row->status_ekspedisi</td>
					<td>$row->pembebanan</td>
					<td>$row->mode_transport</td>
					<td>$row->waktu</td>
					<td>$row->tglekspedisi</td>
					<td>$row->tglsampai</td>
					<td>$row->dari</td>
					<td>$row->tujuan</td>
					<td>$row->alamat</td>
					<td>$row->customer</td>
					<td>$row->nopol1</td>
					<td>$row->nopol2</td>
					<td>$row->remark</td>
					<td>$row->biaya_transport</td>
					<td>$row->biaya_asdp</td>
					<td>$row->biaya_tol</td>
					<td>$row->biaya_lain</td>
					<td>$row->jasa_driver</td>
					<td>$row->biaya_bbm</td>
					<td>$row->subtotal1</td>
					<td>$row->biaya_transport2</td>
					<td>$row->biaya_asdp2</td>
					<td>$row->biaya_tol2</td>
					<td>$row->biaya_lain2</td>
					<td>$row->jasa_driver2</td>
					<td>$row->biaya_bbm2</td>
					<td>$row->subtotal2 </td>
					<td>$row->driver</td>
					<td>$row->bank</td>
					<td>$row->norek</td> 
					<td>$row->atasnama</td>
					<td>$row->npwp</td>
					<td>$row->biaya_ekspedisi</td>
					<td>$row->pph21</td>
					<td>$row->biaya_pph21</td>
				  </tr>
				 ";
			  $no++;
			  
			 }
			   
			 echo "
			 <tr style='font-weight:bold;font-size:16px'>
				<td colspan=\"16\"><center>TOTAL </center></td>
				<td>$total_transport</td>
				<td>$total_asdp</td>
				<td>$total_tol</td>
				<td>$total_lain</td>
				<td>$total_driver</td>
				<td>$total_bbm</td>
				<td>$total_subtotal</td>
				<td>$total_transport2</td>
				<td>$total_asdp2</td>
				<td>$total_tol2</td>
				<td>$total_lain2</td>
				<td>$total_driver2</td>
				<td>$total_bbm2</td>
				<td>$total_subtotal2</td>
				<td colspan=\"5\">&nbsp;</td>
				<td>$total_biaya</td>
				<td>$total_pph21</td>
				<td>$total_grossup</td>
			 </tr>
				</table> ";
			
			
		}
	
	
public function order() {
	
		if(isset($_POST['simpan'])) {	
		
			$sql=$this->db->query("SELECT * FROM trx_ekspedisi WHERE no_ekspedisi='".$this->input->post('no_ekspedisi')."'");
			
			if($sql->num_rows() > 0 ) {
				
				$this->session->set_flashdata('sukses','<div class="alert alert-danger"> Nomor Voucher sudah digunakan <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
				redirect('index.php/apps/transaction/expedition');	
				
			} else {
				
			$data = array(
			'tglekspedisi'=>$this->input->post('kirim'),
			'tglsampai'=>$this->input->post('sampai'),
			'cmd'=>$this->input->post('cmd'),
			'customer'=>strtoupper($this->input->post('customer')),		
			'pembebanan'=>$this->input->post('beban'),
			'type_ekspedisi'=>$this->input->post('tipe'),
			'status_ekspedisi'=>$this->input->post('status'),
			'alamat'=>strtoupper($this->input->post('lokasi')),	
			'mode_transport'=>$this->input->post('metode'),
			'remark'=>strtoupper($this->input->post('catatan')),		
			'dari'=>$this->input->post('asal'),
			'tujuan'=>$this->input->post('tujuan'),			
			'biaya_tol'=>$this->input->post('biaya_tol1'),
			'biaya_asdp'=>$this->input->post('biaya_asdp1'),		
			'biaya_lain'=>$this->input->post('biaya_lain1'),
			'jasa_driver'=>$this->input->post('biaya_driver1'),
			'biaya_transport'=>$this->input->post('biaya_transport1'),
			'biaya_bbm'=>$this->input->post('biaya_bbm1'),
			'biaya_tol2'=>$this->input->post('biaya_tol2'),
			'biaya_asdp2'=>$this->input->post('biaya_asdp2'),		
			'biaya_lain2'=>$this->input->post('biaya_lain2'),
			'jasa_driver2'=>$this->input->post('biaya_driver2'),
			'biaya_transport2'=>$this->input->post('biaya_transport2'),
			'biaya_bbm2'=>$this->input->post('biaya_bbm2'),
			'biaya_ekspedisi'=>$this->input->post('total_biaya'),
			'nopol1'=>$this->input->post('nopol1'),
			'nopol2'=>$this->input->post('nopol2'),
			'flag_transaksi'=>'2',
			'driver'=>$this->input->post('nama'),
			'npwp'=>$this->input->post('npwp'),
			'email_driver'=>$this->input->post('email'),
			'bank'=>$this->input->post('bank'),
			'norek'=>$this->input->post('norek'),
			'atasnama'=>$this->input->post('atasnama'),
			'pph21'=>$this->input->post('pph21'),
			'no_ekspedisi'=>$this->input->post('no_ekspedisi'),
			'biaya_pph21'=>$this->input->post('grossup'),
			'iduser'=>$this->session->userdata('ex_iduser')
			  );
			
			$save=$this->M_Transaction->simpan_Data_Transaksi($data);		
			
			if($save=true) {	
			
				$isi='<table width="100%" cellpadding="2" border="0"  cellspacing="0" style="background-color:#003399;  text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
<tr>
				<td width="11%" bgcolor="#000">&nbsp;</td>
	<td colspan="3" bgcolor="#FF9900" >&nbsp;</td>
	<td width="10%" bgcolor="#000">&nbsp;</td>
  <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td width="1%" bgcolor="#ffffff">&nbsp;</td>
				<td colspan="2" bgcolor="#ffffff" align="center"> <h3> Request  Ekspedisi  '.$this->input->post('no_ekspedisi').'  </h3> </td>
				<td bgcolor="#000">&nbsp;</td>
  </tr>
			  <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td colspan="2" bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#000">&nbsp;</td>
  </tr>
			
	          <tr>
	            <td bgcolor="#000">&nbsp;</td>
	            <td bgcolor="#ffffff">&nbsp;</td>
	            <td width="3%" bgcolor="#ffffff">&nbsp;</td>
	            <td width="75%" bgcolor="#ffffff"><strong>Nomor Voucher :</strong></td>
	            <td bgcolor="#000">&nbsp;</td>
  </tr>
    <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('no_ekspedisi').'</td>
				<td bgcolor="#000">&nbsp;</td>
  </tr>
			  
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>Tipe Ekspedisi :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('tipe').'</td>
				<td bgcolor="#000">&nbsp;</td>
				</tr>
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>CMD :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('cmd').'</td>
				<td bgcolor="#000">&nbsp;</td>
				</tr>
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>Customer :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('customer').' </td>
				<td bgcolor="#000">&nbsp;</td>
				</tr>
				
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>Tanggal Pengiriman :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('kirim').' </td>
				<td bgcolor="#000">&nbsp;</td>
				</tr>
				
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>Estimasi Sampai :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('sampai').' </td>
				<td bgcolor="#000">&nbsp;</td>
				</tr>
				
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>Status Ekspedisi :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('status').' </td>
				<td bgcolor="#000">&nbsp;</td>
				</tr>
			  
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>Asal Pengiriman :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('asal').' </td>
				<td bgcolor="#000">&nbsp;</td>
				</tr>
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>Tujuan Pengiriman :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('tujuan').'</td>
				<td bgcolor="#000">&nbsp;</td>
			</tr>
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>Nomor Polisi 1 :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('nopol1').' </td>
				<td bgcolor="#000">&nbsp;</td>
			</tr>
			    <tr>
			      <td bgcolor="#000">&nbsp;</td>
			      <td bgcolor="#ffffff">&nbsp;</td>
			      <td bgcolor="#ffffff">&nbsp;</td>
			      <td bgcolor="#ffffff"><strong>Nomor Polisi 2 :</strong></td>
			      <td bgcolor="#000">&nbsp;</td>
  </tr>
		    <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('nopol2').' </td>
				<td bgcolor="#000">&nbsp;</td>
			</tr>
			  
			  <tr>
			    <td bgcolor="#000">&nbsp;</td>
			    <td bgcolor="#ffffff">&nbsp;</td>
			    <td bgcolor="#ffffff">&nbsp;</td>
			    <td bgcolor="#ffffff"><strong>Total Biaya Ekspedisi :</strong></td>
			    <td bgcolor="#000">&nbsp;</td>
  </tr>
			  <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('total_biaya').' </td>
				<td bgcolor="#000">&nbsp;</td>
  </tr>
					
				<tr>
				  <td bgcolor="#000">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff">&nbsp;</td>
				  <td bgcolor="#ffffff"><strong>Nama Driver :</strong></td>
				  <td bgcolor="#000">&nbsp;</td>
  </tr>
				<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('nama').' </td>
				<td bgcolor="#000">&nbsp;</td>
  </tr>
					<tr>
					  <td bgcolor="#000">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff"><strong>Bank : </strong></td>
					  <td bgcolor="#000">&nbsp;</td>
  </tr>
					<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('bank').' </td>
				<td bgcolor="#000">&nbsp;</td>
					</tr>
					<tr>
					  <td bgcolor="#000">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff"><strong>Nomor Rekening :</strong></td>
					  <td bgcolor="#000">&nbsp;</td>
  </tr>
					<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('norek').' </td>
				<td bgcolor="#000">&nbsp;</td>
					</tr>
					<tr>
					  <td bgcolor="#000">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff"><strong>Atas Nama :</strong></td>
					  <td bgcolor="#000">&nbsp;</td>
  </tr>
					<tr>
					<td bgcolor="#000">&nbsp;</td>
					<td bgcolor="#ffffff">&nbsp;</td>
					<td bgcolor="#ffffff">&nbsp;</td>
					<td bgcolor="#ffffff"> '.$this->input->post('atasnama').' </td>
					<td bgcolor="#000">&nbsp;</td>
					</tr>

					<tr>
					  <td bgcolor="#000">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff"><strong>PPH 21 :</strong></td>
					  <td bgcolor="#000">&nbsp;</td>
  </tr>
					<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('pph21').' </td>
				<td bgcolor="#000">&nbsp;</td>
					</tr>
					
					<tr>
					  <td bgcolor="#000">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td bgcolor="#ffffff"><strong>Gross Up :</strong></td>
					  <td bgcolor="#000">&nbsp;</td>
  </tr>
					<tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> '.$this->input->post('grossup').' </td>
				<td bgcolor="#000">&nbsp;</td>
  				</tr>
			     
			  <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#000">&nbsp;</td>
  			</tr>
			  <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"></td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#000">&nbsp;</td>
  			</tr>
			  
			  
			  <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td colspan="3" bgcolor="#FF9900">&nbsp;</td>
				<td bgcolor="#000">&nbsp;</td>
  </tr>
			  <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td colspan="3"bgcolor="#FF9900" style="color:white; text-align:center">PT. SERASI AUTORAYA </td>
				<td bgcolor="#000">&nbsp;</td>
  			</tr>
			  <tr>
				<td bgcolor="#000">&nbsp;</td>
			<td colspan="3" bgcolor="#FF9900" style="color:white; text-align:center"> &copy; Copyright 2019 Trac Palembang | Ekspedisi  | Create By Ardi</td>
				<td bgcolor="#000">&nbsp;</td>
  			</tr>
			  
			  <tr>
				<td bgcolor="#000">&nbsp;</td>
				<td colspan="3" bgcolor="#FF9900">&nbsp;</td>
				<td bgcolor="#000">&nbsp;</td>
  </tr>
</table> 
<br>
			<center><font color="red">* Mohon tidak membalas email ini, email dikirim otomatis oleh sistem </font></center>';	
			
			$hsl=$this->db->query("SELECT * FROM tblnotifemail");
		    foreach ($hsl->result() as $data);
			 
			$mail = new PHPMailer();
			$mail->SMTPDebug = $data->debug;
			$mail->Debugoutput = 'html';	
							
			// set smtp
			$mail->isSMTP();
			$mail->Host = $data->host;
			$mail->Port = $data->port;
			$mail->SMTPAuth = $data->smtpauth;
			$mail->SMTPSecure = 'tls';
			$mail->Username = $data->user;
			$mail->Password = $data->pwd;
			
			$mail->setFrom($data->email, $data->name);
		  
		   $sql=$this->db->query("SELECT * FROM tbl_user WHERE aktif='1' AND level='admin'");
		   foreach ($sql->result() as $row) {
		 
		   $mail->AddAddress($row->email, $row->nama);
		  
		   }	
		 
			$mail->Subject = 'Request Ekspedisi  '.$this->input->post('no_ekspedisi').'';
			$mail->isHTML(true);
			$mail->MsgHTML($isi);
				
			if($mail->send()) 
			{
		  
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Request ekspedisi telah terkirim dan dalam proses verifikasi admin<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/expedition');
			
			} else {
				
			$this->session->set_flashdata('sukses','<div class="alert alert-danger"> Notifikasi email gagal terkirim <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/expedition');	
				
			}
			
			}
			
		}
		
		}		
		
	}
	
	
	
	public function action_process_admin() {
	
		if(isset($_POST['adminpost'])) {				
		
			$data = array(				
			'flag_transaksi'=>'3'
			  );
			$id=$this->input->post('idekspedisi');
			$save=$this->M_Transaction->update_Ekspedisi($data,$id);		
			
			if($save=true) {	
			
			$data=$this->M_Transaction->get_Data_Notifi_Email($id);
			
			foreach($data as $view): endforeach;
			
				$isi='<table width="100%" cellpadding="2" border="0"  cellspacing="0" style="background:#1e3799;  text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
				<tr>
				<td width="11%" bgcolor="#fafafa">&nbsp;</td>
				<td width="1%" bgcolor="#1e3799" >&nbsp;</td>
				<td width="13%" bgcolor="#1e3799" >&nbsp;</td>
				<td width="65%" bgcolor="#1e3799" >&nbsp;</td>
				<td width="10%" bgcolor="#fafafa">&nbsp;</td>
  
			   
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td colspan="2" bgcolor="#ffffff"> <h3> Request  Ekspedisi <small>(Menuggu Transfer) </small> </h3> </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td colspan="2" bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">No. Voucher</td>
				<td bgcolor="#ffffff">: '.$view->no_ekspedisi.'</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr> 
			  
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Tipe Ekspedisi</td>
				<td bgcolor="#ffffff">: '.$view->type_ekspedisi.'</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">CMD</td>
				<td bgcolor="#ffffff">: '.$view->cmd.'</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Customer </td>
				<td bgcolor="#ffffff">: '.$view->customer.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Tanggal Pengiriman</td>
				<td bgcolor="#ffffff">: '.$view->tglekspedisi.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Estimasi Sampai</td>
				<td bgcolor="#ffffff">: '.$view->tglsampai.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Status Ekspedisi</td>
				<td bgcolor="#ffffff">: '.$view->status_ekspedisi.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
			  
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Asal</td>
				<td bgcolor="#ffffff">: '.$view->dari.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Tujuan</td>
				<td bgcolor="#ffffff">: '.$view->tujuan.'</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Nomor Polisi 1</td>
				<td bgcolor="#ffffff">: '.$view->nopol1.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
			
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Nomor Polisi 2</td>
				<td bgcolor="#ffffff">: '.$view->nopol2.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
			  
			   <tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Biaya Ekspedisi</td>
				<td bgcolor="#ffffff">: '.$view->biaya_ekspedisi.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> PPH 21</td>
				<td bgcolor="#ffffff">: '.$view->pph21.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Gross Up</td>
				<td bgcolor="#ffffff">: '.$view->biaya_pph21.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Nama Driver</td>
				<td bgcolor="#ffffff">: '.$view->driver.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Bank </td>
				<td bgcolor="#ffffff">: '.$view->bank.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Nomor Rekening</td>
				<td bgcolor="#ffffff">: '.$view->norek.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr> 
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Atas Nama</td>
				<td bgcolor="#ffffff">: '.$view->atasnama.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
			     
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"></td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
			  
			  
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td colspan="3"bgcolor="#1e3799" style="color:white; text-align:center">PT. SERASI AUTORAYA </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td colspan="3" bgcolor="#1e3799" style="color:white; text-align:center"> &copy; Copyright 2019 Trac Palembang | Ekspedisi  | Create By Ardi</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
			  
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				</table> 
				<br>
				<center><font color="red">* Mohon tidak membalas email ini, email dikirim otomatis oleh sistem </font></center>';	
			
			$hsl=$this->db->query("SELECT * FROM tblnotifemail");
		    foreach ($hsl->result() as $data);
			 
			$mail = new PHPMailer();
			$mail->SMTPDebug = $data->debug;
			$mail->Debugoutput = 'html';	
							
			// set smtp
			$mail->isSMTP();
			$mail->Host = $data->host;
			$mail->Port = $data->port;
			$mail->SMTPAuth = $data->smtpauth;
			$mail->SMTPSecure = 'tls';
			$mail->Username = $data->user;
			$mail->Password = $data->pwd;
			
			$mail->setFrom($data->email, $data->name);
		  
		   $sql=$this->db->query("SELECT * FROM tbl_user WHERE aktif='1' AND level='adh'");
		   foreach ($sql->result() as $row) {
		 
		   $mail->AddAddress($row->email, $row->nama);
		  
		   }	
		 
			$mail->Subject = 'Request Ekspedisi '.$view->no_ekspedisi;
			$mail->isHTML(true);
			$mail->MsgHTML($isi);
				
			if($mail->send()) 
			{
		  
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Ekspedisi telah terverifikasi dan menunggu dana ditransfer <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/expedition/request/2/adm');
			
			} else {
				
			$this->session->set_flashdata('sukses','<div class="alert alert-danger"> Notifikasi email gagal terkirim <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/expedition/request/2/adm');	
				
			}
			
			}
			
		} else if(isset($_POST['adminpostDelete'])) {	
		
			$id=$this->input->post('idekspedisi');
			$save=$this->M_Transaction->hapus_Data_Ekspedisi($id);
			
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Transaksi Ekspedisi berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/expedition/request/2/adm');
		
		}
	
	}
	
	public function action_process_adh() {
	
		if(isset($_POST['adhpost'])) {	
				
		
			$data = array(				
			'flag_transaksi'=>'4'
			  );
			  
			$id=$this->input->post('idekspedisi');
			$save=$this->M_Transaction->update_Ekspedisi($data,$id);		
			
			if($save=true) {	
			
			$data=$this->M_Transaction->get_Data_Notifi_Email($id);
			
			foreach($data as $view): endforeach;
			
				$isi='<table width="100%" cellpadding="2" border="0"  cellspacing="0" style="background:#1e3799;  text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
				<tr>
				<td width="11%" bgcolor="#fafafa">&nbsp;</td>
				<td width="1%" bgcolor="#1e3799" >&nbsp;</td>
				<td width="13%" bgcolor="#1e3799" >&nbsp;</td>
				<td width="65%" bgcolor="#1e3799" >&nbsp;</td>
				<td width="10%" bgcolor="#fafafa">&nbsp;</td>
  
			   
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td colspan="2" bgcolor="#ffffff"> <h3> Request  Ekspedisi <small>(Konfirmasi Transfer) </small> </h3> </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td colspan="2" bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">No. Voucher</td>
				<td bgcolor="#ffffff">: '.$view->no_ekspedisi.'</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr> 
			  
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Tipe Ekspedisi</td>
				<td bgcolor="#ffffff">: '.$view->type_ekspedisi.'</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">CMD</td>
				<td bgcolor="#ffffff">: '.$view->cmd.'</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Customer </td>
				<td bgcolor="#ffffff">: '.$view->customer.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Tanggal Pengiriman</td>
				<td bgcolor="#ffffff">: '.$view->tglekspedisi.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Estimasi Sampai</td>
				<td bgcolor="#ffffff">: '.$view->tglsampai.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Status Ekspedisi</td>
				<td bgcolor="#ffffff">: '.$view->status_ekspedisi.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
			  
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Asal</td>
				<td bgcolor="#ffffff">: '.$view->dari.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Tujuan</td>
				<td bgcolor="#ffffff">: '.$view->tujuan.'</td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Nomor Polisi 1</td>
				<td bgcolor="#ffffff">: '.$view->nopol1.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
			
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">Nomor Polisi 2</td>
				<td bgcolor="#ffffff">: '.$view->nopol2.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
				</tr>
			  
			   <tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Biaya Ekspedisi</td>
				<td bgcolor="#ffffff">: '.$view->biaya_ekspedisi.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> PPH 21</td>
				<td bgcolor="#ffffff">: '.$view->pph21.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Gross Up</td>
				<td bgcolor="#ffffff">: '.$view->biaya_pph21.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Nama Driver</td>
				<td bgcolor="#ffffff">: '.$view->driver.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Bank </td>
				<td bgcolor="#ffffff">: '.$view->bank.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Nomor Rekening</td>
				<td bgcolor="#ffffff">: '.$view->norek.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
				
				<tr> 
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"> Atas Nama</td>
				<td bgcolor="#ffffff">: '.$view->atasnama.' </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
			     
			  <tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
  			</tr>
			  <tr>
			  <tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#ffffff"></td>
				<td bgcolor="#ffffff">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
  			</tr>
			  
			  
			  <tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
  				</tr>
			  <tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td colspan="3"bgcolor="#1e3799" style="color:white; text-align:center">PT. SERASI AUTORAYA </td>
				<td bgcolor="#fafafa">&nbsp;</td>
  			</tr>
			  <tr>
				<td bgcolor="#fafafa">&nbsp;</td>
			<td colspan="3" bgcolor="#1e3799" style="color:white; text-align:center"> &copy; Copyright 2019 Trac Palembang | Ekspedisi  | Create By Ardi</td>
				<td bgcolor="#fafafa">&nbsp;</td>
  			</tr>
			  
			  <tr>
				<td bgcolor="#fafafa">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#1e3799">&nbsp;</td>
				<td bgcolor="#fafafa">&nbsp;</td>
  </tr>
			</table> 
<br>
			<center><font color="red">* Mohon tidak membalas email ini, email dikirim otomatis oleh sistem </font></center>';	
			
			$hsl=$this->db->query("SELECT * FROM tblnotifemail");
		    foreach ($hsl->result() as $data);
			 
			$mail = new PHPMailer();
			$mail->SMTPDebug = $data->debug;
			$mail->Debugoutput = 'html';	
							
			// set smtp
			$mail->isSMTP();
			$mail->Host = $data->host;
			$mail->Port = $data->port;
			$mail->SMTPAuth = $data->smtpauth;
			$mail->SMTPSecure = 'tls';
			$mail->Username = $data->user;
			$mail->Password = $data->pwd;		
			
			
			$mail->AddAddress($view->email_driver, $view->driver);
			$mail->AddAddress($view->email, $view->nama);
		    $sql=$this->db->query("SELECT * FROM tbl_user WHERE aktif='1' AND (level='pdi' OR level='admin')");
		    foreach ($sql->result() as $row) {
		 
		    $mail->AddAddress($row->email, $row->nama);
		  
		    }	
			
			$mail->Subject = 'Request Ekspedisi  '.$view->no_ekspedisi;
			$mail->isHTML(true);
			$mail->MsgHTML($isi);
				
			if($mail->send()) 
			{
		  
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Konfirmasi transfer dana ekspedisi sukses <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/expedition/request/3');
			
			} else {
				
			$this->session->set_flashdata('sukses','<div class="alert alert-danger"> Notifikasi email gagal terkirim <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/expedition/request/3/adh');	
				
			}
			
			}
			
		}
	
	}
	
	public function adjust_biaya() {
		
		if(isset($_POST['adminpostAdjust'])) {	
		
			$id=$this->input->post('idekspedisi');
			
			$keterangan=$this->input->post('keterangan');
			
			$nominal= $this->input->post('nominal');
			
			$total_biaya=$this->input->post('total_biaya') +  $nominal;
			
			if($this->input->post('npwp')=='Y') {
			// 0.975
			$grossup=round($total_biaya/ 0.975);
			$pph21=round($grossup - $total_biaya);
								
			} else {
			// 0.97
			$grossup=round($total_biaya / 0.97);
			$pph21=round($grossup - $total_biaya);
			}
			
			$this->db->query("UPDATE trx_ekspedisi SET biaya_ekspedisi='$total_biaya',pph21='$pph21',biaya_pph21='$grossup', keterangan_adjust='$keterangan', nilai_adjust='$nominal' WHERE idekspedisi='$id'");
			
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Adjustment biaya pengiriman berhasil <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/expedition/detail/'.$id);
		
		}
	}
	
}