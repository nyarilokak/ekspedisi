<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Customer extends CI_Model {
 
    
function __construct() {
        parent::__construct();
    }
	

function get_Data_Modal() {
		$id=$this->input->get('id');
		$sql=$this->db->query("select * from customer where idcustomer='$id'");
		return $sql->result_array();
		
	}
	
 function get_Data(){
        $hasil=$this->db->query("SELECT * FROM customer Order By customer ASC");
        return $hasil->result();
    }
 
 function simpan_Data($data){
	 
		$save=$this->db->insert('customer',$data);
	    echo json_encode($save);
    }  
 
    function get_Data_by_id($id){
		
        $hsl=$this->db->query("SELECT * FROM customer  WHERE idcustomer='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
					'idcustomer' => $data->idcustomer,
                    'cabang' => $data->cabang,
					'cmd' => $data->cmd,
					'customer' => $data->customer,					
					);
            }
        }
        return $hasil;
    }
 
    function update_Data($data,$id){
		
	   $this->db->where('idcustomer', $id);
       $update=$this->db->update('customer',$data);	   
	   echo json_encode($update);
    }
 
    function hapus_Data($id){
		$update=$this->db->where('idcustomer', $id);
        $delete=$this->db->delete('customer');
        echo json_encode($delete);
    }
     
	
}

