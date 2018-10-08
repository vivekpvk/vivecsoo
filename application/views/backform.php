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
                                    
                                    <h3 class="block-title">New Product</h3>
                                </div>
                                <div class="block-content block-content-full bg-gray-lighter ">
                                     <!--  <form class="form-horizontal" action="<?php echo base_url(); ?>admin/product/Addproduct"  method="post" enctype="multipart/form-data">

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
                                    </form> -->









<form id="rendered-form">
    <div class="rendered-form">
        <div class="fb-text form-group field-text-1537519434106">
            <label for="text-1537519434106" class="fb-text-label">Registered Business Name<span class="fb-required">*</span></label>
            <input type="text" placeholder="Enter Your Business Name" class="form-control" name="text-1537519434106" id="text-1537519434106" required="required" aria-required="true">
        </div>
        <div class="fb-text form-group field-text-1537519458619">
            <label for="text-1537519458619" class="fb-text-label">Principal Place of Business<span class="fb-required">*</span></label>
            <input type="text" placeholder="Enter Your City Name" class="form-control" name="text-1537519458619" id="text-1537519458619" required="required" aria-required="true">
        </div>
        <div class="fb-select form-group field-select-1537519520770">
            <label for="select-1537519520770" class="fb-select-label">Choose Your Locality<span class="fb-required">*</span></label>
            <select class="form-control" name="select-1537519520770" id="select-1537519520770" required="required" aria-required="true">
                <option disabled="null" selected="null">Choose Your Locality From the List</option>
                <option value="option-1" id="select-1537519520770-0">BTM Layout</option>
                <option value="option-2" id="select-1537519520770-1">Domlur</option>
                <option value="option-3" id="select-1537519520770-2">Old Airport Road</option>
                <option id="select-1537519520770-3">SP Road</option>
                <option id="select-1537519520770-4">Majestic</option>
                <option id="select-1537519520770-5">Indiranagar</option>
                <option id="select-1537519520770-6">Koramangala</option>
                <option id="select-1537519520770-7">Silk Board</option>
                <option id="select-1537519520770-8">Bomanhalli</option>
                <option id="select-1537519520770-9">HSR Layout</option>
                <option id="select-1537519520770-10">Agara</option>
                <option id="select-1537519520770-11">Bellanduru</option>
                <option id="select-1537519520770-12">Marathahalli</option>
                <option id="select-1537519520770-13">Whitefield</option>
                <option id="select-1537519520770-14">K R Market</option>
                <option id="select-1537519520770-15">Chickpet</option>
                <option id="select-1537519520770-16">Electronic City</option>
                <option id="select-1537519520770-17">Jayanagar</option>
                <option id="select-1537519520770-18">J.P Nagar</option>
                <option id="select-1537519520770-19">Arekere Gate</option>
            </select>
        </div>
        <div class="fb-text form-group field-text-1537519809842">
            <label for="text-1537519809842" class="fb-text-label">Telephone Number</label>
            <input type="tel" placeholder="Enter Your Telephone Number" class="form-control" name="text-1537519809842" id="text-1537519809842">
        </div>
        <div class="fb-text form-group field-text-1537519845136">
            <label for="text-1537519845136" class="fb-text-label">Website Address</label>
            <input type="text" placeholder="Enter Your Site Address" class="form-control" name="text-1537519845136" id="text-1537519845136">
        </div>
        <div class="fb-select form-group field-select-1537519896403">
            <label for="select-1537519896403" class="fb-select-label">Status<span class="fb-required">*</span></label>
            <select class="form-control" name="select-1537519896403" id="select-1537519896403" required="required" aria-required="true">
                <option disabled="null" selected="null">Select Your Business Status</option>
                <option value="option-1" id="select-1537519896403-0">Pvt Ltd</option>
                <option value="option-2" id="select-1537519896403-1">Ltd</option>
                <option value="option-3" id="select-1537519896403-2">Prop</option>
                <option id="select-1537519896403-3">Individual</option>
                <option id="select-1537519896403-4">Partnership</option>
            </select>
        </div>
        <div class="fb-select form-group field-select-1537519962895">
            <label for="select-1537519962895" class="fb-select-label">Business Type<span class="fb-required">*</span></label>
            <select class="form-control" name="select-1537519962895" id="select-1537519962895" required="required" aria-required="true">
                <option disabled="null" selected="null">Select Your Business Type</option>
                <option value="option-1" id="select-1537519962895-0">Manufacturer</option>
                <option value="option-2" id="select-1537519962895-1">Wholeseller</option>
                <option value="option-3" id="select-1537519962895-2">Retailer</option>
                <option id="select-1537519962895-3">Service</option>
            </select>
        </div>
        <div class="fb-text form-group field-text-1537520029804">
            <label for="text-1537520029804" class="fb-text-label">Trade License Number<span class="fb-required">*</span></label>
            <input type="text" placeholder="Enter Your Trade License Number" class="form-control" name="text-1537520029804" id="text-1537520029804" required="required" aria-required="true">
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Upload Trade License Image<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <img id="previewimage" onclick="$('#uploadFile').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                    <input type="file" id="uploadFile" name="prod_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  />
                </div>
        </div>



        <!-- <div class="fb-file form-group field-file-1537520457472">
            <label for="file-1537520457472" class="fb-file-label">Upload Trade License Image<span class="fb-required">*</span></label>
            <input type="file" placeholder="Upload Your Trade License Image" class="form-control" name="file-1537520457472" multiple="true" id="file-1537520457472" required="required" aria-required="true">
        </div> -->


        <div class="fb-radio-group form-group field-radio-group-1537520093530">
            <label for="radio-group-1537520093530" class="fb-radio-group-label">ISO Certification</label>
            <div class="radio-group">
                <div class="radio-inline">
                    <input name="radio-group-1537520093530" id="radio-group-1537520093530-0" value="option-1" type="radio">
                    <label for="radio-group-1537520093530-0">Yes</label>
                </div>
                <div class="radio-inline">
                    <input name="radio-group-1537520093530" id="radio-group-1537520093530-1" value="option-2" type="radio">
                    <label for="radio-group-1537520093530-1">No</label>
                </div>
            </div>
        </div>
        <div class="fb-radio-group form-group field-radio-group-1537520132643">
            <label for="radio-group-1537520132643" class="fb-radio-group-label">Quality Policy</label>
            <div class="radio-group">
                <div class="radio-inline">
                    <input name="radio-group-1537520132643" id="radio-group-1537520132643-0" value="option-1" type="radio">
                    <label for="radio-group-1537520132643-0">Yes</label>
                </div>
                <div class="radio-inline">
                    <input name="radio-group-1537520132643" id="radio-group-1537520132643-1" value="option-2" type="radio">
                    <label for="radio-group-1537520132643-1">No</label>
                </div>
            </div>
        </div>
        <div class="fb-radio-group form-group field-radio-group-1537520161864">
            <label for="radio-group-1537520161864" class="fb-radio-group-label">Environment Policy</label>
            <div class="radio-group">
                <div class="radio-inline">
                    <input name="radio-group-1537520161864" id="radio-group-1537520161864-0" value="option-1" type="radio">
                    <label for="radio-group-1537520161864-0">Yes</label>
                </div>
                <div class="radio-inline">
                    <input name="radio-group-1537520161864" id="radio-group-1537520161864-1" value="option-2" type="radio">
                    <label for="radio-group-1537520161864-1">No</label>
                </div>
            </div>
        </div>
        <div class="fb-date form-group field-date-1537520214884">
            <label for="date-1537520214884" class="fb-date-label">Establishment Date<span class="fb-required">*</span></label>
            <input type="date" placeholder="Enter Your Business Establishment Date" class="form-control" name="date-1537520214884" id="date-1537520214884" required="required" aria-required="true">
        </div>
        <div class="fb-text form-group field-text-1537520251736">
            <label for="text-1537520251736" class="fb-text-label">Years in Business</label>
            <input type="text" class="form-control" name="text-1537520251736" id="text-1537520251736">
        </div>
        <div class="fb-text form-group field-text-1537520504862">
            <label for="text-1537520504862" class="fb-text-label">GST Number<span class="fb-required">*</span></label>
            <input type="text" placeholder="Enter Your GST Number" class="form-control" name="text-1537520504862" id="text-1537520504862" required="required" aria-required="true">
        </div>
        <!-- <div class="fb-file form-group field-file-1537520532500">
            <label for="file-1537520532500" class="fb-file-label">Upload GST Certificate Image<span class="fb-required">*</span></label>
            <input type="file" placeholder="Upload Your GST Certificate Image" class="form-control" name="file-1537520532500" multiple="true" id="file-1537520532500" required="required" aria-required="true">
        </div> -->
        <div class="form-group">
            <label class="col-md-2 control-label">Upload GST Certificate Image<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <img id="previewimage" onclick="$('#uploadFile').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                    <input type="file" id="uploadFile" name="prod_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  />
                </div>
        </div>
        <div class="fb-text form-group field-text-1537520573834">
            <label for="text-1537520573834" class="fb-text-label">Pan Card Number<span class="fb-required">*</span></label>
            <input type="text" placeholder="Enter Your PAN Card Number" class="form-control" name="text-1537520573834" id="text-1537520573834" required="required" aria-required="true">
        </div>
        <!-- <div class="fb-file form-group field-file-1537520648335">
            <label for="file-1537520648335" class="fb-file-label">Upload Pan Card Image<span class="fb-required">*</span></label>
            <input type="file" placeholder="Upload Your PAN Card Image" class="form-control" name="file-1537520648335" multiple="true" id="file-1537520648335" required="required" aria-required="true">
        </div> -->

        <div class="form-group">
            <label class="col-md-2 control-label">Upload Pan Card Image<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <img id="previewimage" onclick="$('#uploadFile').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                    <input type="file" id="uploadFile" name="prod_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  />
                </div>
        </div>


        <div class="fb-text form-group field-text-1537520573834">
            <label for="text-1537520573834" class="fb-text-label">Aadhar Card Number<span class="fb-required">*</span></label>
            <input type="text" placeholder="Enter Your PAN Card Number" class="form-control" name="text-1537520573834" id="text-1537520573834" required="required" aria-required="true">
        </div>
        <!-- <div class="fb-file form-group field-file-1537520648335">
            <label for="file-1537520648335" class="fb-file-label">Upload Pan Card Image<span class="fb-required">*</span></label>
            <input type="file" placeholder="Upload Your PAN Card Image" class="form-control" name="file-1537520648335" multiple="true" id="file-1537520648335" required="required" aria-required="true">
        </div> -->

        <div class="form-group">
            <label class="col-md-2 control-label">Upload Aadhar Card Image<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <img id="previewimage" onclick="$('#uploadFile').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                    <input type="file" id="uploadFile" name="prod_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  />
                </div>
        </div>






        <div class="fb-select form-group field-select-1537520699928">
            <label for="select-1537520699928" class="fb-select-label">Product Category<span class="fb-required">*</span></label>
            <select class="form-control" name="select-1537520699928" id="select-1537520699928" required="required" aria-required="true">
                <option disabled="null" selected="null">Select Your Product Category</option>
                <option value="option-1" id="select-1537520699928-0">Computers</option>
                <option value="option-2" id="select-1537520699928-1">Mobiles</option>
                <option value="option-3" id="select-1537520699928-2">CCTV</option>
                <option id="select-1537520699928-3">TV's</option>
                <option id="select-1537520699928-4">Electronics</option>
                <option id="select-1537520699928-5">Apparel's</option>
                <option id="select-1537520699928-6">Jewel's</option>
                <option id="select-1537520699928-7">Toy's</option>
                <option id="select-1537520699928-8">Sport's Acc</option>
                <option id="select-1537520699928-9">Book's</option>
                <option id="select-1537520699928-10">Furniture</option>
                <option id="select-1537520699928-11">Stationary</option>
                <option id="select-1537520699928-12">Leather Items</option>
                <option id="select-1537520699928-13">Perishable</option>
                <option id="select-1537520699928-14">FMCG</option>
                <option id="select-1537520699928-15">Air Ticket</option>
                <option id="select-1537520699928-16">Holiday's</option>
                <option id="select-1537520699928-17">Hotel's</option>
                <option id="select-1537520699928-18">Fitness</option>
                <option id="select-1537520699928-19">Bag's</option>
                <option id="select-1537520699928-20">Tools</option>
                <option id="select-1537520699928-21">Baby Products</option>
                <option id="select-1537520699928-22">Beauty Products</option>
                <option id="select-1537520699928-23">Real Estate</option>
                <option id="select-1537520699928-24">Auto Mobiles</option>
                <option id="select-1537520699928-25">Kitchen Wares</option>
                <option id="select-1537520699928-26">Builder's</option>
                <option id="select-1537520699928-27">Interior Designers</option>
                <option id="select-1537520699928-28">Health Care Products</option>
                <option id="select-1537520699928-29">Gaming</option>
                <option id="select-1537520699928-30">Lightings</option>
                <option id="select-1537520699928-31">Outdoor</option>
                <option id="select-1537520699928-32">Oral care</option>
                <option id="select-1537520699928-33">Others</option>
            </select>
        </div>
        <div class="fb-select form-group field-select-1537521285412">
            <label for="select-1537521285412" class="fb-select-label">Select Your Keywords</label>
            <select class="form-control" name="select-1537521285412" id="select-1537521285412">
                <option disabled="null" selected="null">Choose Any 3 Keywords For Business From the list</option>
                <option value="option-1" id="select-1537521285412-0">computers shop</option>
                <option value="option-2" id="select-1537521285412-1">Mobile Shop</option>
                <option value="option-3" id="select-1537521285412-2">Laptop Dealers</option>
                <option id="select-1537521285412-3">Accessories Dealers</option>
            </select>
        </div>
        <div class="fb-button form-group field-button-1537521398570">
            <button type="button" class="btn btn-danger" name="button-1537521398570" style="danger" id="button-1537521398570" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Submit Details</button>
        </div>
    </div>
</form>

<form id="rendered-form">
    <div class="rendered-form">
        <div class="fb-radio-group form-group field-radio-group-1537521564644">
            <label for="radio-group-1537521564644" class="fb-radio-group-label">Payment<span class="fb-required">*</span></label>
            <div class="radio-group">
                <div class="radio-inline">
                    <input name="radio-group-1537521564644" id="radio-group-1537521564644-0" required="required" aria-required="true" value="option-1" type="radio">
                    <label for="radio-group-1537521564644-0">IMPS/NEFT/RTGS</label>
                </div>
                <div class="radio-inline">
                    <input name="radio-group-1537521564644" id="radio-group-1537521564644-1" required="required" aria-required="true" value="option-2" type="radio">
                    <label for="radio-group-1537521564644-1">Card</label>
                </div>
                <div class="radio-inline">
                    <input name="radio-group-1537521564644" id="radio-group-1537521564644-2" required="required" aria-required="true" value="option-3" type="radio">
                    <label for="radio-group-1537521564644-2">Wallet Pay</label>
                </div>
                <div class="radio-inline">
                    <input name="radio-group-1537521564644" id="radio-group-1537521564644-3" required="required" aria-required="true" type="radio">
                    <label for="radio-group-1537521564644-3">Cheque</label>
                </div>
            </div>
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

            
    