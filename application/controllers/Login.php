<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    // declare variables
    public $places;
    public $map;
    public function __construct(){
        parent::__construct();
        
        $this->places = $this->place_ml->get_all();
        $this->map = [];
        foreach ($this->places as $place){
            $this->map[$place['id']] = $place['name'];
        }
    }       
    
    public function index(){         
        if ($this->session->userdata('user_logged')){
            redirect(base_url());
        }       
        $data = array(
            'errors' => '',
            'success'=> false,
            'places' => $this->map           
        );        
        
        if ($this->input->post()){
            $username = $this->input->post('username');
            if (!$user = $this->user_ml->get_by_primary($username)){
                $data['errors'] = get_message_error('Does not exist!');
            }
            else{
                $password = $this->input->post('password');
                if (password_verify($password, $user['password'])){
                    $this->user_ml->user_log_in($user['username']);
                    $data['success'] = true;
                }                
            }
        }

        display('login', $data);
        //$this->load->view('public/login', $data);
    }

    public function register(){   
        if ($this->session->userdata('user_logged')){
           redirect(base_url()); 
        }   

        $errors = '';
        if ($this->input->post()){              
            // check register
            $errors = $this->user_ml->check_register();
            if (!$errors){
                if ($this->user_ml->add()){
                    redirect('login/success');
                }                
            }
            else{
                $errors = get_message_error($errors);
            }
        }
        // register page will show the notification: "signing up success, please login"
        $data = array( 
            'errors' => $errors ,
            'places' => $this->map           
        );
        display('register', $data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function success(){
        display('success_register', null);
    }
}