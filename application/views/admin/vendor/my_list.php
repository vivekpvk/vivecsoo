<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
<div class="content-wrapper">
    <div class="row">
      <div class="content">
        <!-- <input type="button" class="btn btn-info" value="Add Product" onclick="location.href = '<?php echo base_url(); ?>admin/product/productadd';"> -->
                    <div class="row">
                       <div class="col-lg-12">
                           <?php
                            $success_msg= $this->session->flashdata('success_msg');
                            $error_msg= $this->session->flashdata('error_msg');
 
                            if($success_msg){
                            ?>
                              <div class="alert alert-success">
                              <?php echo $success_msg; ?>
                            </div>
                             <?php
                               }
                            if($error_msg){
                            ?>
                            <div class="alert alert-danger">
                              <?php echo $error_msg; ?>
                            </div>
                            <?php
                            }
                            ?>
                       </div>
                    </div>
                 </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">

            <div class="card-body">
              <h4 class="card-title">Product List</h4>
              
              <div class="table-responsive">
                <table  id="pagin" class="table table-striped js-dataTable-full display">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Vendor Code</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Business Name</th>
                      <th>Business Address</th>
                      <th>Registered Address</th>
                      <th>Logo Image</th>
                      <th>Product Image</th>
                      <th>Telephone</th>
                      <th>Website</th>
                      <th>Business Status</th>
                      <th>Business Type</th>
                      <th>License Number</th>
                      <th>License Image</th>
                      <th>Gst Number</th>
                      <th>Gst Image</th>
                      <th>Pan Number</th>
                      <th>Pan Image</th>
                      <th>Aadhar Number</th>
                      <th>Aadhar Image</th>
                      <th>ISO Certified</th>
                      <th>ISO valid</th>
                      <th>Quality Policy</th>
                      <th>Environment Policy</th>
                      <th>Established Date</th>
                      <th>Business In Years</th>
                      <th>Status</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($list as $post) 
                                    { ?>
                    <tr>
                      <td class="py-1"><?= $post->id?></td>
                      <td class="py-1"><?= $post->vendor_code?></td>
                      <td><?= $post->first_name?></td>
                      <td><?= $post->last_name?></td>
                      <td><?= $post->email?></td>
                      <td><?= $post->mobile?></td>
                      <td><?= $post->business_name?></td>
                      <td><?= $post->business_address?></td>
                      <td><?= $post->registered_address?></td>
                      <td><button class="btn btn-primary"><a style="color: white;" href="<?php echo base_url();?>upload/<?= $post->logo_image?>">View Logo</a></button></td>
                      <td><button class="btn btn-primary"><a style="color: white;" href="<?php echo base_url();?>upload/<?= $post->pro_image?>">View Product</a></button></td>
                      <td><?= $post->telephone?></td>
                      <td><?= $post->website?></td>
                      <td><?= $post->business_status?></td>
                      <td><?= $post->business_type?></td>
                      <td><?= $post->license_number?></td>
                      <td><button class="btn btn-primary"><a style="color: white;" href="<?php echo base_url();?>upload/<?= $post->license_image?>">View License</a></button></td>
                      <td><?= $post->gst_number?></td>
                      <td><button class="btn btn-primary"><a style="color: white;" href="<?php echo base_url();?>upload/<?= $post->gst_image?>">View Gst</a></button></td>
                      <td><?= $post->pan_number?></td>
                      <td><button class="btn btn-primary"><a style="color: white;" href="<?php echo base_url();?>upload/<?= $post->pan_image?>">View Pan</a></button></td>
                      <td><?= $post->aadhar_number?></td>
                      <td><button class="btn btn-primary"><a style="color: white;" href="<?php echo base_url();?>upload/<?= $post->aadhar_image?>">View Aadhar</a></button></td>
                      <td><?= $post->iso_certified?></td>
                      <td><?= $post->iso_valid?></td>
                      <td><?= $post->quality_policy?></td>
                      <td><?= $post->environ_policy?></td>
                      <td><?= $post->establish_date?></td>
                      <td><?= $post->business_years?></td>
                                        
                      <td><?php if($post->status == "1")
                          {
                            echo "Active";
                          }
                          else
                          {
                          echo "Inactive";
                           }
                      ?></td>
                       <td>
                          <a class="btn btn-default btn-rounded btn-condensed btn-sm"  data-toggle="tooltip"  title="Edit" href="<?=base_url()?>admin/vendor/vendordetail/detail_edit/<?=$post->id?>"><i class="fa fa-pencil" style="font-size:30px;color:green"></i></a>
                         
                      </td>
                      <?php } ?>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>


<?php
require(FCPATH."/application/views/admin/footer.php");
?>
         
        
