<?php
require("header.php");
require("sidebar.php");
?>

<div class="content-wrapper">
<main id="main-container">
        

        <!-- <div class="panel-heading" style="text-align: center;">Register Form</div> 
        <a style="padding-left: 20px;" href="<?php echo base_url(); ?>index.php/marc/logout">Logout</a>  
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
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body"> 
                                <h4 class="">Add User</h4>
                            <form class="form-horizontal" action="<?php echo base_url(); ?>admin/user/create"  method="post" enctype="multipart/form-data">
                          
                          <div class="form-group">
                        <label class="col-md-2 control-label">First Name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" pattern="[A-Za-z]+" name="first_name" placeholder="First Name" required="required" >
                             
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Last Name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" pattern="[A-Za-z]+" name="last_name" placeholder="Last Name" > 
                             
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-md-2 control-label">Email<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input name="email" id="email" value="" class="form-control" required="required" aria-required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Your email address" type="email" spellcheck="false" size="30" placeholder="Email" />
                             
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Mobile<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" pattern="^\d{10}$" name="mobile" placeholder="Mobile Number" required="required" aria-required="true" >
                             
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Password<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="password" pattern=".{6,}" name="password" placeholder="Password" >
                             
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-md-2 control-label">Confirm Password<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="password" pattern=".{6,}" name="confirm" placeholder="Confirm Password">
                             
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
</div>
</main>  
</div>

<?php
require("footer.php");
?>

 
        