<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    error_reporting(0);

class Forgotpassword extends CI_Controller {

    public function __construct()
	{
            parent::__construct();
            $this->load->model('Login_model');
            $this->load->library('email');

        }
    public function index() {
        $this->load->view('admin/forgot_password');
        }

    public function ForgotPassword()
    {
    $email = $this->input->post('email');
    $findemail = $this->Login_model->ForgotPassword($email);
    if ($findemail) {
        $this->Login_model->sendpassword($findemail);
    } else {
        echo "<script>alert(' $email not found, please enter correct email id')</script>";
        redirect( 'admin/Forgotpassword', 'refresh');
    }
}
    }
    ?>