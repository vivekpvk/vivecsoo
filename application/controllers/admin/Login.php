<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            //load model
            //$this->load->model('dashboard_model');
            $this->load->model('Login_model');
            $this->load->model('Role_Model');
            $this->load->model('Vendor_model');
            //$this->load->model('Subcategory_Model');
            //$this->load->model('Product_Model',"product_model");
            //$this->load->model('Login_Model',"login_model");
            //$this->load->library('cart');
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('session');
            $this->load->database();
            //$this->load->library('encrypt');
           

        }
        public function index() {
            if(!empty($this->session->userdata('userid'))){
                $data['success_message'] = '';
                redirect('admin/login/dashboard',$data);
            }else{
                $this->load->view('admin/login');
            }
            return;
        }
        public function verify() {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
            {
            $data['error_message'] = 'field should not empty!';
            $this->load->view('admin/login',$data);
            } else {
                $email      = $this->input->post('email');
                $pass       = $this->input->post('password');
                $password   = md5($pass);
                $user       = $this->Login_model->verify_admin($email,$password);
            if(!empty($user['id'])) {
                //checking the role
                $role       = $this->Role_Model->getRole($user['role']);
                if(empty($role['id'])){
                    $this->load->view('admin/login');
                    return;
                }
                $session_data = array(
                    'userid'        => strval($user['id']),
                    'email'         => strval($user['email']),
                    'first_name'    => strval($user['first_name']),
                    'last_name'     => strval($user['last_name']),
                    'menuid'        => strval($role['menu_id']),
                    'roleid'        => strval($user['role'])
                );
             $this->session->set_userdata($session_data);
             $data['success_message'] = 'Successfully LoggedIn!';
             redirect('admin/login/dashboard');
            }
            else
            {
                //$data['error_message'] = 'Failed to login!';
                $this->session->set_flashdata('SUCCESSMSG','Invalid Email and Password');

                $this->load->view('admin/login');
            }
        }
        }

 
    public function dashboard(){
        $data['vendor']   = $this->Login_model->getVendorCount();
        $data['customer'] = $this->Login_model->getCustomer();
        $roleid           = $this->session->userdata('roleid');
        if ($roleid!=2) {
        $this->load->view('admin/dashboard',$data);
    }else{
        $data['vendor']   = $this->Login_model->getVendor();
        $this->load->view('admin/vendor_dashboard',$data);
    }

    }
     public function changePassword(){
        $this->load->view('admin/change_password');

    }
    public function password()
{
    $password  = $this->input->post('old_password');
    $pass      = md5($password);
    $npassword = $this->input->post('new_password');
    $npass     = md5($npassword);
    $rpassword = $this->input->post('re_password');
    $rpass     = md5($rpassword);
    if($npass!=$rpass){
        $this->session->set_flashdata('error_msg', 'New password and Repassword should be same.');
        redirect('admin/login/changePassword');
    }else{
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email',$this->session->userdata('email'));
        $this->db->where('password',$pass);
        $query = $this->db->get();
        if($query->num_rows()==1){
            $data = array(
                           'password' => $npass
                        );
            $this->db->where('email', $this->session->userdata('email'));
            $this->db->update('user', $data); 
            $this->session->set_flashdata('success_msg', 'Password Changed successfully.');
            redirect('admin/login/dashboard');
        }else{
            $this->session->set_flashdata('error_msg', 'Please Try Again Later.');
            $this->load->view('admin/change_password');
        }
    }
}

public function userProfile(){
    $id = $this->session->userdata('userid');
    $data['profile'] = $this->Login_model->user_profile($id);
    $this->load->view('admin/user_profile',$data);

    }
public function saveProfile(){
     $this->form_validation->set_rules('firstname', 'firstname', 'required');
       
        if ($this->form_validation->run() == FALSE)
       {
           $this->session->set_flashdata('error_msg', 'Please fill all the field.');
            redirect('admin/login/userProfile');

       }else{
            $firstname   = $this->input->post('firstname');
            $lastname    = $this->input->post('lastname');
            $email       = $this->input->post('email');
            $mobile      = $this->input->post('mobile');
            $pass        = $this->input->post('password');
            $password    = md5($pass);
            $pro_id      = $this->input->post('pro_id');

            $data  = array('first_name'=>$firstname,
                           'last_name'=>$lastname,
                           'email'=>$email,
                           'mobile'=>$mobile,
                            );

    if ($this->Login_model->checkPassword($pro_id,$password)) {
       if ($this->Login_model->save_profile($pro_id,$data)) {
          $this->session->set_flashdata('success_msg', 'Profile Updated successfully.');
           redirect('admin/login/dashboard');
        }else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('admin/login/userProfile');
            }
        }else{
        $this->session->set_flashdata('error_msg', 'Enter Correct Password');
        redirect('admin/login/userProfile'); 
        }
       }

        }

    public function logout()
	{
		$this->session->set_userdata(array(
			
			'email'      => ''
			
			));
            
		
		$this->session->unset_userdata('email');
		
		$this->session->sess_destroy();
		redirect('admin/login');
	}
    

}

