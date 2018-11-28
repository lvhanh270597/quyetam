<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends CI_Controller {
	

	 public function __construct(){
		 parent::__construct();		 
		 $this->load->model(['verify_ml', 'card_ml']);		 	
		 if (!$this->session->userdata('user_logged')){
			 redirect('login');
		 }	
	 }        

	public function index(){
		if (!$this->session->userdata('user_logged')){
			redirect('login');
		}
		// show and edit my profile here
		$username = $this->session->userdata('username');	
		$student_mail = $this->verify_ml->get_type_from_user($username, 'student email');
        $student_card = $this->verify_ml->get_type_from_user($username, 'student card');
        $cmnd_card = $this->verify_ml->get_type_from_user($username, 'cmnd card');
        $driver_card = $this->verify_ml->get_type_from_user($username, 'driver card');
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
		
		$data = ['message'=>''];
		if ($this->input->post()){			
			if ($this->user_ml->edit()){								
				$data['message'] = get_message_success('Update successfully!');
			}			
			else{
				$data['message'] = get_message_error('Fail!');
			}
		}
		$info = $this->user_ml->get_by_primary($username);		
		

		$info['image'] = profile_image($info['gender'], $username, $info['image']);

		$data = array_merge($data, $info);		
		$addition = [                  
            'email' => $student_mail,
            'scard' => $student_card,
            'cmnd' => $cmnd_card,
			'dcard' => $driver_card	
		];
		$data = array_merge($data, $addition);

		// add to visit page
        $this->visited_ml->add_into([
            'page_name' => 'Home',
			'created_at' => get_current_time(),
			'user_access' => $this->session->userdata('username')
		]);        
		
		display('edit_profile', $data);
	}	

	public function upload(){
		$username = $this->session->userdata('username');				
		
		$name = preg_replace('/[^A-Za-z0-9.-]/', "", $_FILES['image']['name']);			
		 
		if ($this->save_img($username)){
			$this->user_ml->set_attr($username, 'image', $name);			
		}		
	}

	//upload an image to server
	function save_img($id){
		//choose a directory for product or customer images		
		$directory = './assets/images/uploads/users/profile/';		
		//create a directory for a customer or a product if it does not exist yet
		if (!is_dir($directory.$id)) {
			mkdir($directory.$id, 0777, TRUE);
		}
		//image upload configuration
		$upload_path = $directory.$id;
		$config = array(
			'upload_path'   => $upload_path,
			'allowed_types' => 'gif|jpg|jpeg|png|bmp|svg',
			'max_size'      => 3072,
			'overwrite'     => TRUE,
			'file_name'     => preg_replace('/[^A-Za-z0-9.-]/', "", $_FILES['image']['name'])
		);
		$this->load->library('upload', $config);
		//set a message in case of failure
		return $this->upload->do_upload('image');
	}

	public function recharge(){
		$data = [
			'message' => ''
		];
		if ($this->input->post()){
			$code = $this->input->post('code');
			$code = preg_replace("/[^0-9]/", '', $code);
			
			$get_card = $this->card_ml->check($code);
			if (!$get_card){
				$data['message'] = get_message_error("", "Mã số sai hoặc đã được sử dụng");
			}
			else{
				$user = $this->user_ml->get_by_primary($this->session->userdata('username'));
				$price = $get_card['price'];
				$this->user_ml->set_attr($user['username'], 'balance', $user['balance'] + $price);
				$this->card_ml->set_used($user['username'], $code);
				$data['message'] = get_message_success('', 'Tài khoản của bạn là '.($user['balance'] + $price));
			}
		}		
		// add to visit page
        $this->visited_ml->add_into([
            'page_name' => 'Profile',
			'created_at' => get_current_time(),
			'user_access' => $this->session->userdata('username')
        ]);        
		display('recharge', $data);
	}
	public function road(){
		$message = '';
		$data = [];
		$username = $this->session->userdata('username');
		if ($this->input->post()){
			// update noti email
			$this->user_ml->edit();
			// remove all old roads
			$this->road_care_ml->remove_all_from_username($username);
			$starts = $this->input->post('start');
			$finishs = $this->input->post('finish');
			$cnt = min(count($starts), count($finishs));
			$success_cnt = 0;
			for ($i=0; $i<$cnt; $i++){
				if ($starts[$i] && $finishs[$i]){
					$datasql = [
						'start_from' => $starts[$i],
						'finish_to' => $finishs[$i],
						'username' => $username						
					];
					$this->road_care_ml->add_into($datasql);
				}
				$success_cnt += 1;
			}
			$message = get_message_success('Cập nhật thông tin thành công!', '');
		}
		$user = $this->user_ml->get_by_primary($username);
		$noti_email = $user['noti_email'];

		$road_cares = $this->road_care_ml->get_all_from_username($username);
		$data['all_roads'] = $road_cares;
		$data['noti_email'] = $noti_email;
		$data['message'] = $message;
		display('road_update', $data);
	}
}