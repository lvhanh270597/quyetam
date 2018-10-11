<?php
require_once('Quickaccess.php');
class Comment_ml extends Quickaccess
{
	
	protected $primary = 'id';
	protected $db_table = 'comment';
	protected $editable_fields = ['content','created'];	
	
	public function get_from_trip($trip_id){		
        $dataset = $this->db->get_where($this->db_table, ['trip_id' => $trip_id]);
        return $dataset->result_array();
	}
	
	public function delete_all_from_trip($trip_id){
		$this->db->delete($this->db_table, ['trip_id' => $trip_id]);
	}

	public function get_unseen_comment($trip, $user){
		if (!$this->trip_ml->checkExist($trip)){ return []; }		
		$where = [
			'trip_id' => $trip, 
			'user_id' => $user,
			'seen' => false
		];
		$dataset = $this->db->get_where($this->db_table, $where);
		return $dataset->result_array();
	}

	public function set_seen_comment($comments){		
		foreach ($comments as $comment){
			$this->db->set('seen', true);
			$this->db->where('id', $comment['id']);
			$this->db->update($this->db_table); 			
		}
	}
}
?>