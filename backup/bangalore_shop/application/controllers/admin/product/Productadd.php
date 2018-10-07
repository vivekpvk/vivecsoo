<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productadd extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->model('Product_model');
            $this->load->model('Common_model');
            if($this->session->userdata('email') == '')
          {
            redirect(base_url().'admin/login');
          }
            
	}
        
    public function index() {
        $data['posts']  = $this->Product_model->getPosts();
        $this->load->view('admin/header');
        $this->load->view('admin/product/product_add',$data);
        $this->load->view('admin/footer');
       }

    public function Addproduct()
        {
        $this->form_validation->set_rules('prod_name', 'prod_name', 'required');
        $this->form_validation->set_rules('cat_id', 'cat_id');
        $this->form_validation->set_rules('brand', 'brand', 'required');
        $this->form_validation->set_rules('prod_url', 'prod_url', 'required');
        $this->form_validation->set_rules('company', 'company', 'required');
       
        if ($this->form_validation->run() == FALSE)
       {
        $this->session->set_flashdata('error_msg', 'Please fill all field.');
        redirect('admin/product/Productadd');
       }else{
        $prod_name    = $this->input->post('prod_name');
        $cat_id       = $this->input->post('cat_id');
        $brand        = $this->input->post('brand');
        $prod_url     = $this->input->post('prod_url');
        $company      = $this->input->post('company');
        $desc         = $this->input->post('desc');
        $spec         = $this->input->post('spec');
      
        $data   = array('prod_name'    => $prod_name,
                       'cat_id'        => $cat_id,
                       'prod_brand'    => $brand,
                       'prod_url'      => $prod_url,
                       'company'       => $company,
                       'description'   => $desc,
                       'specification' => $spec,
                       'created_at'    => date("Y-m-d H:i:s"),
                       'status'        => '1');


         @mkdir('./upload/'.$data);
//                    @chmod('./upload/subcategory/'.$insert_id.'/',0777);
                    $config['upload_path'] = './upload/'.$data.'/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $this->load->library('upload', $config);
                    $config['file_name'] = strtolower($_FILES['prod_image']['name']);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('prod_image');
                    $upload_data    = $this->upload->data();
                    $subfilename    = $upload_data['file_name'];
                    $this->Common_model->compress_image('./upload/'.$data.'/'.$subfilename, './upload/'.$data.'/'.$subfilename, 50);

        
        if ($this->Product_model->add_product($data,$subfilename)) {
          $this->session->set_flashdata('success_msg', 'Product Added successfully.');
           redirect('admin/product/Productadd/product_list');
        }else{
              //$this->load->view('admin');
       $this->session->set_flashdata('error_msg', 'Please fill all field.');
        redirect('admin/product/Productadd');
            }
       }            
    }

public function product_list() {
             $return['list'] = $this->Product_model->product_list();
             $this->load->view('admin/header');
             $this->load->view('admin/product/product_list',$return);
             $this->load->view('admin/footer');
            }   

public function edit_product($id)
        { 
           if(!empty($id))
            {            
                $data['selectedcat'] = $this->Product_model->edit_product($id);
                $data['posts']       = $this->Product_model->getPosts();
                $this->load->view('admin/header');
                $this->load->view('admin/product/product_edit',$data);
                $this->load->view('admin/footer');
            } 
            else 
            {
                redirect('admin/product/productadd/product_list');
            }
        } 


         public function saveproduct()
        {
        $this->form_validation->set_rules('prod_name', 'prod_name', 'required');
        $this->form_validation->set_rules('cat_id', 'cat_id');
        $this->form_validation->set_rules('brand', 'brand', 'required');
        $this->form_validation->set_rules('prod_url', 'prod_url', 'required');
        $this->form_validation->set_rules('company', 'company', 'required');
       
        if ($this->form_validation->run() == FALSE)
       {
        $this->session->set_flashdata('error_msg', 'Please fill all field.');
        redirect('admin/product/Productadd/product_list');
       }else{
        $prod_name    = $this->input->post('prod_name');
        $cat_id       = $this->input->post('cat_id');
        $brand        = $this->input->post('brand');
        $prod_url     = $this->input->post('prod_url');
        $company      = $this->input->post('company');
        $desc         = $this->input->post('desc');
        $spec         = $this->input->post('spec');
        $product_id   = $this->input->post('product_id');
      
        $data   = array('prod_name'    => $prod_name,
                       'cat_id'        => $cat_id,
                       'prod_brand'    => $brand,
                       'prod_url'      => $prod_url,
                       'company'       => $company,
                       'description'   => $desc,
                       'specification' => $spec,
                       'modified_at'   => date("Y-m-d H:i:s"),
                       'status'        => '1');


          if($_FILES['prod_image']['name']=='')
              {
              $subfilename = $this->input->post('prod_image');   
              }
          else
          {  
            $config['upload_path'] = './upload/'.$data.'/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $this->load->library('upload', $config);
                        $config['file_name'] = strtolower($_FILES['prod_image']['name']);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('prod_image');
                        $upload_data  = $this->upload->data();
                        $subfilename  = $upload_data['file_name'];
                        $this->Common_model->compress_image('./upload/'.$data.'/'.$subfilename, './upload/'.$data.'/'.$subfilename, 50);
            $filename            = $data.'/'.$subfilename; 
          }
             if ($this->Product_model->save_product($data,$product_id,$filename)) {
              $this->session->set_flashdata('success_msg', 'Product Updated successfully.');
              redirect('admin/product/Productadd/product_list');
            }else{
              $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
              redirect('admin/product/Productadd/product_list');
            }
       }
     }
            

 public function Delete_product($id)
        {
            $this->Product_model->delete_product($id);
            $this->session->set_flashdata('success_msg', 'Product Deleted successfully.');
            redirect('admin/product/Productadd/product_list');
        }



}







