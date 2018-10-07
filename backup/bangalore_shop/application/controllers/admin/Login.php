<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            //load model
            //$this->load->model('dashboard_model');
            $this->load->model('Login_model');
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
        public function index()
        {
            /*if(!empty($this->session->userdata('userid')))
            {
                    redirect(base_url());
            }
            $data['category_list'] = $this->Category_Model->get_list();
            $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();*/
            $this->load->view('admin/login');
        }
        public function verify()
	{
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
            {
            $data['error_message'] = 'field should not empty!';
            $this->load->view('admin/login',$data);
            }else{

            $email = $this->input->post('email');
            $password= $this->input->post('password');
            $data['res'] = $this->Login_model->verify_admin($email,$password);
            if(!empty($data['res']))
            {
             $session_data = array(
                'email' => $email,
                'first_name' => $data['res']['first_name'],
            );
             $this->session->set_userdata($session_data);
             $data['success_message'] = 'Successfully LoggedIn!';
             $this->load->view('admin/header');
             $this->load->view('admin/dashboard',$data);
             $this->load->view('admin/footer');
            }
            else
            {
                //$data['error_message'] = 'Failed to login!';
                $this->session->set_flashdata('SUCCESSMSG','Invalid Email and Password');

                $this->load->view('admin/login');
            }
        }
        }

  /*  public function enter(){
      if ($this->session->userdata('email') != '') 
      {
        $this->load->view('admin/dashboard');
      }else{
        $this->load->view('admin/login');

      }

    }*/
    public function dashboard(){
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');

    }

    public function logout()
	{
		$this->session->set_userdata(array(
			
			'email'      => ''
			
			));
            
		
		$this->session->unset_userdata('email');
		
		$this->session->sess_destroy();
		redirect('index.php/admin/login');
	}
    

}

