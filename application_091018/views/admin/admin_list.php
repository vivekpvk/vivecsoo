<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
<div class="content-wrapper">
    <div class="row">
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
                       </div>
                    </div>
                 </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">

            <div class="card-body">
              <h4 class="card-title">User List</h4>
              
              <div class="table-responsive">
                <table  id="user" class="table table-striped js-dataTable-full display">
                  <thead>
                    <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Role</th>
                                        <th>Password</th>
                                        <th>Created_At</th>
                                        <th>Updated_At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                    foreach ($users as $user)
                                    {
                                    
                                    ?>
                                    <tr>
                                        <td class="cell"><?php echo $user->id; ?> </td>
                                        <td class="cell"><?php echo $user->first_name; ?> </td>
                                        <td class="cell"><?php echo $user->last_name; ?> </td>
                                        <td class="cell"><?php echo $user->email; ?> </td>
                                        <td class="cell"><?php echo $user->mobile; ?> </td>
                                        <td><?php if($user->role == "1"){
                                                    echo "Admin";
                                                }
                                                elseif($user->role == "2"){
                                                    echo "User";
                                                }elseif($user->role == "3"){
                                                    echo "Subadmin";
                                                }else{
                                                    echo "Unverified";
                                                }
                                            ?>
                                              
                                          </td>
                                        <td class="cell"><?php echo $user->password; ?> </td>
                                        <td class="cell"><?php echo $user->created_at; ?> </td>
                                        <td class="cell"><?php echo $user->updated_at; ?> </td>
                                        <td class="cell"><?php if($user->status=1)
                                                              {
                                                            echo "Active";
                                                              }else{
                                                            echo "Not Active";
                                                              } ?> </td>
                                    <td>
                                        <a class="btn btn-danger btn-rounded btn-condensed btn-sm" href="<?=base_url()?>index.php/admin/Newadmin/DeleteAdmin/<?=$user->id?>" data-href="" data-toggle="tooltip" title="" data-original-title="Delete" value="Delete">
                                            <span class="fa fa-ban" title="delete"></span>
                                        </a>
                                    </td>
                                   
                                </tr>
                                    <?php }  ?>
                                    
                               </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#user').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
</script>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>


            <!-- <a style="padding-left: 20px;" href="<?php echo base_url(); ?>index.php/admin/login/logout">Logout</a>
            <a style="padding-left: 20px;" href="<?php echo base_url(); ?>index.php/admin/login/back">Back</a>  -->
       