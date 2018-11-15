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
		$start_from = preg_replace('/[^0-9]/', "", $start_from);		
		$finish_to = preg_replace('/[^0-9]/', "", $finish_to);	

		if ((!$this->place_ml->checkExist($start_from)) || (!$this->place_ml->checkExist($finish_to))) {
			return [
				'status' => false,
				'data' => get_message_error('Vị trí không hợp lệ')
			];
		}

		return [
			'status' => true,
			'data' => [
				'start_from' => $start_from,
				'finish_to' => $finish_to,				
			]
		];		
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
				'data' => get_message_error('Bạn đang cố gắng làm sai giờ hệ thống?<br>', 'Vui lòng chỉnh giờ từ '.min_date().' đến '.max_date())
			];
		}		
		if (adjust_time($timestart) < adjust_time(min_date()) || adjust_time($timestart) > adjust_time(max_date())){			
			return [
				'status' => false,
				'data' => get_message_error('Bạn đang cố gắng làm sai giờ hệ thống?<br>', 'Vui lòng chỉnh giờ từ '.min_date().' đến '.max_date())
			];
		}


		$price = $this->input->post('price');
		$price = get_price($price);		
		
		if ($price === false){
			return [
				'status' => false,
				'data' => get_message_error('Thất bại!<br>', 'Giá tiền phải là một con số!')
			];
		}
		else{
			$price2 = (int)$price;
			if ($price2 < 0){
				return [
					'status' => false,
					'data' => get_message_error('Thất bại!<br>', 'Giá tiền phải lớn hơn 0!')
				];
			}
		}
		$price = round($price, -3);
		

		$data = [
			'created' => $created, 
			'code' =>$code,
			'created' => get_current_time(),
			'start_from' => $check['data']['start_from'],
			'finish_to' => $check['data']['finish_to'],
			'timestart' => $timestart,
			'price' => $price,
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
		$datestart = $this->input->post('datestart');
		$timestart = $datestart.' '.$timestart;
		
		if (!validateDate($timestart)){
			return [
				'status' => false,
				'data' => get_message_error('Bạn đang cố gắng làm sai giờ hệ thống?<br>', 'Vui lòng chỉnh giờ từ '.min_date().' đến '.max_date())
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

	public function get_success_false(){
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from($this->db_table);
		
		$where = '(owner="'.$username.'" or guess = "'.$username.'") and (timestart<="'.get_current_time().'")';
		$this->db->where($where);
		$query = $this->db->get();
		$query = $query->result_array();
		$res = [];
		foreach ($query as $q){
			if ($q['guess'] == null) continue;
			if ($username == $q['owner']){
				if ($q['v_owner'] == null){
					array_push($res, $q);
				}
			}else{
				if ($q['v_guess'] == null){
					array_push($res, $q);
				}
			}
		}
		return $res;
	}

	public function get_with_people($current=false, $empty=false){		
		$this->db->order_by("timestart", "asc");
		if ($current){
			$this->db->where(["timestart>=" => get_current_time()]);
		}
		$query = $this->db->get($this->db_table);				
		$all = $query->result_array();									
		
		$res = [];
		if ($empty){			
			foreach ($all as $trip){
				if ($trip['guess'] == null){
					array_push($res, $trip);
				}
			}
		}
		else{			
			foreach ($all as $trip){
				if ($trip['guess'] != null){
					array_push($res, $trip);
				}
			}
		}
		return $res;
	}
}