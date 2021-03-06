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
                    <small class="designation text-muted"><?php if($this->session->userdata('roleid')==1){
                      echo "Super Admin";
                    }elseif ($this->session->userdata('roleid')==2) {
                      echo "Vendor";
                    }else{
                      echo "SubAdmin";
                    }?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <!--button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button-->
            </div>
          </li>
          <?php 
          if (in_array(DASHBOARD, $menuIds)) {?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php } 
          if (in_array(USER, $menuIds)) {?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-user">
              <ul class="nav flex-column sub-menu">
                <?php if (in_array(USER_LIST, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/user">Manage User</a>
                </li>
              <?php }
               if (in_array(USER_MANAGE, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/user/add">Add User</a>
                </li>
              <?php }
               if (in_array(USER_ROLE, $menuIds)) {?>
               <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/user/role">Add Role</a>
                </li>
              <?php }
               if (in_array(USER_MENU, $menuIds)) {?>                
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/user/menu">Manage Privilage</a>
                </li>
                <?php }?>
               <!--  <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/product">Add Product</a>
                </li> -->
              </ul>
            </div>
          </li>
        <?php } 
          if (in_array(CATALOG, $menuIds)) {?>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-catlog" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Catlog</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-catlog">
              <ul class="nav flex-column sub-menu">
                <?php if (in_array(CATALOG_LIST, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/category/">Category</a>
                </li>
                <?php } 
          if (in_array(PRODUCT_LIST, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/product/">Product</a>
                </li>
              <?php } ?>
              </ul>
            </div>
          </li>
        <?php } 
        if (in_array(VENDOR, $menuIds)) {?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui_alvendor" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon fa fa-user-o"></i>
              <span class="menu-title">Vendor</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui_alvendor">
              <ul class="nav flex-column sub-menu">
               <?php if (in_array(VENDOR_LIST, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>admin/vendor/">Manage Vendor</a>
                </li>
                <?php }
              if (in_array(VENDOR_KEYS, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>admin/vendor/add"> Add Vendor</a>
                </li>
              <?php } ?>
              </ul>
            </div>
          </li>
        <?php }?>
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