<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
<div class="card">
    <div class="card-body"> 
        <h4 class="">Manage Your Profile</h4>
            <div id="alert-success" class=" alert-success" style="margin: 5px;"></div>
            <div  id="alert-danger" class=" alert-danger" style="margin: 5px;"></div>
            <div id="block-one">
                <div class="form-group">
                    <label class="col-md-2 control-label">Change your mobile/email ?<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <select class="form-control" name="field" id="field">
                            <option value="email"><?php echo $profile->email?></option>
                            <option value="mobile"><?php echo $profile->mobile?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">New Mobile/Email<span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-md-7">
                            <input class="form-control" type="text" id="username" name="username" required="required">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-md-2 control-label">Enter Your Password<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="password" pattern=".{6,}" id ="password" name="password" placeholder="Password" required="required">
                        </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <button class="btn btn-sm btn-primary" name="submit" type="submit" onclick="getOtp();"><i class="fa fa-check"></i> Get Otp</button>
                    </div>
                </div>
            </div>
            <div id="block-otp">
                <div class="form-group">
                    <label class="col-md-2 control-label">Enter your otp<span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-md-7">
                            <input class="form-control" type="text" id="otp" name="otp">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <button class="btn btn-sm btn-primary" name="submit" type="submit" onclick="getUpdate();"><i class="fa fa-check"></i> Update Profile</button>
                        <button class="btn btn-sm btn-primary" name="submit" type="submit" onclick="getOtp();"><i class="fa fa-check"></i> Resend</button>
                    </div>
                </div>
            </div>
        </div>
</div>                    
<script type="text/javascript">
//otp send
   var token                = "";
   function getOtp(){
        var username        = $('#username').val();
        var field           = $('#field').val();
        var password        = $('#password').val();
        $('#loader').show();
        $("#alert-danger").html("");
        $("#alert-success").html("");
        var mobileFilter    = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        var emailFilter     = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var err = "";
        if(username.length!=10 && field=="mobile" && !mobileFilter.test(username)){
            err += "Please enter proper mobile no...";
        }else if(field=="email" && !emailFilter.test(username)) {
            err += "Please enter proper email id...";
        }
        if(password=="") {
            err += "Please enter password...";
        }
        //checking the error msg 
        if(err=="") {
            jQuery.ajax({
                url: "<?php echo base_url();?>admin/user/checkcredentials",
                data: {field:field,username:username,password:password},
                type: "POST",
                success: function(response){
                    var response = JSON.parse(response);
                    if(response.code==200){
                        token = response.token;
                        $( "#alert-success").html(response.msg);
                        //success
                        $('#block-otp').show();
                        $('#block-one').hide();
                    } else {
                        $( "#alert-danger" ).html(response.msg);
                    }
                }
            });
        }else{
            $( "#alert-danger" ).html(err);
        }
        $('#loader').hide();
   }

    function getUpdate() {
        var username        = $('#username').val();
        var field           = $('#field').val();
        var password        = $('#password').val();
        var otp             = $('#otp').val();
        $("#loader").show();
        $("#alert-danger").html("");
        var mobileFilter    = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        var emailFilter     = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var err = "";
        if(username.length!=10 && field=="mobile" && !mobileFilter.test(username)){
            err += "Please enter proper mobile no...";
        }else if(field=="email" && !emailFilter.test(username)) {
            err += "Please enter proper email id...";
        }
        if(password=="") {
            err += "Please enter password...";
        }
        if(otp=="") {
            err += "Please enter otp...";
        }
        //checking the error msg 
        if(err=="") {
            jQuery.ajax({
                url: "<?php echo base_url();?>admin/user/updatecredentials",
                data: {field:field,username:username,password:password,otp:otp,token:token},
                type: "POST",
                success: function(response){
                    var response = JSON.parse(response);
                    if(response.code==200){
                        //success
                        $( "#alert-success").html(response.msg);
                        $('#block-otp').hide();
                        $('#block-one').show();
                    } else {
                        $( "#alert-danger" ).html(response.msg);
                    }
                }
            });
        }else{
            $( "#alert-danger" ).html(err);
        }
        $('#loader').hide();
   }

   

</script>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>

      
