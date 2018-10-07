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
    $this->load->view('admin/header');
    $this->load->view('admin/register');
    $this->load->view('admin/footer');
  }
	//session value store to session
  public function register() {
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
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
       $password   = $this->input->post('password');
       $confirm    = $this->input->post('confirm');

       $data  = array('first_name'=>$firstname,'last_name'=>$lastname,'email'=>$email,'mobile'=>$mobile,'password'=>$password);

      
         
      if ($this->admin_model->add_admin($data)) {
          $data['posts']  = $this->admin_model->getPosts();
          $this->session->set_flashdata('success_msg', 'Admin Added successfully.');
           redirect('admin/Newadmin');
      }else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('admin/Register/regis');            }
      }    
     }
    

}

