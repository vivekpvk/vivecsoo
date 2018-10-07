<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
<style type="text/css">
    .rendered-form {
    max-width: 50%;
}
#more {display: none;}


</style>
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
                <h4>Select Your Key And Continue For Payment</h4>                      
                <form id="rendered-form" action="<?php echo base_url(); ?>admin/vendor/Vendordetail/updateKey"  method="post" enctype="multipart/form-data">
                   <div class="rendered-form">
                        <div class="fb-select form-group field-select-1537520699928">
                        <label for="select-1537520699928" class="fb-select-label">Product Category<span class="text-danger">*</span>
                        </label>
                            <select class="form-control" name="category" id="cat" required="required" aria-required="true">
                                <option disabled="null" selected="null">Select Your Product Category</option>
                                 <?php 
                                    foreach ($posts as $post) {?>
                                <option value="<?php echo $post->id;?>"><?php echo $post->cat_name;?></option>
                              <?php } ?>
                            </select>
                        </div> 
     
    <!-- SELECT * FROM `products` WHERE (vendor_1=0 || vendor_2=0 || vendor_3=0) -->
                       <div class="fb-select form-group field-select-1537521285412">
                            <label for="select-1537521285412" class="fb-select-label">Select Your Keywords<span class="text-danger">*</span></label>
                            <select class="form-control" name="keywords[]" id="key" multiple="multiple" size="3">
                                <option value=""></option>
                            </select>
                        </div> 

                        <div class="fb-text form-group field-text-1537520573834">
                            <label for="text-1537520573834" class="fb-text-label">Payment Mode<span class="text-danger">*</span></label>
                            
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
                                    <label for="radio-group-1537521564644-2">PayTm</label>
                                </div>
                                <div class="radio-inline">
                                    <input name="radio-group-1537521564644" required="required" aria-required="true" type="radio">
                                    <label for="radio-group-1537521564644-3">Cheque</label>
                                </div>
                            </div>
                        </div>
      
                        <div class="form-group">
                            <div class="col-md-7" colspan="2" style="text-align: center;">
                                <input class="btn btn-success" type="submit" name="register" value="Pay Now">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END Main Dashboard Chart -->
</div>

</div>

</div>
<!-- END Page Content -->
</main>
</div>
<script>
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

</script>

<?php
require(FCPATH."/application/views/admin/footer.php");
?>

            
    