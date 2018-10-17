<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    //setting the construct auto load file
    public function __construct()
	{
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->model('Otp_Model');
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
                                'updated_at' => date("Y-m-d H:i:s"),
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
 
    public function password(){
        $this->load->view('admin/password');
    }
    public function updatePassword() {
        $password  = md5($this->input->post('old_password'));
        $npassword = md5($this->input->post('new_password'));
        $rpassword = md5($this->input->post('re_password'));
        $url       = "admin/user/password";
        if($this->input->post('form') == 'vendor') {
            $url    = "admin/vendor/password";
        }   
        if($npassword!=$rpassword){
            $this->session->set_flashdata('error_msg', 'New password and Repassword should be same.');
            redirect($url);
            return;
        }
        $id             = $this->session->userdata('userid');
        $data           = $this->User_Model->get($id);
        if(empty($data->id) || $data->password!=$password){
            $this->session->set_flashdata('error_msg', "Incorrect Password or Invalid Request..");
            redirect($url);
            return;
        }
        $data = array('password' => $npassword,
                      'id' => $id
                     );
        if($this->User_Model->updateById($data)){
            $this->session->set_flashdata('success_msg', 'Password Changed successfully.');
        }
        redirect($url);
        return;
    }

    public function manageProfile(){
        $id = $this->session->userdata('userid');
        $data['profile'] = $this->User_Model->get($id);
        $this->load->view('admin/manage_profile',$data);
    }
    //Ajax call Api
    public function checkCredentials() {
        $result             = array();
        $result["code"]     = 400;
        $result["msg"]      = "Fields are empty...";
        $post               = $this->input->post();
        //checking the fields are empty are not
        if(empty($post["field"]) || empty($post["username"]) || empty($post["password"])){
            echo json_encode($result);
            return;
        }
        $id                 = $this->session->userdata('userid');
        $user               = $this->User_Model->get($id);
        if(empty($user->id) || $user->password != md5($post["password"])) {
            $result["msg"]  = "Incorrect Password....";
            echo json_encode($result);
            return;
        }
        //checking mobile conditions
        if($post["field"] == "mobile") {
            $user           = $this->User_Model->getByMobile($post["username"]);
        }else{
            $user           = $this->User_Model->getByEmail($post["username"]);
        }
        //checking already registered or not
        if(!empty($user->id)) {
            $result["msg"]  = "This credentials already registered with us.";
            echo json_encode($result);
            return;
        }
        $result             = $this->Otp_Model->create($post);
        echo json_encode($result);
        return;
    }

    public function updateCredentials(){
        $result             = array();
        $result["code"]     = 400;
        $result["msg"]      = "Fields are empty...";
        $post               = $this->input->post();
        //checking the fields are empty are not
        if(empty($post["field"]) || empty($post["username"]) || empty($post["password"]) || empty($post["token"])){
            echo json_encode($result);
            return;
        }
        //checking mobile conditions
        if($post["field"] == "mobile") {
            $user           = $this->User_Model->getByMobile($post["username"]);
        }else{
            $user           = $this->User_Model->getByEmail($post["username"]);
        }
        //checking already registered or not
        if(!empty($user->id)) {
            $result["msg"]  = "This credentials already registered with us.";
            echo json_encode($result);
            return;
        }
        $result                     = $this->Otp_Model->getValidate($post);
        if($result['code'] == 200) {
            $data["id"]             = $this->session->userdata('userid');
            if($post["field"] == "mobile") {
                $data["mobile"]     = $post["username"];
            } else {
                $data["email"]      = $post["username"];
            }
            $this->User_Model->updateById($data);
            $result["msg"]      = "Successfully updated...";
        }
        echo json_encode($result);
    }
}

