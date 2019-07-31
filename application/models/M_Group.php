<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Group extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

function get_User_Modal() {
		$id=$this->input->get('id');
		$sql=$this->db->query("select * from tbl_group where idgroup='$id'");
		return $sql->result_array();
		
	}
	
 function get_Data(){
        $hasil=$this->db->query("SELECT * FROM tbl_group Order By group_rumah ASC");
        return $hasil->result();
    }
 
 function simpan_Data($data){
		$save=$this->db->insert('tbl_group',$data);
	    echo json_encode($save);
    }  
 
    function get_Data_by_id($id){
        $hsl=$this->db->query("SELECT * FROM tbl_group WHERE idgroup='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
					'idgroup' => $data->idgroup,
                    'group_rumah' => $data->group_rumah,
					'alamat' => $data->alamat,
					'luas_tanah' => $data->luas_tanah,
                    'aktif' => $data->aktif,
					);
            }
        }
        return $hasil;
    }
 
    function update_Data($data,$id){
		
	   $this->db->where('idgroup', $id);
       $update=$this->db->update('tbl_group',$data);	   
	   echo json_encode($update);
    }
 
    function hapus_Data($id){
		$update=$this->db->where('idgroup', $id);
        $delete=$this->db->delete("tbl_group");
        echo json_encode($delete);
    }
     
	
}

