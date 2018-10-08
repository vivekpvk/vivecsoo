<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newadmin extends CI_Controller {

    public function __construct()
	{
            parent::__construct();
            $this->load->model('Newadmin_model');
            /*if($this->session->role == "1")
            {
                redirect('index.php/admin/login');
            }*/
            if($this->session->userdata('email') == '')
          {
            redirect(base_url().'admin/login');
          }   
	}
        
        public function index()
        {
          
            $return['users'] = $this->Newadmin_model->adminlist();
            //$output['admin_list'] = $this->Newadmin_model->adminlist();
            $data['success_message'] = 'success';
            $this->load->view('admin/admin_list',$return,$data);
                       
       }
       public function vendorList()
        {
          
            $return['users'] = $this->Newadmin_model->vendor_list();
            //$output['admin_list'] = $this->Newadmin_model->adminlist();
            
            $this->load->view('admin/admin_list',$return);
                       
       }

        public function DeleteAdmin($id)
        {
            $this->Newadmin_model->delete_admin($id);
            $data['success_message'] = 'deleted';
            redirect('admin/Newadmin');
        }
       
}




