<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendordetail extends CI_Controller {

        public function __construct()
	{
            parent::__construct();
            $this->load->model('Vendor_model');
            //$this->load->model('Cat_model');
            $this->load->model('Common_model');
            $this->load->model('Product_model');
            if($this->session->userdata('email') == '')
          {
            redirect(base_url().'admin/login');
          }
            
	}
        
    public function index() {
        //$data['posts']  = $this->Vendor_model->getPosts();
        //$data['keys']   = $this->Vendor_model->getKeys();
        $this->load->view('admin/vendor/vendordetail_add');
       }

       public function detail_edit() {
        $data['posts']       = $this->Vendor_model->getPosts();
        $data['keys']        = $this->Vendor_model->getKeysedit();
        $data['keyall']      = $this->Vendor_model->getKeysselection();
        $data['selectedcat'] = $this->Vendor_model->update_details();
        $this->load->view('admin/vendor/vendordetail_edit',$data);
       }

       public function getKeys() {
        $id                     = $this->input->get('id');
        $data                   = $this->Vendor_model->getKeyById($id);
        echo json_encode($data);
        return;
    }

public function vendorKeys() {
    $return['list'] = $this->Vendor_model->getVendorAllKeys();
    $this->load->view('admin/vendor/vendorkey_list',$return);
} 


public function addDetails()
{
    $this->form_validation->set_rules('business_name', 'business_name', 'required');
    $this->form_validation->set_rules('business_address', 'business_address','required');
     $this->form_validation->set_rules('registered_address', 'registered_address', 'required');
     $this->form_validation->set_rules('telephone', 'telephone', 'required');
     $this->form_validation->set_rules('website', 'website', 'required|is_unique[user.email]');
     $this->form_validation->set_rules('business_status', 'business_status', 'required');
     $this->form_validation->set_rules('business_type', 'business_type', 'required');
     $this->form_validation->set_rules('license_number', 'license_number', 'required');
     //$this->form_validation->set_rules('license_image', 'license_image', 'required');
     $this->form_validation->set_rules('iso', 'iso', 'required');
     $this->form_validation->set_rules('iso_valid', 'iso_valid', 'required');
     $this->form_validation->set_rules('quality_policy', 'quality_policy', 'required');
     $this->form_validation->set_rules('environ_policy', 'environ_policy', 'required');
     $this->form_validation->set_rules('establish_date', 'establish_date', 'required');
     //$this->form_validation->set_rules('business_years', 'business_years', 'required');
     $this->form_validation->set_rules('gst_number', 'gst_number', 'required');
     //$this->form_validation->set_rules('gst_image', 'gst_image', 'required');
     $this->form_validation->set_rules('pan_number', 'pan_number', 'required');
     //this->form_validation->set_rules('pan_image', 'pan_image', 'required');
     $this->form_validation->set_rules('aadhar_number', 'aadhar_number', 'required');
     //$this->form_validation->set_rules('aadhar_image', 'aadhar_image', 'required');
     //$this->form_validation->set_rules('category', 'category', 'required');
     //$this->form_validation->set_rules('keywords', 'keywords', 'required');
       
         if ($this->form_validation->run() == FALSE)
        {
         $this->session->set_flashdata('error_msg', 'Please fill all field.');
         redirect('admin/vendor/Vendordetail');
        }else{
         $business_name       = $this->input->post('business_name');
         $business_address    = $this->input->post('business_address');
         $registered_address  = $this->input->post('registered_address');
         $telephone           = $this->input->post('telephone');
         $website             = $this->input->post('website');
         $business_status     = $this->input->post('business_status');
         $business_type       = $this->input->post('business_type');
         $license_number      = $this->input->post('license_number');
         $iso                 = $this->input->post('iso');
         $iso_valid           = $this->input->post('iso_valid');
         $quality_policy      = $this->input->post('quality_policy');
         $environ_policy      = $this->input->post('environ_policy');
         $establish_date      = $this->input->post('establish_date');
         $business_years      = $this->input->post('business_years');
         $gst_number          = $this->input->post('gst_number');
         $pan_number          = $this->input->post('pan_number');
         $aadhar_number       = $this->input->post('aadhar_number');
         //$category            = $this->input->post('category');
         //$keywords            = $this->input->post('keywords');
         $user_id             = $this->session->userdata('userid');
         $role                = $this->session->userdata('roleid');
         $month               = date('m');
         $vendor_code         = "BLR/".$month."/BSP100".$user_id;
         //echo $vendor_code;
         //die();

         $now                 = date('Y-m-d H:i:s');
         $date_diff           = abs(strtotime($establish_date) - strtotime($now));
         $years               = floor($date_diff / (365*60*60*24));

         $data['error']  = "";
      
         $data                = array('user_id'             => $user_id,
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
                                     'business_years'       => $years,
                                     'gst_number'           => $gst_number,
                                     'pan_number'           => $pan_number,
                                     'aadhar_number'        => $aadhar_number,
                                     //'cat_id'               => $category,
                                     'vendor_code'          => $vendor_code,
                                     'created_at'           => date("Y-m-d H:i:s"),
                                     'status'               => '0');


         $result = $this->Vendor_model->select_product($user_id);

         

         if ($result) {
             $this->session->set_flashdata('error_msg', 'User Details Already Exists.');
            redirect('admin/vendor/Vendordetail');
            return;
         }
          
        if($this->Vendor_model->update_vendor($data)) {
        /*$keywords            = $this->input->post('keywords');
        foreach ($keywords as $keyword){
        if(!$this->Product_model->update_key($keyword)){
        $data['error']  .="Keyword: ".$this->upload->display_errors();
        }
           }*/
         //"keys: ".$keyword."<br>";

         
    //print_r($keywords);
    //$date_diff = abs(strtotime($establish_date) - strtotime($now));
    //$years     = floor($date_diff / (365*60*60*24));


    $config['upload_path']   = './upload/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
    $config['max_size']      = 5024;
    $config['encrypt_name']  = true;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $data['posts']       = $this->Vendor_model->getPosts();
    $data['error']       = "";
    $logo_image_error    = "Please Upload Logo Image";
    $pro_image_error     = "Please Upload Product Image";
    $licence_image_error = "Please Upload license Image";
    $gst_image_error     = "Please Upload Gst Image";
    $pan_image_error     = "Please Upload Pan Image";
    $aadhar_image_error  = "Please Upload Aadhar Image";
     //LogoImage checks
    if ($this->upload->do_upload('logo_image')) {
        $logoImage    = $this->upload->data();
        $logoImage    =  $logoImage['file_name'];
        $reslogoImage = $this->Vendor_model->update_images($logoImage,"logo_image");
        $logo_image_error ="";
    } 
    //ProductImage checks
    if ($this->upload->do_upload('pro_image')) {
        $proImage    = $this->upload->data();
        $proImage    =  $proImage['file_name'];
        $resproImage = $this->Vendor_model->update_images($proImage,"pro_image");
        $pro_image_error ="";

    }
    //licenseImage checks
    if ($this->upload->do_upload('license_image')) {
        $licenseImage    = $this->upload->data();
        $licenseImage    =  $licenseImage['file_name'];
        $reslicenseImage = $this->Vendor_model->update_images($licenseImage,"license_image");
        $licence_image_error ="";

    }
    //gstImage checks
    if ($this->upload->do_upload('gst_image')) {
        $gstImage    = $this->upload->data();
        $gstImage    =  $gstImage['file_name'];
        $gstImage    = $this->Vendor_model->update_images($gstImage,"gst_image");
        $gst_image_error ="";

    }
    //panImage checks
    if ($this->upload->do_upload('pan_image')) {
        $panImage    = $this->upload->data();
        $panImage    =  $panImage['file_name'];
        $panImage    = $this->Vendor_model->update_images($panImage,"pan_image");
        $pan_image_error ="";

    }
    //aadhaarImage checks
    if ($this->upload->do_upload('aadhar_image')) {
        $aadhaarImage    = $this->upload->data();
        $aadhaarImage    =  $aadhaarImage['file_name'];
        $resaadhaarImage = $this->Vendor_model->update_images($aadhaarImage,"aadhar_image");
        $aadhar_image_error ="";

    }
    $data['error']      = $logo_image_error.' '.$pro_image_error.' '.$licence_image_error.' '.$gst_image_error.' '.$pan_image_error.' '.$aadhar_image_error;
    //checking the error is set or not
    if(!empty($data['error'])){
        $this->session->set_flashdata('error_msg', $data['error']);
    }else{
        $this->session->set_flashdata('success_msg', 'Details Updated successfully.');
    }
    }
else{
    $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  }
}
    redirect('admin/vendor/Vendordetail');
    return;
}

public function vendor_list() {
             
             $return['list'] = $this->Vendor_model->vendor_list();
             $this->load->view('admin/vendor/vendor_list',$return);
            }  
            
public function vendorBusinesslist($id) {
        $data['posts']       = $this->Vendor_model->getPosts();
        $data['keys']        = $this->Vendor_model->getVendorKey();
        $data['keyall']      = $this->Vendor_model->getKeysselected($id);
        $data['selectedcat'] = $this->Vendor_model->vendor_businesslist($id);
             $this->load->view('admin/vendor/vendor_businesslist',$data);
            }
public function viewMyDetails() {
        $return['list'] = $this->Vendor_model->my_details();
        $this->load->view('admin/vendor/my_list',$return);
        }  

public function delete_vendor($id)
        {
        $this->Vendor_model->delete_vendor($id);
        $this->Vendor_model->delete_vendorKey($id);
        $this->session->set_flashdata('success_msg', 'Vendor Deleted successfully.');
        redirect('admin/vendor/Vendordetail/vendor_list');
        }

public function verify_vendor($id)
        {
        $this->Vendor_model->verify_vendor($id);
        $this->session->set_flashdata('success_msg', 'Vendor Verified successfully.');
        redirect('admin/vendor/Vendordetail/vendor_list');
       }
public function unverify_vendor($id)
        {
        $this->Vendor_model->unverify_vendor($id);
        $this->Vendor_model->unverify_vendorKey($id);
        $this->session->set_flashdata('success_msg', 'Vendor Verify Cancelled successfully.');
        redirect('admin/vendor/Vendordetail/vendor_list');
        }
public function selectKey()
        {
        $data['posts']  = $this->Vendor_model->getPosts();
        $data['keys']   = $this->Vendor_model->getKeys();
        $this->load->view('admin/vendor/select_key',$data);
        }
public function updateKey()
        {
        $keywords            = $this->input->post('keywords');
        foreach ($keywords as $keyword){
        if(!$this->Product_model->update_key($keyword)){
        $data['error']  .="Keyword: ".$this->upload->display_errors();
        }else{
            redirect('admin/vendor/Vendordetail/selectKey');
        }
    }
}
    


public function saveDetail()
{
         $this->form_validation->set_rules('business_name', 'business_name', 'required');
         $this->form_validation->set_rules('business_address', 'business_address','required');
         $this->form_validation->set_rules('registered_address', 'registered_address', 'required');
         $this->form_validation->set_rules('telephone', 'telephone', 'required');
         $this->form_validation->set_rules('website', 'website', 'required|is_unique[user.email]');
         $this->form_validation->set_rules('business_status', 'business_status', 'required');
         $this->form_validation->set_rules('business_type', 'business_type', 'required');
         $this->form_validation->set_rules('license_number', 'license_number', 'required');
         //$this->form_validation->set_rules('license_image', 'license_image', 'required');
         $this->form_validation->set_rules('iso', 'iso', 'required');
         $this->form_validation->set_rules('iso_valid', 'iso_valid', 'required');
         $this->form_validation->set_rules('quality_policy', 'quality_policy', 'required');
         $this->form_validation->set_rules('environ_policy', 'environ_policy', 'required');
         $this->form_validation->set_rules('establish_date', 'establish_date', 'required');
         //$this->form_validation->set_rules('business_years', 'business_years', 'required');
         $this->form_validation->set_rules('gst_number', 'gst_number', 'required');
         //$this->form_validation->set_rules('gst_image', 'gst_image', 'required');
         $this->form_validation->set_rules('pan_number', 'pan_number', 'required');
         //this->form_validation->set_rules('pan_image', 'pan_image', 'required');
         $this->form_validation->set_rules('aadhar_number', 'aadhar_number', 'required');
         //$this->form_validation->set_rules('aadhar_image', 'aadhar_image', 'required');
         //$this->form_validation->set_rules('category', 'category', 'required');
         //$this->form_validation->set_rules('keywords', 'keywords', 'required');
       
         if ($this->form_validation->run() == FALSE)
        {
         $this->session->set_flashdata('error_msg', 'Please fill all field.');
         redirect('admin/vendor/Vendordetail');
        }else{
         $business_name       = $this->input->post('business_name'); 
         $business_address    = $this->input->post('business_address');
         $registered_address  = $this->input->post('registered_address');
         $telephone           = $this->input->post('telephone');
         $website             = $this->input->post('website');
         $business_status     = $this->input->post('business_status');
         $business_type       = $this->input->post('business_type');
         $license_number      = $this->input->post('license_number');
         $iso                 = $this->input->post('iso');
         $iso_valid           = $this->input->post('iso_valid');
         $quality_policy      = $this->input->post('quality_policy');
         $environ_policy      = $this->input->post('environ_policy');
         $establish_date      = $this->input->post('establish_date');
         $business_years      = $this->input->post('business_years');
         $gst_number          = $this->input->post('gst_number');
         $pan_number          = $this->input->post('pan_number');
         $aadhar_number       = $this->input->post('aadhar_number');
         $category            = $this->input->post('category');
         $vendor_id           = $this->input->post('vendor_id');
         //$keywords            = $this->input->post('keywords');
         $user_id             = $this->input->post('user_id');
         $user_session        = $this->session->userdata('user_id');
         $month               = date('m');
         $vendor_code         = "BLR/".$month."/BSP100".$user_id;
         $userData             = $this->Vendor_model->select_product($user_id);


         $now                 = date('Y-m-d H:i:s');
         $date_diff           = abs(strtotime($establish_date) - strtotime($now));
         $years               = floor($date_diff / (365*60*60*24));

         $data['error']  = "";
      
         $data                = array('user_id'              => $user_id,
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
                                     'business_years'       => $years,
                                     'gst_number'           => $gst_number,
                                     'pan_number'           => $pan_number,
                                     'aadhar_number'        => $aadhar_number,
                                     'cat_id'               => $category,
                                     'vendor_code'          => $vendor_code,
                                     'created_at'           => date("Y-m-d H:i:s"),
                                     'status'               => '0');


        if($this->Vendor_model->save_product($data,$vendor_id)){
            if ($user_session=1) {
            
            $keywords            = $this->input->post('keywords');
            foreach ($keywords as $keyword){
            if(!$this->Product_model->update_key($keyword)){
            $data['error']  .="Keyword: ".$this->upload->display_errors();
            }
        }
        }
    
        
    $config['upload_path']   = './upload/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
    $config['max_size'] = 5024;
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $data['error']  = "";
    $logo_image_error    = "";
    $pro_image_error     = "";
    $licence_image_error = "";
    $gst_image_error     = "";
    $pan_image_error     = "";
    $aadhar_image_error  = "";
     //LogoImage checks
    if(empty($userData->logo_image) || !empty($_FILES['logo_image']['name'])){
        $logo_image_error    = "Please Upload Logo Image";
        if ($this->upload->do_upload('logo_image')) {
            $logoImage    = $this->upload->data();
            $logoImage    =  $logoImage['file_name'];
            $reslogoImage = $this->Vendor_model->update_images($logoImage,"logo_image");
            $logo_image_error ="";
        }
    }
         
    //ProductImage checks
    if(empty($userData->pro_image) || !empty($_FILES['pro_image']['name'])){
        $pro_image_error     = "Please Upload Product Image";
        if ($this->upload->do_upload('pro_image')) {
            $proImage    = $this->upload->data();
            $proImage    =  $proImage['file_name'];
            $resproImage = $this->Vendor_model->update_images($proImage,"pro_image");
            $pro_image_error ="";
        }
    }

    //licenseImage checks
    if(empty($userData->license_image) || !empty($_FILES['license_image']['name'])){
        $licence_image_error ="Please Upload license Image";
        if ($this->upload->do_upload('license_image')) {
            $licenseImage    = $this->upload->data();
            $licenseImage    =  $licenseImage['file_name'];
            $reslicenseImage = $this->Vendor_model->update_images($licenseImage,"license_image");
            $licence_image_error ="";
        }
    }
    //gstImage checks
    if(empty($userData->gst_image) || !empty($_FILES['gst_image']['name'])){
        $gst_image_error ="Please Upload Gst Image";
        if ($this->upload->do_upload('gst_image')) {
            $gstImage    = $this->upload->data();
            $gstImage    =  $gstImage['file_name'];
            $gstImage    = $this->Vendor_model->update_images($gstImage,"gst_image");
            $gst_image_error ="";

        } 
    }  
    //panImage checks
    if(empty($userData->pan_image) || !empty($_FILES['pan_image']['name'])){
        $pan_image_error ="Please Upload Pan Image";
        if ($this->upload->do_upload('pan_image')) {
            $panImage    = $this->upload->data();
            $panImage    =  $panImage['file_name'];
            $panImage    = $this->Vendor_model->update_images($panImage,"pan_image");
            $pan_image_error ="";

        }
    }
    //aadhaarImage checks
    if(empty($userData->aadhar_image) || !empty($_FILES['aadhar_image']['name'])){
        $aadhar_image_error ="Please Upload Aadhar Image";
        if ($this->upload->do_upload('aadhar_image')) {
            $aadhaarImage    = $this->upload->data();
            $aadhaarImage    =  $aadhaarImage['file_name'];
            $resaadhaarImage = $this->Vendor_model->update_images($aadhaarImage,"aadhar_image");
            $aadhar_image_error ="";

        }
    }
   /* $data['error']      = $logo_image_error.' '.$pro_image_error.' '.$licence_image_error.' '.$gst_image_error.' '.$pan_image_error.' '.$aadhar_image_error;*/
    //checking the error is set or not
    if(!empty($data['error'])){
        $this->session->set_flashdata('error_msg', $data['error']);
    }else{
        $this->session->set_flashdata('success_msg', 'Details Updated successfully.');
    }
    }
else{
    $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  }
}
    redirect('admin/vendor/Vendordetail');
    return;
}

public function key_list() {
             
             $return['list'] = $this->Vendor_model->getmyDetails();
             $this->load->view('admin/vendor/mykey_list',$return);
            }  




}







