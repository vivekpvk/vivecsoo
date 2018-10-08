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
                              <!-- <input type="button" class="btn btn-info btn pull-right" value="Verify Your Mobile" onclick="location.href = '<?php echo base_url(); ?>otp_send';"> -->
                                <h4 class="">Manage Your Profile</h4>
                                <?php
                                    foreach ($profile as $pro)
                                    {
                                    ?>
                                    <form class="form-horizontal"  method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/login/saveProfile">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">First Name<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" pattern="[A-Za-z]+" value="<?php echo $pro->first_name?>" name="firstname" placeholder="User Name" >
                                                 
                                                 <input type="hidden" value="<?php echo $pro->id;?>" name="pro_id" /> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Last Name<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" pattern="[A-Za-z]+" value="<?php echo $pro->last_name?>" name="lastname" placeholder="User Name" >
                                                 
                                                 <input type="hidden" value="<?php echo $pro->id;?>" name="pro_id" /> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Email<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input name="email" id="email" value="<?php echo $pro->email?>" class="form-control" required="required" aria-required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Your email address" type="email" spellcheck="false" size="30" placeholder="Email" />
                                                 
                                                 <input type="hidden" value="<?php echo $pro->id;?>" name="pro_id" /> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Mobile<span class="text-danger">*</span></label>
                                          <div class="row">
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" pattern="^\d{10}$" value="<?php echo $pro->mobile?>" id="mobile" name="mobile" placeholder="mobile" >
                                                 
                                                 <input type="hidden" value="<?php echo $pro->id;?>" name="pro_id" /> 

                                            </div>
                                        <div class="col-md-3">
                                          <input id="otp-btn" name="save" class="btn btn-primary" value="get otp" type="button" onclick="return formSubmit();" style="font-size:12px;padding:3px;"/>
                                          <input id="otp-txt" type="text" name="mobileotp" style="display:none;margin-right:5px;width:50p x;border-radius:5px;border:1px solid #ccc;"/>
                                          <button id="otp-submit" onclick="return formVerify();" class="btn btn-primary" type="button" style="display:none;font-size:12px;padding:3px;">Submit</button>
                                        </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                            <label class="col-md-2 control-label">Password<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input class="form-control" type="password" pattern=".{6,}" name="password" placeholder="Password" >
                                            </div>
                                        </div>
                                        
                                         
                                          
                                       <div class="form-group">
                                            <div class="col-md-8 col-md-offset-2">
                                                <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i> Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              <?php } ?>
                            </div>
                            <!-- END Main Dashboard Chart -->
                        </div>
                    </div>
                </div>
            </div>
                <!-- END Page Content -->
        </main>
    </div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#otp-btn").click(function(){
    $("#otp-txt").show();
    $("#otp-submit").show();
    $("#otp-btn").hide();
    });
    
});
  //otp
  //$("#theForm").ajaxSubmit({url: '<?php echo base_url();?>otp_send/message', type: 'post'})


//otp send
   function formSubmit(){
        //var mobile  = document.getElementById("mobile").value;
        var mobile  = $("input#mobile").val();
        var dataString = 'mobile='+ mobile;
        jQuery.ajax({
            url: "<?php echo base_url();?>otp_send/message",
            data: dataString,
            type: "POST",
            success: function(){
            alert("fgdsgdfg");

            },
            error: function (){}
        });
    return true;
    }

    //otp verify
    function formVerify(){
        //var mobile  = document.getElementById("mobile").value;
        var mobileotp  = $("input#mobileotp").val();
        var dataString = 'mobileotp='+ mobileotp;
        jQuery.ajax({
            url: "<?php echo base_url();?>otp_send/verify",
            data: dataString,
            type: "POST",
            success: function(){
            alert("saved");

            },
            error: function (){}
        });
    return true;
    }

   

</script>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>

      
