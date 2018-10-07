<main id="main-container">
                <div class="content">
                    <div class="block">
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
                        <div class="block-header">
                            <h3 class="block-title col-lg-6" style="text-align: left;">
                              Admin List 
                            </h3>
                        </div>
                    <div class="col-md-12" style="padding-top: 20px;"></div>
                    <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
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
                                            <span class="fa fa-times" title="delete"></span>
                                        </a>
                                    </td>
                                   
                                </tr>
                                    <?php }  ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- <a style="padding-left: 20px;" href="<?php echo base_url(); ?>index.php/admin/login/logout">Logout</a>
            <a style="padding-left: 20px;" href="<?php echo base_url(); ?>index.php/admin/login/back">Back</a>  -->
       