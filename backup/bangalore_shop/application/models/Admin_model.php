<?php
class Admin_model extends CI_Model {

	public function add_admin($data){
		$this->load->database();
	    $count=$this->db->insert('admin_details',$data);
	    if($count>0) {
			return true;
		}else{
			return false;  
		}
	}

	public function getPosts() {
	  	
		$this->db->select("*"); 
		$this->db->from('admin_details');
		$query = $this->db->get()->row();
                return $query;
	}

	public function getCarDetails($id) {
		$this->db->select("*");
		$this->db->from('vehicle_details');
		$this->db->where('id',$id);
		$query = $this->db->get()->row();
		return $query;
	}
}



