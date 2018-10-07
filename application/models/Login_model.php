<?php
class Login_model extends CI_Model {

	public function login($email,$password)
	{
            $this -> db -> select(' * ');
            $this -> db -> from('user');
            $this -> db -> where('email', $email);
            $this -> db -> where('password', $password);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            return $query;
	}

	 function verify_admin($email, $password) 
        {
            $query=$this->db->query("SELECT * FROM user WHERE email = '$email' AND password = '$password' limit 1 ");
            $result = $query->row_array();
            if ($query->num_rows() > 0)
            {
                return($result);
            }
            else 
            {
                return false;
            }
        }
    public function user_profile($id){
            $this->db->select(' * ');
            $this->db->from('user');
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->result();

        }

    public function otpVerify($otp){
            $mobile         = $this->session->userdata('mobile');
            $this->db->select(' * ');
            $this->db->from('user');
            $this->db->where('mobile_otp',$otp);
            $this->db->where('mobile',$mobile);
            $query = $this->db->get();
            return $query->result();

        }

    public function saveOtp($mobileNumber)
        {
        $userId = $this->session->userdata('userid');
        $this->db->set('mobile',$mobileNumber);
        $this->db->where('id',$userId);
        $query  = $this->db->update('user');

        $otp         = $this->session->userdata('mobile_otp');
        $this->db->where('mobile',$mobileNumber);
        $this->db->set('mobile_otp',$otp);
        $query = $this->db->update('user');
        return true;
    }
    //update personal detail from account management
    public function save_profile($pro_id,$data)
        {
        $this->db->where('id',$pro_id);
        $query = $this->db->update('user',$data);
        return true;
    }
    public function checkPassword($pro_id,$password)
        {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $pro_id);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->result();
         
    }
    public function getVendorCount(){
        $this->db->select('COUNT(*) as count_rows');
        $this->db->from('user');
        $this->db->where('role', 2);
        $query = $this->db->get();
        return $query->row_array();
         }
    public function getCustomer(){
        $this->db->select('COUNT(*) as count_rows');
        $this->db->from('customer');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row_array();
         }
    public function getVendor(){
        $userId     = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->where('user_id', $userId);
        $query = $this->db->get();
        return $query->result();
         }
         //forgot password start
    public function ForgotPassword($email){
        $this->db->select('email');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query=$this->db->get();
        return $query->row_array();
         }
    public function sendpassword($data)
{
    $email = $data['email'];
    $query1=$this->db->query("SELECT *  from user where email = '".$email."' ");
    $row=$query1->result_array();
    if ($query1->num_rows()>0)
{
        $passwordplain = "";
        $passwordplain  = rand(100000,999999);
        //echo  $passwordplain;die();
        $newpass['password'] = md5($passwordplain);
        $this->db->where('email', $email);
        $this->db->update('user', $newpass);
        $mail_message='Dear '.$row[0]['first_name'].','. "\r\n";
        $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
        $mail_message.='<br>Please Update your password.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Your company name';
        /*require '<?php echo base_url();?>third_party\phpmailer\PHPMailerAutoload.php';
        require 'class.phpmailer.php';*/
        require('PHPMailer/src/Exception.php');
        require('PHPMailer/src/PHPMailer.php');
        require('PHPMailer/src/SMTP.php');
        /*$mail = new PHPMailer;
        $mail->IsSendmail();*/
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        //$mail->IsSMTP();
        //$mail->IsSendmail();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host     = "smtp.gmail.com";
        $subject        = 'Testing Email';
        $mail->AddAddress($email);
        $mail->IsMail();
        $mail->From     = 'admin@gmail.com';
        $mail->FromName = 'admin';
        $mail->IsHTML(true);
        $mail->Subject  = $subject;
        $mail->Body     = $mail_message;
        $mail->Send();
        if (!$mail->send()) {

            echo "<script>alert('Failed to send password, please try again!')</script>";
        } else {

            echo "<script>alert('Password sent to your email!')</script>";
        }
            redirect('admin/Forgotpassword','refresh');
    }
    else
    {

        echo "<script>alert('Email not found try again!')</script>";
        redirect('admin/Forgotpassword','refresh');
    }
}
//forgotpassword end
}



