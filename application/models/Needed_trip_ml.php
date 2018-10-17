<?php
require_once('Trip_template.php');
class Needed_trip_ml extends Trip_template
{

	protected $primary = 'id';
	protected $db_table = 'needed_trip';
	protected $editable_fields = ['asker', 'start_from','finish_to','timestart', 'type_transaction'];			

	public function __construct()
	{
		parent::__construct();			
	}	
	
	public function get_my_trips($username){		
		$dataset = $this->db->get_where($this->db_table, ['asker' => $username]);		
		return $dataset->result_array();				
	}
	
	public function get_by_from_to($from, $to){
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
		$where .= ' and (timestart >= "'.get_current_time().'")';
		$dataset = $this->db->query('select * from '.$this->db_table.' where '.$where);				
		return $dataset == null ? null : $dataset->result_array();
	}

	public function checkPlace(){		
		$start_from = trim($this->input->post('start_from'));
		$finish_to = trim($this->input->post('finish_to'));		
		$start_from = preg_replace('/[^0-9]/', "", $start_from);		
		$finish_to = preg_replace('/[^0-9]/', "", $finish_to);	

		if ((!$this->place_ml->checkExist($start_from)) || (!$this->place_ml->checkExist($finish_to))) {
			return [
				'status' => false,
				'data' => get_message_error('Vị trí không hợp lệ', $start_from.' '.$finish_to)
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
	
	public function edit($id){
		$check = $this->checkPlace();		
		if ($check['status'] === false){ return $check; }
		$data = $check['data'];
		$timestart = $this->input->post('timestart');
		$datestart = $this->input->post('datestart');
		$timestart = $datestart.' '.$timestart;
		if (!validateDate($timestart)){
			return [
				'status' => false,
				'data' => 'Bạn đang cố gắng làm sai giờ hệ thống?'
			];
		}
		if (adjust_time($timestart) < adjust_time(min_date()) || adjust_time($timestart) > adjust_time(max_date())){			
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

	public function preparing_data(){
		$created = get_current_time();
		$code = rand(100000, 999999);	
		$check = $this->checkPlace();
		if ($check['status'] === false){ return $check; }

		$timestart = $this->input->post('timestart');
		$datestart = $this->input->post('datestart');
		$timestart = $datestart.' '.$timestart;
		
		if (!validateDate($timestart)){
			return [
				'status' => false,
				'data' => 'Bạn đang cố gắng làm sai giờ hệ thống?'
			];
		}
		if (adjust_time($timestart) < adjust_time(min_date()) || adjust_time($timestart) > adjust_time(max_date())){			
			return [
				'status' => false,
				'data' => get_message_error('Bạn đang cố gắng làm sai giờ hệ thống?<br>', 'Vui lòng chỉnh giờ từ '.min_date().' đến '.max_date())
			];
		}
		$data = [
			'created' => $created, 
			'created' => get_current_time(),
			'start_from' => $check['data']['start_from'],
			'finish_to' => $check['data']['finish_to'],
			'timestart' => $timestart,
			'price' => $check['data']['price'],
			'asker' => $this->session->userdata('username')
		];
		
		return [
			'status' => true,
			'data' => $data
		];
	}		
}