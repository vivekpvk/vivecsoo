<?php
    require(FCPATH."/application/views/admin/vendor/header.php");
    require(FCPATH."/application/views/admin/vendor/sidebar.php");
?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title"><?=$vendor->first_name?> <?=$vendor->last_name?> (BGRSP<?=$vendor->vendor_id?>)</h4>
         <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/vendor/update/">
            <input type="hidden" name="vendor_id" value="<?=$vendor->vendor_id?>">
            <input type="hidden" name="form" value="vendor">
            <p class="card-description">
                Personal info
            </p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="first_name" class="form-control" value="<?=$vendor->first_name?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="last_name" value="<?=$vendor->last_name?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" readonly="readonly" name="" class="form-control" value="<?=$vendor->email?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 '.VENDOR_FILE_PFX.$vendor->logo_image'col-form-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="tel" readonly="readonly" name="" value="<?=$vendor->mobile?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Registered Business Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="business_name" class="form-control" value="<?=$vendor->business_name?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Valid Till</label>
                        <div class="col-sm-9">
                            <input type="date" name="iso_valid" value="<?=$vendor->iso_valid?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Website Address</label>
                        <div class="col-sm-9">
                            <input type="website" name="website" class="form-control" value="<?=$vendor->website?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Telephone</label>
                        <div class="col-sm-9">
                            <input type="tel" name="telephone" value="<?=$vendor->telephone?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Business Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="business_address" rows="2" name="business_address">
                                <?=$vendor->business_address?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Registered Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="business_address" rows="2" name="registered_address">
                                <?=$vendor->registered_address?>
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Business Status</label>
                        <div class="col-sm-9">
                            <?php $businessStatus = $vendor->business_status?>
                            <select class="form-control" name="business_status" required="required" aria-required="true">
                                <option disabled="">Select Your Business Status</option>
                                <option value="Pvt Ltd" <?php if($businessStatus=="Pvt Ltd") echo 'selected="selected"';?>>Pvt Ltd</option>
                                <option value="Ltd" <?php if($businessStatus=="Ltd") echo 'selected="selected"';?>>Ltd</option>
                                <option value="Prop" <?php if($businessStatus=="Prop") echo 'selected="selected"';?>>Prop</option>
                                <option value="Individual" <?php if($businessStatus=="Individual") echo 'selected="selected"';?>>Individual</option>
                                <option value="Partnership" <?php if($businessStatus=="Partnership") echo 'selected="selected"';?>>Partnership</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Business Type</label>
                        <div class="col-sm-9">
                            <?php $businessType = $vendor->business_type?>
                            <select class="form-control" name="business_type" required="required" aria-required="true">
                                <option disabled="null">Select Your Business Type</option>
                                <option value="Manufacturer" <?php if($businessType=="Manufacturer") echo 'selected="selected"';?>>Manufacturer</option>
                                <option value="Wholeseller" <?php if($businessType=="Wholeseller") echo 'selected="selected"';?>>Wholeseller</option>
                                <option value="Retailer" <?php if($businessType=="Retailer") echo 'selected="selected"';?>>Retailer</option>
                                <option value="Service" <?php if($businessType=="Service") echo 'selected="selected"';?>>Service</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <?php $qualityPolicy = $vendor->quality_policy?>
                        <label class="col-sm-3 col-form-label">Quality Policy</label>
                        <div class="col-sm-4">
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="quality_policy" id="quality_policy1" value="yes" <?php if($qualityPolicy=="yes") echo 'checked="checked"';?>> Yes
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="quality_policy" id="quality_policy2" value="no" <?php if($qualityPolicy=="no") echo 'checked="no"';?>> No
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <?php $environPolicy = $vendor->environ_policy?>
                        <label class="col-sm-3 col-form-label">Environment Policy</label>
                        <div class="col-sm-4">
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="environ_policy" id="environ_policy1" value="yes" <?php if($environPolicy=="yes") echo 'checked="checked"';?>> Yes
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="environ_policy" id="environ_policy2" value="no" <?php if($environPolicy=="no") echo 'checked="checked"';?>> No
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <?php $isoCertified = $vendor->iso_certified?>
                        <label class="col-sm-3 col-form-label">ISO Certification</label>
                        <div class="col-sm-4">
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="iso_certified" id="iso_certified1" value="yes" <?php if($isoCertified=="yes") echo 'checked="checked"';?>> Yes
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="iso_certified" id="iso_certified2" value="no" <?php if($isoCertified=="no") echo 'checked="checked"';?>> No
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Establishment Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="establish_date" value="<?=$vendor->establish_date?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Company Logo</label>
                        <div class="col-sm-3">
                            <input type="file" name="logo_image" class="form-control file-upload-browse btn btn-outline-info" placeholder="Upload Image">
                        </div>
                        <div class="col-sm-6">
                            <?php if(!empty($vendor->logo_image)){
                                echo '<a target="_blank" href="'.BASE_URL.VENDOR_FILE_PFX.$vendor->logo_image.'"><img class="img-ms responsive img-thumbnail" src="'.BASE_URL.VENDOR_FILE_PFX.$vendor->logo_image.'"></a>';
                            }else{ echo " Need to upload this image....";}?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Image</label>
                        <div class="col-sm-3">
                            <input type="file" name="pro_image" class="form-control file-upload-browse btn btn-outline-info" placeholder="Upload Image">
                        </div>
                        <div class="col-sm-6">
                            <?php if(!empty($vendor->pro_image)){
                                echo '<a target="_blank" href="'.BASE_URL.VENDOR_FILE_PFX.$vendor->pro_image.'"><img class="img-ms responsive img-thumbnail" src="'.BASE_URL.VENDOR_FILE_PFX.$vendor->pro_image.'"></a>';
                            }else{ echo " Need to upload this image....";}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Trade License Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="license_number" class="form-control" value="<?=$vendor->license_number?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Trade License Image</label>
                        <div class="col-sm-3">
                            <input type="file" name="license_image" class="form-control file-upload-browse btn btn-outline-info" placeholder="Upload Image">
                        </div>
                        <div class="col-sm-6">
                            <?php if(!empty($vendor->license_image)){
                                echo '<a target="_blank" href="'.BASE_URL.VENDOR_FILE_PFX.$vendor->license_image.'"><img class="img-ms responsive img-thumbnail" src="'.BASE_URL.VENDOR_FILE_PFX.$vendor->license_image.'"></a>';
                            }else{ echo " Need to upload this image....";}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">GST Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="gst_number" class="form-control" value="<?=$vendor->gst_number?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">GST File</label>
                        <div class="col-sm-3">
                            <input type="file" name="gst_image" class="form-control file-upload-browse btn btn-outline-info" placeholder="Upload Image">
                        </div>
                        <div class="col-sm-6">
                            <?php if(!empty($vendor->gst_image)){
                                echo '<a target="_blank" href="'.BASE_URL.VENDOR_FILE_PFX.$vendor->gst_image.'"><img class="img-ms responsive img-thumbnail" src="'.BASE_URL.VENDOR_FILE_PFX.$vendor->gst_image.'"></a>';
                            }else{ echo " Need to upload this image....";}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pan Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="pan_number" class="form-control" value="<?=$vendor->pan_number?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pan Image</label>
                        <div class="col-sm-3">
                            <input type="file" name="pan_image" class="form-control file-upload-browse btn btn-outline-info" placeholder="Upload Image">
                        </div>
                        <div class="col-sm-6">
                            <?php if(!empty($vendor->pan_image)){
                                echo '<a target="_blank" href="'.BASE_URL.VENDOR_FILE_PFX.$vendor->pan_image.'"><img class="img-ms responsive img-thumbnail" src="'.BASE_URL.VENDOR_FILE_PFX.$vendor->pan_image.'"></a>';
                            }else{ echo " Need to upload this image....";}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Aadhar Card Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="aadhar_number" class="form-control" value="<?=$vendor->aadhar_number?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Aadhar Card</label>
                        <div class="col-sm-3">
                            <input type="file" name="aadhar_image" class="form-control file-upload-browse btn btn-outline-info" placeholder="Upload Image">
                        </div>
                        <div class="col-sm-6">
                            <?php if(!empty($vendor->aadhar_image)){
                                echo '<a target="_blank" href="'.BASE_URL.VENDOR_FILE_PFX.$vendor->aadhar_image.'"><img class="img-ms responsive img-thumbnail" src="'.BASE_URL.VENDOR_FILE_PFX.$vendor->aadhar_image.'"></a>';
                            }else{ echo " Need to upload this image....";}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check form-check-flat form-group" style="font-size: 13px;">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" required="required">
                            <i class="input-helper"></i><i class="input-helper"></i></label> I Read And I Accept The <a href="" data-toggle="modal" data-target="#modalRegisterForm">Terms and Conditions.</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Business Type</label>
                        <div class="col-sm-9">
                            <?php $status = $vendor->status?>
                            <?php if($status==0) echo 'Not Verified';?>
                            <?php if($status==1) echo 'Verified';?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if($status !=1){
                    echo '<div class="col-md-12" style="text-align: center;margin-top: 40px;">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                </div>';
                }?>
            </div>
        </form>
    </div>
</div>
<?php
    require(FCPATH."/application/views/admin/footer.php");
?>