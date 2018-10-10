<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_control extends CI_Controller {

	public $map;
	public $places;
	public function __construct(){
		parent::__construct();
		$this->load->helper('layout');		
		$this->load->model(['user_ml', 'admin_ml', 'place_ml']);	
		$this->places = $this->place_ml->get_all();
        $this->map = [];
        foreach ($this->places as $place){
            $this->map[$place['id']] = $place['name'];
        }
           	
	}

	public function index() {		
		if (!$this->session->userdata('admin')){
			redirect('admin/login');
		}		
		$users = $this->user_ml->get_all();
		$data = array(
			'users' => $users,
            'places' => $this->map
		);
		$this->load->view('public/user_control', $data);
	}

	public function set_zero_money($username){
		if (!$this->session->userdata('admin')){
			redirect(base_url());
		}
		$this->user_ml->set_attr($username, 'balance', 0);
		redirect('user_control');
	}

	public function remove_user($username){
		if (!$this->session->userdata('admin')){
			redirect(base_url());
		}
		$this->user_ml->delete($username);
		redirect('user_control');
	}

	public function add_money($username, $money){
		if (!$this->session->userdata('admin')){
			redirect(base_url());
		}
		$this->user_ml->add_money($username, $money);
		redirect('user_control');
	}
	
}
