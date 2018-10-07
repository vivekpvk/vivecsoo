<?php
class Product_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function add_product($data){
        //$this->db->set('prod_image', $data.'/'.$subfilename);
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

    public function product_list() {

        /*$roleId = $this->session->userdata('roleid');
        $userId = $this->session->userdata('userid');

         
        $query=$this->db->query("SELECT * FROM products WHERE NOT $roleId = 'SUPER_ADMIN' AND status='1' AND (vendor_1='$userId' OR vendor_2='$userId' OR vendor_3='$userId')");
        return $query->result();*/

      
         
           

        $this->db->select(" * ");
        $this->db->from('products');
        $this->db->where('status',1);
        //checking the sesion id is not a super admin
        $roleId = $this->session->userdata('roleid');
        $userId = $this->session->userdata('userid');
        
        /*if($roleId!=SUPER_ADMIN){
        $this->db->where('vendor_1',$userId);
        $this->db->or_where('vendor_2',$userId);
        $this->db->or_where('vendor_3',$userId);
        }*/
    	$query = $this->db->get();
    	return $query->result();
    }
    public function edit_product($id)
        {
        $this->db->select(" * ");
        $this->db->from('products');
        $this->db->where('id',$id);
        $query = $this->db->get()->row();
        return $query;	
        }

   
	public function save_product($data,$product_id)
        {
        //$this->db->set('prod_image', $subfilename);
        $this->db->where('id',$product_id);
        $query = $this->db->update('products',$data);
        return true;
          }

        function delete_product($id) {
            $this->db->set('status', 0); //value that used to update column  
            $this->db->where('id',$id);
            $this->db->update('products');
        }

}