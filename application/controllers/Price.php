<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends CI_Controller {
    
    // declare variables
    public $places;
    public $map;
    public $notification;
    public function __construct(){
        parent::__construct();
        $this->load->model(['price_ml']);
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
        if ($this->session->userdata('user_logged')){
            $username = $this->session->userdata('username');
            $this->notification = $this->notify_ml->get_from_user($username);                        
            $count = 0;                        
            foreach ($this->notification as $notify){
                $count += ($notify['seen'] == false);
            }
            $this->session->set_userdata('count', $count);
        }
        
        $places = $this->place_ml->get_all();
        $map = [];
        foreach ($places as $place){
            $map[$place['id']] = $place['name'];
        }
		$prices = $this->price_ml->get_all();
		$data = ['prices' => $prices, 'places' => $map, 'notification' => $this->notification];
		$this->load->view('public/prices', $data);
	}	

    public function add_price(){
        if (!$this->session->userdata('admin')){
            redirect('admin/login');
        }
        $message_success = get_message_success('Adding successfully');
		$message_error = get_message_error('Fail when adding');

        $places = $this->place_ml->get_all();
        $data = ['message' => '', '_places' => $places];
        if ($this->input->post()){
            if ($this->price_ml->add()){
                $data['message'] = $message_success;
            }
            else{
                $data['message'] = $message_error;
            }
        }
        display('add_price', $data, true);
    }

    public function edit_price($id_f, $id_t){
        if (!$this->session->userdata('admin')){
            redirect('admin/login');
        }
        $message = '';
        if ($this->input->post()){
            $amount = $this->input->post('amount');
            $this->price_ml->edit_amount($id_f, $id_t, $amount);
            $message = get_message_success('Adding successfully');
        }
        
        $price = $this->price_ml->get_price_from_and_to($id_f, $id_t);

        $places = $this->place_ml->get_all();
        $map = [];
        foreach ($places as $place){
            $map[$place['id']] = $place['name'];
        }
        
        $data = [
            'message' => $message,
            'price' => $price,
            'map' => $map
        ];
        display('edit_price', $data, true);
    }
}