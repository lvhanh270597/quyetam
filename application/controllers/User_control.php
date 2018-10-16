<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_control extends CI_Controller {

	public $map;
	public $places;
	public function __construct(){
		parent::__construct();
		$this->load->model(['admin_ml']);
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
		$users = $this->user_ml->get_total();
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

	public function add_money($username){
		if (!$this->session->userdata('admin')){
			redirect(base_url());
		}
		$data = ['message' => ''];
		$data['username'] = $username;
		if ($this->input->post()){
			$money = trim($this->input->post('money'));
			$this->user_ml->add_money($username, $money);
			$data['message'] = get_message_success('Successfully!');
		}				
		display('add_money', $data, true);
	}
	public function all_user_1999(){
		if (!$this->session->userdata('admin')){
			redirect('admin/login');
		}
		$users = $this->user_ml->get_all();
		foreach ($users as $user){
			if ($user['balance'] == 0){				
				$this->user_ml->set_attr($user['username'], 'balance', 1999);
			}			
		}
		echo 'OK';
	}

}
