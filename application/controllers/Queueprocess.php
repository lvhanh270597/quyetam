<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queueprocess extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('queue');
    }
    
    public function index() {
        $first = $this->queue->get_first();
		while ($first){
            $this->sendMessage($first['email'], $first['content']);
            $this->queue->remove($first['id']);
            $first = $this->queue->get_first();            
        }
    }

    public function sendMessage($email, $content){        
        require_once "./vendor/autoload.php";
        //PHPMailer Object
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.zoho.com';
        $mail->Port = '587';
        $mail->isHTML();
        $mail->Username ='easyhere@zoho.com';
        $mail->Password = 'Xfam0usx_';
        $mail->From = 'easyhere@zoho.com';
        $mail->FromName = 'noreply';
        $mail->Subject = 'EasyHere - Notification';
        $mail->Body = $content;
        // Our message above including the link
        $mail->AddAddress($email);
        $mail->send();
    }
}
