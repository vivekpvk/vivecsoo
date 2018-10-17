<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
<div class="card">
    <div class="card-body"><h4>Edit Product</h4>  
    <div class="block-content block-content-full bg-gray-lighter ">
        <form class="form-horizontal"  method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/product/update">
           
            <div class="form-group">
                <label class="col-md-3 control-label">Select Category<span class="text-danger">*</span></label>
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
                <label class="col-md-2 control-label">Vendor 1<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <?=$selectedcat->username1." ".$selectedcat->mobile1;?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Vendor 2<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <?=$selectedcat->username2." ".$selectedcat->mobile2;?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Vendor 3<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <?=$selectedcat->username3." ".$selectedcat->mobile3;?>
                </div>
            </div>
           <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i>Update Product</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div >
<?php
require(FCPATH."/application/views/admin/footer.php");
?>

         