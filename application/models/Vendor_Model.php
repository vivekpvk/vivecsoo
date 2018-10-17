<?php
class Vendor_Model extends CI_Model {
    
    public function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function get($id) {
        $this->db->select('user.*,vendor.*,user.id as vendor_id');
        $this->db->from('user');
        $this->db->join('vendor', 'vendor.user_id = user.id', 'left');
        $this->db->where('user.role ='.VENDOR_ROLE_ID);
        $this->db->where('user.id ='.$id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getList() {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role ='.VENDOR_ROLE_ID);
        $query = $this->db->get();
        return $query->result();
    }

    //4 function common for all models list,add,delete,update
    public function create($data){
        $get    = $this->db->query("SELECT * FROM user WHERE email = '".$data['email']."' OR mobile = '".$data['mobile']."'");
        $rows = $get->row_array();
        $result         = false;
        if ($get->num_rows() == 0) {
            $this->load->database();
            $count      = $this->db->insert('user',$data);
            if($count>0) {
                $result = true;
            }
        }
        return $result;
    }

    public function update($data) {
        if(empty($data['user_id'])) {
            return false;
        }
        $user               = $this->get($data['user_id']);
        if(!empty($user->user_id)) {
            $this->db->where('user_id',$user->vendor_id);
            $result = $this->db->update('vendor',$data);
        }else{
            $result = $this->db->insert('vendor',$data);
        }  
       return $result;
    }

    public function update_images($fileName,$column,$userId) {
        $data           = array($column => $fileName);
        $this->db->where('user_id',$userId);
        $query = $this->db->update('vendor',$data);
        return;
    }
    
    public function getProImage($userId) {
        $this->db->select("logo_image");
        $this->db->from('vendor');
        $userId         = $this->session->userdata('userid');
        $this->db->where('user_id',$userId);
        $query = $this->db->get()->row();
        return $query;
        }

    function reupdate_images($fileName,$column,$vendor_id) {
        $data           =   array($column=>$fileName);
        $userId         = $this->session->userdata('userid');
        $this->db->where('id',$vendor_id);
        $query = $this->db->update('vendor',$data);
        return;
    }

    public function update_details() {
        $userId         = $this->session->userdata('userid');
        $this->db->select(" * ");
        $this->db->from('vendor');
        $this->db->where('user_id',$userId);
        $query = $this->db->get()->row();
        return $query;
        }

    public function select_product($userid) {
        $this->db->select(" * ");
        $this->db->from('vendor');
        $this->db->where('user_id',$userid);
        $query = $this->db->get()->row();
        return $query;
        }
        
    public function getPosts() {
        $this->db->select("*"); 
        return $query = $this->db->get('category')->result();
    }
    //for vendor edit
    public function getKeys() {
        $this->db->select("*"); 
        $this->db->where('vendor_1',0);
        $this->db->or_where('vendor_2',0);
        $this->db->or_where('vendor_3',0);
        return $query = $this->db->get('products')->result();
    }


   // for vendor
    public function getKeysselection() {
        $userId = $this->session->userdata('userid');
        
        $query=$this->db->query("SELECT * FROM `products` INNER JOIN vendor ON products.cat_id = vendor.cat_id  WHERE vendor.user_id='$userId' AND (products.vendor_1=0 OR products.vendor_2 = 0 OR products.vendor_3 = 0)");
        $result = $query->result();
        return $result;
        /*$this->db->select('*');
        $this->db->from('products');
        $this->db->join('vendor', 'vendor.cat_id = products.cat_id');
        $this->db->where('vendor.user_id',$userId);
        $this->db->where('products.vendor_1',0);
        $this->db->or_where('products.vendor_2',0);
        $this->db->or_where('products.vendor_3',0);
        
        //$this->db->where('user.status = 1');
        $query = $this->db->get();
        return $query->result();*/



        /*$this->db->select("*"); 
        $this->db->where('vendor_1',0);
        $this->db->or_where('vendor_2',0);
        $this->db->or_where('vendor_3',0);
        return $query = $this->db->get('products')->result();*/
    }

    // for admin
    public function getKeysselected($id) {
        $userId = $this->session->userdata('userid');
        
        $query=$this->db->query("SELECT * FROM `products` INNER JOIN vendor ON products.cat_id = vendor.cat_id  WHERE vendor.user_id='$id' AND (products.vendor_1=0 OR products.vendor_2 = 0 OR products.vendor_3 = 0)");
        $result = $query->result();
        return $result;
    }

    //for admin
    public function getVendorKey() {
        $userId = $this->session->userdata('userid');
        $this->db->select("*"); 
        //$this->db->from('vendor');
        //$this->db->where('user_id',$userId);
        $this->db->where('vendor_1',$userId);
        $this->db->or_where('vendor_2',$userId);
        $this->db->or_where('vendor_3',$userId);
        return $query = $this->db->get('products')->result();
    }
   //for vendor
    public function getKeysedit() {
        $userId = $this->session->userdata('userid');
        $this->db->select("*"); 
        //$this->db->from('vendor');
        //$this->db->where('user_id',$userId);
        $this->db->where('vendor_1',$userId);
        $this->db->or_where('vendor_2',$userId);
        $this->db->or_where('vendor_3',$userId);
        return $query = $this->db->get('products')->result();
    }

    public function getVendorAllKeys() {
        $query=$this->db->query("SELECT * FROM products INNER JOIN vendor ON vendor.user_id=products.vendor_1 OR vendor.user_id=products.vendor_2 OR vendor.user_id=products.vendor_3");
        $result = $query->result();
        return $result;
    }

    public function getKeyById($id) {
       $query=$this->db->query("SELECT * FROM `products` WHERE cat_id='$id' AND (vendor_1=0 OR vendor_2 = 0 OR vendor_3 = 0)");
        $result = $query->result();
        //$this->db->select("*");
        //$this->db->from('products');
        //$this->db->where('cat_id',$id);
        //$where = "vendor_1='0' OR vendor_2='0' OR vendor_3='0'";
        //$this->db->where($where);
        //$this->db->where('vendor_1',0);
        //$this->db->or_where('vendor_2',0);
        //$this->db->or_where('vendor_3',0);
        //$query = $this->db->get()->result();
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
        
        if($roleId!=SUPER_ADMIN){
        $this->db->where('vendor_1',$userId);
        $this->db->or_where('vendor_2',$userId);
        $this->db->or_where('vendor_3',$userId);
        }
    	$query = $this->db->get();
    	return $query->result();
    }

    public function vendor_list() {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('vendor', 'vendor.user_id = user.id');
        $this->db->where('user.role = 2');
        //$this->db->where('user.status = 1');
        $query = $this->db->get();
        return $query->result();

    }

    public function vendor_businesslist($id) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('vendor', 'vendor.user_id = user.id');
        $this->db->where('vendor.user_id',$id);
        //$this->db->where('user.status = 1');
        $query = $this->db->get()->row();
        return $query;
    }

    public function my_details() {
        $userId = $this->session->userdata('userid');
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('vendor', 'vendor.user_id = user.id');
        $this->db->where('user.id',$userId);
        //$this->db->where('user.status = 1');
        $query = $this->db->get();
        return $query->result();

    }
      //delete vendor
    public function delete_vendor($id) {
        $this->db->where('user_id',$id);
        $this->db->delete('vendor');
        }
        //making vendor id 0 in products
    public function delete_vendorKey($id) {
        $this->db->set('vendor_1',0);
        $this->db->where('vendor_1',$id);
        $this->db->update('products');

        $this->db->set('vendor_2',0);
        $this->db->where('vendor_2',$id);
        $this->db->update('products');

        $this->db->set('vendor_3',0);
        $this->db->where('vendor_3',$id);
        $this->db->update('products');
        }

        //making status 1 by verify
    public function verify_vendor($id) {
        $this->db->set('status', 1); //value that used to update column  
        $this->db->where('id',$id);
        $this->db->update('vendor');
        }
        //making status 0 by unverify
    public function unverify_vendor($id) {
        $this->db->set('status', 0); //value that used to update column  
        $this->db->where('id',$id);
        $this->db->update('vendor');
        }

    public function unverify_vendorKey($id) {
        $this->db->set('vendor_1',0);
        $this->db->where('vendor_1',$id);
        $this->db->update('products');

        $this->db->set('vendor_2',0);
        $this->db->where('vendor_2',$id);
        $this->db->update('products');

        $this->db->set('vendor_3',0);
        $this->db->where('vendor_3',$id);
        $this->db->update('products');
        }

    public function getmyDetails() {
           
        $this->db->select(" * ");
        $this->db->from('products');
        $this->db->where('status',1);
        //checking the sesion id is not a super admin
        $roleId = $this->session->userdata('roleid');
        $userId = $this->session->userdata('userid');
        
        if($roleId!=SUPER_ADMIN){
        $this->db->where('vendor_1',$userId);
        $this->db->or_where('vendor_2',$userId);
        $this->db->or_where('vendor_3',$userId);
        }
        $query = $this->db->get();
        return $query->result();
        }

   

}