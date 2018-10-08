<!DOCTYPE html> 
<html>
<head>
<title>Registration form</title>
</head>
<style type="text/css">
	
input[aria-invalid="true"], textarea[aria-invalid="true"] {
  border: 1px solid #f00;
  box-shadow: 0 0 4px 0 #f00;
}



</style>
<body>
<form method="post" action="<?php echo base_url();?>otp_send/message">
<table width="600" border="1" cellspacing="5" cellpadding="5">
<!-- <tr>
<td width="230">First Name </td>
<td width="329"><input type="text" name="name"/></td>
</tr> -->
<tr>
<td>Phone </td>
<!-- <td><input type="text" id="mobile" name="mobile"/></td> -->
<td><input name="mobile"  id="mobile" type="number"></td>

</tr>
<tr>
<td>Email </td>
<td><input name="email" id="email" value="" required="required" aria-required="true" pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" title="Your email address" type="email" spellcheck="false" size="30" /></td>
</tr>

<!-- <tr>
<td>Email ID </td>
<td><input type="email" name="email"/></td>
</tr> -->
<tr>
<td colspan="2" align="center"><input type="submit" name="save" value="Save Data"/></td>
</tr>
</table>
</form>
</body>
</html>
<!-- <script type="text/javascript">
function check()
{

    var pass1 = document.getElementById('mobile');


    var message = document.getElementById('message');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";

    if(mobile.value.length!=10){

        mobile.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "required 10 digits, match requested format!"
    }}	


</script> -->
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