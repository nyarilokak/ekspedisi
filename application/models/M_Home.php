<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Home extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

	function get_Count_Material() {
		$query = $this->db->query("SELECT * FROM driver");
		return $query->num_rows();		
		
	}
	
	function get_Count_Group() {
		$query = $this->db->query("SELECT * FROM kendaraan");
		return $query->num_rows();		
		
	}
	
	function get_Count_Unit() {
		$query = $this->db->query("SELECT * FROM rute ");
		return $query->num_rows();		
		
	}
	
	function get_Count_Satuan() {
		$query = $this->db->query("SELECT * FROM ongkir");
		return $query->num_rows();		
		
	}

	function get_Count_Verifikasi() {
		$query = $this->db->query("SELECT * FROM trx_ekspedisi WHERE flag_transaksi='2'");
		return $query->num_rows();		
		
	}
	
	function get_Count_Wait_transfer() {
		$query = $this->db->query("SELECT * FROM trx_ekspedisi WHERE flag_transaksi='3'");
		return $query->num_rows();		
		
	}

	function get_Transaksi_In() {
		
		$query = $this->db->query("SELECT a.*,b.nama,DATE(waktu) AS tgl_input FROM trx_ekspedisi a INNER JOIN tbl_user b ON a.iduser=b.iduser WHERE   DATE(waktu) between DATE_ADD(DATE(now()), INTERVAL -3 DAY) and DATE(now());");
		return $query->result();		
		
	}

	function get_Most_Ekspedisi() {
		
		$query = $this->db->query("SELECT tujuan, total, biaya FROM
		(SELECT COUNT(tujuan) AS total,SUM(biaya_ekspedisi) as biaya, tujuan
		FROM trx_ekspedisi
		GROUP BY tujuan
		ORDER BY Total DESC LIMIT 10) AS A;");
		return $query->result();		
		
	}

	function get_Most_Driver() {
		
		$query = $this->db->query("SELECT driver, total,biaya FROM
		(SELECT COUNT(driver) AS total,SUM(biaya_ekspedisi) as biaya, driver
		FROM trx_ekspedisi
		GROUP BY driver
		ORDER BY Total DESC LIMIT 10) AS A;");
		return $query->result();		
		
	}
	
	function get_LastMonthSaldo() {
		
		$query = $this->db->query("SELECT 
		SUM(biaya_ekspedisi) as biaya_lalu
		FROM trx_ekspedisi
		WHERE  MONTH(waktu) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
		");
		return $query->result();		
		
	}
	
	function get_MonthSaldo() {
		
		$query = $this->db->query("SELECT 
		SUM(biaya_ekspedisi) as biaya_sekarang
		FROM trx_ekspedisi
		WHERE  MONTH(waktu) = MONTH(CURRENT_DATE)
		");
		return $query->result();		
		
	}
	
	
	
	
	
	
}