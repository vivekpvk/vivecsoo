<?php
if(!empty($this->session->userdata('userid'))) {
    redirect('admin/login');
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <style>
            .error
            {
                color: #cc0000;
            }
        </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.png" />
</head>


<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form id="register-form"  method="post" action="<?php echo base_url(); ?>index.php/admin/login/verify" enctype="multipart/form-data">
                <div class="form-group">
                                            <!--<label class="col-xs-12">Email</label>-->
                                            <div class="col-xs-12">
                                                <input class="form-control" style="background: rgba(0, 0, 0, 0.2) none repeat scroll 0 0; border: none; color: #999999;" type="text" value="<?php echo set_value('email'); ?>" id="email" name="email" placeholder="Email">
                                                <div style="margin-top: 0px; color: red;"><?= form_error('email'); ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--<label class="col-xs-12" >Password</label>-->
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" style="background: rgba(0, 0, 0, 0.2) none repeat scroll 0 0; border: none; color: #999999;"  id="password" value="<?php echo set_value('password'); ?>" name="password" placeholder="Password">
                                                    <div style="margin-top: 0px; color: red;"><?= form_error('password'); ?></div>

                                            </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="register.html" class="text-black text-small">Create new account</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>js/misc.js"></script>
  <!-- endinject -->



  <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3-jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/validation.min.js"></script>
</body>

</html>