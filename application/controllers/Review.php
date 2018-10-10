<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {
    
    // declare variables
    public $places;
    public $map;
    public $notification;

    public function __construct(){
        parent::__construct();
        $this->load->model(['review_ml', 'user_ml', 'verify_ml', 'place_ml', 'notify_ml']);
        $this->load->helper(['layout', 'time', 'image']);
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

    public function detail($user){

        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }

        if (!$test_user = $this->user_ml->get_by_primary($user)){
            redirect('page_not_found');
        }
        if ($this->input->post()){            
            $username = $this->session->userdata('username');
            $content = $this->input->post('content');
            $current = get_current_time();
            $sql = [
                'from_user' => $username,
                'to_user' => $user,
                'content' => $content,
                'created' => $current,                
            ];
            if ($this->review_ml->add_into($sql)){
                redirect('review/detail/'.$user);
            }
        }

        // show review of this user        
        $student_mail = $this->verify_ml->get_type_from_user($user, 'student email');
        $student_card = $this->verify_ml->get_type_from_user($user, 'student card');
        $cmnd_card = $this->verify_ml->get_type_from_user($user, 'cmnd card');
        $driver_card = $this->verify_ml->get_type_from_user($user, 'driver card');
        $no = '<i class="fa fa-window-close" aria-hidden="true"></i>';
        $ok = '<i class="fa fa-check" aria-hidden="true"></i>';
        if ($student_mail['status'] == 'OK'){ $student_mail = $ok; }
        else{ $student_mail = $no; }
        if ($student_card['status'] == 'OK'){ $student_card = $ok; }
        else {$student_card = $no; }        
        if ($cmnd_card['status'] == 'OK'){ $cmnd_card = $ok; }
        else {$cmnd_card = $no;}
        if ($driver_card['status'] == 'OK') { $driver_card = $ok; }
        else { $driver_card = $no; }

        $current_user = $this->user_ml->get_by_primary($this->session->userdata('username'));
        $message = '';       
        $reviews = $this->review_ml->get_by_user($user);        
        $user = $this->user_ml->get_by_primary($user);

        $user['image'] = profile_image($user['gender'], $user['username'], $user['image']);
		$current_user['image'] = profile_image($current_user['gender'], $current_user['username'], $current_user['image']);
        

        $data = [
            'reviews' => $reviews, 
            'info' => $user, 
            'message' => $message,
            'email' => $student_mail,
            'scard' => $student_card,
            'cmnd' => $cmnd_card,
            'dcard' => $driver_card,
            'current_user' =>$current_user,
            'places' => $this->map,
            'notification' => $this->notification
        ];
        display('review_detail', $data, true);
    }
}