<?php
require_once('Quickaccess.php');
class Notify_ml extends Quickaccess
{
	public $name;
	private $password;
	protected $primary = 'id';
	protected $db_table = 'notify';
	protected $editable_fields = ['to_user','content', 'type_noti', 'where_noti'];	
	
	public function get_from_user($user, $limit=100){
		$this->db->where(['to_user' => $user]);
		$this->db->order_by('time', 'desc');
		$dataset = $this->db->get($this->db_table, $limit);                
        return $dataset->result_array();
	}
	
	public function get_unseen($user){
		$this->db->where(['to_user' => $user, 'seen' => false]);
		$this->db->order_by('time', 'desc');
		$dataset = $this->db->get($this->db_table);
		return $dataset->result_array();
	}

	public function add_trigger($data){					
		$where = [];
		foreach ($this->editable_fields as $field){
			$where[$field] = $data[$field];
		}
		$check = $this->db->get_where($this->db_table, $where);		
		if ($check->num_rows() > 0){
			$check = $check->result_array()[0];
			$id = $check['id'];
			$this->db->set(['seen' => false, 'time' => $data['time']]);			
			$this->db->where('id', $id);
			$this->db->update($this->db_table); 
		}
		else{
			$this->db->insert($this->db_table, $data);			
		}
		return $this->db->affected_rows() > 0 ? true : false;		
	}
}
?>