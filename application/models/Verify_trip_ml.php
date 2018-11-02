<?php
require_once('Quickaccess.php');
class Verify_trip_ml extends Quickaccess
{

	protected $primary = 'id';
	protected $db_table = 'verify_trip';
	protected $editable_fields = ['from_user', 'trip_id'];	

	public function __construct(){
		parent::__construct();			
	}

}