<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( !function_exists('get_slice') ) {

		//set a user's image on the /user page
	function get_slice($arr, $from, $len) {				
		if (!isset($arr[$from])){
            return null;
        }                
        return array_slice($arr, $from, $len);
	}
}
