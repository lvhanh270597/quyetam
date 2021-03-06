<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('get_current_time'))
{		
    function get_current_time()
    {
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = new DateTime(); 
        $date = date_format($date, 'Y-m-d H:i:s');
        return $date;
    }   
}
if ( ! function_exists('get_next_date'))
{		
    function get_next_date()
    {
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d', strtotime(' +1 day'));
        return $date;
    }   
}
if ( ! function_exists('ago')){
    function ago($timestamp){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = new DateTime();  // [2]
        $thatDay = new DateTime($timestamp);
        $dt = $today->diff($thatDay);
        if ($dt->y > 0){
            $number = $dt->y;
            $unit = "năm";
        }
        else if ($dt->m > 0){
            $number = $dt->m;
            $unit = "tháng";
        }   
        else if ($dt->d > 0)
        {
            $number = $dt->d;
            $unit = "ngày";
        }
        else if ($dt->h > 0)
        {
            $number = $dt->h;
            $unit = "giờ";
        }
        else if ($dt->i > 0)
        {
            $number = $dt->i;
            $unit = "phút";
        }
        else if ($dt->s > 0)
        {
            $number = $dt->s;
            $unit = "giây";
        }
        if (isset($number)){
            $ret = $number." ".$unit." "."trước";
            return $ret;
        }
        else{
            return 'vừa mới';
        }
    }
}

if ( ! function_exists('after')){
    function after($timestamp){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = new DateTime();  // [2]
        $thatDay = new DateTime($timestamp);
        $dt = $today->diff($thatDay);

        if ($dt->y > 0){
            $number = $dt->y;
            $unit = "năm";
        }
        else if ($dt->m > 0){
            $number = $dt->m;
            $unit = "tháng";
        }   
        else if ($dt->d > 0)
        {
            $number = $dt->d;
            $unit = "ngày";
        }
        else if ($dt->h > 0)
        {
            $number = $dt->h;
            $unit = "giờ";
        }
        else if ($dt->i > 0)
        {
            $number = $dt->i;
            $unit = "phút";
        }
        else if ($dt->s > 0)
        {
            $number = $dt->s;
            $unit = "giây";
        }

        $unit .= "";

        $ret = $number." ".$unit." "."nữa";
        return $ret;
    }
}

if (!function_exists('get_exactly_time')){
    function get_exactly_time($time){
        $today = date('Y:m:d', strtotime(get_current_time()));
        $thatday = date('Y:m:d', strtotime($time));
        $day = 'hôm nay';
        if ($today != $thatday){
            $day = 'ngày mai';
        }
        $time = date("H:i",strtotime($time));
        return $time.' '.$day;
    }
}
if (!function_exists('getDay')){
    function getDay(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dowMap = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $dow_numeric = date('w');
        return $dowMap[$dow_numeric];
    }
}
if (! function_exists('get_compare')){
    function get_compare($time){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = new DateTime();  // [2]
        $today = $today->format('Y-m-d H:i:s');
        if (strtotime($today) > strtotime($time)){
            return ago($time);
        }
        else{
            return after($time);
        }
    }
}

if (! function_exists('validateDate')){
    function validateDate($date, $format = 'Y-m-d H:i'){        
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}

if (! function_exists('get_date')){
    function get_date($user_time){
        return date("Y-m-d", strtotime($user_time));
    }
}

if (! function_exists('get_time')){
    function get_time($datetime){
        return date("H:i", strtotime($datetime));
    }
}

if (!function_exists('adjust_time')){
    function adjust_time($time){
        return date("Y-m-dH:i:s", strtotime($time));
    }
}

if (! function_exists('system_to_user')){
    function system_to_user($system_time){
        return date("Y-m-d\TH:i", strtotime($system_time));
    }
}

if (! function_exists('min_date') ){
    function min_date(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = new DateTime();  // [2]
        $date->add(new DateInterval('PT10M'));
        return $date->format("Y-m-d\TH:i");
    }
}

if (! function_exists('max_date')){
    function max_date(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = new DateTime();  // [2]
        $date->add(new DateInterval('P2D'));
        return $date->format("Y-m-d\TH:i");
    }
}

if (! function_exists('get_status')){
    function get_status($username){        
        $ci =& get_instance();
        $user = $ci->user_ml->get_by_primary($username);
        $status = $user['status'];
        $str = ago($status);	                  
        $ok = ((strpos($str, 'vừa mới') !== false));
        $show = true;
        if ($ok) { $str = 'online'; }
        else{
            $ok = (strpos($str, 'ngày') !== false) || ((strpos($str, 'tháng') !== false)) || (strpos($str, 'năm') !== false) || (strpos($str, 'giờ') !== false);
            if ($ok) $show = false;   
            else{
                $ok = (strpos($str, 'giây') !== false);
                if ($ok){
                    $sec = (int)substr($str, 0, -5);
                    if ($sec < 10){                        
                        $str = 'online';
                    }
                }
            }
        }
        if ($show === false){
            $str = 'offline';        
        }
        return $str;
    }
}