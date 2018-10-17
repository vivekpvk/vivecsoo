<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
    <input type="button" style="margin: 5px; 0px;" class="btn btn-info" value="Add Product" onclick="location.href = '<?php echo base_url(); ?>admin/product/add';">
      <div class="card">

        <div class="card-body">
          <h4 class="card-title">Product List</h4>
          
          <div class="table-responsive">
            <table id="pagin" class="table table-striped js-dataTable-full display">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Vendor Name 1</th>
                  <th>Vendor Name 2</th>
                  <th>Vendor Name 3</th>
                  <th>Created_At</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                 foreach ($list as $post) {?>
                    <tr id="<?=$post->id?>" class="tr-click" data-href="<?php echo base_url();?>admin/product/edit/<?=$post->id?>">
                        <td class="py-1"><?= $post->id?></td>
                        <td> <?= $post->cat_name?></td>
                        <td><?= $post->prod_name?></td>
                        <td><?= $post->username1?></td>
                        <td><?= $post->username2?></td>
                        <td><?= $post->username3?></td>
                        <td><?= $post->created_at?></td>
                        <td><?php if($post->status == "1"){echo "Active";}
                        else{echo "Inactive";}?></td>
                        <?php } ?>
                    </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>
         
        
