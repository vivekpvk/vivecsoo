<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//setting the construct auto load file
    public function __construct()
	{
        parent::__construct();
        $this->load->model('User_Model');
    }
    //checking the login file
    public function index() {
		//$this->load->view('admin/dashboard');
		$data['vendor']   = $this->User_Model->getVendor();
        $data['customer'] = $this->User_Model->getCustomer();
        $roleId           = $this->session->userdata('roleid');
        //checking the admin role id
        if ($roleId != VENDOR_ROLE_ID) {
        	$this->load->view('admin/dashboard',$data);
	    }else{
	        $this->load->view('admin/vendor/dashboard');
	    }
	    return;
    }
}
