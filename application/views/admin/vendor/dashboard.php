<?php
require(FCPATH."/application/views/admin/vendor/header.php");
require(FCPATH."/application/views/admin/vendor/sidebar.php");
?>
            <!-- Main Container -->
<main id="main-container" style="background: #ffffff;">
    <!-- Page Header -->
    <div class="content bg-image overflow-hidden" style="background-image: url('<?php echo base_url(); ?>/assets/img/photos/photo3@2x.jpg');">
        <div class="push-50-t push-15">
            <h1 class="h2 text-white animated zoomIn"> Vendor Dashboard</h1>
            <h2 class="h5 text-white-op animated zoomIn">Welcome Vendor</h2>
        </div>
    </div>
    <!-- END Page Header -->
    <!-- Stats -->
    <div class="content bg-white border-b">
        <div class="row items-push text-uppercase">
            <div class="col-xs-6 col-sm-3">
                <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" >0</a>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="font-w700 text-gray-darker animated fadeIn">Total Sales</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" >0</a>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="font-w700 text-gray-darker animated fadeIn">Total Earnings</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" >
                 Rs.                                </a>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="font-w700 text-gray-darker animated fadeIn">Average Sale</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" ></a>
            </div>
        </div>
    </div>
</main>
<?php
require(FCPATH."/application/views/admin/footer.php");
?>