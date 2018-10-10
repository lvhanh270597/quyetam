<?php
require_once('Quickaccess.php');
class Trip_template extends Quickaccess
{

    public $error;

	public function __construct()
	{
		parent::__construct();	
		$this->load->helper('time');
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
		if ($from == $to){ return 'Điểm đi và điểm đến không thể trùng nhau'; }		
		return null;
	}

    public function get_newest($limit = 10){
		$this->db->from($this->db_table);
		$this->db->order_by("created", "asc");
		$query = $this->db->get(); 
		if ($query->num_rows() > 0){
			$query = $query->result_array();		
			$output = array_slice($query, 0, $limit); 
			return $output;
		}
		return null;
	}

	public function get_cheapest($limit = 10){
		$this->db->from($this->db_table);
		$this->db->order_by("price", "asc");
		$query = $this->db->get(); 
		if ($query->num_rows() > 0){
			$query = $query->result_array();		
			$output = array_slice($query, 0, $limit); 
			return $output;
		}
		return null;
	}

	public function count_each_to_place(){
		$this->db->select('finish_to, COUNT(finish_to) as total');
        $this->db->group_by('finish_to');         
        $query = $this->db->get($this->db_table);
        return $query->result_array();
	}

	public function count_each_from_place(){
		$this->db->select('start_from, COUNT(start_from) as total');
        $this->db->group_by('start_from');         
        $query = $this->db->get($this->db_table);
        return $query->result_array();
	}	
}