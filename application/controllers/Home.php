<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public $trip_no_people;
    public $my_trips, $my_needed_trips;
    public $all_need_trips;
    public $limit_per_page, $max;

    public function __construct(){
        parent::__construct();                
        $this->load->helper('array');
        $this->all_need_trips = $this->needed_trip_ml->get_newest(true);
        $this->trip_no_people = $this->trip_ml->get_with_people(true, true);
        
        $this->my_trips = $this->my_needed_trips = null;
        if (!$this->session->userdata('logged')){
            $my_username = $this->session->userdata('username');
            $this->my_trips = $this->trip_ml->get_my_trips($my_username);        
            $this->my_needed_trips = $this->needed_trip_ml->get_my_trips($my_username);
        }                        
        
        $this->limit_per_page = 12;

        $size1 = isset($this->all_trips) ? count($this->all_trips) : 0;
        $size2 = isset($this->all_need_trips) ? count($this->all_need_trips) : 0;
        $this->max = max($size1, $size2);
        $this->max = intdiv($this->max, $this->limit_per_page) + ($this->max % $this->limit_per_page != 0);
    }       
    
    public function index(){                    
        $data = array(
            'needed_trips' => get_slice($this->all_need_trips, 0, $this->limit_per_page),
            'no_trips' => $this->trip_no_people,
            'my_trips' => $this->my_trips,
            'my_needed_trips' => $this->my_needed_trips,
            'index' => 1,
            'max' => $this->max
        );
        display('home', $data);
    }

    public function pages($index){
        $from = ((int)$index - 1) * $this->limit_per_page;
        $len = $this->limit_per_page;
        $data = array(
            'needed_trips' => get_slice($this->all_need_trips, $from, $len),
            'no_trips' => get_slice($this->trip_no_people, $from, $len),
            'index' => $index,
            'my_trips' => $this->my_trips,
            'my_needed_trips' => $this->my_needed_trips,
            'max' => $this->max
        );
        display('home', $data);
    }

    public function page_not_found(){        
        display('pnf', []);
    }

    function make_notification_for_trips(){
        $all_trips = $this->trip_ml->get_success_false();
        foreach ($all_trips as $trip){
            $this->trip_ml->set_attr($trip['id'], 'success', true);
        }
        
    }

    public function fuck(){
        
        $content = get_content('please fuck me now!', 'i love you');

        $email = 'lvhanh.270597@gmail.com';        
        require_once "./vendor/autoload.php";
        //PHPMailer Object
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.zoho.com';
        $mail->Port = '587';        
        $mail->CharSet = 'UTF-8';
        $mail->Username ='easyhere@zoho.com';
        $mail->Password = 'Xfam0usx_';
        $mail->From = 'easyhere@zoho.com';
        $mail->FromName = 'noreply';
        $mail->Subject = 'EasyHere - Notification';
        $mail->Body = $content;
        $mail->isHTML(true);
        // Our message above including the link
        $mail->AddAddress($email);
        $mail->send();        
    }

}