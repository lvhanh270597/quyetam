<?php
require_once('Quickaccess.php');
class Price_ml extends Quickaccess
{
	protected $primary = 'id';
	protected $db_table = 'price';
	protected $editable_fields = ['start_from','finish_to','amount'];	

	public function get_price_from_and_to($from, $to){
		$query = $this->db->get_where($this->db_table, ['start_from' => $from, 'finish_to' => $to]);
		if ($query->num_rows() > 0){
			return $query->result_array()[0];
		}
		return null;
	}
}
?>