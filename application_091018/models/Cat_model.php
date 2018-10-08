<?php
class Cat_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

public function add_cat($data){
		$this->load->database();
	    $count=$this->db->insert('category',$data);
	    if($count>0) {
			return true;
		}else{
			return false;  
		}
	}
    /*function add() {     
            $this->db->set('name', $this->input->post('category'));
            $this->db->set('catparent_id',$this->input->post('catparent_id'));
            $this->db->set('parent_id',$this->input->post('parent_id'));//cat_id
            $this->db->set('year',$this->input->post('year'));
            $this->db->set('created_by', '1');
            $this->db->set('created_at', date("Y-m-d H:i:s"));
            $this->db->set('status','0');
            $query = $this->db->insert('category');
            $response=$this->db->insert_id();
            return $response;
    }*/
    
public function cat_list() {
            $this->db->select(" * ");
            $this->db->where('status',1);
            $this->db->from('category');
            $query = $this->db->get();
            return $query->result();
        }
public function getPosts() {
	  	
		$this->db->select("*"); 
		return $query = $this->db->get('category')->result();
	}
public function save_cat($category,$categoryid)
        {
        $this->db->set('cat_name', $category);
        //$this->db->set('offer', $offer);
        $this->db->set('modified_at', date("Y-m-d H:i:s"));
        $this->db->set('status', '1');

        $this->db->where('id',$categoryid);
        $query = $this->db->update('category');
        return true;
    }
	function delete_cat($id) {
            $this->db->set('status', 0);
            $this->db->where('id',$id);
            $this->db->update('category');
        }

        public function edit_cat($id)
        {
                $this->db->select(" * ");
                $this->db->from('category');
                $this->db->where('id',$id);
                $query = $this->db->get()->row();
                return $query;	
        }
        public function edit_submit($data,$category_id)
        {
           $this->db->where('id',$category_id);
           $query = $this->db->update('category',$data);
        }

}