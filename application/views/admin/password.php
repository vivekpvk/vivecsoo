<?php
require("header.php");
require("sidebar.php");
?>
<div class="card">
    <div class="card-body"> 
        <h4 class="">Change Password</h4>
        <form class="form-horizontal" action="<?php echo base_url(); ?>admin/user/updatepassword"  method="post" enctype="multipart/form-data">
            <input type="hidden" name="form" value="admin">
            <div class="form-group">
                <label class="col-md-2 control-label">Old Password<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="old_password" placeholder="Old Password" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">New Password<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="new_password" placeholder="New Password" >
                     
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Confirm Password<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="re_password" placeholder="Confirm Password" >
                </div>
            </div>
           <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fa fa-check"></i> Update Password</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require("footer.php");
?>