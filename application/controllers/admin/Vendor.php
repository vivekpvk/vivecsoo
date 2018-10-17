<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
    //setting the construct auto load file
    public function __construct()
	{
        parent::__construct();
        $this->load->model('Vendor_Model');
        $this->load->model('User_Model');
        $this->load->model('Product_Model');
    }

    //index means getting the category list    
    public function index() {
        $return['list'] = $this->Vendor_Model->getList();
        $this->load->view('admin/vendor/list',$return);
    }

    //index means getting the category list    
    public function add() {
        $this->load->view('admin/vendor/add');
    }

    public function create() {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password]');
        $error_msg      = "Please fill the all fields...!";
        if ($this->form_validation->run()) {
            $error_msg  = "You have already register with us. Please check your email/mobile";
            $firstname  = $this->input->post('first_name');
            $lastname   = $this->input->post('last_name');
            $email      = $this->input->post('email');
            $mobile     = $this->input->post('mobile');
            $pass       = $this->input->post('password');
            $password   = md5($pass);
            $confirm    = $this->input->post('confirm');
            $data       = array('first_name' => $firstname,
                                'last_name'  => $lastname,
                                'email' => $email,
                                'mobile' => $mobile,
                                'password' => $password,
                                'role' => VENDOR_ROLE_ID,
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s"),
                                'status' => 1
                            );
            if ($this->Vendor_Model->create($data)) {
                $error_msg      = "";
                $this->session->set_flashdata('success_msg', 'successfully created...!');
                redirect('admin/vendor');
            }  
        }
        $this->session->set_flashdata('error_msg', $error_msg);
        redirect('admin/vendor');
    }

    public function edit($id) {
        $data['vendor']      = $this->Vendor_Model->get($id);
        $this->load->view('admin/vendor/edit',$data);
    } 

    public function myprofile() {
        $id                 = $this->session->userdata('userid');
        $data['vendor']     = $this->Vendor_Model->get($id);
        $this->load->view('admin/vendor/myprofile',$data);
    }

    public function myplan() {
        $data['lists']      = $this->Vendor_Model->getmyDetails();
        $data['posts']      = $this->Vendor_Model->getPosts();
        $data['keys']       = $this->Vendor_Model->getKeys();
        $this->load->view('admin/vendor/select_key',$data);
    }

    public function getKeys() {
        $id                     = $this->input->get('id');
        $data                   = $this->Vendor_Model->getKeyById($id);
        echo json_encode($data);
        return;
    }

    public function updateKey() {
        $keywords            = $this->input->post('keywords');
        foreach ($keywords as $keyword) {
            if(!$this->Product_Model->update_key($keyword)){
                $data['error']  .="Keyword: ".$this->upload->display_errors();
            }else{
                redirect('admin/vendor/myplan');
            }
        }
    }

    public function password(){
        $this->load->view('admin/vendor/password');
    }

    public function manageProfile(){
        $id = $this->session->userdata('userid');
        $data['profile'] = $this->User_Model->get($id);
        $this->load->view('admin/vendor/manage_profile',$data);
    }

    public function update() {
        $this->form_validation->set_rules('business_name', 'business name', 'required');
        $this->form_validation->set_rules('business_address', 'business address','required');
        $this->form_validation->set_rules('registered_address', 'registered address', 'required');
        $this->form_validation->set_rules('telephone', 'telephone', 'required');
        $this->form_validation->set_rules('website', 'website', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('business_status', 'business status', 'required');
        $this->form_validation->set_rules('business_type', 'business type', 'required');
        $this->form_validation->set_rules('license_number', 'license number', 'required');
        $this->form_validation->set_rules('iso_certified', 'iso certified', 'required');
        $this->form_validation->set_rules('iso_valid', 'iso valid', 'required');
        $this->form_validation->set_rules('quality_policy', 'quality policy', 'required');
        $this->form_validation->set_rules('environ_policy', 'environ policy', 'required');
        $this->form_validation->set_rules('establish_date', 'establish date', 'required');
        $this->form_validation->set_rules('gst_number', 'gst number', 'required');
        $this->form_validation->set_rules('pan_number', 'pan number', 'required');
        $this->form_validation->set_rules('aadhar_number', 'aadhar number', 'required');
        $this->form_validation->set_rules('vendor_id', 'vendor id', 'required');
        $data["user_id"]         = $this->input->post('vendor_id');
        if ($this->form_validation->run()) {
            $error_msg           = "Error occurred,Try again...!";
            $business_name       = $this->input->post('business_name'); 
            $business_address    = $this->input->post('business_address');
            $registered_address  = $this->input->post('registered_address');
            $telephone           = $this->input->post('telephone');
            $website             = $this->input->post('website');
            $business_status     = $this->input->post('business_status');
            $business_type       = $this->input->post('business_type');
            $license_number      = $this->input->post('license_number');
            $iso                 = $this->input->post('iso_certified');
            $iso_valid           = $this->input->post('iso_valid');
            $quality_policy      = $this->input->post('quality_policy');
            $environ_policy      = $this->input->post('environ_policy');
            $establish_date      = $this->input->post('establish_date');
            $gst_number          = $this->input->post('gst_number');
            $pan_number          = $this->input->post('pan_number');
            $aadhar_number       = $this->input->post('aadhar_number');
            $vendor_id           = $this->input->post('vendor_id');
            $status              = !empty($this->input->post('status')) ? $this->input->post('status') : 0;
            $data                = array('user_id'              => $vendor_id,
                                         'business_name'        => $business_name,
                                         'business_address'     => $business_address,
                                         'registered_address'   => $registered_address,
                                         'telephone'            => $telephone,
                                         'website'              => $website,
                                         'business_status'      => $business_status,
                                         'business_type'        => $business_type,
                                         'license_number'       => $license_number,
                                         'iso_certified'        => $iso,
                                         'iso_valid'            => $iso_valid,
                                         'quality_policy'       => $quality_policy,
                                         'environ_policy'       => $environ_policy,
                                         'establish_date'       => $establish_date,
                                         'gst_number'           => $gst_number,
                                         'pan_number'           => $pan_number,
                                         'aadhar_number'        => $aadhar_number,
                                         'created_at'           => date("Y-m-d H:i:s"),
                                         'modified_at'          => date("Y-m-d H:i:s"),
                                         'status'               => $status
                                     );

            if ($this->Vendor_Model->update($data) && !empty($data["user_id"])) {
                $vendorData                 = $this->Vendor_Model->get($data["user_id"]);
                $error_msg      = "";
                $config['upload_path']      = './'.VENDOR_FILE_PFX.$data["user_id"].'/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|pdf';
                $config['max_size']         = 5024;
                $config['encrypt_name']     = true;
                //creating the folder
                if (!is_dir(VENDOR_FILE_PFX.$data["user_id"].'/')) {
                    mkdir('./'.VENDOR_FILE_PFX.$data["user_id"].'/', 0777, TRUE);
                }
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $logo_image_error    = "";
                $pro_image_error     = ""; 
                $licence_image_error = "";
                $gst_image_error     = "";
                $pan_image_error     = ""; 
                $aadhar_image_error  = "";
                 //LogoImage checks
                if(empty($vendorData->logo_image) || !empty($_FILES['logo_image']['name'])){
                    $logo_image_error    = "Log image is mandatory...";
                    if ($this->upload->do_upload('logo_image')) {
                        $logoImage    = $this->upload->data();
                        $logoImage    = $data["user_id"].'/'.$logoImage['file_name'];
                        $this->Vendor_Model->update_images($logoImage,"logo_image",$data["user_id"]);
                        $logo_image_error    = "";
                    } else {
                        $logo_image_error = $this->upload->display_errors();
                    }
                }

                //proImage checks
                if(empty($vendorData->pro_image) || !empty($_FILES['pro_image']['name'])){
                    $pro_image_error    = "Product image is mandatory...";
                    if ($this->upload->do_upload('pro_image')) {
                        $proImage    = $this->upload->data();
                        $proImage    = $data["user_id"].'/'.$proImage['file_name'];
                        $this->Vendor_Model->update_images($proImage,"pro_image",$data["user_id"]);
                        $pro_image_error    ="";
                    } else {
                        $pro_image_error = $this->upload->display_errors();
                    }
                }

                //licenseImage checks
                if(empty($vendorData->license_image) || !empty($_FILES['license_image']['name'])){
                    $licence_image_error    = "License image is mandatory...";
                    if ($this->upload->do_upload('license_image')) {
                        $licenseImage    = $this->upload->data();
                        $licenseImage    = $data["user_id"].'/'.$licenseImage['file_name'];
                        $this->Vendor_Model->update_images($licenseImage,"license_image",$data["user_id"]);
                        $licence_image_error    ="";
                    } else {
                        $licence_image_error = $this->upload->display_errors();
                    }
                }

                //gstImage checks
                if(empty($vendorData->gst_image) || !empty($_FILES['gst_image']['name'])){
                    $gst_image_error    = "GST image is mandatory...";
                    if ($this->upload->do_upload('gst_image')) {
                        $gstImage    = $this->upload->data();
                        $gstImage    = $data["user_id"].'/'.$gstImage['file_name'];
                        $this->Vendor_Model->update_images($gstImage,"gst_image",$data["user_id"]);
                        $gst_image_error    = "";
                    } else {
                        $gst_image_error = $this->upload->display_errors();
                    }
                }

                //panImage checks
                if(empty($vendorData->pan_image) || !empty($_FILES['pan_image']['name'])){
                    $pan_image_error    = "Pancard image is mandatory...";
                    if ($this->upload->do_upload('pan_image')) {
                        $panImage    = $this->upload->data();
                        $panImage    = $data["user_id"].'/'.$panImage['file_name'];
                        $this->Vendor_Model->update_images($panImage,"pan_image",$data["user_id"]);
                        $pan_image_error    = "";
                    } else {
                        $pan_image_error = $this->upload->display_errors();
                    }
                }

                //aadhaarImage checks
                if(empty($vendorData->aadhar_image) || !empty($_FILES['aadhar_image']['name'])){
                    $aadhar_image_error    = "Aadhaar image is mandatory...";
                    if ($this->upload->do_upload('aadhar_image')) {
                        $aadhaarImage    = $this->upload->data();
                        $aadhaarImage    = $data["user_id"].'/'.$aadhaarImage['file_name'];
                        $this->Vendor_Model->update_images($aadhaarImage,"aadhar_image",$data["user_id"]);
                        $aadhar_image_error    ="";
                    } else {
                        $aadhar_image_error = $this->upload->display_errors();
                    }
                }
                $error_msg      = $logo_image_error.' '.$pro_image_error.' '.$licence_image_error.' '.$gst_image_error.' '.$pan_image_error.' '.$aadhar_image_error;
                $this->session->set_flashdata('success_msg', 'Details Updated successfully.');
            }
        }else{
            $error_msg      = validation_errors();
        }
        $this->session->set_flashdata('error_msg', $error_msg);
        $Formfrom           =  $this->input->post('form');
        $url                = '/admin/vendor/edit/'.$data["user_id"];
        if($Formfrom == "vendor") {
            $url            = '/admin/vendor/myprofile/';
        }
        redirect($url);
    }
}

