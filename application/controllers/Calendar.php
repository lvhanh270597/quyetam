<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    
    public $username;

    public function __construct(){
        parent::__construct();                
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }
        $this->username = $this->session->userdata('username');
    }
    public function index(){                
        $message = '';
        if ($this->input->post()){    
            $this->calendar_ml->remove_all_from_user($this->username);
            $start_from = $this->input->post('start_from');
            $finish_to = $this->input->post('finish_to');
            $timestart = $this->input->post('timestart');
            $bat = $this->input->post('bat');
            $price = $this->input->post('price');
            $thu = $this->input->post('thu');
            $num = min([count($start_from), count($finish_to), count($timestart), count($bat), count($price), count($thu)]);
            for ($i=0; $i<$num; $i++){
                if ($this->place_ml->get_by_primary($start_from[$i]) && 
                $this->place_ml->get_by_primary($finish_to[$i]) && 
                check_positive($price[$i]) && check_positive($thu[$i])){
                    $datasql = [
                        'username' => $this->username,
                        'start_from' => $start_from[$i],
                        'finish_to' => $finish_to[$i],
                        'timestart' => $timestart[$i],
                        'bat' => (int)$bat[$i],
                        'thu' => (int)$thu[$i],
                        'price' => $price[$i]                        
                    ];
                    if ($this->calendar_ml->add_into($datasql)){
                        $message = get_message_success('Update successfully!');
                    }
                    else{
                        $message = get_message_error('Something went wrong!');
                    }
                }                
            }
        }
        $data = [
            'calendar' => $this->calendar_ml->get_all_from_user($this->username),
            'message' => $message
        ];
        display('set_calendar', $data);
    }
}
