<?php
class Admin_model extends CI_Model {

	public function add_admin($data){
		$this->load->database();
	    $count=$this->db->insert('user',$data);
	    if($count>0) {
			return true;
		}else{
			return false;  
		}
	}

	public function getPosts() {
	  	
		$this->db->select("*"); 
		//$this->db->where('status',1);
		$this->db->from('user');
		$query = $this->db->get();
            return $query->result();
	}

	public function getRole() {
	  	
		$this->db->select("*"); 
		$this->db->from('role');
		$query = $this->db->get();
            return $query->result();
	}
	public function setRole($id,$role) {
	  	
		$this->db->set('role', $role);
        $this->db->where('id',$id);
        $this->db->update('user');
	}

	public function add_privilage($menu,$id) {
	  	$this->db->set('menu_id', $menu);
	  	$this->db->set('status', 1);
        $this->db->where('id',$id);
        $this->db->update('role');
	}
}



