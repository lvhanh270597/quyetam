<?php
require_once('Trip_template.php');
class Trip_ml extends Trip_template
{

	protected $primary = 'id';
	protected $db_table = 'trip';
	protected $editable_fields = ['owner', 'start_from','finish_to','note','timestart','price'];			
	// code se tu dong sinh ra	
	// price do khach hang tu chon
	// success se = false

	public function __construct()
	{
		parent::__construct();		
	}	

	public function preparing_data(){
		$created = get_current_time();
		$code = rand(100000, 999999);	
		return ['created' => $created, 'code' =>$code];
	}	

	public function get_trip_from_boss($owner){
		$query = $this->db->get_where($this->db_table, array('owner' => $owner));
		if ($query->num_rows() != 1){
			return null;
		}
		return $query->result_array()[0];		
	}

	public function get_my_trips($username){
		$this->db->select('*');
    	$this->db->from($this->db_table);
		$where = '(owner="'.$username.'" or guess = "'.$username.'")';
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
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
			$where = '(('.$where.') and (guess is null))';
		}		
		$dataset = $this->db->query('select * from '.$this->db_table.' where '.$where);				
		return $dataset == null ? null : $dataset->result_array();
	}
}