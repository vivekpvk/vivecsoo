 <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-right">
                    Copyright @2018 by <b>Marc Resources</b>
                </div>
<!--                <div class="pull-left">
                    <a class="font-w600" href="http://goo.gl/6LF10W" target="_blank">OneUI 1.4</a> &copy; <span class="js-year-copy"></span>
                </div>-->
</footer>            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <script src="<?php echo base_url(); ?>/assets/js/core/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/core/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/core/jquery.appear.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/core/js.cookie.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?php echo base_url(); ?>/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url(); ?>/assets/js/pages/base_tables_datatables.js"></script>
        
        
        <script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>

    </body>
</html>
<script>
$('document').ready(function()
{ 
  function readURL(input) {
    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                            $('#previewimage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
    }
  }
    $("#uploadFile").change(function(){
      readURL(this);
    });
  
});
</script>



