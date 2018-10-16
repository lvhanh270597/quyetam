<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct(){
        parent::__construct();        
    }       
    
    public function index(){            
        $needed_trips = $this->needed_trip_ml->get_newest(100, true);
        $trips = $this->trip_ml->get_newest(100, true);             

        $data = array(
            'trips' => $trips,
            'needed_trips' => $needed_trips,                                                               
        );
        display('home', $data);
    }

    public function page_not_found(){        
        display('pnf', []);
    }

    public function send(){                   
        require_once "./vendor/autoload.php";
        //PHPMailer Object
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username ='easyhere.dh@gmail.com';
        $mail->Password = 'EasyHere@2018';
        $mail->From = 'admin@together.easyhere.cf';
        $mail->FromName = 'Hanh';
        $mail->Subject = 'Hello World';
        $mail->Body = 'A Test email';
        $mail->AddAddress('lvhanh.270597@gmail.com');

        if(!$mail->send()) 
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } 
        else 
        {
            echo "Message has been sent successfully";
        }
    }        
}