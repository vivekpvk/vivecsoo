<?php
class Category_Model extends CI_Model {
    
    public function getList() {
        $this->db->select(" * ");
        $this->db->where('status',1);
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result();
    }

    public function get($id) {
        $this->db->select(" * ");
        $this->db->from('category');
        $this->db->where('id',$id);
        $query = $this->db->get()->row();
        return $query;  
    }

    public function create($data) {
		$this->load->database();
	    $count=$this->db->insert('category',$data);
	    if($count>0) {
			return true;
		}else{
			return false;  
		}
	}

    public function update($category,$categoryid) {
        $this->db->set('cat_name', $category);
        //$this->db->set('offer', $offer);
        $this->db->set('modified_at', date("Y-m-d H:i:s"));
        $this->db->set('status', '1');

        $this->db->where('id',$categoryid);
        $query = $this->db->update('category');
        return true;
    }

	public function delete_cat($id) {
        $this->db->set('status', 0);
        $this->db->where('id',$id);
        $this->db->update('category');
    }
}