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
            <a class="nav-link" href="<?php echo base_url(); ?>admin/login/dashboard">
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
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/Newadmin">User List</a>
                </li>
              <?php }
               if (in_array(USER_MANAGE, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/register/regis">Add User</a>
                </li>
              <?php }
               if (in_array(USER_ROLE, $menuIds)) {?>
               <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/register/addRole">Add Role</a>
                </li>
              <?php }
               if (in_array(USER_MENU, $menuIds)) {?>                
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/register/setMenu">Manage Privilage</a>
                </li>
                <?php }?>
               <!--  <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/product/productadd">Add Product</a>
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
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/category/categoryadd/cat_list">Category</a>
                </li>
                <?php } 
          if (in_array(PRODUCT_LIST, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/product/productadd/product_list">Product</a>
                </li>
              <?php } ?>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/vendor/Vendordetail">Add business details</a>
                </li> -->
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
                  <a class="nav-link" href="<?php echo base_url();?>admin/vendor/vendordetail/vendor_list"> Vendor_details</a>
                </li>
                <?php } 
        if (in_array(VENDOR_KEYS, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>admin/vendor/vendordetail/vendorKeys"> Vendor_Keys</a>
                </li>
              <?php } ?>
              </ul>
            </div>
          </li>
        <?php } 
        if (in_array(VENDOR_BUSINESS, $menuIds)) {?>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/vendor/Vendordetail">
              <i class="menu-icon fa fa-id-card-o"></i>
              <span class="menu-title">Add Business Details</span>
            </a>
          </li>
          <?php } 
        if (in_array(VENDOR_BUSINESS_MANAGE, $menuIds)) {?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/vendor/Vendordetail/detail_edit">
              <i class="menu-icon fa fa-id-card-o"></i>
              <span class="menu-title">View Business Details</span>
            </a>
          </li>
          <?php } 
        if (in_array(VENDOR_KEYS_MANAGE, $menuIds)) {?>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui_mykeys" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon fa fa-key"></i>
              <span class="menu-title">My Keywords</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui_mykeys">
              <ul class="nav flex-column sub-menu">
        <?php if (in_array(VENDOR_KEY_LIST, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>admin/vendor/vendordetail/key_list">View Your keywords</a>
                </li>
                <?php } 
        if (in_array(VENDOR_KEY_SELECT, $menuIds)) {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>admin/vendor/vendordetail/selectKey">Select  Your keywords</a>
                </li>
              <?php }  ?>
              </ul>
            </div>
          </li>
          <?php } ?>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>admin/login/logout">
              <i class="menu-icon  fa fa-sign-out"></i>

              <span class="menu-title">Logout</span>
            </a>
          </li>








          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>admin/plan/plan_list">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Vendor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>pages/charts/chartjs.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>pages/tables/basic-table.html">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>pages/icons/font-awesome.html">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li> -->
         <!--  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">Logout</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
               
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>admin/login/logout"> Logout </a>
                </li>
              </ul>
            </div>
          </li> -->
        </ul>
      </nav>
     
  <!-- partial //don't delete --> 
  <div class="main-panel">
