<?php
class Login_model extends CI_Model {

	public function login($email,$password)
	{
            $this -> db -> select(' * ');
            $this -> db -> from('user_detail');
            $this -> db -> where('email', $email);
            $this -> db -> where('password', $password);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            return $query;
	}

	 function verify_admin($email, $password) 
        {
            $query=$this->db->query("SELECT * FROM admin_details WHERE email = '$email' AND password = '$password' limit 1 ");
            $result = $query->row_array();
            if ($query->num_rows() > 0)
            {
                return($result);
            }
            else 
            {
                return false;
            }
        }
}



