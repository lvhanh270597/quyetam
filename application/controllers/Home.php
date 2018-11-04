<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public $all_trips;
    public $all_need_trips;
    public $limit_per_page, $max;

    public function __construct(){
        parent::__construct();                
        $this->load->helper('array');
        $this->all_need_trips = $this->needed_trip_ml->get_newest(true);
        $this->all_trips = $this->trip_ml->get_newest(true);             
        $this->limit_per_page = 12;

        $size1 = isset($this->all_trips) ? count($this->all_trips) : 0;
        $size2 = isset($this->all_need_trips) ? count($this->all_need_trips) : 0;
        $this->max = max($size1, $size2);
        $this->max = intdiv($this->max, $this->limit_per_page) + ($this->max % $this->limit_per_page != 0);
    }       
    
    public function index(){                    
        $data = array(
            'trips' => get_slice($this->all_trips, 0, $this->limit_per_page),
            'needed_trips' => get_slice($this->all_need_trips, 0, $this->limit_per_page),
            'index' => 1,
            'max' => $this->max
        );
        display('home', $data);
    }

    public function pages($index){
        echo $index;
        $from = ((int)$index - 1) * $this->limit_per_page;
        $len = $this->limit_per_page;
        echo $from.' '.$len;
        $data = array(
            'trips' => get_slice($this->all_trips, $from, $len),
            'needed_trips' => get_slice($this->all_need_trips, $from, $len),
            'index' => $index,
            'max' => $this->max
        );
        display('home', $data);
    }

    public function page_not_found(){        
        display('pnf', []);
    }

    public function send1(){               
        // Set up parameters
        $to = "lvhanh.270597@gmail.com";
        $subject = "Your password";
        $message = "<p>Hello Homer,</p>
        <p>Thanks for registering.</p>
        <p>Your password is: <b>springfield</b></p>
        ";
        $from = "contact@together.easyhere.cf";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= "From: $from" . "\r\n";

        // Send email
        if (mail($to,$subject,$message,$headers)){
            // Inform the user
            echo "Thanks for registering! We have just sent you an email with your password.";
        }
        else{
            echo "FUCK";
        }
    }     
    public function send2(){               
        // Set up parameters
        $to = "contact@together.easyhere.cf";
        $subject = "Your password";
        $message = "<p>Hello Homer,</p>
        <p>Thanks for registering.</p>
        <p>Your password is: <b>springfield</b></p>
        ";
        $from = "ian@example.com";
        $headers = "MIME-Version: 1.0" . "\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
        $headers .= "From: $from" . "\n";

        // Send email
        if (mail($to,$subject,$message,$headers)){
            // Inform the user
            echo "Thanks for registering! We have just sent you an email with your password.";
        }
        else{
            echo "FUCK";
        }
    }     

    public function send3(){
        $email = "lvhanh.270597@gmail.com";
        require_once "./vendor/autoload.php";
        //PHPMailer Object
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.zoho.com';
        $mail->Port = '587';
        $mail->isHTML();
        $mail->Username ='lvhanh.270597@zoho.com';
        $mail->Password = 'Xfam0usx_';
        $mail->From = 'lvhanh.270597@zoho.com';
        $mail->FromName = 'noreply';
        $mail->Subject = 'EasyHere - Verification student email';
        $mail->Body = 'Cám ơn bạn đã xác thực tại EasyHere!
            
        Hãy click vào link dưới để xác thực email sinh viên của bạn!
        '.base_url('verify/active/'.$id.'/'.$hash).'
        '; // Our message above including the link
        $mail->AddAddress($email);
        $mail->send();
    
    }

    function make_notification_for_trips(){
        $all_trips = $this->trip_ml->get_success_false();
        foreach ($all_trips as $trip){
            $this->trip_ml->set_attr($trip['id'], 'success', true);
        }
        
    }

}