<?php
require(FCPATH."/application/views/admin/header.php");
require(FCPATH."/application/views/admin/sidebar.php");
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Vendor</h4>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vendor Code</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $post){ ?>
                        <tr id="<?=$post->id?>" class="tr-click" data-href="<?php echo base_url();?>admin/vendor/edit/<?=$post->id?>">
                          <td class="py-1"><?= $post->id?></td>
                          <td class="py-1">BGRSP<?= $post->id?></td>
                          <td><?= $post->first_name?></td>
                          <td><?= $post->last_name?></td>
                          <td><?= $post->email?></td>
                          <td><?= $post->mobile?></td>
                          <td><?php if($post->status == 1){echo "Active";}else{echo "Inactive";} ?></td>
                        </tr>
                        </a>
                      <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>
         
        
