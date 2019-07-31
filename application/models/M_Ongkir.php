<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Ongkir extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	


	
 function get_Data(){
        $hasil=$this->db->query("SELECT * FROM ongkir Order By idongkir ASC");
        return $hasil->result();
    }
 
 function simpan_Data($data){
		$save=$this->db->insert('ongkir',$data);
	    return $save;
    }  
 
    function get_Data_by_id($id){
        $hsl=$this->db->query("SELECT * FROM ongkir WHERE idongkir='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
					'idongkir' => $data->idongkir,
                    'dari' => $data->dari,
					'tujuan' => $data->tujuan,
					'km' => $data->km,
					'jasa_driver' => $data->jasa_driver,
					'biaya_transport' => $data->biaya_transport,
                    'biaya_asdp' => $data->biaya_asdp,
					'biaya_tol' => $data->biaya_tol,
					'biaya_lain' => $data->biaya_lain
					);
            }
        }
        return $hasil;
    }
 
    function update_Data($data,$id){
		
	   $this->db->where('idongkir', $id);
       $update=$this->db->update('ongkir',$data);	   
	   echo json_encode($update);
    }
 
    function hapus_Data($id){
		$update=$this->db->where('idongkir', $id);
        $delete=$this->db->delete("ongkir");
        echo json_encode($delete);
    }
     
	
}

