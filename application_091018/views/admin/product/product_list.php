<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
<div class="content-wrapper">
    <div class="row">
      <div class="content">
        <input type="button" class="btn btn-info" value="Add Product" onclick="location.href = '<?php echo base_url(); ?>admin/product/productadd';">
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
              <h4 class="card-title">Product List</h4>
              
              <div class="table-responsive">
                <table id="pagin" class="table table-striped js-dataTable-full display">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Category Id</th>
                      <th>Product Name</th>
                      <!-- <th>Product Image</th>
                      <th>Product Brand</th>
                      <th>Product URL</th>
                      <th>Product Company</th>
                      <th>Product Description</th>
                      <th>Product Specification</th> -->
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
                      <td class="py-1">
                        <?= $post->id?>
<!--                         <img src="../../images/faces-clipart/pic-1.png" alt="image">
 -->                      </td>
                      <td>
                        <?php foreach ($catlist as $cat) {
                                      if ($cat->id==$post->cat_id) {
                                        echo $cat->cat_name;
                                      }
                         }
                     ?>
                      </td>
                      <td>
                        <?= $post->prod_name?>
                      </td>
                     <!--  <td>
                        <img src="<?php echo base_url(); ?>upload/<?php echo $post->prod_image?>" alt="image">
                      </td>
                      <td>
                       <?= $post->prod_brand?>
                      </td>
                      <td>
                      <?= $post->prod_url?>
                      </td>
                      <td>
                      <?= $post->company?>
                      </td>
                      <td>
                     <?= $post->description?>
                      </td> 
                      <td>
                     <?= $post->specification?>
                      </td>-->
                      <td>
                     <?= $post->created_at?>
                      </td>
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
                                            <a class="btn btn-default btn-rounded btn-condensed btn-sm" type="button" data-toggle="tooltip"  title="Edit" href="<?=base_url()?>admin/product/productadd/edit_product/<?=$post->id?>"><i class="fa fa-pencil"></i></a>
                                             
                                            <a  class="delete btn btn-danger btn-rounded btn-condensed btn-sm" href="<?=base_url()?>admin/product/productadd/Delete_product/<?=$post->id?>" data-href="" data-toggle="tooltip" title="" data-original-title="Disable" value="Disable">
                                            <span class="fa fa-ban" title="disable"></span>
                                        </a>
                                    </td>
                               <?php } ?>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  </div>


</div>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>
         
        
