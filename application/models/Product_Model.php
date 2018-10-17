<?php
class Product_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function get($id) {
        $this->db->select("products.*,
                           user1.first_name as username1,user1.mobile as mobile1,
                           user2.first_name as username2,user2.mobile as mobile2,
                           user3.first_name as username3,user3.mobile as mobile3
                           ");
        $this->db->from('products');
        $this->db->join('user as user1','user1.id = products.vendor_1', 'left');
        $this->db->join('user as user2','user2.id = products.vendor_2', 'left');
        $this->db->join('user as user3','user3.id = products.vendor_3', 'left');
        $this->db->where('products.id',$id);
        $query = $this->db->get()->row();
        return $query;  
    }

    public function getList() {
        $this->db->select('products.*,category.cat_name,user1.first_name as username1,user2.first_name as username2,user3.first_name as username3');
        $this->db->from('products');
        $this->db->join('category','category.id = products.cat_id', 'left');
        $this->db->join('user as user1','user1.id = products.vendor_1', 'left');
        $this->db->join('user as user2','user2.id = products.vendor_2', 'left');
        $this->db->join('user as user3','user3.id = products.vendor_3', 'left');
        $this->db->where('products.status',1);
        $query = $this->db->get();
        return $query->result();
    }

    public function create($data){
	    $count=$this->db->insert('products',$data);
	    if($count>0) {
			return true;
		}else{
			return false;  
		}
	}
    public function getPosts() {
        $this->db->select("*"); 
        return $query = $this->db->get('category')->result();
    }

     public function getUnique() {
        $this->db->select("id"); 
        return $query = $this->db->get('category')->result();
    }

    //checking the keyword available or not
    public function update_key($id) {
        //checking the sesion id is not a super admin
        $userId = $this->session->userdata('userid');
        $this->db->select(" * ");
        $this->db->from('products');
        //$this->db->where('status',1);
        $this->db->where('id',$id);
        $this->db->where('vendor_1 != ',$userId);
        $this->db->where('vendor_2 != ',$userId);
        $this->db->where('vendor_3 != ',$userId);
        $query = $this->db->get()->row();
        $rowId  = isset($query->id) ? $query->id : 0;
        if(empty($rowId)){
            //error comment 
            return "error in zero rows  ";
        }
        $result         = "Unable to add this key: ".$query->prod_name;
        $vendor_1  = $vendor_2 = $vendor_3 = 0;
        //checking the vendor 1 is empty or not
        if(empty($query->vendor_1)) {
            $this->db->set('vendor_1', $userId);
            $vendor_1   = 1;
        }
        //checking the vendor 2 is empty or not
        if(empty($query->vendor_2) && $vendor_1 == 0) {
            $this->db->set('vendor_2', $userId);
            $vendor_2   = 1;
        }
        //checking the vendor 3 is empty or not
        if(empty($query->vendor_3) && $vendor_1 == 0 && $vendor_2 == 0) {
            $this->db->set('vendor_3', $userId);
            $vendor_3   = 1;
        }
        if ($vendor_1 || $vendor_2 || $vendor_3) {
            $this->db->where('id',$id);
            $this->db->update('products');
            $result         = "Successfully updated this: ".$query->prod_name;
        }
        return $result;
    }

	public function update($data,$product_id) {
        $this->db->where('id',$product_id);
        $query = $this->db->update('products',$data);
        return true;
    }

    public function delete($id) {
        $this->db->set('status', 0); //value that used to update column  
        $this->db->where('id',$id);
        $this->db->update('products');
    }
}