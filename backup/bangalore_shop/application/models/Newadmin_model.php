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
            $this->db->from('admin_details');
            $query = $this->db->get();
            return $query->result();
        }
        function delete_admin($id) {
            $this->db->where('id',$id);
            $this->db->delete('admin_details');
        }
        /*function update_admin($id) {
            $this->db->where('id',$id);
            $this->db->set('id',$id);
            $this->db->update('admin_details');
        }*/
}