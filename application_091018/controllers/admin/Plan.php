<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->model('Plan_model');
            if($this->session->userdata('email') == '')
          {
            redirect(base_url().'admin/login');
          }
            
	}
        
        public function index() {
        $data['posts']  = $this->Plan_model->getPosts();
        $this->load->view('admin/plan/addplan',$data);

       }
           
       


        public function Addplan()
        {
        $this->form_validation->set_rules('plan', 'plan', 'required');
       
        if ($this->form_validation->run() == FALSE)
       {
       $this->session->set_flashdata('error_msg', 'Please fill all field.');
        redirect('admin/category/Categoryadd');
       }else{
        $plan       = $this->input->post('plan');
        $price      = $this->input->post('price');
         
       $data        = array('plan_name'       => $plan,
                            'plan_price'      => $price,
                            'created_at'      => date("Y-m-d H:i:s"),
                            'status'          => '1');
        
       if ($this->Plan_model->add_plan($data)) {
          $this->session->set_flashdata('success_msg', 'Plan Added successfully.');
           redirect('admin/plan/plan_list');
        }else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('admin/plan');
            }
                } 
              }
    

      
       public function plan_list()
        {
           
           $return['list'] = $this->Plan_model->plan_list();
            //$output['admin_list'] = $this->Newadmin_model->adminlist();
            $this->load->view('admin/plan/plan_list',$return);
       
    }
     public function Delete_plan($id)
        {
            $this->Plan_model->delete_plan($id);
            $data['success_message'] = 'deleted';
            redirect('admin/plan/plan_list');
        }
    public function edit_plan($id)
        { 
           if(!empty($id))
            {            
                $data['selectedcat'] = $this->Plan_model->edit_plan($id);
                $data['posts']       = $this->Plan_model->getPosts();
                $this->load->view('admin/plan/plan_edit',$data);
            } 
            else 
            {
                redirect('admin/plan/plan_list');
            }
        }

        public function saveplan(){
             $this->form_validation->set_rules('plan', 'plan', 'required');
       
        if ($this->form_validation->run() == FALSE)
       {
            $data['error_message'] = 'field should not empty!';
            redirect('admin/plan',$data);

       }else{
            $plan       = $this->input->post('plan');
            $price      = $this->input->post('price');
            $planid     = $this->input->post('plan_id');

       if ($this->Plan_model->save_plan($plan,$planid)) {
          $this->session->set_flashdata('success_msg', 'Plan Updated successfully.');
           redirect('admin/plan/plan_list');
        }else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('admin/plan');
            }
       }

        }

}







