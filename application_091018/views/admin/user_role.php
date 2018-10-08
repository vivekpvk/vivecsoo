<?php
require("header.php");
require("sidebar.php");
?>
<div class="content-wrapper">
	 <main id="main-container">
                 
                <!-- Page Content -->
                <div class="content">
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
                            <!-- Main Dashboard Chart -->
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body"> 
                                <h4 class="">Manage User Role Privilage</h4>
                                      <form class="form-horizontal" action="<?php echo base_url(); ?>admin/register/saveUserRole"  method="post" enctype="multipart/form-data">

                                       <div class="form-group">
                                            <label class="col-md-2 control-label">Select User<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select>
                                                    <option value="1">Super Admin</option>
                                                    <option value="2">Vendor</option>
                                                    <option value="3">Sub Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Select Role<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select>
                                                    <option value="1">Dashboard</option>
                                                    <option value="2">User</option>
                                                    <option value="3">User List</option>
                                                    <option value="4">User Manage</option>
                                                    <option value="5">Catalog</option>
                                                    <option value="6">Catalog List</option>
                                                    <option value="7">Catalog Manage</option>
                                                    <option value="8">Payment</option>
                                                </select>
                                                </div>
                                        </div>
                                        
                                       <div class="form-group">
                                            <div class="col-md-8 col-md-offset-2">
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i> Submit Role</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Main Dashboard Chart -->
                        </div>
                     
                    </div>
                  
                </div>
            </div>
                <!-- END Page Content -->
            </main>
</div>
<?php
require("footer.php");
?>