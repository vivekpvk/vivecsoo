<?php
require(FCPATH."/application/views/admin/vendor/header.php");
require(FCPATH."/application/views/admin/vendor/sidebar.php");
?>
<style type="text/css">
    .rendered-form {
    max-width: 50%;
}
#more {display: none;}


</style>
<div class="card">
    <div class="card-body">  
        <h4>Selected Your Keys</h4>
        <div class="table-responsive">
            <table  id="pagin" class="table table-striped js-dataTable-full display">
                <thead>
                    <tr>
                        <th>Keys</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                 <?php foreach ($lists as $list) { ?>
                    <tr>
                        <td class="py-1"><?= $list->prod_name?></td>
                        <td><?php if($list->status == "1"){echo "Active";}else{echo "Inactive";}?></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br>
        <h4>Please select Your Keys</h4>                      
        <form id="rendered-form" action="<?php echo base_url(); ?>admin/vendor/updatekey"  method="post" enctype="multipart/form-data">
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
<script>
$('#cat').change(function() { 
    $('#key').find('option').remove().end().append('<option value=""></option>'); //resettin the option
    var key_id = $(this).val();
    if(key_id==''){
        return;
    }
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>admin/vendor/getkeys?id="+key_id,
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

            
    