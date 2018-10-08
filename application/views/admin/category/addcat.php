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
                            <div class="col-12 grid-margin">
                                <div class="card">
                                   <div class="card-body"> 
                                    
                                    <h3 class="block-title">New Category</h3>
                                <div class="block-content block-content-full bg-gray-lighter ">
                                      <form class="form-horizontal" action="<?php echo base_url(); ?>admin/category/create"  method="post" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Category Name<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="category" placeholder="Category Name" >
                                                 
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label class="col-md-2 control-label">Offer<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="offer" placeholder="Offer" >
                                                 
                                            </div>
                                        </div> -->
                                        
                                     

                                      

                                        
                                       <div class="form-group">
                                            <div class="col-md-8 col-md-offset-2">
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i> Add Category</button>
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
            </div>
                <!-- END Page Content -->
            </main>
          </div>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>
           
           