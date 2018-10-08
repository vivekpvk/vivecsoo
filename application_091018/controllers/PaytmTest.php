<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaytmTest extends CI_Controller {

function paytm()
{
  $this->load->view('TxnTest');
}


function paytmpost()
{
 header("Pragma: no-cache");
 header("Cache-Control: no-cache");
 header("Expires: 0");

 // following files need to be included
 require_once(APPPATH . "/libraries/lib/config_paytm.php");
 require_once(APPPATH . "/libraries/lib/encdec_paytm.php");

 $checkSum = "";
 $paramList = array();

 $ORDER_ID = $_POST["ORDER_ID"];
 $CUST_ID = $_POST["CUST_ID"];
 $INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
 $CHANNEL_ID = $_POST["CHANNEL_ID"];
 $TXN_AMOUNT = $_POST["TXN_AMOUNT"];

// Create an array having all required parameters for creating checksum.
 $paramList["MID"] = PAYTM_MERCHANT_MID;
 $paramList["ORDER_ID"] = $ORDER_ID;
 $paramList["CUST_ID"] = $CUST_ID;
 $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
 $paramList["CHANNEL_ID"] = $CHANNEL_ID;
 $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
 $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

 /*
 $paramList["MSISDN"] = $MSISDN; //Mobile number of customer
 $paramList["EMAIL"] = $EMAIL; //Email ID of customer
 $paramList["VERIFIED_BY"] = "EMAIL"; //
 $paramList["IS_USER_VERIFIED"] = "YES"; //

 */

//Here checksum string will return by getChecksumFromArray() function.
 $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
 echo "<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
    <center><h1>Please do not refresh this page...</h1></center>
        <form method='post' action='".PAYTM_TXN_URL."' name='f1'>
<table border='1'>
 <tbody>";

 foreach($paramList as $name => $value) {
 echo '<input type="hidden" name="' . $name .'" value="' . $value .         '">';
 }

 echo "<input type='hidden' name='CHECKSUMHASH' value='". $checkSum . "'>
 </tbody>
</table>
<script type='text/javascript'>
 document.f1.submit();
</script>
</form>
</body>
</html>";
 } 
}