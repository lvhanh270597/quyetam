<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notify extends CI_Controller {
    
    // declare variables
    public $notification;

    public function __construct(){
        parent::__construct();
        $this->load->model(['notify_ml', 'place_ml']);
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
    
    public function index(){                        
        $current_user = $this->session->userdata('username');
        $notifies = $this->notify_ml->get_from_user($current_user);
        $data = [
            'errors' => '',
            'notifies' => $notifies,
            'notification' => $this->notification         
        ];        
        // add to visit page
        $this->visited_ml->add_into([
            'page_name' => 'Notification',
            'created_at' => get_current_time(),
            'user_access' => $this->session->userdata('username')
        ]);        
        display('notify', $data);
    }

    public function check($noti_id){
        $username = $this->session->userdata('username');
        $notification = $this->notify_ml->get_by_primary($noti_id);
        if (!$notification['to_user'] == $username){
            return ;
        }

        // Gán là đã xem
        $this->notify_ml->set_attr($noti_id, 'seen', true);

        $link = '';
        $type_noti = $notification['type_noti'];
        $where_noti = $notification['where_noti'];
        if ($type_noti == 'profile'){
            $link = site_url('profile');
        }
        if ($type_noti == 'trip'){
            $link = site_url('trip/detail/'.$where_noti);
        }                
        if ($type_noti == 'edit_trip'){
            $link = site_url('trip/edit/'.$where_noti);
        }
        if ($type_noti == 'verify'){
            $link = site_url('verify');
        }        
        redirect($link);
    }

    public function get_unseen_notification(){
        $username = $this->session->userdata('username');
        $unseen = $this->notify_ml->get_unseen($username);
        $this->user_ml->set_attr($username, 'status', get_current_time());                        
        echo json_encode($unseen);
    }

    public function get_all_notification(){        
        $username = $this->session->userdata('username');        
        $data = $this->notify_ml->get_from_user($username);                  
        echo json_encode($data);
    }

    public function test(){
        $this->load->view('public/test_noti');
    }

}