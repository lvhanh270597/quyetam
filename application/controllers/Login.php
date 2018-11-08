<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct(){
        parent::__construct();                
    }       
    
    public function index(){                         
        if ($this->session->userdata('user_logged')){ redirect(base_url()); }       
        $data = array(
            'errors' => '',            
            'places' => $this->place_ml->places
        );                                
        if ($this->input->post()){
            $ok = $this->user_ml->check_login();
            if ($ok['status'] === false){
                $data['errors'] = get_message_error('Lỗi!', $ok['data']);
            }
            else{                
                $user = $this->user_ml->get_by_primary($ok['data']['username']);                                            
                $password = $ok['data']['password'];
                if (password_verify($password, $user['password'])){
                    $this->user_ml->user_log_in($user);                    
                }       
                else{
                    $data['errors'] = get_message_error('Lỗi!', 'Sai mật khẩu!');
                }                         
            }
        }
        display('login', $data);        
    }

    public function register(){   
        if ($this->session->userdata('user_logged')){
           redirect(base_url()); 
        }   
        $errors = '';
        if ($this->input->post()){              
            // check register
            $check = $this->user_ml->check_register();
            if ($check['status'] === true){                
                if ($this->user_ml->add_really_carefully($check['data'])){ redirect('login/success'); }                
            }
            else{ $errors = get_message_error('Lỗi!', $check['data']); }
        }
        
        $data = ['errors' => $errors ];
        display('register', $data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function success(){
        $data = [
            'title' => 'Đăng kí tài khoản thành công!',
            'content' => 'Nhấn vào <a href="'.site_url('login').'"> đây </a> để đăng nhập'
        ];
        display('action_info', $data);
    }
}