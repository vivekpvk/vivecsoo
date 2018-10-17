<?php
class Otp_Model extends CI_Model {
    
    public function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    protected function _sendRequestCurl($mobiles,$message) {
        $authKey    = "8B3FD73165C76BB6AB3E"; 
        $route      = "route=4";
        // Prepare you post parameter
        $postData = array('authkey'     => $authKey,
                          'mobiles'     => $mobiles,
                          'message'     => $message,
                          'sender'      => "ONETST",
                          'route'       => $route
        );
        $url            = "https://control.msg91.com/api/sendhttp.php";
        $ch             = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL             => $url,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_POST            => true,
            CURLOPT_POSTFIELDS      => $postData,
            CURLOPT_FOLLOWLOCATION  => true
        ));
        // Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // get response
        $output                     = curl_exec($ch);
        $error                      = curl_error($ch);
        curl_close($ch);
        $result["code"]             = 400;
        $result["msg"]              = $error;
        if(empty($error)) {
            $result["code"]         = 200;
            $result["msg"]          = "successfully sent...";
            $result["res"]          = $output;
        }
        return $result;
    }

    public function sendOtp($data) {
        $message    = "The one time otp is ".$data["otp"];
        return $this->_sendRequestCurl($message,$data["mobile"]);
    }

    public function get($username) {
        $this->db->select('*');
        $this->db->from('otp');
        $this->db->where('username="'.$username.'"');
        $this->db->where('status = 0');
        $this->db->order_by('id',"desc")->limit(1);
        $query = $this->db->get()->row();
        return $query;
    }

    public function setStatus($id) {
        $this->db->where('id',$id);
        $data       = array('status' => 1);
        $result     = $this->db->update('otp',$data);
        return $result;
    }

    public function getValidate($post) {
        $result             = array();
        $result["code"]     = 400;
        $result["msg"]      = "Invalid otp...";
        $getOtp             = $this->Otp_Model->get($post["username"]);
        if(empty($getOtp->id) || $post["token"] != $getOtp->token || $post["otp"] != $getOtp->otp) {
            return $result;
        }
        //checking the time validation
        $time = new DateTime($getOtp->created_at);
        $diff = $time->diff(new DateTime());
        $minutes = (($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i);
        if($minutes > 15) {
            $result["msg"] = "OTP has expired...";
            return $result;
        }
        $this->setStatus($getOtp->id);
        $result["code"]     = 200;
        return $result;
    }

    //4 function common for all models list,add,delete,update
    public function create($post){
        $otpNo             = $this->random_str(4);
        $otpToken          = $this->random_str(12);
        $data              = array("username"       => $post["username"],
                                   "otp"            => $otpNo,
                                   "status"         => 0,
                                   "created_at"     => date("Y-m-d H:i:s"),
                                   "token"          => $otpToken
                            );
        $result             = array();
        $result["msg"]      = "Unable to send the otp...";
        $result["code"]     = 400;
        $result["token"]    = $otpToken;
        $this->load->database();
        if($this->db->insert('otp',$data)) {
            $sentOtp             = false;
            //add here your sms code 
            if($post["field"] == "mobile") {
                //add sms code here then check success or not
                $message        = $this->sendOtp(array('mobile'=>$post["username"],'otp'=>$otpNo));
                $sentOtp        = true;
            }else{
                //add email code here then check success or not
                $sentOtp         = true;
            }
            if($sentOtp) {
                $result["msg"]      = "Successfully sent...";
                $result["code"]     = 200;
            } 
        }
        return $result;
    }

    public function update($data) {
        $result     = false;
        if(empty($data['username'])) {
            return $result;
        }
        $otp        = $this->get($data['username']);
        if(!empty($otp->id)) {
            $this->db->where('username',$otp->username);
            $result = $this->db->update('otp',$data);
        } 
       return $result;
    }

    public function random_str($length, $keyspace = '0123456789') {
        $str        = '';
        $max        = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str    .= $keyspace[mt_rand(0, $max)];
        }
        return $str;
    } 
}