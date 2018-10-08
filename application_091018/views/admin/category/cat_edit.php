<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
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
                            <div class="block">
                                <div class="block-header">
                                    <!-- <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                        </li>
                                    </ul> -->
                                    <h3 class="block-title">Edit Category</h3>
                                </div>
                                <div class="block-content block-content-full bg-gray-lighter ">
                                    <form class="form-horizontal"  method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/admin/category/categoryadd/savecat">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Category Name<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="product_name" value="<?php echo $selectedcat->cat_name?>" name="category" placeholder="Category Name" >
                                                 
                                                 <input type="hidden" value="<?php echo $selectedcat->id;?>" name="category_id" /> 
                                            </div>
                                        </div>
                                         
                                          <!-- <div class="form-group">
                                            <label class="col-md-2 control-label">Offer<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="product_name" value="<?php echo $selectedcat->offer?>" name="offer" placeholder="Offer">
                                                 
                                                 <input type="hidden" value="<?php echo $selectedcat->id;?>" name="category_id" /> 
                                            </div>
                                          </div> -->
                                       <div class="form-group">
                                            <div class="col-md-8 col-md-offset-2">
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i> Edit Category Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Main Dashboard Chart -->
                        </div>
                     
                    </div>
                  
                </div>
                <!-- END Page Content -->
            </main>
           </div>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>

      
