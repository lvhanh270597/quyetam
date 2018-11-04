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

    public function check_exist($from_user, $type){
        $dataset = $this->db->get_where($this->db_table, ['from_user' => $from_user, 'type' => $type]);
        return $dataset->num_rows() > 0;
    }
    
    public function check_mail($mail){
        $dataset = $this->db->get_where($this->db_table, ['content' => $mail]);
        return $dataset->num_rows() > 0;
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

    public function remove_from_user($username){
        $this->db->delete($this->db_table, ['from_user'=> $username]);
    }

    public function count_verify($user){
        $all = $this->db->get_where($this->db_table, ['from_user' => $user, 'status' => 'OK']);
        return $all->num_rows();
    }    

    public function get_not_yet(){
        $where = '(status <> "OK")';
        $dataset = $this->db->get_where($this->db_table, $where);
        return $dataset->result_array();        
    }

    public function get_email($from_user){
        $dataset = $this->db->get_where($this->db_table, ['from_user' => $from_user, 'type' => 'student email']);
        if ($dataset->num_rows() == 0){
            return null;
        }
        else{
            return $dataset->result_array()[0]['content'];
        }
    }
}