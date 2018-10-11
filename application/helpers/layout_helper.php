<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('display'))
{		
    function display($viewFile, $data = array(), $admin=false)
    {
		$ci =& get_instance();    	                  
		$notification = [];
		if ($ci->session->userdata('user_logged')){
            $username = $ci->session->userdata('username');
            $notification = $ci->notify_ml->get_from_user($username);                        
            $count = 0;                        
            foreach ($notification as $notify){
                $count += ($notify['seen'] == false);
            }
            $ci->session->set_userdata('count', $count);
        }

		$data['places'] = $ci->place_ml->places;		
		
        $data['notification'] = $notification;
        if ($admin){
            $ci->load->view('template/header', $data);	                 
            $ci->load->view('admin/'.$viewFile, $data);
            $ci->load->view('template/footer', $data);          
        }    	
        else{
            $ci->load->view('template/header', $data);	                 
            $ci->load->view('public/'.$viewFile, $data);
            $ci->load->view('template/footer', $data);          
        }
    }   
}
