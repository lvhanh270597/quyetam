<?php
require_once('Quickaccess.php');
class Calendar_ml extends Quickaccess
{
	public $name;
	private $password;
	protected $primary = 'id';
	protected $db_table = 'calendar';
	protected $editable_fields = ['username','password'];	
	public function __contruct(){
        parent::__contruct();
    }
    public function get_all_from_user($username){
        $dataset = $this->db->get_where($this->db_table, ['username' => $username]);
        return $dataset->result_array();
    }
    public function remove_all_from_user($username){
        $this->db->delete($this->db_table, ['username' => $username]);
        return $this->db->affected_rows() > 0 ? true : false;
    }
}
?>