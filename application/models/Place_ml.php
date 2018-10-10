<?php
require_once('Quickaccess.php');
class Place_ml extends Quickaccess
{
	protected $primary = 'id';
	protected $db_table = 'place';
	protected $editable_fields = ['name','descript','image'];	

}
?>