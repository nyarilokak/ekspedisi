<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Unit extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

function get_User_Modal() {
		$id=$this->input->get('id');
		$sql=$this->db->query("select * from driver where iddriver='$id'");
		return $sql->result_array();
		
	}
	
 function get_Data(){
        $hasil=$this->db->query("SELECT * FROM driver Order By iddriver ASC");
        return $hasil->result();
    }
 
 function simpan_Data($data){
		$save=$this->db->insert('driver',$data);
	    echo json_encode($save);
    }  
 
    function get_Data_by_id($id){
        $hsl=$this->db->query("SELECT * FROM driver WHERE iddriver='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
					'iddriver' => $data->iddriver,
                    'nama' => $data->nama,
					'email' => $data->email,
					'nrp' => $data->nrp,
					'npwp' => $data->npwp,
					'bank' => $data->bank,
					'norek' => $data->norek,
                    'atasnama' => $data->atasnama,
					);
            }
        }
        return $hasil;
    }
 
    function update_Data($data,$id){
		
	   $this->db->where('iddriver', $id);
       $update=$this->db->update('driver',$data);	   
	   echo json_encode($update);
    }
 
    function hapus_Data($id){
		$update=$this->db->where('iddriver', $id);
        $delete=$this->db->delete("driver");
        echo json_encode($delete);
    }
     
	
}

