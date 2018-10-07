<main id="main-container">
        

        <!-- <div class="panel-heading" style="text-align: center;">Register Form</div> 
        <a style="padding-left: 20px;" href="<?php echo base_url(); ?>index.php/admin/login/logout">Logout</a>  
        <a style="padding-left: 20px;" href="<?php echo base_url(); ?>index.php/admin/login/back">Back</a>   -->  
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
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title text-center">Registration</h3>
                        </div>
                        <div class="block-content block-content-full bg-gray-lighter ">  
                            <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/register/register"  method="post" enctype="multipart/form-data">
                          
                          <div class="form-group">
                        <label class="col-md-2 control-label">First Name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" name="first_name" placeholder="First Name" >
                             
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Last Name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" name="last_name" placeholder="Last Name" >
                             
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-md-2 control-label">Email<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="email" name="email" placeholder="Email" >
                             
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Mobile<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" name="mobile" placeholder="Mobile Number" >
                             
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Password<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="password" name="password" placeholder="Password" >
                             
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-md-2 control-label">Confirm Password<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="password" name="confirm" placeholder="Confirm Password">
                             
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-7" colspan="2" style="text-align: center;">
                            <input class="btn btn-success" type="submit" name="register" value=" submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
     </div>
</div>
</div>
</main>  
 
        