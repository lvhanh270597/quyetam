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


if ( ! function_exists('get_message_warning')){
    function get_message_warning($content, $sub=''){
        $message_error = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-warning"> 
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
        return 'Quả thật! Có một số trường không dùng loại email riêng. Hãy chắc rằng đây thực sự là email sinh viên của bạn.';        
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
            return '<span class="badge badge-success mb-2">online</span>';            
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

if (!function_exists('random_number')){
    function random_number($length = 13){ 
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;        
    }
}
if (!function_exists('khongdau')){
    function khongdau($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return $str;
    }
}

if (!function_exists('get_content')){
    function get_content($header, $content){
        $res = '<h1>'.$header.'</h1><p>'.$content.'</p>';
        return $res;
    }
}