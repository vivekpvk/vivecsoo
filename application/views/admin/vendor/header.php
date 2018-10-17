<?php
if(empty($this->session->userdata('userid')) || $this->session->userdata('roleid')!=VENDOR_ROLE_ID) {
    redirect('admin/login');
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bangaloreshopping Vendor Panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>vendors/css/vendor.bundle.addons.css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- pagination -->
 <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">

  <!-- ajax -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    


  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>images/Logo-icon.png" />
</head>
<style type="text/css">
    input[aria-invalid="true"], textarea[aria-invalid="true"] {
  border: 1px solid #f00;
  box-shadow: 0 0 4px 0 #f00;
}
#ferror,#lerror{
  font-size: 10px;
  color: red;
}

</style>

<body>
  <div class="container-scroller">
    <!-- partial:<?php echo base_url();?>partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo base_url();?>admin/login/dashboard">
          <img src="<?php echo base_url();?>images/logo_icon.png" style="height: 100px; padding-bottom: 15px;" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo base_url();?>index.html">
          <img src="<?php echo base_url();?>images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?php echo $this->session->userdata('first_name');?> !</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                </div>
              </a>
              <a class="dropdown-item mt-2" href="<?php echo base_url(); ?>index.php/admin/vendor/manageprofile">
                Manage Accounts
              </a> 
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/admin/vendor/password">
                Change Password
              </a">
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/marc/logout">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>