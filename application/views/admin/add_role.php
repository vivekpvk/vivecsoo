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
                                      <form class="form-horizontal" action="<?php echo base_url(); ?>admin/user/setrole"  method="post" enctype="multipart/form-data">

                                       
                                        
                                       <div class="form-group">
                                            <label class="col-md-2 control-label">Select User<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="user">
                                                    <option value="0">No User</option>
                                                    <?php 
                                                        foreach ($users as $user) {
                                                            echo '<option value="'.$user->id.'">'.$user->first_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Select Role<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="role">
                                                    <option value="0">No Role</option>
                                                    <?php 
                                                        foreach ($role as $roles) {
                                                            echo '<option value="'.$roles->id.'">'.$roles->name.'</option>';
                                                        }
                                                    ?>
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