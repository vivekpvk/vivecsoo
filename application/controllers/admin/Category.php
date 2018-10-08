<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        $this->load->model('Category_Model');            
    }
        
    public function index() {
        $return['list'] = $this->Category_Model->getList();
        $this->load->view('admin/category/cat_list',$return);
    }
           
    public function add() {
        $this->load->view('admin/category/addcat',$data);
    }

    public function create()
    {
        $this->form_validation->set_rules('category', 'Category', 'required');
        $error_msg      = "Please fill the all fields...!";
        if ($this->form_validation->run()) {
            $error_msg    = "Error occurred,Try again...!";
            $category     = $this->input->post('category');
            $data         = array('cat_name'        => $category,
                              'created_at'      => date("Y-m-d H:i:s"),
                              'status'          => '1'
                            );
            if ($this->Category_Model->create($data)) {
                $error_msg    = "";
                $this->session->set_flashdata('success_msg', 'Category Added successfully.');
            }
            $this->session->set_flashdata('error_msg', $error_msg);
            redirect('admin/category/add'); 
        }
    }

    public function edit($id) { 
        if(!empty($id)) {            
            $data['selectedcat'] = $this->Category_Model->get($id);
            $this->load->view('admin/category/cat_edit',$data);
        }else {
            redirect('admin/category');
        }
    }
    
    public function update(){
        $this->form_validation->set_rules('category', 'Category', 'required');
        $error_msg      = "Please fill the all fields...!";
        if ($this->form_validation->run()) {
            $error_msg    = "Error occurred,Try again...!";
            $category   = $this->input->post('category');
            $categoryid = $this->input->post('category_id');
            if ($this->Category_Model->update($category,$categoryid)) {
                $error_msg      = "";
                $this->session->set_flashdata('success_msg', 'Category Updated successfully.'); 
            }
        }
        $this->session->set_flashdata('error_msg', $error_msg);
        redirect('admin/category');
    }

    public function delete($id) {
        $this->Category_Model->delete($id);
        $data['success_message'] = 'deleted';
        redirect('admin/category');
    }
}
