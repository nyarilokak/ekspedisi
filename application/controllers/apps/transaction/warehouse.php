<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller {
	
	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper('url','download');
		$this->load->model(array('M_Transaction','M_Material','M_Report'));
		
		if(!$this->session->userdata('logged_in')){
			 $this->session->set_flashdata('sukses','<div class="alert alert-danger"> Anda harus login dahulu <button type="button" 							             class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> </div>'); 
            redirect('index.php/welcome');
        }
		
	}

	public function in(){		     
		$data['title']='Transaksi  Material Masuk';
		$data['kode_masuk']=$this->M_Transaction->get_Kode_Masuk();
		$data['main']='template/transaction/transaction_in'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function out(){		     
		
		$data = array(
            'group' => $this->M_Transaction->get_Group_Property(),
            'unit' => $this->M_Transaction->get_Unit_Property()
			);
		$data['title']='Transaksi  Material Keluar';
		$data['kode_masuk']=$this->M_Transaction->get_Kode_Masuk();
		$data['main']='template/transaction/transaction_out'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function cancel(){		     
	
		$data['title']='Pembatalan Transaksi';		
		$data['main']='template/transaction/transaction_cancel'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function report_out(){		     
		$data['title']='Transaksi Keluar';
		if(isset($_GET['query'])) { 
    	$data['report']= $this->M_Report->laporan_keluar();
		}
		$data['main']='template/transaction/Data_transaction_out'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function report_in(){		     
		$data['title']='Transaksi Masuk';
		if(isset($_GET['query'])) { 
    	$data['report']= $this->M_Report->laporan_masuk();
		}
		$data['main']='template/transaction/Data_transaction_in'; 
		$this->load->view('template/main_layout',$data);
	}
	
	public function result(){	
	
		$no=$this->input->post('no');
		$jenis=$this->input->post('jenis');
		
		$this->db->where('no_transaksi',$no);
		$this->db->where('type_transaksi',$jenis);
		$this->db->where('status_transaksi','finish');
		$query=$this->db->get('tbl_trans_warehouse');
		// query update/insert data detail material
		if ($query->num_rows() > 0){
	
		$data['title']='Pembatalan Transaksi';		
		$data['main']='template/transaction/Result_Search'; 
		$this->load->view('template/main_layout',$data);
		
		} else {
			
			$this->session->set_flashdata('sukses','<div class="alert alert-danger"> Pencarian data transaksi tidak ditemukan <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/warehouse/cancel');
    
		}
	}
	
	
	public function detail_transaksi(){		     
	
		$data['title']='Detail  Transaksi';		
		$data['main']='template/transaction/Detail_Data_Transaksi'; 
		$this->load->view('template/main_layout',$data);
	}
	
	
	public function view_Data_in(){
        $data=$this->M_Transaction->get_Data_In();
        echo json_encode($data);
    }
	
	public function view_Data_Out(){
        $data=$this->M_Transaction->get_Data_Out();
        echo json_encode($data);
    }
	
	public function Search_Data_Barcode_Reader(){
		
		$errorMSG = "";	
        $id=$this->input->post('kode');
		
		if (empty($_POST["kode"])) {

				$errorMSG = "<li> Kode Material harus diisi</li>";
				echo json_encode(['code'=>404, 'msg'=>$errorMSG]);

			}
			
		if(empty($errorMSG)){	
		// Cek exist data detail
		$this->db->where('kode_material',$id);		
		$this->db->where('aktif','1');
		$query = $this->db->get('tbl_material');
		
		// query update/insert data detail material
		if ($query->num_rows() > 0){
		
        $msg=$this->M_Transaction->Get_Data_By_Barcode_Scanner($id);
		
        echo json_encode(['code'=>200, 'msg'=>$msg]);
		
		
		} else {
			
			$errorMSG = "<li> Kode Material tidak ditemukan </li>";
			
			echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
			
			} 
		
		}

    }
	 
	
	
	
	public function add_Detail_In(){		
	
		$errorMSG = "";		
			
			if (empty($_POST["kodematerial"])) {

				$errorMSG = "<li> Kode Material harus diisi</li>";

			} 
			
			if (empty($_POST["nama"])) {

				$errorMSG .= "<li> Nama material harus diisi</li>";

			}
			
			if (empty($_POST["satuan"])) {

				$errorMSG .= "<li> Satuan  harus diisi</<li>";

			} 		

			if (empty($_POST["volume"])) {

				$errorMSG .= "<li> Volume  harus diisi</li>";

			} else {

				$msg_subject = $_POST["volume"];

			}
		
		if(empty($errorMSG)){
		// Cek exist data detail
		$this->db->where('idmaterial',$this->input->post('kode'));
		$this->db->where('status_detail','0');
		$this->db->where('type','in');
		$query = $this->db->get('tbl_detail_trans');
		
		// query update volume
		$query=$this->db->query("SELECT * FROM tbl_detail_trans WHERE idmaterial='".$this->input->post('kode')."' AND status_detail='0' AND type='in'");
		foreach ($query->result() as $row) : endforeach;
		
		// query update/insert data detail material
		if($this->input->post('harga')!='0') {
		
				if ($query->num_rows() > 0){
					
					$data = array(
					'volume'=> $row->volume + $this->input->post('volume')					     
					  );
					$id=$this->input->post('kode');			
					$msg=$this->M_Transaction->update_Volume_in_Detail($data,$id);
					echo json_encode(['code'=>200, 'msg'=>$msg]);
					
					} else {
						
						$data = array(
						'idmaterial'=>$this->input->post('kode'),
						'harga_satuan'=>$this->input->post('harga'),		
						'volume'=>$this->input->post('volume'),
						'status_detail' =>'0',
						'type' =>'in'
						  );
						$msg=$this->M_Transaction->simpan_Data_Detail($data);
						echo json_encode(['code'=>200, 'msg'=>$msg]);
					}     

		} else {
			
			echo json_encode(['code'=>404, 'msg'=>'Harga Material belum di update, Silahkan hubungi Supervisi']);
			
		}
		
		   	 
		} else {
			
			echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
			
		}
		
	}
	
	public function add_Detail_Out(){		
		
		$errorMSG = "";		
			
			if (empty($_POST["kodematerial"])) {

				$errorMSG = "<li> Kode Material harus diisi</li>";

			} 
			
			if (empty($_POST["nama"])) {

				$errorMSG .= "<li> Nama material harus diisi</li>";

			}
			
			if (empty($_POST["satuan"])) {

				$errorMSG .= "<li> Satuan  harus diisi</<li>";

			} 
			

			if (empty($_POST["volume"])) {

				$errorMSG .= "<li> Volume  harus diisi</li>";

			} 
			if (empty($_POST["sumber"])) {

				$errorMSG .= "<li> Sumber Material  harus diisi</li>";

			} 
			
			
			$q=$this->db->query("SELECT stock_quantity FROM tbl_material WHERE idmaterial='$_POST[kode]'");
			foreach($q->result() as $v): endforeach;
				
			if($_POST['sumber']=='Gudang') {		
				
				
			if ($v->stock_quantity < $_POST['volume']) {

				$errorMSG .= "<li> Jumlah Stock Material tidak mencukupi </li>";

			} 
			}
		
		if(empty($errorMSG)){
		
		// Cek exist data detail
		$this->db->where('idmaterial',$this->input->post('kode'));
		$this->db->where('source',$this->input->post('sumber'));
		$this->db->where('status_detail','0');
		$this->db->where('type','out');
		$query = $this->db->get('tbl_detail_trans');
		
		// query update volume
		$query=$this->db->query("SELECT * FROM tbl_detail_trans WHERE idmaterial='".$this->input->post('kode')."' AND status_detail='0' AND type='out' AND source='".$this->input->post('sumber')."'");
		foreach ($query->result() as $row) : endforeach;
		
		if($this->input->post('harga')!='0') {
			// query update/insert data detail material
				if ($query->num_rows() > 0){
				
				$data = array(
				'volume'=> $row->volume + $this->input->post('volume')					     
				  );
				  
				if($this->input->post('sumber')=='Gudang') { 
				
				$this->db->query("UPDATE tbl_material SET stock_quantity=stock_quantity - '".$this->input->post('volume')."' WHERE idmaterial='".$this->input->post('kode')."'");
				
				}
				$id=$this->input->post('kode');	
				
				$sumber=$this->input->post('sumber');
				
				$msg =$this->M_Transaction->update_Volume_Out_Detail($data,$id,$sumber);
				
				echo json_encode(['code'=>200, 'msg'=>$msg]);
				
				}	else    {
					
				$data = array(
				'idmaterial'=>$this->input->post('kode'),
				
				'harga_satuan'=>$this->input->post('harga'),
				
				'volume'=>$this->input->post('volume'),
				
				'source'=>$this->input->post('sumber'),
				
				'status_detail' =>'0',
				
				'type' =>'out'
				  );
				$msg=$this->M_Transaction->simpan_Data_Detail($data);
				//echo json_encode($save);
					echo json_encode(['code'=>200, 'msg'=>$msg]);

				}   

		    } else {
			
			echo json_encode(['code'=>404, 'msg'=>'Harga Material belum di update, Silahkan hubungi Supervisi']);
			
		  }
		
		} else {
			
			echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
			
		}
		   	 
			 
		
	}
	
	public function hapus() {
		
		$type=$this->input->post('type');
        $id=$this->input->post('kode');
		
		if($_POST['type']=='in') {
		
        $data=$this->M_Transaction->hapus_Data($id,$type);
		
		} else if($_POST['type']=='out') {
			
			$query=$this->db->query("SELECT * FROM tbl_detail_trans WHERE status_detail='0' AND type='out' AND iddetail='".$id."'");
			foreach ($query->result() as $row) {
				
				if($row->source=='Gudang') {
				$sql=$this->db->query(" UPDATE  tbl_material SET stock_quantity=stock_quantity + $row->volume WHERE  idmaterial='".$row->idmaterial."'");
				}
				
				$data=$this->M_Transaction->hapus_Data($id,$type);
			}
			 
		}
		
       
    }

	public function search_Auto_Material()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(5);

		// cari di database
		$this->db->select('*');
		$this->db->from('tbl_material')->like('kode_material',$keyword);	
		$this->db->join('tbl_satuan','tbl_material.idsatuan=tbl_satuan.idsatuan');
		$this->db->where('tbl_material.aktif','1');
		$data=$this->db->get();
		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->kode_material,
				'nim'	=>$row->nama_material,
				'satuan'	=>$row->satuan,
				'jurusan'	=>$row->harga_material,
				'id'	=>$row->idmaterial,
				'qty'	=>$row->stock_quantity

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
	
	public function simpan_transaksi_masuk() {
		
		if(isset($_POST['simpan'])) {	

		// variabel post input header 
			// Simpan transaksi Header
			$notransaksi=$this->input->post('notransaksi');	
			$tgltransaksi=$this->input->post('tgltransaksi');	
			$supplier=$this->input->post('supplier');	
			$nopol=$this->input->post('nopol');	
			$driver=$this->input->post('driver');	
			$catatan=$this->input->post('catatan');	
			$totalharga=$this->input->post('totalharga');
			
		// Cek exist data detail		
		$this->db->where('status_detail','0');
		$this->db->where('type','in');
		$cek = $this->db->get('tbl_detail_trans');
		
		// query update/insert data detail material
		if ($cek->num_rows() > 0)  {
			
			
			
			$data = array(
			'no_transaksi'=>$notransaksi,
			'tgl_transaksi'=>$tgltransaksi,		
			'nama_supplier'=>$supplier,
			'nama_driver'=>$driver,
			'nopol'=>$nopol,
			'remark'=>$catatan,
			'total_harga'=>$totalharga,
			'type_transaksi' =>'in',
			'status_transaksi'=>'finish',
			  );
			$save=$this->M_Transaction->simpan_data_transaksi_masuk($data);
			
			$idtransaksi=$this->db->insert_id();
			
			// simpan transaksi detail 
			
			$query=$this->db->query("SELECT * FROM tbl_detail_trans WHERE status_detail='0' AND type='in'");
			foreach ($query->result() as $row) {
				
			$sql=$this->db->query("UPDATE  tbl_detail_trans SET idtransaksi='$idtransaksi', status_detail='1' WHERE idmaterial='".$row->idmaterial."' AND status_detail='0'  AND type='in'");
				
				// query update jika harga tidak sama
			$sql2=$this->db->query("SELECT * FROM tbl_material WHERE idmaterial='".$row->idmaterial."'");
			foreach ($sql2->result() as $view) : endforeach;				
			
			$data1= array (
			
				'stock_quantity' => $view->stock_quantity + $row->volume
				
				);
				
			$id=$row->idmaterial;			
			
			$save=$this->M_Material->update_Data($data1,$id);
			
		// end query update harga
				
			}
			
			 $this->session->unset_userdata('driver');
			 $this->session->unset_userdata('nopol');
			 $this->session->unset_userdata('supplier');
			 $this->session->unset_userdata('catatan');
			
			 
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Transaksi berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/warehouse/in');
				
			} else {
				
				$data_session = array(
				'supplier' => $supplier,
				'driver' => $driver,
				'nopol' => $nopol,
				'catatan' => $catatan				
				); 
			$this->session->set_userdata($data_session);
			
			$this->session->set_flashdata('sukses','<div class="alert alert-danger"> Item material masuk belum di input <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/warehouse/in');	
				
				
			}
			
		}else if(isset($_POST['batal'])) {
			
			$query=$this->db->query("SELECT * FROM tbl_detail_trans WHERE status_detail='0' AND type='in'");
			foreach ($query->result() as $row) {
			
				$this->db->query(" DELETE FROM tbl_detail_trans WHERE status_detail='0' AND type='in' AND idmaterial='".$row->idmaterial."'");
				
			}
			
				 $this->session->unset_userdata('driver');
				 $this->session->unset_userdata('nopol');
				 $this->session->unset_userdata('supplier');
				 $this->session->unset_userdata('catatan');			
						
			redirect('index.php/apps/transaction/warehouse/in');
			
		} else {
			
			echo " Not proccess available ";
		}
		
	}
	
	public function simpan_transaksi_keluar() {
		
		if(isset($_POST['simpan'])) {	

		    
			// Simpan transaksi Header
			$notransaksi=$this->input->post('notransaksi');	
			$tgltransaksi=$this->input->post('tgltransaksi');	
			$supplier=$this->input->post('supplier');	
			$nopol=$this->input->post('nopol');	
			$driver=$this->input->post('driver');	
			$catatan=$this->input->post('catatan');	
			$totalharga=$this->input->post('totalharga');
			$idunit=$this->input->post('idunit');
			
		// Cek exist data detail		
		$this->db->where('status_detail','0');
		$this->db->where('type','out');
		$cek = $this->db->get('tbl_detail_trans');
		
		// query update/insert data detail material
		if ($cek->num_rows() > 0)  {
			
			
			
			$data = array(
			'no_transaksi'=>$notransaksi,
			'tgl_transaksi'=>$tgltransaksi,	
			'idunit'=>$idunit,			
			'nama_driver'=>$driver,
			'nopol'=>$nopol,
			'remark'=>$catatan,
			'total_harga'=>$totalharga,
			'type_transaksi' =>'out',
			'status_transaksi'=>'finish',
			  );
			$save=$this->M_Transaction->simpan_data_transaksi_masuk($data);
			
			$idtransaksi=$this->db->insert_id();
			
			// simpan transaksi detail 
			
			$query=$this->db->query("SELECT * FROM tbl_detail_trans WHERE status_detail='0' AND type='out'");
			foreach ($query->result() as $row) {
				
			$sql=$this->db->query("UPDATE  tbl_detail_trans SET idtransaksi='$idtransaksi', status_detail='1' WHERE idmaterial='".$row->idmaterial."' AND status_detail='0'  AND type='out'");
				
			// query update jika harga tidak sama
			$sql2=$this->db->query("SELECT * FROM tbl_material WHERE idmaterial='".$row->idmaterial."'");
			foreach ($sql2->result() as $view) : endforeach;			
			
			$data1= array (
				'stock_quantity' => $view->stock_quantity - $row->volume
				);
			$id=$row->idmaterial;			
			$save=$this->M_Material->update_Data($data1,$id);
			
		// end query update harga
				
			}
			
			 $this->session->unset_userdata('driver');
			 $this->session->unset_userdata('provinsi');
			 $this->session->unset_userdata('nopol');
			 $this->session->unset_userdata('idunit');
			 $this->session->unset_userdata('catatan');
			
			 
			$this->session->set_flashdata('sukses','<div class="alert alert-success"> Transaksi Material berhasil diproses <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/warehouse/out');
				
			} else {
				
				$data_session = array(
				'supplier' => $idunit,
				'driver' => $driver,
				'nopol' => $nopol,
				'provinsi' => $this->input->post('provinsi'),
				'catatan' => $catatan				
				); 
			$this->session->set_userdata($data_session);
			
			$this->session->set_flashdata('sukses','<div class="alert alert-danger"> Item material keluar belum di input <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
			redirect('index.php/apps/transaction/warehouse/out');	
				
				
			}
			
		}else if(isset($_POST['batal'])) {
			
			$query=$this->db->query("SELECT * FROM tbl_detail_trans WHERE status_detail='0' AND type='out'");
			foreach ($query->result() as $row) {
				
				if($row->source=='Gudang') {
				$sql=$this->db->query(" UPDATE  tbl_material SET stock_quantity=stock_quantity + $row->volume WHERE  idmaterial='".$row->idmaterial."'");
				}
				$this->db->query(" DELETE FROM tbl_detail_trans WHERE status_detail='0' AND type='out' AND idmaterial='".$row->idmaterial."'");
				
			}
				/* $this->session->unset_userdata('provinsi');
				 $this->session->unset_userdata('driver');
				 $this->session->unset_userdata('nopol');
				 $this->session->unset_userdata('idunit');
				 $this->session->unset_userdata('catatan');		*/
						
			redirect('index.php/apps/transaction/warehouse/out');
			
		} else {
			
			echo " Not proccess available ";
		}
		
	}
	
	public function do_batal_transaksi() {
		
		$idtransaksi= $this->input->post('idtransaksi');
		$type		= $this->input->post('typetransaksi');
		$reason		= $this->input->post('reason');
		$tgl 		= date('Y-m-d H:i:s');
		
		
		
		$query=$this->db->query("SELECT * FROM tbl_trans_warehouse a INNER JOIN tbl_detail_trans b ON a.idtransaksi=b.idtransaksi WHERE a.idtransaksi='$idtransaksi' AND type_transaksi='$type'");
		
		foreach($query->result() as $row) {
			
		
			if($row->type_transaksi=='in') {
			
				$this->db->query("UPDATE tbl_material SET stock_quantity=stock_quantity - $row->volume WHERE idmaterial='$row->idmaterial'");
			
			} else if($row->type_transaksi=='out' && $row->source=='Gudang') {				
					
				$this->db->query("UPDATE tbl_material SET stock_quantity=stock_quantity + $row->volume WHERE idmaterial='$row->idmaterial'");
				
			}	
			
			
		}
		
		$this->db->query("UPDATE tbl_trans_warehouse SET status_transaksi='cancel',tgl_batal='$tgl', reason_cancel='$reason' WHERE idtransaksi='$idtransaksi' AND type_transaksi='$type'");
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success"> Pembatalan transaksi sukses <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button></div>');  
	
		redirect('index.php/apps/transaction/warehouse/cancel');
		
	}
	
	
	
	
}