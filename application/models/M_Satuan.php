<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Satuan extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

function get_User_Modal() {
		$id=$this->input->get('id');
		$sql=$this->db->query("select * from bbm where idbbm='$id'");
		return $sql->result_array();
		
	}
	
 function get_Data(){
        $hasil=$this->db->query("SELECT * FROM bbm Order By idbbm ASC");
        return $hasil->result();
    }
 
 function simpan_Data($data){
		$save=$this->db->insert('bbm',$data);
	    echo json_encode($save);
    }  
 
    function get_Data_by_id($id){
        $hsl=$this->db->query("SELECT * FROM bbm WHERE idbbm='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
					'idbbm' => $data->idbbm,
                    'bbm' => $data->bbm,
                    'harga' => $data->harga,
					);
            }
        }
        return $hasil;
    }
 
    function update_Data($data,$id){
		
	   $this->db->where('idbbm', $id);
       $update=$this->db->update('bbm',$data);	   
	   echo json_encode($update);
    }
 
    function hapus_Data($id){
		$update=$this->db->where('idbbm', $id);
        $delete=$this->db->delete("bbm");
        echo json_encode($delete);
    }
     
	
}

