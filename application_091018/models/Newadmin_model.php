<?php
class Newadmin_model extends CI_Model {
	/*public function adminlist() {
		$this->db->select("*");
		$this->db->from('admin_details');
		$this->db->where('role','1');
		$query = $this->db->get()->row();
		return $query;
	}*/
	public function adminlist() {
            $this->db->select(" * ");
            $this->db->from('user');
            //$this->db->where('status',1);
            $query = $this->db->get();
            return $query->result();
        }
    public function vendor_list() {
            $this->db->select(" * ");
            $this->db->from('user');
            //$this->db->where('status',1);
            $this->db->where('role',2);
            $query = $this->db->get();
            return $query->result();
        }
        function delete_admin($id) {
            $this->db->set('status', 0);
            $this->db->where('id',$id);
            $this->db->update('user');
        }
        /*function update_admin($id) {
            $this->db->where('id',$id);
            $this->db->set('id',$id);
            $this->db->update('admin_details');
        }*/
}