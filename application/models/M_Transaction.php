<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Transaction extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	


	
	// Cek ongkir ekspedisi
	
	function cek_ongkir(){
		$from=$this->input->get('from');
		$to=$this->input->get('to');
        $hasil=$this->db->query("SELECT * FROM ongkir WHERE dari='$from' AND tujuan='$to'");       
		
		return $hasil->result();
		
		
    }	
	
	function get_Data_Request_By_User() {
	
		$start=$this->input->get('start');
		$end=$this->input->get('end');
		$tipe=$this->input->get('tipe');
		$status=$this->input->get('status');
		
		$this->db->select('*');
		$this->db->from('trx_ekspedisi'); 	
		
		if(!empty($start) && !empty($end)) { 		
		$this->db->where('DATE(waktu) >=',$start);
		$this->db->where('DATE(waktu) <=',$end);
		
		} if(!empty($tipe)) {  		
		$this->db->where('type_ekspedisi',$tipe);
		} 
		 if(!empty($status)) {  		
		$this->db->where('status_ekspedisi',$status);
		} 
		$this->db->where('iduser',$this->session->userdata('ex_iduser'));		
		$this->db->group_by('idekspedisi');
		$this->db->order_by('idekspedisi','ASC');
        $query = $this->db->get();
		return $query->result();
		
	}
	
	function get_Data_Request_By_PDI($slug,$flag) {
	
		$start=$this->input->get('start');
		$end=$this->input->get('end');
		$tipe=$this->input->get('tipe');
		$status=$this->input->get('status');
		
		$this->db->select('a.*,b.nama');
		$this->db->from('trx_ekspedisi a');
		$this->db->join('tbl_user b','a.iduser=b.iduser');
		
		if(!empty($start) && !empty($end)) { 		
		$this->db->where('DATE(waktu) >=',$start);
		$this->db->where('DATE(waktu) <=',$end);
		
		} if(!empty($tipe)) {  		
		$this->db->where('type_ekspedisi',$tipe);
		} 
		 if(!empty($status)) {  		
		$this->db->where('status_ekspedisi',$status);
		} 
		if($flag=='pdi') {
		$this->db->where('a.iduser',$this->session->userdata('ex_iduser'));	
		}
		$this->db->where('flag_transaksi',$slug);		
		$this->db->group_by('idekspedisi');
		$this->db->order_by('idekspedisi','ASC');
        $query = $this->db->get();
		return $query->result();
		
	}
	
	
		function get_Data_Report_By() {
	
		$start=$this->input->get('start');
		$end=$this->input->get('end');
		$tipe=$this->input->get('tipe');
		$status=$this->input->get('status');
		$voucher=$this->input->get('no_voucher');
		
		$this->db->select('trx_ekspedisi.*,tbl_user.nama');
		$this->db->from('trx_ekspedisi'); 	
		$this->db->join('tbl_user','trx_ekspedisi.iduser=tbl_user.iduser'); 	
		
		if(!empty($start) && !empty($end)) { 		
		$this->db->where('DATE(waktu) >=',$start);
		$this->db->where('DATE(waktu) <=',$end);
		
		} if(!empty($tipe)) {  		
		$this->db->where('type_ekspedisi',$tipe);
		} 
		if(!empty($status)) {  		
		$this->db->where('status_ekspedisi',$status);
		} 
		if(!empty($voucher)) {  		
		$this->db->where('no_ekspedisi',$voucher);
		} 
		$this->db->where('flag_transaksi','3');	
		$this->db->or_where('flag_transaksi','4');			
		$this->db->group_by('idekspedisi');
		$this->db->order_by('idekspedisi','ASC');
        $query = $this->db->get();
		return $query->result();
		
	}
	
	// ambil data material untuk transaksi keluar
	function get_Data_Detail($id){
        $hasil=$this->db->query("SELECT *,SUM(biaya_transport + biaya_asdp + biaya_tol + biaya_lain + biaya_bbm + jasa_driver) as subtotal1, SUM(biaya_transport2 + biaya_asdp2 + biaya_tol2 + biaya_lain2 + biaya_bbm2 + jasa_driver2) as subtotal2 FROM trx_ekspedisi WHERE idekspedisi='$id'");
        return $hasil->result();
    }
	
	// ambil data material untuk transaksi keluar
	function get_Data_Notifi_Email($id){
        $hasil=$this->db->query("SELECT * FROM trx_ekspedisi a INNER JOIN tbl_user b ON a.iduser=b.iduser WHERE idekspedisi='$id'");
        return $hasil->result();
    }
	
	
 
	// membuat kode transaksi pada inventory
	function get_Kode_Masuk(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_transaksi,4)) AS kd_max FROM tbl_trans_warehouse WHERE DATE(tgl_transaksi)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }

	// membuat kode transaksi pada cash Flow
	function get_Kode_CashFlow(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_trx,4)) AS kd_max FROM tbl_cash_flow WHERE DATE(createflow)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }

	
	
	// menyimpan data transaksi detail
	function simpan_Data_Transaksi($data){	 
	 				
		$this->db->insert('trx_ekspedisi',$data);
		
    }  
	

	// menyimpan data transaksi masuk
	public function simpan_data_transaksi_masuk($data){
		$save=$this->db->insert('tbl_trans_warehouse',$data);
	    //echo json_encode($save);
    } 

 
	// menampilkan data dari barcode scanner
	public function Get_Data_By_Barcode_Scanner($id) {
	 $hsl=$this->db->query("SELECT * FROM tbl_material  a INNER JOIN tbl_satuan b ON a.idsatuan=b.idsatuan WHERE a.kode_material='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $row) {
                $hasil=array(
				'value'	=>$row->kode_material,
				'nim'	=>$row->nama_material,
				'satuan'	=>$row->satuan,
				'jurusan'	=>$row->harga_material,
				'id'	=>$row->idmaterial,
				'qty'	=>$row->stock_quantity,
					);
            }
        }
        return $hasil;
 }
 
	// CHAINED DROPDOWN Group Property
	  public function get_Group_Property()
        {
            $this->db->order_by('group_rumah', 'asc');
            return $this->db->get('tbl_group')->result();
        }
 
	// ambil data chained pada transaksi
    public function get_Unit_Property()
     {
            // kita joinkan tabel kota dengan provinsi
            $this->db->order_by('nama_unit', 'asc');
            $this->db->join('tbl_group', 'tbl_unit.idgroup = tbl_group.idgroup');
            return $this->db->get('tbl_unit')->result();
     }
 
	// update tabel material pada transaksi
    function update_Ekspedisi($data,$id){
		
	   $this->db->where('idekspedisi', $id);
       $update=$this->db->update('trx_ekspedisi',$data);	   
	   return $update;
    }
	
	// update detail transaksi item
	function update_Volume_in_Detail($data,$id){
		
	   $this->db->where('idmaterial', $id);
	   $this->db->where('status_detail','0');
	   $this->db->where('type','in');
       $update=$this->db->update('tbl_detail_trans',$data);	 
	   
    }
	
	// Update detail transaksi item
	function update_Volume_Out_Detail($data,$id,$sumber){
		
	   $this->db->where('idmaterial', $id);
	   $this->db->where('source', $sumber);
	   $this->db->where('status_detail','0');
	   $this->db->where('type','out');
       $update=$this->db->update('tbl_detail_trans',$data);	 
	   
    }
 
 // Menghapus Transaksi Ekspedisi
    function hapus_Data_Ekspedisi($id,$type){
		
		$update=$this->db->where('idekspedisi', $id);		
        $delete=$this->db->delete('trx_ekspedisi');
        return $delete;
		
    }
	
	
	
    	// menyimpan data transaksi masuk
	public function simpan_cash_flow($data){
		$save=$this->db->insert('tbl_cash_flow',$data);
	    //echo json_encode($save);
    } 
 
	
}

