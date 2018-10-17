                </div>
            </div>
        </div>
    </main>
</div>

    <!-- partial:<?php echo base_url();?>partials/_footer.html -->
    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
          <a href="http://www.bootstrapdash.com/" target="_blank">Marc Resources</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
          <i class="mdi mdi-heart text-danger"></i>
        </span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo base_url();?>vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo base_url();?>vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?php echo base_url();?>js/off-canvas.js"></script>
<script src="<?php echo base_url();?>js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
</body>
</html>
<script>
  $(document).ready(function($) {
    $(".tr-click").click(function() {
        window.location = $(this).data("href");
    });
});
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
    $(".uploadFile").change(function(){
      readURL(this);
    });
  
});


$('document').ready(function()
{ 
  function readURL(input) {
    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                            $('#previewimage1').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
    }
  }
    $(".product").change(function(){
      readURL(this);
    });
  
});




$('document').ready(function()
{ 
  function readURL(input) {
    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                            $('#previewimage2').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
    }
  }
    $(".gst").change(function(){
      readURL(this);
    });
  
});


$('document').ready(function()
{ 
  function readURL(input) {
    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                            $('#previewimage3').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
    }
  }
    $(".pan").change(function(){
      readURL(this);
    });
  
});

$('document').ready(function()
{ 
  function readURL(input) {
    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                            $('#previewimage4').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
    }
  }
    $(".aadhar").change(function(){
      readURL(this);
    });
  
});



$('document').ready(function()
{ 
  function readURL(input) {
    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                            $('#previewimage5').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
    }
  }
    $(".license").change(function(){
      readURL(this);
    });
  
});

//pagination and confirmation to delete
$(document).ready(function() {
    $('#pagin').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );


$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});

</script>
<script>
//which fires the callback with a pre-converted target reference
function addEvent(node, type, callback) {
  if (node.addEventListener) {
    node.addEventListener(
      type,
      function(e) {
        callback(e, e.target);
      },
      false
    );
  } else if (node.attachEvent) {
    node.attachEvent("on" + type, function(e) {
      callback(e, e.srcElement);
    });
  }
}

//identify whether a field should be validated
//ie. true if the field is neither readonly nor disabled,
//and has either "pattern", "required" or "aria-invalid"
function shouldBeValidated(field) {
  return (
    !(field.getAttribute("readonly") || field.readonly) &&
    !(field.getAttribute("disabled") || field.disabled) &&
    (field.getAttribute("pattern") || field.getAttribute("required"))
  );
}

//field testing and validation function
function instantValidation(field) {
  //if the field should be validated
  if (shouldBeValidated(field)) {
    //the field is invalid if:
    //it's required but the value is empty
    //it has a pattern but the (non-empty) value doesn't pass
    var invalid =
      (field.getAttribute("required") && !field.value) ||
      (field.getAttribute("pattern") &&
        field.value &&
        !new RegExp(field.getAttribute("pattern")).test(field.value));

    //add or remove the attribute is indicated by
    //the invalid flag and the current attribute state
    if (!invalid && field.getAttribute("aria-invalid")) {
      field.removeAttribute("aria-invalid");
    } else if (invalid && !field.getAttribute("aria-invalid")) {
      field.setAttribute("aria-invalid", "true");
      //document.getElementById("ferror").innerHTML='only alphanumerics allowed';
    }
    
  }
}

//now bind a delegated change event
//== THIS FAILS IN INTERNET EXPLORER <= 8 ==//
//addEvent(document, 'change', function(e, target)
//{
//  instantValidation(target);
//});

//now bind a change event to each applicable for field
var fields = [
  document.getElementsByTagName("input"),
  document.getElementsByTagName("textarea")
];
for (var a = fields.length, i = 0; i < a; i++) {
  for (var b = fields[i].length, j = 0; j < b; j++) {
    addEvent(fields[i][j], "change", function(e, target) {
      instantValidation(target);
    });
  }
}
</script>

