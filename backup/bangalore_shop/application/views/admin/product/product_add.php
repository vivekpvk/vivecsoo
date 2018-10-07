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
                                    
                                    <h3 class="block-title">New Product</h3>
                                </div>
                                <div class="block-content block-content-full bg-gray-lighter ">
                                      <form class="form-horizontal" action="<?php echo base_url(); ?>admin/product/productadd/Addproduct"  method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Select Parent Category<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="cat_id" placeholder="Category Name">
                                                    <option value="0">No Category</option>
                                                    <?php 
                                                        foreach ($posts as $pro) {
                                                            echo '<option value="'.$pro->id.'">'.$pro->cat_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Name<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="prod_name" placeholder="Product Name" >
                                                 
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Image<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <img id="previewimage" onclick="$('#uploadFile').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                                                <input type="file" id="uploadFile" name="prod_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  />
                                                
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Brand<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="brand" placeholder="Brand Name" >
                                                 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product URL<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="prod_url" placeholder="Url" >
                                                 
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-2 control-label">Company Name<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="company" placeholder="Company" >
                                                 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Description<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <textarea name="desc" style="width:250px;height:150px;"></textarea>
                                                 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Specification<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <textarea name="spec" style="width:250px;height:150px;"></textarea>
                                                 
                                            </div>
                                        </div>


                                       <div class="form-group">
                                            <div class="col-md-8 col-md-offset-2">
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i> Add Product</button>
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
            
    