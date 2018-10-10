<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('display'))
{		
    function display($viewFile, $data = array())
    {
    	$ci =& get_instance();    	                      
    	$ci->load->view('public/template/header', $data);	                 
    	$ci->load->view('public/'.$viewFile, $data);
    	$ci->load->view('public/template/footer', $data);          
    }   
}
