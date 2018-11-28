<?php
require_once('Quickaccess.php');
class Road_care_ml extends Quickaccess
{
	public $name;
	private $password;
	protected $primary = 'id';
	protected $db_table = 'road_care';
    protected $editable_fields = ['username','start_from', 'finish_to'];
    
    public function get_all_from_username($username){
        $dataset = $this->db->get_where($this->db_table, ['username' => $username]);
        return $dataset->result_array();
    }
    public function remove_all_from_username($username){
        $this->db->delete($this->db_table, ['username' => $username]);
    }
    public function check_by_three_info($start, $finish, $username){
        $dataset = $this->db->get_where($this->db_table, ['start_from' =>$start, 'finish_to' => $finish, 'username' => $username]);
        return $dataset->num_rows() >= 1;
    }
}
?>