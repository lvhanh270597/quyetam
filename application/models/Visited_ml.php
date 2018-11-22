<?php
require_once('Quickaccess.php');
class Visited_ml extends Quickaccess
{
	public $name;
	private $password;
	protected $primary = 'id';
	protected $db_table = 'visited';

	public function get_visited_per_date($date){
		$target_date = date('Y-m-d', strtotime($date));
		$dataset = $this->db->query("SELECT page_name, count(page_name) as cnt FROM ".$this->db_table." WHERE CAST(created_at AS DATE) = ".'"'.$target_date.'" group by page_name');
		return $dataset->result_array();
	}
}
?>