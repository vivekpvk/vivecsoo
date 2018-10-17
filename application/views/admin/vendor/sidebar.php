 <?php 
 $menuRole  = $this->session->userdata('menuid');
 $menuIds   = explode(',', $menuRole);
 ?>
 <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:<?php echo base_url();?>partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
              <div class="profile-image">
               <!-- <img src="<?php echo base_url();?>upload<?php echo $this->session->userdata('logo_image'); ?>" alt="profile image"> -->
                     <i class="fa fa-user-circle" style="font-size: 50px;" aria-hidden="true"></i> 
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name');?></p>
                  <div>
                    <small class="designation text-muted">Vendor</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/vendor/dashboard">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-title">My Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/vendor/myprofile">My Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/vendor/myplan">My Plan</a>
                </li>
               <li class="nav-item">
                  <a class="nav-link" href="<!-- <?php echo base_url(); ?>admin/user/role -->#">My Transaction</a>
               </li>
              </ul>
            </div>
          </li> 
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-catlog" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Support</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-catlog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#">Chat Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Faq</a>
                </li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>marc/logout">
              <i class="menu-icon  fa fa-sign-out"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
  <!-- partial //don't delete --> 
  <div class="main-panel">
      <div class="content-wrapper">
          <main id="main-container">
               <div class="content">
                    <div class="row">
                      <div class="col-lg-12">
                    <?php $success_msg = $this->session->flashdata('success_msg');
                          $error_msg   = $this->session->flashdata('error_msg');
                          if($success_msg){ ?>
                              <div class="alert alert-success">
                                  <?php echo $success_msg; ?>
                              </div>
                          <?php
                          }
                          if($error_msg){ ?>
                              <div class="alert alert-danger">
                                  <?php echo $error_msg; ?>
                              </div>
                          <?php
                              }
                          ?>