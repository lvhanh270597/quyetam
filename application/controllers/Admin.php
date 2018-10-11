<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 // declare variables
	 public $places;
	 public $map;
	 public function __construct(){
		 parent::__construct();
		 $this->load->model(['admin_ml']);		
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
}
