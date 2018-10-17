<?php

/**
 * Textlocal API2 Wrapper Class
 *
 * This class is used to interface with the Textlocal API2 to send messages, manage contacts, retrieve messages from
 * inboxes, track message delivery statuses, access history reports
 *
 * @package    Textlocal
 * @subpackage API
 * @author     Andy Dixon <andy.dixon@tetxlocal.com>
 * @version    1.4-IN
 * @const      REQUEST_URL       URL to make the request to
 * @const      REQUEST_TIMEOUT   Timeout in seconds for the HTTP request
 * @const      REQUEST_HANDLER   Handler to use when making the HTTP request (for future use)
 */
class Sms
{
	const REQUEST_URL = 'https://api.textlocal.in/';
	const REQUEST_TIMEOUT = 60;
	const REQUEST_HANDLER = 'curl';
	/**
	 * Curl request handler
	 * @param $command
	 * @param $params
	 * @return mixed
	 * @throws Exception
	 */

	protected function _sendRequestCurl($mobiles,$message) {
		$authKey 	= "8B3FD73165C76BB6AB3E"; 
		$route 		= "route=4";
		// Prepare you post parameter
		$postData = array('authkey' 	=> $authKey,
						  'mobiles' 	=> $mobiles,
						  'message' 	=> $message,
						  'sender' 		=> "ONETST",
						  'route' 		=> $route
		);
		$url 			= "https://control.msg91.com/api/sendhttp.php";
		$ch 			= curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL 			=> $url,
			CURLOPT_RETURNTRANSFER 	=> true,
			CURLOPT_POST 			=> true,
			CURLOPT_POSTFIELDS 		=> $postData,
			CURLOPT_FOLLOWLOCATION 	=> true
		));
		// Ignore SSL certificate verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		// get response
		$output 					= curl_exec($ch);
		$error 						= curl_error($ch);
		curl_close($ch);
		$result["code"] 			= 400;
		$result["msg"] 				= $error;
		if(empty($error)) {
			$result["code"] 		= 200;
			$result["msg"] 			= "successfully sent...";
			$result["res"] 			= $output;
		}
		return $result;
	}

	public function sendOtp($data) {
		$message 	= "The one time otp is ".$data["otp"];
		return $this->_sendRequestCurl($message,$data["mobile"]);
	}
}


