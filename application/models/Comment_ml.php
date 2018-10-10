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
		$query = 'select * from '.$this->db_table.' where ((trip_id='.$trip.') and (user_id="'.$user.'") and (seen=0))';
		$dataset = $this->db->query($query);
		return $dataset->result_array();
	}

	public function set_seen_comment($comments){
		foreach ($comments as $comment){
			$this->set_attr($comment['id'], 'seen', true);
		}
	}
}
?>