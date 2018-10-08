<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		 $this->load->model('User_Model');
		//$this->load->view('admin/dashboard');
		$data['vendor']   = $this->User_Model->getVendor();
        $data['customer'] = $this->User_Model->getCustomer();
        $roleid           = $this->session->userdata('roleid');
        if ($roleid!=2) {
        $this->load->view('admin/dashboard',$data);
    }else{
        $this->load->view('admin/vendor_dashboard');
    }
	}
}
