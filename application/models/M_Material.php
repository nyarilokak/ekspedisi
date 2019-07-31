<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Material extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

function get_Data_Modal() {
		$id=$this->input->get('id');
		$sql=$this->db->query("select * from kendaraan where idkendaraan='$id'");
		return $sql->result_array();
		
	}
	
 function get_Data(){
        $hasil=$this->db->query("SELECT * FROM kendaraan a INNER JOIN bbm b ON a.idbbm=b.idbbm Order By idkendaraan DESC");
        return $hasil->result();
    }
 
 function simpan_Data($data){
	 
		$save=$this->db->insert('kendaraan',$data);
		
		 return $save;
	   
    }  
 
    function get_Data_by_id($id){
		
        $hsl=$this->db->query("SELECT * FROM kendaraan  WHERE idkendaraan='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
					'idkendaraan' => $data->idkendaraan,
                    'nopol' => $data->nopol,
					'equipment' => $data->equipment,
					'tipe' => $data->tipe,
					'silinder' => $data->silinder,
					'bbm' => $data->idbbm,
                    'rasio' => $data->rasio,
					);
            }
        }
        return $hasil;
    }
 
    function update_Data($data,$id){
		
	   $this->db->where('idkendaraan', $id);
       $update=$this->db->update('kendaraan',$data);	   
	   echo json_encode($update);
    }
 
    function hapus_Data($id){
		$update=$this->db->where('idkendaraan', $id);
        $delete=$this->db->delete('kendaraan');
        echo json_encode($delete);
    }
     
	
}

