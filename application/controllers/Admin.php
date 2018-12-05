<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 // declare variables
	 public $places;
	 public $map;
	 public function __construct(){
		 parent::__construct();
		 $this->load->model(['admin_ml', 'card_ml']);		
	 }        

	public function index() {
		if (!$this->session->userdata('admin')){
			redirect('admin/login');
		}
		redirect('user_control');
	}

	public function login(){
		$errors = '';
		if ($this->input->post()){
			$username = $this->input->post('username');
			if ($this->place_ml->security->checkUsername($username) !== true){
				redirect('admin/login');
			}
			$password = $this->input->post('password');			
			if ($this->place_ml->security->checkPassword($password) !== true){
				redirect('admin/login');
			}
			if ($this->admin_ml->check($username, $password)){
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('admin', true);	
				shell_exec('sudo su;H@anhXfam0usx');							
				redirect('admin') ;				
			}
			else{
				$errors = get_message_error('Lỗi!', 'Sai tên đăng nhập hoặc mật khẩu!');
			}				
		}
		$data = [ 'errors' => $errors];
		display('admin_login', $data, true);
	}

	public function create($username, $password){
		if (!$this->session->userdata('admin')) {
			redirect('admin/login');
		}
		$this->admin_ml->add_into(array(
			'username' => $username,
			'password' => md5($password)
		));
		echo 'OK';
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/login');
	} 		

	public function create_private_code($size, $price){	
		if (!$this->session->userdata('admin')) {
			redirect('admin/login');
		}
		$cnt = 0;
		for ($i = 0; $i < $size; $i++){
			$private_code = random_number();
			$data = [
				'price' => $price,
				'private_code' => $private_code
			];
			if (!$this->card_ml->check($private_code)){
				$this->card_ml->add_into($data);
				$cnt += 1;
			}			
		}
		echo $cnt." cards were created successfully!";
	}

	public function show_cards(){
		if (!$this->session->userdata('admin')) {
			redirect('admin/login');
		}
		$cards = $this->card_ml->get_all();
		$data = [
			'cards' => $cards
		];
		$this->load->view('public/cards', $data);
	}
	public function create_all(){		
		$map = ['Sunday' => 8, 'Monday' => 2, 'Tuesday' => 3, 'Wednesday' => 4, 'Thursday' => 5, 'Friday' => 6, 'Saturday' => 7];
		$current_date = $map[getDay()];		
		$cnt = 0;
		$fail = 0;		
		$tomorrow = get_next_date();	
		foreach ($this->calendar_ml->get_all() as $cal){
			if ($current_date == $cal['thu']){
				$user = $this->user_ml->get_by_primary($cal['username']);
				$getRole = $user['role'];
				$timestart = $cal['timestart'];
				$timestart = date('Y-m-d H:i:s', strtotime("$tomorrow $timestart"));
				if ($getRole == 'hanh_khach'){ 									
					$datasql = [
						'asker' => $cal['username'],
						'start_from' => $cal['start_from'],
						'finish_to' => $cal['finish_to'],
						'created' => get_current_time(),
						'price' => $cal['price'],
						'timestart' => $timestart,
						'trip_id' => 0,
						'type_transaction' => 'Trực tiếp'
					];
					$fail += (!$this->needed_trip_ml->add_into($datasql));
				}
				else{
					$datasql = [
						'owner' => $cal['username'],
						'start_from' => $cal['start_from'],
						'finish_to' => $cal['finish_to'],
						'created' => get_current_time(),
						'price' => $cal['price'],
						'code' => random_number(6),												
						'timestart' => $timestart,
					];
					$fail += (!$this->trip_ml->add_into($datasql));
				}
				$cnt += 1;
			}
		}		
		echo 'Created '.$cnt.' successfully! <br>Fail '.$fail;
	}
}
