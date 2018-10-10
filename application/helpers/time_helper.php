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

if ( ! function_exists('get_current_time_obj'))
{		
    function get_current_time_obj()
    {
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
        return new DateTime(); 
    }   
}