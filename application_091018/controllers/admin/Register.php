<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('admin_model');
    if($this->session->userdata('email') == '')
          {
            redirect(base_url().'index.php/admin/login');
          }
     }  
    public function index() {
		redirect('index.php/admin/login');
	}
   public function regis() {
    $this->load->view('admin/register');
  }

  public function addRole() {
    $return['users']  = $this->admin_model->getPosts();
    $return['role']   = $this->admin_model->getRole();
    $this->load->view('admin/add_role',$return);
  }

   public function setRole() {
    $id    = $this->input->post('user');
    $role  = $this->input->post('role');

    $this->admin_model->setRole($id,$role);
    $this->session->set_flashdata('success_msg', 'Role set done.');
    redirect('admin/Register/addRole');    
  }



	//session value store to session
  public function register() {
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('mobile', 'Mobile', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password]');
       
       if ($this->form_validation->run() == FALSE)
       {
        $this->session->set_flashdata('error_msg', 'Please fill the all fields.');
        redirect('admin/Register/regis');
       }else{
       $firstname  = $this->input->post('first_name');
       $lastname   = $this->input->post('last_name');
       $email      = $this->input->post('email');
       $mobile     = $this->input->post('mobile');
       $pass       = $this->input->post('password');
       $password   =md5($pass);
       $confirm    = $this->input->post('confirm');

       $data  = array('first_name'=>$firstname,'last_name'=>$lastname,'email'=>$email,'mobile'=>$mobile,'password'=>$password,'created_at'=> date("Y-m-d H:i:s"),'status'=>0);

      
         
      if ($this->admin_model->add_admin($data)) {
          $data['posts']  = $this->admin_model->getPosts();
          $this->session->set_flashdata('success_msg', 'Verify Mobile With Otp.');
           $this->load->view('sign_up');
      }else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('admin/Register/regis');            }
      }    
     }
    
public function setMenu() {
    $this->load->view('admin/user_privilage');
  }

public function saveUserRole() {
  $id    = $this->input->post('role');
  $menus  = implode(',',$this->input->post('menu'));
  $this->admin_model->add_privilage($menus,$id);
  $this->session->set_flashdata('success_msg', 'Privilage Added successfully.');
  redirect('admin/register/setMenu');
/*else{
  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  redirect('admin/register/setMenu');
}*/
      
  }

}

