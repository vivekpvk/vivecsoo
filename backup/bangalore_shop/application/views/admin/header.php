<!DOCTYPE html>
<html class="no-focus">
    <head>
        <meta charset="utf-8">
        <title> Bangalore Shop Admin Panel</title>
        <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url();?>images/goslogo.png">

        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url(); ?>assets/css/oneui.css">
    </head>
    <body>
        <div id="page-container" class="side-scroll navbar navbar-inverse navbar-fixed-right">
            <header id="header-navbar" class="content-mini content-mini-full">
                <!-- Header Navigation Right -->
                <div class="col-md-7">
                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <a href="<?php echo base_url(); ?>index.php/admin/login/dashboard" class="btn btn-default btn-image dropdown-toggle" >
                                 Dashboard
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                              Admin
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/Newadmin">
                                        <!--<i class="si si-envelope-open pull-right"></i>-->
                                       Admin List
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/register/regis">
                                <!--<i class="si si-user pull-right"></i>-->
                                       Add Admin
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                
                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                              Category
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/category/categoryadd/cat_list">
                                        <!--<i class="si si-envelope-open pull-right"></i>-->
                                       View Category
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/category/categoryadd">
                                       <!-- <i class="si si-user pull-right"></i>-->
                                       Create Category
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                              Products
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/product/productadd/product_list">
                                        <!--<i class="si si-envelope-open pull-right"></i>-->
                                       View Products
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/product/productadd">
<!--                                        <i class="si si-user pull-right"></i>-->
                                       Create Products
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
               
                <ul class="nav-header pull-left">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                             Users
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a tabindex="-1" href="<?php echo base_url(); ?>index.php/user/test/user_list">
                                       All Users
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
                
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                                    Hi, 
                                    <?php 
                                     echo $this->session->userdata('email');
                                       
                                    ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                       <a href="<?php echo base_url(); ?>index.php/admin/login/logout">
                                        <i class="si si-logout pull-right"></i>Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </header>


 
                   