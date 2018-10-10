<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    // declare variables
    public $places;
    public $map;
    public $notification;
    public function __construct(){
        parent::__construct();        
        $this->places = $this->place_ml->get_all();
        $this->map = [];
        foreach ($this->places as $place){
            $this->map[$place['id']] = $place['name'];
        }
        if ($this->session->userdata('user_logged')){
            $username = $this->session->userdata('username');
            $this->notification = $this->notify_ml->get_from_user($username);                        
            $count = 0;                        
            foreach ($this->notification as $notify){
                $count += ($notify['seen'] == false);
            }
            $this->session->set_userdata('count', $count);
        } 
    }       
    
    public function index(){            
        // show newest trip: top 10
        // needed trip : top 10
        // number of trips to others place
        // rank 10 users
        // show cheapest trips

        // places map with id
        $places = $this->place_ml->get_all();
        $map = [];
        foreach ($places as $place){
            $map[$place['id']] = $place['name'];
        }

        $needed_trips = $this->needed_trip_ml->get_newest();
        $trips = $this->trip_ml->get_newest();
        $cheapest_trips = $this->trip_ml->get_cheapest();
        $number_of_each_from_place = $this->trip_ml->count_each_from_place();
        $number_of_each_to_place = $this->trip_ml->count_each_to_place();

        $data = array(
            'trips' => $trips,
            'needed_trips' => $needed_trips,
            'cheapest_trips' => $cheapest_trips,            
            'count_each_from_place' => $number_of_each_from_place,
            'count_each_to_place' => $number_of_each_to_place,
            'places' => $map,
            'notification' => $this->notification,            
        );

        display('home', $data);
    }

    public function page_not_found(){
        display('pnf');
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