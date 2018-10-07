<main id="main-container">
    <div class="content">
                    <div class="row">
                       <div class="col-lg-12">
                           <?php
                                 echo "<div class='error_msg'>";
                                 if (isset($error_message)) {
                                   //echo $error_message;
                                 }
                                 echo validation_errors();
                                 echo "</div>";
                                ?>
                                <?php
                                 echo "<div class='success_msg'>";
                                 if (isset($success_message)) {
                                   echo $success_message;
                                 }
                                 echo "</div>";
                            ?>
                       </div>
                    </div>
                 </div>
                <div class="content">
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title col-lg-6" style="text-align: left;">
                              User List 
                            </h3>
                        </div>
                    <div class="col-md-12" style="padding-top: 20px;"></div>
                    <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Mobile</th>
                                        <th>Created_By</th>
                                        <th>Created_At</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach ($list as $post) 
                                    { ?>
                                    <tr>
                                        <td><?= $post->id?></td>
                                        
                                        <td><?= $post->user_name?></td>
                                        <td><?= $post->user_email?></td>
                                        <td><?= $post->user_mobile?></td>
                                        <td><?php if($post->created_by == "1")
                                                {
                                                    echo "Admin";
                                                }
                                                else
                                                {
                                                    echo "User";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $post->created_at?></td>
                                        
                                        <td><?php if($post->status == "0")
                                                {
                                                    echo "Active";
                                                }
                                                else
                                                {
                                                    echo "Inactive";
                                                }
                                            ?></td>
                                         
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- <a style="padding-left: 20px;" href="<?php echo base_url(); ?>index.php/admin/login/logout">Logout</a>
            <a style="padding-left: 20px;" href="<?php echo base_url(); ?>index.php/admin/login/back">Back</a>  -->
      
