<?php
class Role_Model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_Model');  
    }

	function getRole($roleId) 
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



