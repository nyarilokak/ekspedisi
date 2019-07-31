<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Jenis extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

function get_User_Modal() {
		$id=$this->input->get('id');
		$sql=$this->db->query("select * from rute where idrute='$id'");
		return $sql->result_array();
		
	}
	
 function get_Data(){
        $hasil=$this->db->query("SELECT * FROM rute Order By namarute ASC");
        return $hasil->result();
    }
 
 function simpan_Data($data){
		$save=$this->db->insert('rute',$data);
	    echo json_encode($save);
    }  
 
    function get_Data_by_id($id){
        $hsl=$this->db->query("SELECT * FROM rute WHERE idrute='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
					'idrute' => $data->idrute,
                    'rute' => $data->namarute
					);
            }
        }
        return $hasil;
    }
 
    function update_Data($data,$id){
		
	   $this->db->where('idrute', $id);
       $update=$this->db->update('rute',$data);	   
	   echo json_encode($update);
    }
 
    function hapus_Data($id){
		$update=$this->db->where('idrute', $id);
        $delete=$this->db->delete("rute");
        echo json_encode($delete);
    }
     
	
}

