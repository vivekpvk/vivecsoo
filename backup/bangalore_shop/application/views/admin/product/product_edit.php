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
                                    <form class="form-horizontal"  method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/product/productadd/saveproduct">
                                       
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Select Parent Category<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="cat_id" placeholder="Category Name">
                                                    <option value="0">No Parent</option>
                                                    <?php 
                                                        foreach ($posts as $edit) {?>
                                                            <option value="<?php echo $edit->id;?>" <?php if($edit->id == $selectedcat->cat_id){ echo ' selected="selected"';}?>><?php echo $edit->cat_name;?></option>';
                                                        <?php } ?>
                                                    ?>
                                                </select>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Name<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="product_name" value="<?php echo $selectedcat->prod_name?>" name="prod_name" placeholder="Product Name" >
                                                 
                                                 <input type="hidden" value="<?php echo $selectedcat->id;?>" name="product_id" /> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Image<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <img id="previewimage" onclick="$('#uploadFile').click();" src="<?php echo base_url(); ?>upload/<?php echo $selectedcat->prod_image?>"  alt="image" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                                                <input type="file" id="uploadFile" name="prod_image"  style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  />
                                                 <input type="hidden" value="<?php echo $selectedcat->id;?>" name="product_id" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Brand<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="prod_brand" value="<?php echo $selectedcat->prod_brand?>" name="brand" placeholder="Product Brand" >
                                                 
                                                 <input type="hidden" value="<?php echo $selectedcat->id;?>" name="product_id" /> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product URL<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="prod_url" value="<?php echo $selectedcat->prod_url?>" name="prod_url" placeholder="Product URL" >
                                                 
                                                 <input type="hidden" value="<?php echo $selectedcat->id;?>" name="product_id" /> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Company<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" id="company" value="<?php echo $selectedcat->company?>" name="company" placeholder="Product URL" >
                                                 
                                                 <input type="hidden" value="<?php echo $selectedcat->id;?>" name="product_id" /> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Description<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" type="text" id="desc" name="desc" placeholder="Product description" ><?php echo $selectedcat->description?></textarea>
                                                 
                                                 <input type="hidden" value="<?php echo $selectedcat->id;?>" name="product_id" /> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Specification<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" type="text" id="spec" name="spec" placeholder="Product specification" ><?php echo $selectedcat->specification?></textarea>                                                 
                                                 <input type="hidden" value="<?php echo $selectedcat->id;?>" name="product_id"/> 
                                            </div>
                                        </div>

                                        
                                        


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
         