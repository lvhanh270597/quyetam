<?php
require_once('Quickaccess.php');
class Matched_ml extends Quickaccess
{

	protected $primary = 'id';
    protected $db_table = 'matched';
    
    public function check_exist($user1, $user2){
        $dataset = $this->db->get_where($this->db_table, ['user1'=>$user1, 'user2' => $user2]);
        if ($dataset->num_rows() == 0){
            $dataset = $this->db->get_where($this->db_table, ['user1'=>$user2, 'user2' => $user1]);
            return $dataset->num_rows() > 0;
        }
        return true;
    }
}
?>