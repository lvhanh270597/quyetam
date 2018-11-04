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

    public function send(){       
        
        echo phpinfo();
        /*    
        $to_email = "lvhanh.270597@gmail.com";
        $subject = 'Testing PHP Mail';
        $message = 'This mail is sent using the PHP mail function';
        $headers = 'From: noreply @ company . com';
        if (mail($to_email,$subject,$message,$headers)){
            echo 'OK';
        }
        else{
            echo "Fuck";
        }*/
    }     

    function make_notification_for_trips(){
        $all_trips = $this->trip_ml->get_success_false();
        foreach ($all_trips as $trip){
            $this->trip_ml->set_attr($trip['id'], 'success', true);
        }
        
    }

}