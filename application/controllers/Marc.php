<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marc extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    //checking the login function
    public function index() {
        if(!empty($this->session->userdata('userid'))){
            $data['success_message'] = '';
            redirect('admin/dashboard',$data);
        }else{
            $this->load->view('admin/login');
        }
        return;
    }
    //checking the logout function
    public function logout() {
		$this->session->set_userdata(array('email' => '',
                                           'userid' => ''
                                          )
                                    );
		$this->session->unset_userdata('email');
        $this->session->unset_userdata('userid');
		$this->session->sess_destroy();
		redirect('marc');
	}
    
    //getting the users valid or not
    public function checkuser() {
        if(empty($this->session->userdata('userid'))) {
            redirect('marc');
        }
        return;
    }
}
