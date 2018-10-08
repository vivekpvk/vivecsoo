<?php
require("header.php");
require("sidebar.php");
?>
<div class="content-wrapper">
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

          
                     <h2 class="text-center"><img src="<?php echo base_url();?>images/logo_icon.png" style="height: 100px; padding-bottom: 15px;" alt="logo" /></h2>


<div class="col-md-8 col-sm-6 grid-margin stretch-card ">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="fluid-container">
                        <h4 class="font-weight-medium text-right mb-0 text-center">BENEFITS OF REGISTRATION</h4>
                      </div>
                      <br>
                    </div>
                    <div class="fluid-container" style="font-family: Times New Roman, Times, serif; font-size: large;">
                        <li>Customer Approach to Sellers Directly.</li>
                        <li>“No” sales commissions for the business partners, direct end to end dealing.</li>
                        <li>Goodwill Enhancement & Branding.</li>
                        <li>Enlarged Customer Base – more web traffic.</li>
                        <li>Increase in Market Share.</li>
                        <li>Bulk SEO keyword optimization on Google SERP Ranking.</li>
                        <li>Advertisement in Social Media.</li>
                        <li>Ease for customers to reach the quality suppliers for their needs.</li>
                        <li>Wide range of products & services with assured product availability.</li>
                        <li>Special promotions and greater product visibility.</li>
                        <li>Verified suppliers ( registration , physical existence & authorization’s).</li>
                        <li>Genuine products.</li>
                        <li>Seller Quality Control.</li>
                      </div>
                  
                  
                </div>
              </div>
            



  
       
</div>
          
<?php
require("footer.php");
?>