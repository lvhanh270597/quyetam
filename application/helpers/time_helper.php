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
    function validateDate($date, $format = 'Y-m-d H:i:s'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}

if (! function_exists('user_to_system')){
    function user_to_system($user_time){
        return date("Y-m-d H:i:s", strtotime($user_time));
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
