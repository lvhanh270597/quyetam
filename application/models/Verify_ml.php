<?php
require_once('Quickaccess.php');
class Verify_ml extends Quickaccess
{

	protected $primary = 'id';
	protected $db_table = 'verify';
	protected $personal_info = ['username','full_name', 'password'];
	protected $editable_fields = ['cmnd', 'scard', 'dcard', 'mssv', 'university'];	

	public function __construct()
	{
		parent::__construct();			
		$this->load->helper(array('string'));
	}

    public function get_all_from_user($user, $status=null){
        if (!$status) { $sql = ['from_user' => $user]; }
        else{ $sql = ['from_user' => $user, 'status' => $status]; }
        $all = $this->db->get_where($this->db_table, $sql);
        if ($all->num_rows() > 0){
            return $all->result_array();
        }        
        return null;        
    }
    
    public function get_type_from_user($user, $type){
        $sql = ['from_user' => $user, 'type' => $type]; 
        $all = $this->db->get_where($this->db_table, $sql);
        if ($all->num_rows() > 0){
            return $all->result_array()[0];            
        }        
        $res = ['status' => 'Not yet', 'content' => ''];
        return $res;        
    }
}