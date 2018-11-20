<?php
require_once('Quickaccess.php');
class Card_ml extends Quickaccess
{
	public $name;
	private $password;
	protected $primary = 'id';
	protected $db_table = 'cards';
	protected $editable_fields = ['username','password'];	
	
	public function check($code){
        $dataset = $this->db->get_where($this->db_table, ['private_code' => $code, 'is_used' => null]);        
        if ($dataset->num_rows() == 0) return null;
        return $dataset->result_array()[0];
    }

    public function set_used($user, $code){
        $time = get_current_time();
        $user_id = $user;
        $this->db->set(['is_used' => true, 'used_date' => $time, 'user_id' => $user_id]);
        $this->db->where('private_code', $code);
        $this->db->update($this->db_table);

    }
}
?>