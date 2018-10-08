<?php
class Role_Model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_Model');  
    }

    public function getUserRole() {
        $this->db->select("*"); 
        $this->db->from('role');
        $this->db->where('id !=', VENDOR_ROLE_ID);
        $query = $this->db->get();
        return $query->result();
    }

    public function setRole($id,$role) {
        $this->db->set('role', $role);
        $this->db->where('id',$id);
        $this->db->update('user');
        return true;
    }

    public function addPrivilage($menu,$id) {
        $this->db->set('menu_id', $menu);
        $this->db->set('status', 1);
        $this->db->where('id',$id);
        $this->db->update('role');
    }

	public function getRole($roleId) 
    {
        $query  =   $this->db->query("SELECT * FROM `role` WHERE `id` =".$roleId);
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return ($result);
        } else  {
            return 0;
        }
    }
}



