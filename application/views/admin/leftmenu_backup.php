<main id="main-container">
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
                <div class="content">
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title col-lg-6" style="text-align: left;">
                              Product List 
                            </h3>
                        </div>
                    <div class="col-md-12" style="padding-top: 20px;"></div>
                    <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Id</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Brand</th>
                                        <th>Product URL</th>
                                        <th>Product Company</th>
                                        <th>Product Description</th>
                                        <th>Product Specification</th>
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
                                        <td><?= $post->cat_id?></td>
                                        <td><?= $post->prod_name?></td>
                                        <td><img id="previewimage" src="<?php echo base_url(); ?>upload/<?php echo $post->prod_image?>"  alt="image" style="cursor: pointer;height: 50px;width: 210px;position: relative;z-index: 10;"/></td>
                                        <td><?= $post->prod_brand?></td>
                                        <td><?= $post->prod_url?></td>
                                        <td><?= $post->company?></td>
                                        <td><?= $post->description?></td>
                                        <td><?= $post->specification?></td>
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
                                            <a class="btn btn-default btn-rounded btn-condensed btn-sm" type="button" data-toggle="tooltip"  title="Edit" href="<?=base_url()?>admin/product/edit_product/<?=$post->id?>"><i class="fa fa-pencil"></i></a>
                                             
                                            <a class="btn btn-danger btn-rounded btn-condensed btn-sm" href="<?=base_url()?>admin/product/Delete_product/<?=$post->id?>" data-href="" data-toggle="tooltip" title="" data-original-title="Delete" value="Delete">
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