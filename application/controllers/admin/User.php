<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    //setting the construct auto load file
    public function __construct()
	{
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->model('Role_Model');
    }

    //index means getting the category list    
    public function index() {
        $return['users']            = $this->User_Model->getList();
        $this->load->view('admin/admin_list',$return);
    }


    //index means getting the category list    
    public function add() {
        $this->load->view('admin/register');
    }

    public function create() {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password]');
        $error_msg      = "Please fill the all fields...!";
        if ($this->form_validation->run()) {
            $error_msg  = "Error occurred,Try again...!";
            $firstname  = $this->input->post('first_name');
            $lastname   = $this->input->post('last_name');
            $email      = $this->input->post('email');
            $mobile     = $this->input->post('mobile');
            $pass       = $this->input->post('password');
            $password   = md5($pass);
            $confirm    = $this->input->post('confirm');
            $data       = array('first_name' => $firstname,
                                'last_name'  => $lastname,
                                'email' => $email,
                                'mobile' => $mobile,
                                'password' => $password,
                                'created_at' => date("Y-m-d H:i:s"),
                                'status' => 1
                            );
            if ($this->User_Model->create($data)) {
                $error_msg      = "";
                $this->session->set_flashdata('success_msg', 'successfully created...!');
                redirect('admin/user');
            }  
        }
        $this->session->set_flashdata('error_msg', $error_msg);
        redirect('admin/user');
    }

    public function status($id) {
        $this->User_Model->changeStatus($id);
        $data[''] = 'successfully deactivated...!';
        redirect('admin/user');
    }

    //index means getting the category list    
    public function role() {
        $return['users']  = $this->User_Model->getList();
        $return['role']   = $this->Role_Model->getUserRole();
        $this->load->view('admin/add_role',$return);
    }

    public function setrole() {
        $id    = $this->input->post('user');
        $role  = $this->input->post('role');
        $this->Role_Model->setRole($id,$role);
        $this->session->set_flashdata('success_msg', 'successfully set the role...!.');
        redirect('admin/user');    
    }

    //index means getting the category list    
    public function menu() {
        $this->load->view('admin/user_privilage');
    }

    
    public function setmenu() {
        $id         = $this->input->post('role');
        $menus      = implode(',',$this->input->post('menu'));
        $this->Role_Model->addPrivilage($menus,$id);
        $this->session->set_flashdata('success_msg', 'Privilage Added successfully.');
        redirect('admin/user/menu');
    }

    //checking the login verification
    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $error_msg      = 'field should not empty...!';
        //checking the validation
        if ($this->form_validation->run()) {
            $error_msg  = 'Invalid email or password...!';
            $email      = trim($this->input->post('email'));
            $password   = md5($this->input->post('password'));
            $user       = $this->User_Model->login($email,$password);
            $role       = $this->Role_Model->getRole(intval($user['role']));
            if(!empty($user['id']) && !empty($role['id'])) { 
                $error_msg     = '';           
                $sessionData   = array('userid'        => strval($user['id']),
                                        'email'         => strval($user['email']),
                                        'first_name'    => strval($user['first_name']),
                                        'last_name'     => strval($user['last_name']),
                                        'menuid'        => strval($role['menu_id']),
                                        'roleid'        => strval($user['role'])
                                    );
                $this->session->set_userdata($sessionData);
                $data['success_message'] = 'Successfully LoggedIn!';
                redirect('admin/dashboard');
                return;
            }  
        }
        $this->session->set_flashdata('SUCCESSMSG',$error_msg);
        $this->load->view('admin/login');
        return;
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
    $data['profile'] = $this->User_Model->user_profile($id);
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

    if ($this->User_Model->checkPassword($pro_id,$password)) {
       if ($this->User_Model->save_profile($pro_id,$data)) {
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

