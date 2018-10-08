<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
<style type="text/css">
    .rendered-form {
    max-width: 50%;
}
#more {display: none;}
.form-check.form-check-flat label .input-helper:before {
    border: 2px solid #b5b3b3;
}

</style>
<div class="content-wrapper">
  <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Your Details</h4>
          <form id="rendered-form" action="<?php echo base_url(); ?>admin/vendor/Vendordetail/addDetails"  method="post" enctype="multipart/form-data">
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
     <div class="row">
              <div class="col-md-6">                    


    <div class="rendered-form">
        <div class="fb-text form-group field-text-1537519809842">
            <label>Registered Business Name<span class="text-danger">*</span></label>
            <input type="text" pattern="[A-Za-z]+" placeholder="Enter Your Business Name" class="form-control" name="business_name" required="required">
        </div>
        <div class="fb-text form-group field-text-1537519809842">
            <label for="text-1537519458619" class="fb-text-label">Business Address<span class="text-danger">*</span></label>
            <input type="text" placeholder="Enter Your City Name" class="form-control" name="business_address" id="text-1537519458619" required="required" aria-required="true">
        </div>
        <div class="fb-text form-group field-text-1537519809842">
            <label for="text-1537519458619" class="fb-text-label">Registered Address<span class="text-danger">*</span></label>
            <input type="text" placeholder="Enter Your City Name" class="form-control" name="registered_address" id="text-1537519458619" required="required" aria-required="true">
        </div>


        <div class="form-group">
            <label class="control-label">Upload Company Logo<span class="text-danger">*</span></label>
                <div class="col-md-7">
                   <input class="form-control" type="file" name="logo_image"  multiple="true" required="required" id="myFile" />
                </div>
        </div>
        <div class="form-group">
            <label class="control-label">Upload Product Image<span class="text-danger">*</span></label>
                <div class="col-md-7">
                   <input class="form-control" type="file" name="pro_image" size="20" multiple="true" required="required" id="myFile"/>
                </div>
        </div>

       
        <div class="fb-text form-group field-text-1537519809842">
            <label for="text-1537519809842" class="fb-text-label">Telephone Number<span class="text-danger">*</span></label>
            <input type="tel" placeholder="Enter Your Telephone Number" class="form-control" name="telephone" id="text-1537519809842">
        </div>
        <div class="fb-text form-group field-text-1537519845136">
            <label for="text-1537519845136" class="fb-text-label">Website Address<span class="text-danger">*</span></label>
            <input type="text" pattern="https?://.+" placeholder="Enter Your Site Address" class="form-control" name="website" id="text-1537519845136">
        </div>
        <div class="fb-select form-group field-select-1537519896403">
            <label for="select-1537519896403" class="fb-select-label">Business Status<span class="text-danger">*</span></label>
            <select class="form-control" name="business_status" required="required" aria-required="true">
                <option disabled="null" selected="null">Select Your Business Status</option>
                <option value="Pvt Ltd">Pvt Ltd</option>
                <option value="Ltd">Ltd</option>
                <option value="Prop">Prop</option>
                <option value="Individual">Individual</option>
                <option value="Partnership">Partnership</option>
            </select>
        </div>
        <div class="fb-select form-group field-select-1537519962895">
            <label for="select-1537519962895" class="fb-select-label">Business Type<span class="text-danger">*</span></label>
            <select class="form-control" name="business_type" required="required" aria-required="true">
                <option disabled="null" selected="null">Select Your Business Type</option>
                <option value="Manufacturer">Manufacturer</option>
                <option value="Wholeseller">Wholeseller</option>
                <option value="Retailer">Retailer</option>
                <option value="Service">Service</option>
            </select>
        </div>
        <div class="fb-text form-group field-text-1537520029804">
            <label for="text-1537520029804" class="fb-text-label">Trade License Number<span class="text-danger">*</span></label>
            <input type="text" placeholder="Enter Your Trade License Number" class="form-control" name="license_number" required="required" aria-required="true">
        </div>

        <div class="form-group">
            <label class="control-label">Upload Trade License Image<span class="text-danger">*</span></label>
                 <div class="col-md-7">
                    <input class="form-control" type="file" name="license_image" size="20" multiple="true" required="required" id="myFile"/>

                    <!--<img id="previewimage" onclick="$('#uploadFile').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                    <input type="file" id="uploadFile" name="license_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  /> -->
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
                    <input name="iso" value="yes" type="radio">
                    <label for="radio-group-1537520093530-0">Yes</label>
                </div>
                <div class="radio-inline">
                    <input name="iso" value="no" type="radio">
                    <label for="radio-group-1537520093530-1">No</label>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="col-md-6">
        <div class="fb-date form-group field-date-1537520214884">
            <label for="date-1537520214884" class="fb-date-label">Valid Till<span class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Your Business Establishment Date" class="form-control" name="iso_valid" aria-required="true">
        </div>
   
        <div class="fb-radio-group form-group field-radio-group-1537520132643">
            <label for="radio-group-1537520132643" class="fb-radio-group-label">Quality Policy</label>
            <div class="radio-group">
                <div class="radio-inline">
                    <input name="quality_policy" value="yes" type="radio">
                    <label for="radio-group-1537520132643-0">Yes</label>
                </div>
                <div class="radio-inline">
                    <input name="quality_policy" value="no" type="radio">
                    <label for="radio-group-1537520132643-1">No</label>
                </div>
            </div>
        </div>
        <div class="fb-radio-group form-group field-radio-group-1537520161864">
            <label for="radio-group-1537520161864" class="fb-radio-group-label">Environment Policy</label>
            <div class="radio-group">
                <div class="radio-inline">
                    <input name="environ_policy" value="yes" type="radio">
                    <label for="radio-group-1537520161864-0">Yes</label>
                </div>
                <div class="radio-inline">
                    <input name="environ_policy" value="no" type="radio">
                    <label for="radio-group-1537520161864-1">No</label>
                </div>
            </div>
        </div>
        <div class="fb-date form-group field-date-1537520214884">
            <label for="date-1537520214884" class="fb-date-label">Establishment Date<span class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Your Business Establishment Date" class="form-control" name="establish_date" required="required" aria-required="true">
        </div>
        <!-- <div class="fb-text form-group field-text-1537520251736">
            <label for="text-1537520251736" class="fb-text-label">Years in Business</label>
            <input type="text" class="form-control" name="business_years">
        </div> -->
        <div class="fb-text form-group field-text-1537520504862">
            <label for="text-1537520504862" class="fb-text-label">GST Number<span class="text-danger">*</span></label>
            <input type="text" placeholder="Enter Your GST Number" class="form-control" name="gst_number" required="required" aria-required="true">
        </div>
        <!-- <div class="fb-file form-group field-file-1537520532500">
            <label for="file-1537520532500" class="fb-file-label">Upload GST Certificate Image<span class="fb-required">*</span></label>
            <input type="file" placeholder="Upload Your GST Certificate Image" class="form-control" name="file-1537520532500" multiple="true" id="file-1537520532500" required="required" aria-required="true">
        </div> -->
        <div class="form-group">
            <label class="control-label">Upload GST File<span class="text-danger">*</span></label>
                <div class="col-md-7">
                <input class="form-control" type="file" name="gst_image" size="20" multiple="true" required="required" id="myFile"/>

                    <!-- <img id="previewimage2" onclick="$('#gst').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                    <input type="file" id="gst" name="gst_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  /> -->
                </div>
        </div>
        <div class="fb-text form-group field-text-1537520573834">
            <label for="text-1537520573834" class="fb-text-label">Pan Card Number<span class="text-danger">*</span></label>
            <input type="text" placeholder="Enter Your PAN Card Number" class="form-control" name="pan_number" required="required" aria-required="true">
        </div>
        <!-- <div class="fb-file form-group field-file-1537520648335">
            <label for="file-1537520648335" class="fb-file-label">Upload Pan Card Image<span class="fb-required">*</span></label>
            <input type="file" placeholder="Upload Your PAN Card Image" class="form-control" name="file-1537520648335" multiple="true" id="file-1537520648335" required="required" aria-required="true">
        </div> -->

        <div class="form-group">
            <label class="control-label">Upload Pan Card<span class="text-danger">*</span></label>
                <div class="col-md-7">
                   <input class="form-control" type="file" name="pan_image" size="20" multiple="true" required="required" id="myFile"/>

                    <!-- <img id="previewimage3" onclick="$('#pan').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                    <input type="file" id="pan" name="pan_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  /> -->
                </div>
        </div>


        <div class="fb-text form-group field-text-1537520573834">
            <label for="text-1537520573834" class="fb-text-label">Aadhar Card Number<span class="text-danger">*</span></label>
            <input type="text" placeholder="Enter Your PAN Card Number" class="form-control" name="aadhar_number" required="required" aria-required="true">
        </div>
        <!-- <div class="fb-file form-group field-file-1537520648335">
            <label for="file-1537520648335" class="fb-file-label">Upload Pan Card Image<span class="fb-required">*</span></label>
            <input type="file" placeholder="Upload Your PAN Card Image" class="form-control" name="file-1537520648335" multiple="true" id="file-1537520648335" required="required" aria-required="true">
        </div> -->

        <div class="form-group">
            <label class="control-label">Upload Aadhar Card<span class="text-danger">*</span></label>
                <div class="col-md-7">
                <input class="form-control" type="file" name="aadhar_image" size="20" multiple="true" required="required" id="myFile"/>

                    <!-- <img id="previewimage4" onclick="$('#aadhar').click();" src="<?php echo base_url(); ?>images/product_image.gif" style="cursor: pointer;height: 210px;width: 210px;position: relative;z-index: 10;"/>
                    <input type="file" id="aadhar" name="aadhar_image" style="position: absolute; margin: 0px auto; visibility: hidden;" accept="image/*"  /> -->
                </div>
        </div>


       <!--  <div class="fb-select form-group field-select-1537520699928">
            <label for="select-1537520699928" class="fb-select-label">Product Category<span class="text-danger">*</span></label>
            <select class="form-control" name="category" id="cat" required="required" aria-required="true">
                <option disabled="null" selected="null">Select Your Product Category</option>
               
                <option value="<?php echo $post->id;?>"><?php echo $post->cat_name;?></option>
            </select>
        </div> -->
     
     
    <!-- SELECT * FROM `products` WHERE (vendor_1=0 || vendor_2=0 || vendor_3=0) -->
        <!-- <div class="fb-select form-group field-select-1537521285412">
            <label for="select-1537521285412" class="fb-select-label">Select Your Keywords<span class="text-danger">*</span></label>
            <select class="form-control" name="keywords[]" id="key" multiple="multiple" size="3">
                <option value=""></option>
            </select>
        </div> -->
    

      
      <!-- <div class="fb-select form-group field-select-1537521285412">
       <h2>Read More Read Less Button</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scel<span id="dots">...</span><span id="more">erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span></p>
<a onclick="myFunction()" id="myBtn">Read more</a>

</div> -->

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Terms And Conditions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
               
                <div class="modal-body mx-3">
                    <div >
                        <p>1)All payments must be made in the name of “Marc Resources” either thru chq payment / Online Transfers – bank details is as below;

Account Name            : Marc Resources

Bank Name                 : Kotak Mahindra Bank

IFSC Code                  : KKBK0000424

Bank Address : #8, Ground Floor, The Pinnacle, Koramangla 5th Block, Bangalore-560095.</p>

<p>2)Marc Resources is the sole owner of “bangaloreshopping.in” and none of the registered members have any ownership in the same.</p>

<p>3)All invoices must be paid within 4 working days from the date of issue of invoice, in case the payment is made online then the same must be communicated via email to “accounts@marcresources.co.in”</p>

<p>4)Invoices shall be sent thru email mode only, if any supplier needs the hard copies of the invoice then he may request for the same.</p>

<p>5)Marc Resources reserves the right to remove the registered supplier from “bangaloreshopping.in” without any refund for the payments made in below cases without any notice to registered supplier;

a.     Default in payments (delay over 4 working days from the date of invoice shall be treated as a default in payment, otherwise else approved by Marc Resources in writing. 

b.    Faulty products delivery – Limited to three exceptions due to logistics.

c.     Service Failures – limited to 5 complaints from registered customers.

d.    Any actions from suppliers side which may impact the goodwill of the company “Marc Resources” and its product “bangaloreshopping.in”

e.     Incomplete & Wrong information.</p>

<p>6)Only registered customers who have made purchase thru “bangaloreshopping.in” are authorized to give feedback on “bangaloreshopping.in” after due verification of purchase, no other feedback shall be entertained for star rating under the shopping umbrella.</p>

<p>7)Registers suppliers must share the web traffic statistics if demanded by “Marc Resources” for quality and branding enhancement, this data shall be purely confidential which shall enable “Marc Resources” to make necessary publicity / branding and the same shall lead to more business traffic.<p>

<p>8)All suppliers shall be registered online on “bangaloreshopping.in” for generation of Seller Reg number.</p>

<p>9)Marc Resources reserves the right to sell any advertisement and registered suppliers have no claim on the same.</p>

<p>10)Marc Resources doesn’t hold any liability on account of any end to end cost / expenses on product sales between Seller & Customer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <!-- <div class="form-check form-check-flat">
            <label class="form-check-label">
           <input type="checkbox"  class="form-check-input" required="required"/> I Read And I Accept The <a href="" data-toggle="modal" data-target="#modalRegisterForm">Terms and Conditions.</a>
           <i class="input-helper"></i></label>
        </div> -->
        <div class="form-check form-check-flat form-group" style="font-size: 13px;">
            <label class="form-check-label">
            <input type="checkbox" class="form-check-input" required="required">
            <i class="input-helper"></i></label>  I Read And I Accept The <a href="" data-toggle="modal" data-target="#modalRegisterForm">Terms and Conditions.</a>
            
        </div>
    </div>
        <br>

        <div class="form-group">
            <div class="col-md-7" colspan="2" style="text-align: center;">
                <input class="btn btn-success" type="submit" name="register" value="Submit Details">
            </div>
        </div>
    </div>
</form>
</div>
</div>

</div>
</div>
        <script>
$('document').ready(function()
{ 
  function readURL(input) {
    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                            $('#previewimage1').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
    }
  }
    $("#license").change(function(){
      readURL(this);
    });
  
});







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



//read more/less
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

//terms and conditions
  function checkForm(form)
  {
    ...
    if(!form.terms.checked) {
      alert("Please indicate that you accept the Terms and Conditions");
      form.terms.focus();
      return false;
    }
    return true;
  }

  //popup
  function myFunction() {
    var popup = document.getElementById("myTerms");
    popup.classList.toggle("show");
}

//file required
function myFunction() {
    var x = document.getElementById("myFile").required;
    //document.getElementById("demo").innerHTML = x;
}

</script>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>

            
    