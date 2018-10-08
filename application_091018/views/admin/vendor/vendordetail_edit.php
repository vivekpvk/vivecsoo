<?php
    require(FCPATH."/application/views/admin/header.php");
    require(FCPATH."/application/views/admin/sidebar.php");
?>
<div class="content-wrapper">
  <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Your Details</h4>
          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/vendor/vendordetail/saveDetail">
            <input type="hidden" name="user_id" value="<?php echo $selectedcat->user_id;?>">
          <?php
            $success_msg    = $this->session->flashdata('success_msg');
            $error_msg      = $this->session->flashdata('error_msg');
            if($success_msg){?>
                <div class="alert alert-success">
                    <?php echo $success_msg; ?>
                </div>
            <?php }
            if($error_msg) { ?>
                <div class="alert alert-danger">
                    <?php echo $error_msg; ?>
                </div>
            <?php } ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Registered Business Name<span class="fb-required">*</span></label>
                    <div class="fb-text form-group field-text-1537519809842">
                        <input class="form-control" type="text" value="<?php echo $selectedcat->business_name?>" name="business_name" placeholder="Business Name">
                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Business Address<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" value="<?php echo $selectedcat->business_address?>" name="business_address" placeholder="Business Address">
                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Registered Address<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" value="<?php echo $selectedcat->registered_address?>" name="registered_address" placeholder="Business Address">
                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Upload Logo Image<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <img id="previewimage" onclick="$('.uploadFile').click();" src="<?php echo base_url(); ?>upload/<?php echo $selectedcat->logo_image?>"  alt="pdf can't show here" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                        <input type="file" id="myFile" class="uploadFile" name="logo_image"  style="position: absolute; margin: 0px auto; visibility: hidden;"/><span style="font-size: 10px;"><?php echo $selectedcat->logo_image?></span>
                         <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Upload Product Image<span class="text-danger">*</span></label>
                    <div class="col-md-7">

                         <img id="previewimage1" onclick="$('.product').click();" src="<?php echo base_url(); ?>upload/<?php echo $selectedcat->pro_image?>"  alt="pdf can't show here" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                        <input type="file" id="myFile" class="product" name="pro_image"  style="position: absolute; margin: 0px auto; visibility: hidden;"/><span style="font-size: 10px;"><?php echo $selectedcat->pro_image?></span>
                         <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />

                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Telephone Number<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" value="<?php echo $selectedcat->telephone?>" name="telephone" placeholder="telephone">

                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Website Address<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" value="<?php echo $selectedcat->website?>" name="website" placeholder="website">

                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Business Status<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <select class="form-control" name="business_status" placeholder="Category Name">
                            <option value="<?php echo $selectedcat->business_status;?>">
                                <?php echo $selectedcat->business_status;?>
                            </option>
                            <option value="Pvt Ltd">Pvt Ltd</option>
                            <option value="Ltd">Ltd</option>
                            <option value="Prop">Prop</option>
                            <option value="Individual">Individual</option>
                            <option value="Partnership">Partnership</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Business Type<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <select class="form-control" name="business_type" placeholder="Category Name">
                            <option value="<?php echo $selectedcat->business_type;?>">
                                <?php echo $selectedcat->business_type;?>
                            </option>
                            <option value="Manufacturer">Manufacturer</option>
                            <option value="Wholeseller">Wholeseller</option>
                            <option value="Retailer">Retailer</option>
                            <option value="Service">Service</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Trade License Number<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" value="<?php echo $selectedcat->license_number?>" name="license_number" placeholder="license number">

                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Upload Trade License Image<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                         <img id="previewimage5" onclick="$('.license').click();" src="<?php echo base_url(); ?>upload/<?php echo $selectedcat->license_image?>"  alt="pdf can't show here" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                        <input type="file" id="myFile" class="license" name="license_image"  style="position: absolute; margin: 0px auto; visibility: hidden;"/><span style="font-size: 10px;"><?php echo $selectedcat->license_image?></span>
                         <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">ISO Certification<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <select class="form-control" name="iso" placeholder="iso">

                            <option value="<?php echo $selectedcat->iso_certified;?>">
                                <?php echo $selectedcat->iso_certified;?>
                            </option>
                            <?php if($selectedcat->iso_certified == 'yes'){?>
                                <option value="No">No</option>
                                <?php } else{?>
                                    <option value="Yes">Yes</option>
                                    <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Valid Till<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="date" value="<?php echo $selectedcat->iso_valid?>" name="iso_valid" placeholder="iso valid">

                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Quality Policy<span class="text-danger">*</span></label>
                  <div class="col-md-7">
                      <select class="form-control" name="quality_policy" placeholder="quality_policy">

                          <option value="<?php echo $selectedcat->quality_policy;?>">
                              <?php echo $selectedcat->quality_policy;?>
                          </option>
                          <?php if($selectedcat->quality_policy == 'yes'){?>
                              <option value="No">No</option>
                              <?php } else{?>
                                  <option value="Yes">Yes</option>
                                  <?php } ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Environment Policy<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <select class="form-control" name="environ_policy" placeholder="quality_policy">

                            <option value="<?php echo $selectedcat->environ_policy;?>">
                                <?php echo $selectedcat->environ_policy;?>
                            </option>
                            <?php if($selectedcat->environ_policy == 'yes'){?>
                                <option value="No">No</option>
                                <?php } else{?>
                                    <option value="Yes">Yes</option>
                                    <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Establishment Date<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="date" value="<?php echo $selectedcat->establish_date?>" name="establish_date" placeholder="establish date">

                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">GST Number<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" value="<?php echo $selectedcat->gst_number?>" name="gst_number" placeholder="gst number">

                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Upload GST File<span class="text-danger">*</span></label>
                    <div class="col-md-7">

                        <img id="previewimage2" onclick="$('.gst').click();" src="<?php echo base_url(); ?>upload/<?php echo $selectedcat->gst_image?>"  alt="pdf can't show here" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                        <input type="file" id="myFile" class="gst" name="gst_image"  style="position: absolute; margin: 0px auto; visibility: hidden;"/><span style="font-size: 10px;"><span style="font-size: 10px;"><?php echo $selectedcat->gst_image?></span>
                         <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Pan Card Number<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" value="<?php echo $selectedcat->pan_number?>" name="pan_number" placeholder="pan number">

                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Upload Pan Card<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <img id="previewimage3" onclick="$('.pan').click();" src="<?php echo base_url(); ?>upload/<?php echo $selectedcat->pan_image?>"  alt="pdf can't show here" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                        <input type="file" id="myFile" class="pan" name="pan_image"  style="position: absolute; margin: 0px auto; visibility: hidden;"/><span style="font-size: 10px;"><?php echo $selectedcat->pan_image?></span>
                         <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Aadhar Card Number<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" value="<?php echo $selectedcat->aadhar_number?>" name="aadhar_number" placeholder="aadhar number">

                        <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Upload Aadhar Card<span class="text-danger">*</span></label>
                    <div class="col-md-7">

                        <img id="previewimage4" onclick="$('.aadhar').click();" src="<?php echo base_url(); ?>upload/<?php echo $selectedcat->aadhar_image?>"  alt="pdf can't show here" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                        <input type="file" id="myFile" class="aadhar" name="aadhar_image"  style="position: absolute; margin: 0px auto; visibility: hidden;"/><span style="font-size: 10px;"><?php echo $selectedcat->aadhar_image?></span>
                         <input type="hidden" value="<?php echo $selectedcat->id;?>" name="vendor_id" />
                    </div>
                </div>
               <!--  <div class="form-group">
                    <label class="col-md-2 control-label">Select Category<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <select class="form-control" name="category" id="cat" placeholder="Category Name">
                            <option value="0">No Parent</option>
                            <?php 
                            foreach ($posts as $edit) {?>
                                <option value="<?php echo $edit->id;?>" <?php if($edit->id == $selectedcat->cat_id){ echo ' selected="selected"';}?>>
                                    <?php echo $edit->cat_name;?>
                                </option>';
                                <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Select Your Keywords<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <select class="form-control" multiple="multiple" size="3" name="keywords[]" id="key" placeholder="Category Name">
                            <option value="">Select Any 3</option>
                            <?php 
                    foreach ($keys as $key) {?>
                        <option value="<?php echo $key->id;?>" <?php echo ' selected="selected"';?>>
                            <?php echo $key->prod_name;?>
                        </option>';
                        <?php } foreach ($keyall as $keyal) { ?>
                            <option value="<?php echo $keyal->id;?>">
                                <?php echo $keyal->prod_name;?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div> -->
              </div>
              <div class="form-group">
                  <div class="col-md-8 col-md-offset-2">
                      <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i>Update Product</button>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript">
    //category and key selection
    $('#cat').change(function() { 
    $('#key').find('option').remove().end().append('<option value=""></option>'); //resettin the option
    var key_id = $(this).val();
    if(key_id==''){
        return;
    }
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>admin/vendor/Vendordetail/getKeys?id="+key_id,
        success: function(json){  

            try{  
                var obj         = jQuery.parseJSON(json);
                var toAppend    = '';
                $.each(obj,function(i,o) { 
                toAppend    +='<option value="'+o.id+'">'+o.prod_name+'</option>';
                });
                $('#key').append(toAppend);
                //do your code, get cat list and append to model select field


            }catch(e) {  
                alert('Exception while request..');
            }  
        },
        error: function(){      
            alert('Error while request..');
        }
    });
 });
    //link in row
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

//file required
function myFunction() {
    var x = document.getElementById("myFile").required;
    //document.getElementById("demo").innerHTML = x;
}

</script>

<?php
require(FCPATH."/application/views/admin/footer.php");
?>