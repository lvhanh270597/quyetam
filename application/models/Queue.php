<?php
class Queue extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();	
    }

    public function get_first(){
        $this->db->order_by("created_at", "asc");
        $query = $this->db->get('queue');
        if ($query->num_rows() == 0) return null;
        return $query->result_array()[0];
    }

    public function remove($id){
        $this->db->delete('queue', ['id' => $id]);
    }

    public function add($data){
        $this->db->insert('queue', $data);
    }
}
?>