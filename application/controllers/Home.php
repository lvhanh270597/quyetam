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
        $this->limit_per_page = 1;

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