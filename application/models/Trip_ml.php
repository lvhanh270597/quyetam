<?php
require_once('Trip_template.php');
class Trip_ml extends Trip_template
{

	protected $primary = 'id';
	protected $db_table = 'trip';
	protected $editable_fields = ['owner', 'start_from','finish_to','timestart','price'];			

	public function __construct()
	{
		parent::__construct();		
	}	

	public function checkPlace(){
		$start_from = trim($this->input->post('start_from'));
		$finish_to = trim($this->input->post('finish_to'));		
		echo $start_from.' '.$finish_to.'<br>';
		$start_from = preg_replace('/[^0-9]/', "", $start_from);		
		$finish_to = preg_replace('/[^0-9]/', "", $finish_to);	

		if ((!$this->place_ml->checkExist($start_from)) || (!$this->place_ml->checkExist($finish_to))) {
			return [
				'status' => false,
				'data' => get_message_error('Vị trí không hợp lệ')
			];
		}
		$price = $this->price_ml->get_price_from_and_to($start_from, $finish_to);
		if ($price === null){
			return [
				'status' => false,
				'data' => get_message_error('Thất bại!<br>', 'Do tuyến đường này chưa được cập nhật trên hệ thống.')
			];
		}
		return [
			'status' => true,
			'data' => [
				'start_from' => $start_from,
				'finish_to' => $finish_to,
				'price' => $price['amount']
			]
		];		
	}

	public function preparing_data(){
		$created = get_current_time();
		$code = rand(100000, 999999);	
		$check = $this->checkPlace();
		if ($check['status'] === false){ return $check; }
		
		$timestart = $this->input->post('timestart');
		$timestart = user_to_system($timestart);
		if (!validateDate($timestart)){
			return [
				'status' => false,
				'data' => get_message_error('Bạn đang cố gắng làm sai giờ hệ thống?<br>', 'Vui lòng chỉnh giờ từ '.min_date().' đến '.max_date())
			];
		}		
		if (adjust_time($timestart) < adjust_time(min_date()) || adjust_time($timestart) > adjust_time(max_date())){
			echo "$timestart<br>".user_to_system(min_date()).'<br>'.user_to_system(max_date());
			echo (strtotime($timestart) < user_to_system(min_date()) ? "true" : "false");
			echo (strtotime($timestart) > user_to_system(max_date()) ? "true" : "false");
			return [
				'status' => false,
				'data' => get_message_error('Bạn đang cố gắng làm sai giờ hệ thống?<br>', 'Vui lòng chỉnh giờ từ '.min_date().' đến '.max_date())
			];
		}
		$data = [
			'created' => $created, 
			'code' =>$code,
			'created' => get_current_time(),
			'start_from' => $check['data']['start_from'],
			'finish_to' => $check['data']['finish_to'],
			'timestart' => $timestart,
			'price' => $check['data']['price'],
			'owner' => $this->session->userdata('username')
		];
		return [
			'status' => true,
			'data' => $data
		];
	}		

	public function edit($id){
		$check = $this->checkPlace();		
		if ($check['status'] === false){ return $check; }
		$data = $check['data'];
		$timestart = $this->input->post('timestart');
		$timestart = user_to_system($timestart);
		
		echo $timestart;
		if (!validateDate($timestart)){
			return [
				'status' => false,
				'data' => get_message_error('Bạn đang cố gắng làm sai giờ hệ thống?<br>', 'Vui lòng chỉnh giờ từ '.min_date().' đến '.max_date())
			];
		}
		if (adjust_time($timestart) < adjust_time(min_date()) || adjust_time($timestart) > adjust_time(max_date())){
			echo "$timestart<br>".user_to_system(min_date()).'<br>'.user_to_system(max_date());
			echo (strtotime($timestart) < user_to_system(min_date()) ? "true" : "false");
			echo (strtotime($timestart) > user_to_system(max_date()) ? "true" : "false");
			return [
				'status' => false,
				'data' => get_message_error('Bạn đang cố gắng làm sai giờ hệ thống?<br>', 'Vui lòng chỉnh giờ từ '.min_date().' đến '.max_date())
			];
		}
		$data['timestart'] = $timestart;
		$this->db->update($this->db_table,$data,[$this->primary => $id]);
		//upload an image to a server if a new row was successfully edited
		return ['status' => true];
	}

	public function get_trip_from_boss($owner){
		$query = $this->db->get_where($this->db_table, ['owner' => $owner]);
		if ($query->num_rows() != 1){ return null; }
		return $query->result_array()[0];
	}

	public function get_my_trips($username){
		if ($this->place_ml->security->checkUsername($username) !== true){ return [];}
		$this->db->select('*');
    	$this->db->from($this->db_table);
		$where = '(owner="'.$username.'" or guess = "'.$username.'")';
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function push_to_trip($trip_id, $guess_id, $type){
		$this->db->set(['guess' => $guess_id, 'type_transaction' => $type]);
		$this->db->where(['id' => $trip_id]);
		$this->db->update($this->db_table);		
	}

	public function get_by_from_to($from, $to, $empty=true, $success=false){
		$dataset = null;
		if ($from == 'null') $from = -1;
		if ($to == 'null') $to = -1;		
		if (!is_numeric($from) || !is_numeric($to)) return null;
		$where = '1';		
		if ($from == -1 && $to != -1){
			$where = '(finish_to = '.$to.')';			
		}
		if ($from != -1 && $to == -1){
			$where = '(start_from = '.$from.')';			
		}
		if ($from != -1 && $to != -1){			
			$where = '(start_from = '.$from.') and (finish_to = '.$to.')';
		}
		if ($empty){
			$where = '(('.$where.') and (guess is null) and (timestart >= "'.get_current_time().'"))';
		}		
		else{
			$where .= ' and (timestart >= "'.get_current_time().'")';
		}		
		$dataset = $this->db->query('select * from '.$this->db_table.' where '.$where);				
		return $dataset == null ? null : $dataset->result_array();
	}
}