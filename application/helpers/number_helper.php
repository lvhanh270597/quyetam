<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( !function_exists('check_amount') ) {
	function check_amount($amount, $total) {
        if (!is_numeric($amount)) return false;
        $amount = (int)$amount;
        if ($amount >= 1 && $amount <= $total) return $amount;
        return false;
	}
}

if( !function_exists('check_time_limit') ) {
    function check_time_limit($time){
        if (!is_numeric($time)) return false;
        $time = (int)$time;
        if ($time >= 1 && $time <= 72) return $time;
        return false;
    }
}

if( !function_exists('get_ratio_percent') ) {
    function get_ratio_percent($one, $all){
        return round($one / max($all, 1), 4);
    }
}


if( !function_exists('check_positive') ) {
    function check_positive($number){
        if (!is_numeric($number)) return false;
        $number = (int)$number;
        if ($number >= 1) return $number;
        return false;
    }
}