<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 // declare variables
	 public $places;
	 public $map;
	 public function __construct(){
		 parent::__construct();
		 $this->load->model(['trip_ml', 'needed_trip_ml', 'user_ml', 'place_ml', 'admin_ml']);
		 $this->load->helper(['layout', 'time', 'string']);
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
		redirect('user_control');
	}

	public function login(){
		$errors = '';
		if ($username = $this->input->post('username')){
			$password = $this->input->post('password');			
			if ($this->admin_ml->check($username, $password)){
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('admin', true);				
				redirect('admin') ;				
			}
			else{
				$errors = get_message_error('Lỗi!', 'Sai tên đăng nhập hoặc mật khẩu!');
			}
		}		
		$data = [ 'errors' => $errors];
		display('admin_login', $data);
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
}
