<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Report extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

function laporan_masuk() {
	
		$start=$this->input->get('start');
		$end=$this->input->get('end');
		$no=$this->input->get('no');
		//$section=$this->input->get('section');
		$this->db->select('*');
		$this->db->from('tbl_trans_warehouse a'); 
		$this->db->join('tbl_detail_trans b','a.idtransaksi=b.idtransaksi');
		$this->db->join('tbl_material c','b.idmaterial=c.idmaterial');
		$this->db->join('tbl_satuan d','c.idsatuan=d.idsatuan');
		
		if(!empty($start) && !empty($end)) { 		
		$this->db->where('tgl_transaksi >=',$start);
		$this->db->where('tgl_transaksi <=',$end);
		
		} if(!empty($no)) {  		
		$this->db->where('a.no_transaksi',$no);
		} 
		$this->db->where('a.type_transaksi','in');
		$this->db->where('a.status_transaksi','finish');
		$this->db->group_by('b.iddetail');
		$this->db->order_by('no_transaksi','ASC');
        $query = $this->db->get();
		return $query->result();
		
	}
	
function laporan_keluar() {
	
		$start=$this->input->get('start');
		$end=$this->input->get('end');
		$group=$this->input->get('group');
		$unit=$this->input->get('unit');
		//$section=$this->input->get('section');
		$this->db->select('*');
		$this->db->from('tbl_trans_warehouse a'); 
		$this->db->join('tbl_detail_trans b','a.idtransaksi=b.idtransaksi');
		$this->db->join('tbl_material c','b.idmaterial=c.idmaterial');
		$this->db->join('tbl_satuan d','c.idsatuan=d.idsatuan');
		$this->db->join('tbl_unit e','a.idunit=e.idunit');
		$this->db->join('tbl_group f','e.idgroup=f.idgroup');
		
		if(!empty($start) && !empty($end)) { 		
		$this->db->where('tgl_transaksi >=',$start);
		$this->db->where('tgl_transaksi <=',$end);
		
		}if(!empty($group)) {  		
		$this->db->where('e.idgroup',$group);
		} if(!empty($unit)) {  		
		$this->db->where('e.idunit',$unit);
		} 
		$this->db->where('a.type_transaksi','out');
		$this->db->where('a.status_transaksi','finish');
		$this->db->group_by('b.iddetail');
		$this->db->order_by('no_transaksi','ASC');
        $query = $this->db->get();
		return $query->result();
		
	}
	

	function batal_transaksi() {
	
		$start=$this->input->get('start');
		$end=$this->input->get('end');
		$no=$this->input->get('no');
		//$section=$this->input->get('section');
		$this->db->select('*');
		$this->db->from('tbl_trans_warehouse a'); 		
		
		if(!empty($start) && !empty($end)) { 		
		$this->db->where('DATE(tgl_batal) >=',$start);
		$this->db->where('DATE(tgl_batal) <=',$end);
		
		}
		
		$this->db->where('a.status_transaksi','cancel');
		$this->db->group_by('a.idtransaksi');
		$this->db->order_by('a.no_transaksi','ASC');
        $query = $this->db->get();
		return $query->result();
		
	}
     
	 function rab_vs_actual() {
		 
		 $tahun=$this->input->get('year');
		 $unit=$this->input->get('unit');
		 
		 $query=$this->db->query("SELECT
		  nama_material,
		  quantity,
		  satuan,
		  harga_material,
		  sum(if(month(tgl_transaksi) = 1, volume, 0))  AS Jan,
		  sum(if(month(tgl_transaksi) = 2, volume, 0))  AS Feb,
		  sum(if(month(tgl_transaksi) = 3, volume, 0))  AS Mar,
		  sum(if(month(tgl_transaksi) = 4, volume, 0))  AS Apr,
		  sum(if(month(tgl_transaksi) = 5, volume, 0))  AS May,
		  sum(if(month(tgl_transaksi) = 6, volume, 0))  AS Jun,
		  sum(if(month(tgl_transaksi) = 7, volume, 0))  AS Jul,
		  sum(if(month(tgl_transaksi) = 8, volume, 0))  AS Aug,
		  sum(if(month(tgl_transaksi) = 9, volume, 0))  AS Sep,
		  sum(if(month(tgl_transaksi) = 10, volume, 0)) AS Oct,
		  sum(if(month(tgl_transaksi) = 11, volume, 0)) AS Nov,
		  sum(if(month(tgl_transaksi) = 12, volume, 0)) AS December
		FROM tbl_set_rab a INNER JOIN tbl_material b ON a.idmaterial=b.idmaterial 
		INNER JOIN tbl_satuan k ON b.idsatuan=k.idsatuan
		LEFT JOIN 
		tbl_detail_trans c ON b.idmaterial=c.idmaterial INNER JOIN tbl_trans_warehouse d 
		ON c.idtransaksi=d.idtransaksi
		WHERE d.type_transaksi='out' AND d.status_transaksi='finish'
		AND a.tahun_rab='$tahun' AND a.idunit='$unit' AND YEAR(d.tgl_transaksi)='$tahun'
		GROUP BY a.idmaterial
		ORDER BY nama_material ASC");
		 return $query->result();
		 
	 }
	 
	 // laporan transaksi cash flow
	 function laporan_cash_flow() {
	
		$start=$this->input->get('start');
		$end=$this->input->get('end');
		//$no=$this->input->get('no');
		//$section=$this->input->get('section');
		$this->db->select('*');
		$this->db->from('tbl_cash_flow a'); 		
		
		if(!empty($start) && !empty($end)) { 		
		$this->db->where('tglflow >=',$start);
		$this->db->where('tglflow <=',$end);	
		}
		$this->db->group_by('a.idcashflow');
		$this->db->order_by('a.idcashflow','ASC');
        $query = $this->db->get();
		return $query->result();
		
	}
	
		 // laporan  total Debet & Kredit  saldo perbulan 
	 function cash_flow_by_month() {
	
		$year=$this->input->get('year');
		
		//$no=$this->input->get('no');
		//$section=$this->input->get('section');
		
		$this->db->from('SaldoByMonth'); 
		
	//	$this->db->where('YEAR(tglflow)=',$year);
		
		$query = $this->db->get();
		
		return $query->result();
		
	}
	
	public function cash_flow() {
	
		$start=$this->input->get('start');
		$end=$this->input->get('end');
		//$no=$this->input->get('no');
		//$section=$this->input->get('section');	
		
		
		if(isset($_GET['query'])) { 		
		
		$a_procedure = "CALL ViewSaldo(?,?)";
		$a_result = $this->db->query( $a_procedure,array('TglFrom'=>$start,'TglTo'=>$end));			
		
		//$query=$this->db->query("call ViewSaldo($start,$end)"); 
		
		//return $a_result->result();
		
		}  else {
			
		$a_procedure = "CALL ViewSaldoON()";
		$a_result = $this->db->query( $a_procedure);	
			
		}
		
		return $a_result->result();
		
		
		
	}
	
	// Count all record of table "contact_info" in database.
	public function record_count_Saldo() {
			
		return $this->db->count_all("tbl_cash_flow");
		
	}

		// Fetch data according to per_page limit.
		public function fetch_data_Saldo($limit) {
	
		$a_procedure = "CALL ViewSaldoON(?)";
		$query = $this->db->query( $a_procedure,array('LimitPerPage'=>$limit));
		if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
		}
		
	
}

