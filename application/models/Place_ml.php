<?php
require_once('Quickaccess.php');
class Place_ml extends Quickaccess
{
	protected $primary = 'id';
	protected $db_table = 'place';
	protected $editable_fields = ['name','descript','image'];			
	public $places;
	public $security;
	public function __construct(){
		parent::__construct();
        $more = $this->get_all();
        $this->places = [];
        foreach ($more as $place){
            $this->places[$place['id']] = $place['name'];
		}
				
		require_once "assets/security/Security.php";
        $this->security = new Security();        
	}

	public function checkExist($place_id){
		$dataset = $this->db->get_where($this->db_table, ['id' => $place_id]);
		return $dataset->num_rows() > 0;
	}

	public function checkPlace($start_from){
		$start_from = trim($start_from);
		$start_from = preg_replace('/[^0-9]/', "", $start_from);				

		if (!$this->checkExist($start_from)) {
			return [
				'status' => false,
				'data' => get_message_error('Vị trí không hợp lệ')
			];
		}		
		return [
			'status' => true,
			'data' => [
				'start_from' => $start_from,
				'finish_to' => $finish_to
			]
		];		
	}

}	
?>