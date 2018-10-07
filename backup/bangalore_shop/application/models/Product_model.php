<?php
class Product_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function add_product($data,$subfilename){
        $this->db->set('prod_image', $data.'/'.$subfilename);
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
   

    public function product_list() {
        $this->db->select(" * ");
        $this->db->from('products');
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

   
	public function save_product($data,$product_id,$subfilename)
        {
        $this->db->set('prod_image', $subfilename);
        $this->db->where('id',$product_id);
        $query = $this->db->update('products',$data);
        return true;
          }

        function delete_product($id) {
            $this->db->where('id',$id);
            $this->db->delete('products');
        }

}