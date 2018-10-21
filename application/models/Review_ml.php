<?php
require_once('Quickaccess.php');
class Review_ml extends Quickaccess
{
		
	protected $primary = 'id';
	protected $db_table = 'review';
	protected $editable_fields = [];

	public function __construct()
	{
		parent::__construct();		
	}	
	public function get_all_review_for_user($username){
		$query = $this->db->get_where($this->db_table, array('to_user' => $username));		
		if ($query->num_rows() == 0) return null;
		return $query->result_array();
	}
    
	public function get_by_user($user){		
		$query = $this->db->get_where($this->db_table, ['to_user' => $user]);
		if ($query->num_rows() > 0){
			return $query->result_array(); 
		}
		return null;
	}

	public function remove_from_user($username){
		$this->db->delete($this->db_table, ['to_user' => $username]);
	}
}