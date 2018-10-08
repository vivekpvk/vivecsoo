<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
<div class="content-wrapper">
    <div class="row">
      <div class="content">
        <!-- <input type="button" class="btn btn-info" value="Add Product" onclick="location.href = '<?php echo base_url(); ?>admin/product/productadd';"> -->
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
                <table  id="pagin" class="table table-striped js-dataTable-full display">
                  <thead>
                    <tr>
                      <th>Keys</th>
                      <th>Vendor 1</th>
                      <th>Vendor 2</th>
                      <th>Vendor 3</th>
                      <th>Status</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($list as $post) 
                                    { ?>
                    <tr>
                      <td class="py-1"><?= $post->prod_name?></td>
                      <td class="py-1"><?= $post->vendor_code?></td>
                      <td class="py-1"><?= $post->vendor_code?></td>
                      <td class="py-1"><?= $post->vendor_code?></td>
                      <td><?php if($post->status == "1")
                          {
                            echo "Active";
                          }
                          else
                          {
                          echo "Inactive";
                           }
                      ?></td>
                      
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
         
        
