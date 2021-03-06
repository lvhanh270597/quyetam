<?php
require_once('Quickaccess.php');
class Price_ml extends Quickaccess
{
	protected $primary = 'id';
	protected $db_table = 'price';
	protected $editable_fields = ['start_from','finish_to','amount'];	

	public function get_price_from_and_to($from, $to){		
		$dataset = $this->db->get_where($this->db_table, ['start_from' => $from, 'finish_to' => $to]);
		if ($dataset->num_rows() > 0){
			return $dataset->result_array()[0];
		}
		return null;
	}

	public function edit_amount($start_from, $finish_to, $amount){
		$this->db->set('amount', $amount);
		$this->db->where(['start_from' => $start_from, 'finish_to' => $finish_to]);
		$this->db->update($this->db_table);
	}
}
?>