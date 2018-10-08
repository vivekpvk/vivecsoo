<!DOCTYPE html> 
<html>
<head>
<title>Enter Your Otp</title>
</head>
<body>
<form method="post" action="<?php echo base_url();?>otp_send/verify">
<table width="600" border="1" cellspacing="5" cellpadding="5">
<!-- <tr>
<td width="230">First Name </td>
<td width="329"><input type="text" name="name"/></td>
</tr> -->

<tr>
<td>Otp </td>
<td><input type="number" name="otp"/></td>
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