<?php
class Plan_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

public function add_plan($data){
		$this->load->database();
	    $count=$this->db->insert('plan',$data);
	    if($count>0) {
			return true;
		}else{
			return false;  
		}
	}
    
public function plan_list() {
            $this->db->select(" * ");
            $this->db->where('status',1);
            $this->db->from('plan');
            $query = $this->db->get();
            return $query->result();
        }
public function getPosts() {
	  	
		$this->db->select("*"); 
		return $query = $this->db->get('plan')->result();
	}
public function save_plan($plan,$planid)
        {
        $this->db->set('plan_name', $plan);
        //$this->db->set('offer', $offer);
        $this->db->set('modified_at', date("Y-m-d H:i:s"));
        $this->db->set('status', '1');

        $this->db->where('id',$planid);
        $query = $this->db->update('plan');
        return true;
    }
	function delete_plan($id) {
            $this->db->set('status', 0);
            $this->db->where('id',$id);
            $this->db->update('plan');
        }

        public function edit_plan($id)
        {
                $this->db->select(" * ");
                $this->db->from('plan');
                $this->db->where('id',$id);
                $query = $this->db->get()->row();
                return $query;	
        }
        /*public function edit_submit($data,$category_id)
        {
           $this->db->where('id',$category_id);
           $query = $this->db->update('category',$data);
        }*/

}