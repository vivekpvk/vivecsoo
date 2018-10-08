<?php 
class Otp_send extends CI_Controller 
{
public function __construct()
{
//call CodeIgniter's default Constructor
parent::__construct();
$this->load->model('User_Model');
}
public function index(){
$this->load->view('sign_up');	
}
public function voice(){
$this->load->view('voice_search');	
}
public function message()
{
//load registration view form

//Check submit button 
//if($this->input->post('save'))
//{
$mobile = $this->input->post("mobile");
//$email  = $this->input->post("email");

$this->session->set_userdata('mobile',$mobile);
//$user_message=$this->input->post("message");
//Your authentication key
$authKey = "8B3FD73165C76BB6AB3E";//"6gds7p61a52v92b36d61sqem4klx2qjs"; //"3456655757gEr5a019b18";
//Multiple mobiles numbers separated by comma
$mobileNumber = $mobile; //Sender ID,While using route4 sender id should be 6 characters long. 
$senderId = "ONETST"; //Your message to send, Add URL encoding here. 
$rndno=rand(1000, 9999); 
$message = urlencode("OTP number.".$rndno); //Define route 
$route = "route=4";
//Prepare you post parameters
$postData    = array(
'authkey'    => $authKey,
'mobiles'    => $mobileNumber,
'message'    => $message,
'sender'     => $senderId,
'route'      => $route,
//'email'      => $email,
'otp_expiry' => 1
);

//echo $mobileNumber;

//echo $postData->route;
print_r($postData);
//API URL
$url="https://control.msg91.com/api/sendhttp.php";
//$url ="http://control.msg91.com/api/sendotp.php?template=&otp_length=&authkey=&message=&sender=&mobile=&otp=&otp_expiry=&email=";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}else{
curl_close($ch);
//echo "OTP Sent Successfully !";
//$now = date("h:i");
$this->session->set_userdata('mobile_otp',$rndno);

$saveotp  = $this->User_Model->saveOtp($mobileNumber);
if ($saveotp) {
	$this->session->set_tempdata('mobile_otp', $rndno, 600);

	redirect('admin/login/userProfile');
}else{
	$this->session->set_flashdata('error_msg', 'Try Again.');
	$this->load->view('admin/register');
}

      }
   //}
  }

public function verify(){
$otp     = $this->input->post("mobileotp");
echo $otp; die();
$verify  = $this->User_Model->otpVerify($otp);	
if ($verify) {
	$this->session->set_flashdata('success_msg', 'Otp Verified Successfully.');
	redirect('admin/login/userProfile');
}else{
	$this->session->set_flashdata('error_msg', 'Otp Verification Failed.');
	$this->load->view('admin/register');
}


}

}
?>