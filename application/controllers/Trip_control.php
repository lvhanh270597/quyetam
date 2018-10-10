<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip_control extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['admin_ml', 'request_ml']);
	}

	public function index() {
		
		if (!$this->session->userdata('admin')){
			redirect('admin/login');
		}
		
		$trips = $this->trip_ml->get_all();
		$data = array(
			'trips' => $trips
		);
		$this->load->view('public/trip_control', $data);
	}

	public function remove_trip($trip_id){	
		// Gửi notify đến cho Khách nếu đã có khách
		//Trả lại tiền cho những người gián tiếp
		$content = 'admin đã xóa chuyến đi '.$trip_id.' mà bạn quan tâm.';
		$all_requests = $this->request_ml->get_all_from_trip($trip_id);            
		if ($all_requests){
			foreach ($all_requests as $req){
				// Gửi thông báo rằng đã xóa chuyến đi
				// Soạn thông báo
				$notify = [
					'to_user' => $req['guess_id'],
					'time' => get_current_time(),
					'content' => $content,
					'type_noti' => 'profile',
					'where_noti' => $req['guess_id']
				];

				if ($req['type_transaction'] == $this->giantiep){
					$notify['content'] = $content.'Vì vậy, chúng tôi đã chuyển tiền từ tài khoản dự bị vào lại tài khoản chính cho bạn';
					$this->user_ml->move_money_to_balance($req['guess_id'], $trip['price']);
				}
				// Gửi thông báo
				$this->notify_ml->add_trigger($notify);
			}
		}            
		// Xóa tất cả comment liên quan đến chuyến đi này
		$this->comment_ml->delete_all_from_trip($trip_id);
		// Xóa hết tất cả các request từ chuyến đi này
		$this->request_ml->delete_all_from_trip($trip_id);        
		// Xóa chuyến đi này!
		$this->trip_ml->delete($trip_id);
		redirect('trip_control');
	}
}
