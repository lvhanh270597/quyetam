<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct(){
        parent::__construct();
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
                $from = $this->place_ml->places[(int)$from];
            }
        }
        if ($to == 'null'){
            $to = 'Any';
        }
        else{
            if (is_numeric($to)){
                $to = $this->place_ml->places[(int)$to];
            }
        }        
        $data = array(
            'normal_trips' => $normal_trips,
            'needed_trips' => $needed_trips,            
            'from'         => $from,
            'to'           => $to,
            'all'          => $all,            
        );
        // add to visit page
        $this->visited_ml->add_into([
            'page_name' => 'Search',
            'created_at' => get_current_time(),
            'user_access' => $this->session->userdata('username')
        ]);        

        display('search', $data);
    }
}