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
    
    public function get_top_review($limit = 10){
        $this->db->select('id, to_user, AVG(star) as point');
        $this->db->group_by('to_user');         
        $query = $this->db->get($this->db_table, $limit);
        return $query->result_array();
	}	

	public function get_by_user($user){
		$query = $this->db->get_where($this->db_table, ['to_user' => $user]);
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
		return null;
	}
}