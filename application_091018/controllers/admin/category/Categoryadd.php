<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoryadd extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->model('Cat_model');
            $this->load->model('Common_model');
            if($this->session->userdata('email') == '')
          {
            redirect(base_url().'admin/login');
          }
            
	}
        
        public function index() {
        $data['posts']  = $this->Cat_model->getPosts();
        $this->load->view('admin/category/addcat',$data);

       }
           
       


        public function Addcat()
        {
        $this->form_validation->set_rules('category', 'Category', 'required');
       
        if ($this->form_validation->run() == FALSE)
       {
       $this->session->set_flashdata('error_msg', 'Please fill all field.');
        redirect('admin/category/Categoryadd');
       }else{
        $category     = $this->input->post('category');
        //$offer        = $this->input->post('offer');
         
       $data         = array('cat_name'        => $category,
                             //'offer'           => $offer,
                             'created_at'      => date("Y-m-d H:i:s"),
                             'status'          => '1');
        
       if ($this->Cat_model->add_cat($data)) {
          $this->session->set_flashdata('success_msg', 'Category Added successfully.');
           redirect('admin/category/categoryadd/cat_list');
        }else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('admin/category/Categoryadd');
            }
                } 
              }
    

      
       public function cat_list()
        {
           
           $return['list'] = $this->Cat_model->cat_list();
            //$output['admin_list'] = $this->Newadmin_model->adminlist();
            $this->load->view('admin/category/cat_list',$return);
       
    }
     public function Delete_cat($id)
        {
            $this->Cat_model->delete_cat($id);
            $data['success_message'] = 'deleted';
            redirect('admin/category/categoryadd/cat_list');
        }
    public function edit_cat($id)
        { 
           if(!empty($id))
            {            
                $data['selectedcat'] = $this->Cat_model->edit_cat($id);
                $data['posts']       = $this->Cat_model->getPosts();
                $this->load->view('admin/category/cat_edit',$data);
            } 
            else 
            {
                redirect('admin/category/categoryadd/cat_list');
            }
        }

        public function savecat(){
             $this->form_validation->set_rules('category', 'Category', 'required');
       
        if ($this->form_validation->run() == FALSE)
       {
            $data['error_message'] = 'field should not empty!';
            redirect('index.php/admin/category/categoryadd',$data);

       }else{
            $category   = $this->input->post('category');
            //$offer      = $this->input->post('offer');
            $categoryid = $this->input->post('category_id');

       if ($this->Cat_model->save_cat($category,$categoryid)) {
          $this->session->set_flashdata('success_msg', 'Category Updated successfully.');
           redirect('admin/category/categoryadd/cat_list');
        }else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('admin/category/categoryadd');
            }
       }

        }

}







