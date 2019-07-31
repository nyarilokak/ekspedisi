<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_User extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

function get_User_Modal() {
		$id=$this->input->get('id');
		$sql=$this->db->query("select * from tbl_user where iduser='$id'");
		return $sql->result_array();
		
	}
	
 function get_User(){
        $hasil=$this->db->query("SELECT * FROM tbl_user Order By iduser DESC");
        return $hasil->result();
    }
 
 function simpan_Data($data){
	 
		$save=$this->db->insert('tbl_user',$data);
	   // echo json_encode($save);
    }  
 
    function get_user_by_id($id){
        $hsl=$this->db->query("SELECT * FROM tbl_user WHERE iduser='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'nama' => $data->nama,
                    'username' => $data->username,
                    'iduser' => $data->iduser,
					'dept' => $data->dept,
					'email' => $data->email,
					'aktif' => $data->aktif,
					'level' => $data->level,
                    );
            }
        }
        return $hasil;
    }
 
    function update_Data($data,$id){
		
	   $update=$this->db->where('iduser', $id);
       $update=$this->db->update('tbl_user',$data);	   
	   echo json_encode($update);
    }
 
    function hapus_Data($id){
		$update=$this->db->where('iduser', $id);
        $delete=$this->db->delete("tbl_user");
        echo json_encode($delete);
    }
     
	
}

