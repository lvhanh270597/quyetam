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
        $query = 'select * from '.$this->db_table.' where (to_user="'.$user.'") order by time desc limit '.$limit;
        $dataset = $this->db->query($query);
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
			$this->set_attr($id, 'seen', false);
			$this->set_attr($id, 'time', $data['time']);
		}
		else{
			$this->db->insert($this->db_table, $data);			
		}
		return $this->db->affected_rows() > 0 ? true : false;		
	}
}
?>