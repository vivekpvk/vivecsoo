<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keys extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        $this->load->model('Product_Model');
        $this->load->model('Category_Model');             
    }
        
    public function index() {
        $return['list']     = $this->Product_Model->getList();
        $return['catlist']  = $this->Category_Model->getList();
        $this->load->view('admin/product/product_list',$return);
    }
           
    public function add() {
        $data['posts']  = $this->Product_Model->getPosts();
        $this->load->view('admin/product/product_add',$data);
    }

    public function create() {
        $this->form_validation->set_rules('prod_name', 'prod_name', 'required');
        $this->form_validation->set_rules('cat_id', 'cat_id');
        $error_msg      = "Please fill the all fields...!";
        if ($this->form_validation->run()) {
            $error_msg    = "Error occurred,Try again...!";
            $prod_name    = $this->input->post('prod_name');
            $cat_id       = $this->input->post('cat_id');
            $data         = array('prod_name'    => $prod_name,
                                  'cat_id'        => $cat_id,
                                  'created_at'    => date("Y-m-d H:i:s"),
                                  'status'        => '1'
                                );
            if ($this->Product_Model->create($data)) {
                $error_msg    = "";
                $this->session->set_flashdata('success_msg', 'Product Added successfully.');
            }
            $this->session->set_flashdata('error_msg', $error_msg);
            redirect('admin/product/add'); 
        }
    }

    public function edit($id) { 
        if(!empty($id)) {            
            $data['selectedcat'] = $this->Product_Model->get($id);
            $data['posts']       = $this->Product_Model->getPosts();
            $this->load->view('admin/product/product_edit',$data);
        }else {
            redirect('admin/product');
        }
    }
    
    public function update(){
        $this->form_validation->set_rules('prod_name', 'prod_name', 'required');
        $this->form_validation->set_rules('cat_id', 'cat_id','required');
        $error_msg      = "Please fill the all fields...!";
        if ($this->form_validation->run()) {
            $error_msg    = "Error occurred,Try again...!";
            $prod_name    = $this->input->post('prod_name');
            $cat_id       = $this->input->post('cat_id');
            $product_id   = $this->input->post('product_id');
            $data         = array('prod_name'    => $prod_name,
                                  'cat_id'       => $cat_id,
                                  'modified_at'  => date("Y-m-d"),
                                  'status'       => '1'
                                );

            if ($this->Product_Model->update($data,$product_id)) {
                $error_msg      = "";
                $this->session->set_flashdata('success_msg', 'Product Updated successfully.');
            }
        }
        $this->session->set_flashdata('error_msg', $error_msg);
        redirect('admin/product');
    }

    public function delete($id) {
        $this->Product_Model->delete($id);
        $this->session->set_flashdata('success_msg', 'Product Deleted successfully.');
        redirect('admin/product');
    }
}
