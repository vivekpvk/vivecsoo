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
                              Category List 
                            </h3>
                        </div>
                    <div class="col-md-12" style="padding-top: 20px;"></div>
                    <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Category Id</th>
                                        <th>Category Name</th>
                                        <th>Offer</th>
                                        <th>Created_At</th>
                                        <th>Modified_At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach ($list as $post) 
                                    { ?>
                                    <tr>
                                        <td><?= $post->id?></td>
                                        <td><?= $post->cat_name?></td>
                                        <td><?= $post->offer?></td>
                                        <td><?= $post->created_at?></td>
                                        <td><?= $post->modified_at?></td>
                                        
                                        <td><?php if($post->status == "1")
                                                {
                                                    echo "Active";
                                                }
                                                else
                                                {
                                                    echo "Inactive";
                                                }
                                            ?></td>
                                         <td>
                                            <a class="btn btn-default btn-rounded btn-condensed btn-sm" type="button" data-toggle="tooltip"  title="Edit" href="<?=base_url()?>index.php/admin/category/categoryadd/edit_cat/<?=$post->id?>"><i class="fa fa-pencil"></i></a>
                                             <!--<a class="btn btn-default btn-rounded btn-condensed btn-sm" data-toggle="tooltip" title="Add Sub Category" href="<?=base_url()?>index.php/admin/category/categoryadd/add_brand/<?=$post->id?>"><span title="Add Sub Category"class="fa fa-plus"></span></a>
                                            <a class="btn btn-default btn-rounded btn-condensed btn-sm"  data-toggle="tooltip" title="View Brand List" href="<?=base_url()?>index.php/admin/category/categoryadd/view_brand/<?=$post->id?>"><span title="View Brand List" class="fa fa-eye"></span></a>
                                            <?php if ($post->status == '1') { ?>
                                            <a href="<?= base_url() . 'account/category-status/'.$post->id.'/0'?>" data-toggle="tooltip" title="Inactive" class="btn btn-default btn-rounded btn-condensed btn-sm changestatus"><span  class="fa fa-ban" title="Inactive"></span></a>
                                            <?php } else { ?>
                                            <a href="<?= base_url() . 'account/category-status/'.$post->id.'/1'?>" data-toggle="tooltip" title="Active" class="btn btn-default btn-rounded btn-condensed btn-sm changestatus"><span class="fa fa-check-circle-o" title="Active"></span></a>
                                        <?php } ?> -->
                                            <a class="btn btn-danger btn-rounded btn-condensed btn-sm" href="<?=base_url()?>index.php/admin/category/categoryadd/delete_cat/<?=$post->id?>" data-href="" data-toggle="tooltip" title="" data-original-title="Delete" value="Delete">
                                            <span class="fa fa-times" title="delete"></span>
                                        </a>
                                    </td>
                                        
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
      
