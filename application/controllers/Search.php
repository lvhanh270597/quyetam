<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    
    // declare variables
    public $places;
    public $map;
    public $notification;

    public function __construct(){
        parent::__construct();
        $this->load->model(['trip_ml', 'needed_trip_ml', 'user_ml', 'place_ml', 'notify_ml']);
        $this->load->helper(['layout']);
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

    public function combine($from, $to, $all='all'){           
        $empty = ($all != 'all');

        $normal_trips = $this->trip_ml->get_by_from_to($from, $to, $empty);
        $needed_trips = $this->needed_trip_ml->get_by_from_to($from, $to, $empty);
        if ($from == 'null'){
            $from = 'Any';
        }
        else{
            if (is_numeric($from)){
                $from = $this->map[(int)$from];
            }
        }
        if ($to == 'null'){
            $to = 'Any';
        }
        else{
            if (is_numeric($to)){
                $to = $this->map[(int)$to];
            }
        }        
        $data = array(
            'normal_trips' => $normal_trips,
            'needed_trips' => $needed_trips,
            'places'       => $this->map,
            'from'         => $from,
            'to'           => $to,
            'all'          => $all,
            'notification' => $this->notification
        );
        display('search', $data);
    }
}