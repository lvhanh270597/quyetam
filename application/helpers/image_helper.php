<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( !function_exists('profile_image') ) {

		//set a user's image on the /user page
	function profile_image($gender, $username, $image) {		
		if ($image == null || strlen($image) == 0){
			$image = base_url('assets/images/'.$gender.'/default.jpg');			
		}
		else{
			$image = base_url('assets/images/uploads/users/profile/'.$username.'/'.$image);
		}
		return $image;
	}
}
