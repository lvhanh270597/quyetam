<?php
require_once('Quickaccess.php');
class Admin_ml extends Quickaccess
{
	public $name;
	private $password;
	protected $primary = 'username';
	protected $db_table = 'admin';
	protected $editable_fields = ['username','password'];	
	
	public function check($username, $password){
		$query = $this->db->get_where($this->db_table, array(
			'username' => $username,
			'password' => md5($password)
		));		
		echo md5($password);
		if ($query->num_rows() == 0){
			return false;
		}
		return true;
	}
}
?>