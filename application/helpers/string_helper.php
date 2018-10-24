<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('startsWith'))
{		
    function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

}

if ( ! function_exists('endsWith')){
    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
        return (substr($haystack, -$length) === $needle);
    }
}

if ( ! function_exists('hasSpace')){
    function hasSpace($str){
        if ($str == trim($str) && strpos($str, ' ') !== false) {
            return true;
        }
        return false;
    }   
}

if ( ! function_exists('hasSpecialCharacter')) {
    function hasSpecialCharacter($string){        
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $string))
        {
            return true;
        }
        return false;
    }
}

if ( ! function_exists('checkUsername') ){
    function checkUsername($username) {
                
        $username = trim($username);
        if (empty($username)) {
            return "username was left blank.";
        }elseif (strlen($username) < 4) {
            return "username was too short";
        }elseif (strlen($username) > 26) {
            return "username was too long";
        }elseif (!preg_match('~^[a-z]{2}~i', $username)) {
            return "username must start with two letters";
        }elseif (preg_match('~[^a-z0-9_.]+~i', $username)) {
            return "username contains invalid characters.";
        }elseif (substr_count($username, ".") > 1) {
            return "username may only contain one or less periods.";
        }elseif (substr_count($username, "_") > 1) {
            return "username may only contain one or less underscores.";
        }
        return true;
    } 
}

if ( ! function_exists('checkFacebook')) {
    function checkFacebook($facebook){
        $regrex = '/(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?/';
        if (!preg_match($regrex, $facebook)) {
            return false;
        }
        else{
            return true;
        }
    }
}

if ( ! function_exists('get_message_success')){
    function get_message_success($content, $sub=''){
        $message_success = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success"> 
					<strong>                                        
						'.$content.'
                    </strong>
                    '.$sub.'
				</div>  
			</div>
		</div>    ';
		return $message_success;	
    }
}

if ( ! function_exists('get_message_error')){
    function get_message_error($content, $sub=''){
        $message_error = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger"> 
					<strong>                                        
						'.$content.'
                    </strong>
                    '.$sub.'
				</div>  
			</div>
        </div>    ';	
        return $message_error;
    }
}

if ( ! function_exists('get_message_info')){
    function get_message_info($content, $sub=''){
        $message_error = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info"> 
					<strong>                                        
						'.$content.'
                    </strong>
                    '.$sub.'
				</div>  
			</div>
        </div>    ';	
        return $message_error;
    }
}

if ( ! function_exists('get_message_primary')){
    function get_message_primary($content, $sub){
        $message_error = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary"> 
					<strong>                                        
						'.$content.'
                    </strong>
                    '.$sub.'
				</div>  
			</div>
        </div>    ';	
        return $message_error;
    }
}

if ( ! function_exists('get_another')){
    function get_another($str1, $str2, $username){
        if ($str1 == $username) return $str2;
        return $str1;
    }
}

if ( ! function_exists('check_email')){
    function check_email($email){
        $endSwith = array(
            'ĐH Bách Khoa' => 'hcmut.edu.vn',
            'ĐH Công Nghệ Thông Tin' => 'gm.uit.edu.vn',
            'ĐH Nhân Văn' => 'hcmussh.edu.vn',
            'ĐH Kinh Tế - Luật' => 'st.uel.edu.vn',
            'ĐH Nông Lâm' => 'st.hcmuaf.edu.vn',
            'ĐH Quốc Tế' => 'mp.hcmiu.edu.vn',
            'ĐH Khoa Học Tự Nhiên' => 'student.hcmus.edu.vn'            
        );
        foreach ($endSwith as $uni => $end){
            $length = strlen($end);
            if (substr($email, -$length) === $end){
                return $uni;
            }
        }
        return false;
    }
}

if ( ! function_exists('hashCode')){
    function hashCode($code){
        return htmlentities($code);
    }
}

if (!function_exists('get_price')){
    function get_price($price){
        $price = trim($price);
        return is_numeric($price) ? (int)$price : false;
    }
}

if (!function_exists('get_color_status')){
    function get_color_status($status){
        $ok = (strpos($status, 'online') !== false);
        if ($ok){
            return '<span class="badge badge-success mb-2">on</span>';            
        }
        else{
            $ok = (strpos($status, 'offline') !== false);
            if ($ok){
                return '<span class="badge badge-danger mb-2">off</span>';            
            }
            else{
                return '<span class="badge badge-warning mb-2">'.$status.'</span>';            
            }
        }
    }
}