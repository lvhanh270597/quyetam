<?php
require_once('Trip_template.php');
class Needed_trip_ml extends Trip_template
{

	protected $primary = 'id';
	protected $db_table = 'needed_trip';
	protected $editable_fields = ['asker', 'start_from','finish_to','timestart', 'type_transaction'];			
	// code se tu dong sinh ra	
	// price do khach hang tu chon
	// success se = false

	public function __construct()
	{
		parent::__construct();			
	}	
	
	public function get_my_trips($username){
		$query = $this->db->get_where($this->db_table, array('asker' => $username));		
		return $query->result_array();				
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
		
		$dataset = $this->db->query('select * from '.$this->db_table.' where '.$where);				
		return $dataset == null ? null : $dataset->result_array();
	}
}