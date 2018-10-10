<?php
require_once('Quickaccess.php');
class Request_ml extends Quickaccess
{
		
	protected $primary = 'id';
	protected $db_table = 'request';
	protected $editable_fields = ['trip_id','guess_id'];

	public function __construct()
	{
		parent::__construct();		
	}	

	public function check_user_trip($user, $trip){
		$query = $this->db->get_where($this->db_table, ['trip_id'=>$trip, 'guess_id'=>$user]);
		return $query->num_rows() > 0 ? $query->result_array()[0] : false;
	}

	public function get_all_from_trip($trip_id){
		$query = $this->db->get_where($this->db_table, array('trip_id' => $trip_id));		
		if ($query->num_rows() == 0) return null;		
		return $query->result_array();
	}
    
    public function delete_all_from_trip($trip_id){
        $this->db->delete($this->db_table, array('trip_id' => $trip_id));
	}
	/*
	public function delete_all_from_guess($guess){
		$this->db->delete($this->db_table, array('guess_id' => $guess));
	}
	*/
    public function remove_a_request($trip, $guess){
        $this->db->delete($this->db_table, array(
            'trip_id' => $trip,
            'guess_id' => $guess
        ));
    }
}