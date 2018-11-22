<?php
require_once('Quickaccess.php');
class Trip_template extends Quickaccess
{

    public $error;

	public function __construct()
	{
		parent::__construct();	
        $this->error = array(
			'start_from' => 'Bạn chưa chọn vị trí bắt đầu',
			'finish_to' => 'Bạn chưa chọn vị trí kết thúc',			
			'note' => 'Hãy nói cho người đi chung biết bạn sẽ đợi họ bao nhiêu phút',
			'timestart' => 'Bạn sẽ đi lúc mấy giờ?'
		);	
	}	

    public function check_error(){		
		foreach ($this->editable_fields as $field){
			if ($this->input->post($field) == null){
				return $this->error[$field];
			}
		}		
		$from = $this->input->post('start_from');
		$to = $this->input->post('finish_to');
		if ($from === $to){ return 'Điểm đi và điểm đến không thể trùng nhau'; }		
		return null;
	}

    public function get_newest($current=false){	
		$this->db->order_by("trip_id", "asc");	
		$this->db->order_by("timestart", "asc");		
		if ($current){
			$this->db->where(["timestart>=" => get_current_time()]);
		}
		$query = $this->db->get($this->db_table);
		if ($query->num_rows() > 0){
			return $query->result_array();							
		}
		return null;
	}

	public function get_user_access(){
		$dataset = $this->db->query('select DISTINCT owner as u from trip UNION DISTINCT select DISTINCT guess as u from trip UNION DISTINCT select DISTINCT asker as u from needed_trip');
		return $dataset->result_array();
	}
}