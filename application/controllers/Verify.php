<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {
    
    // declare variables
    public $map;
    public $places;
    public $notification;

    public function __construct(){
        parent::__construct();

        $this->load->model(array('verify_ml'));        
        $this->places = $this->place_ml->get_all();
        $this->map = [];
        foreach ($this->places as $place){
            $this->map[$place['id']] = $place['name'];
        }   
        
        if ($this->session->userdata('user_logged')){
            $username = $this->session->userdata('username');
            $this->notification = $this->notify_ml->get_from_user($username);                        
            $count = 0;                        
            foreach ($this->notification as $notify){
                $count += ($notify['seen'] == false);
            }
            $this->session->set_userdata('count', $count);
        }        
    }       
    
    public function index(){       
        $message = '';        
        $username = $this->session->userdata('username');        
        
        $email = $this->verify_ml->get_type_from_user($username, 'student email');
        $scard = $this->verify_ml->get_type_from_user($username, 'student card');
        $dcard = $this->verify_ml->get_type_from_user($username, 'driver card');
        $cmnd = $this->verify_ml->get_type_from_user($username, 'cmnd card');        

        $status = [
            'email' => $email,
            'scard' => $scard,
            'dcard' => $dcard,
            'cmnd' => $cmnd
        ];

        $info = $this->user_ml->get_by_primary($username);
        $data = [
            'info' => $info,
            'message' => $message,
            'status' => $status,
            'places' => $this->map,
            'notification' => $this->notification
        ];
        display('verify', $data);
    }

    public function process(){
        $username = $this->session->userdata('username');
        $email = $this->verify_ml->get_type_from_user($username, 'student email');
        $scard = $this->verify_ml->get_type_from_user($username, 'student card');
        $dcard = $this->verify_ml->get_type_from_user($username, 'driver card');
        $cmnd = $this->verify_ml->get_type_from_user($username, 'cmnd card'); 

        $ok = false;

        if ($email['status'] == 'Not yet'){
            if ($email = $this->input->post('email')){
                // check if this is any university?
                // hash a random number and push it to user table
                $this->verify_mail($username, $email);
                $ok = true;
            }                        
        }
        
        if ($dcard['status'] == 'Not yet'){
            if(!empty($_FILES['dcard']['name'])){            
                $this->verify_dcard();
                $ok = true;
            }
        }

        if ($cmnd['status'] == 'Not yet'){
            if(!empty($_FILES['cmnd']['name'])){            
                $this->verify_cmnd();
                $ok = true;
            }
        }

        if ($scard['status'] != 'OK'){
            if(!empty($_FILES['scard']['name'])){   
                $this->verify_scard();
                $ok = true;
            }
        }

        if (!$ok){
            redirect('verify');
        }
    }

    public function verify_mail($username, $email){
        $uni = check_email($email);
        if (!$uni){
            echo 'Xin lỗi! Chúng tôi không tìm thấy trường nào có dạng email này! <br>
            Xin vui lòng liên hệ ad để biết thêm thông tin.';
            return false;
        }        
        // send to mail a hash
        $hash = md5( rand(1, 1000000) );
        //push
        $content = $email;
        $from_user = $username;
        $type = 'student email';
        $status = 'Pending';
        $data = [
            'from_user' => $from_user,
            'status' => $status,
            'type' => $type,
            'content' => $content,
            'hash' => $hash
        ];
        if ($this->verify_ml->add_into($data)){            
            /*
            Send mail
            */            
            $insert_id = $this->db->insert_id();
            $this->sendMail($insert_id, $hash, $email);
            //echo get_message_success('click '.base_url('verify/active/'.$insert_id.'/'.$hash));
            /* */                        
            // Gửi thông báo là check email
            $notify = [
                'to_user' => $username,
                'time' => get_current_time(),
                'content' => 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.',
                'type_noti' => '',
                'where_noti' => ''
            ];
            // Gửi thông báo
            $this->notify_ml->add_trigger($notify);            
            redirect(base_url('verify'));
        }
        else{
            // Gửi thông báo là check email
            $notify = [
                'to_user' => $username,
                'time' => get_current_time(),
                'content' => 'Xác nhận email bị lỗi!',
                'type_noti' => '',
                'where_noti' => ''
            ];
            // Gửi thông báo
            $this->notify_ml->add_trigger($notify);
        }
        return true;
        //        
    }
    
    function sendMail($id, $hash, $email){                   
        require_once "./vendor/autoload.php";
        //PHPMailer Object
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username ='easyhere.dh@gmail.com';
        $mail->Password = 'EasyHere@2018';
        $mail->From = 'admin@together.easyhere.cf';
        $mail->FromName = 'noreply';
        $mail->Subject = 'EasyHere - Verification student email';
        $mail->Body = 'Cám ơn bạn đã xác thực tại EasyHere!
			
		Hãy click vào linh dưới để xác thực email sinh viên của bạn!
		'.base_url('verify/active/'.$id.'/'.$hash).'
        '; // Our message above including the link
        $mail->AddAddress($email);
        $mail->send();        
    }

    public function active($id, $hash){
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }
        $username = $this->session->userdata('username');
        $verify = $this->verify_ml->get_by_primary($id);
        if ($verify['hash'] == $hash){
            $this->verify_ml->set_attr($id, 'status', 'OK');
            /*
            echo get_message_success('OK. You actived your email<br>');
            */
            // Gửi thông báo là check email
            $notify = [
                'to_user' => $username,
                'time' => get_current_time(),
                'content' => 'Bạn đã xác thực thành công email sinh viên.',
                'type_noti' => 'verify',
                'where_noti' => ''
            ];
            // Gửi thông báo
            $this->notify_ml->add_trigger($notify);
            display('active_email', null);
        }
        else{
            // Gửi thông báo là check email
            $notify = [
                'to_user' => $username,
                'time' => get_current_time(),
                'content' => 'Liên kết xác thực không đúng.',
                'type_noti' => '',
                'where_noti' => ''
            ];
            // Gửi thông báo
            $this->notify_ml->add_trigger($notify);
            display('active_email_fail', null);
        }
    }

    public function verify_scard(){
        // push file name to database
        // save image 
        $file_name = $this->save_img('scard');
        $content = $file_name;
        $from_user = $this->session->userdata('username');
        $type = 'student card';
        $status = 'Pending';
        $data = [
            'from_user' => $from_user,
            'status' => $status,
            'type' => $type,
            'content' => $content
        ];
        if ($this->verify_ml->add_into($data)){
            // Gửi thông báo là check email
            $notify = [
                'to_user' => $from_user,
                'time' => get_current_time(),
                'content' => 'Student card của bạn đã được gửi đi. Vui lòng chờ admin xác thực.',
                'type_noti' => 'verify',
                'where_noti' => ''
            ];
            // Gửi thông báo
            $this->notify_ml->add_trigger($notify);
        }        
    }

    public function verify_dcard(){
        // push file name to database
        // save image 
        $file_name = $this->save_img('dcard');
        $content = $file_name;
        $from_user = $this->session->userdata('username');
        $type = 'driver card';
        $status = 'Pending';
        $data = [
            'from_user' => $from_user,
            'status' => $status,
            'type' => $type,
            'content' => $content
        ];
        if ($this->verify_ml->add_into($data)){
            $notify = [
                'to_user' => $from_user,
                'time' => get_current_time(),
                'content' => 'Bằng lái xe của bạn đang được gửi đi. Vui lòng chờ admin xác thực.',
                'type_noti' => 'verify',
                'where_noti' => ''
            ];
            // Gửi thông báo
            $this->notify_ml->add_trigger($notify);
        }        
    }

    public function verify_cmnd(){
         // push file name to database
        // save image 
        $file_name = $this->save_img('cmnd');
        $content = $file_name;
        $from_user = $this->session->userdata('username');
        $type = 'cmnd card';
        $status = 'Pending';
        $data = [
            'from_user' => $from_user,
            'status' => $status,
            'type' => $type,
            'content' => $content
        ];
        if ($this->verify_ml->add_into($data)){
            $notify = [
                'to_user' => $from_user,
                'time' => get_current_time(),
                'content' => 'Giấy chứng minh nhân dân của bạn đã được gửi. Vui lòng chờ admin xác thực.',
                'type_noti' => 'verify',
                'where_noti' => ''
            ];
            // Gửi thông báo
            $this->notify_ml->add_trigger($notify);
        }        
    }


    public function trip($id){
        $error = '';                
        $success = '';

        $trip = $this->trip_ml->get_by_primary($id);
        if (!$trip) { redirect('trip/my_trips'); }                
        if ($trip['success'] == true){
            $error = get_message_error('Chuyến đi đã được xác thực!');
        }
        else{
            if ($this->input->post()){
                $code = $this->input->post('code');            
                if ($trip['code'] == $code){
                    // chuyen tien tu guess sang owner
                    // decrease guess's balance with price
                    // increase owner's balance with price * 0.8
                    // set success the trip is ok
                    $this->transfer_money($trip['guess'], $trip['owner'], $trip['price']);              
                    $this->trip_ml->set_attr($id, 'success', true);  
                    $success = get_message_success('Bạn đã nhận được '.($trip['price'] * 0.8).' đ');
                    // Gửi thông báo đến khách và chủ chuyến đi
                    $notify = [
                        'to_user' => $trip['owner'],
                        'time' => get_current_time(),
                        'content' => 'Bạn đã xác thực thành công chuyến đi '.$trip['id'].'. Và nhận được số tiền tương ứng là '.($trip['price'] * 0.8).'đ',
                        'type_noti' => 'trip',
                        'where_noti' => $trip['id']
                    ];
                    // Gửi thông báo
                    $this->notify_ml->add_trigger($notify);

                    $notify = [
                        'to_user' => $trip['guess'],
                        'time' => get_current_time(),
                        'content' => 'Chuyến đi '.$trip['id'].' mà bạn tham gia đã được xác thực. Và chúng tôi đã chuyển tiền đến cho người chở bạn.',
                        'type_noti' => 'trip',
                        'where_noti' => $trip['id']
                    ];
                    // Gửi thông báo
                    $this->notify_ml->add_trigger($notify);

                }
                else{
                    $error = get_message_error('Mã sai!!!');
                }
            }
        }

        $data = ['success' => $success, 'error' => $error, 'id' => $id, 'places' => $this->map];   
        display('verify_code', $data);
    }

    private function transfer_money($guess_id, $owner_id, $price){
        $guess = $this->user_ml->get_by_primary($guess_id);
        $owner = $this->user_ml->get_by_primary($owner_id);
        $balance_guess = $guess['t_balance'] - $price;
        $balance_owner = $owner['balance'] + $price * 0.8;
        $this->user_ml->set_attr($guess_id, 't_balance', $balance_guess);
        $this->user_ml->set_attr($owner_id, 'balance', $balance_owner);        
    }

    //upload an image to server
	public function save_img($object){
		//choose a directory for product or customer images
		if($object == 'scard'){
			$directory = './assets/images/uploads/users/scard/';
		} else if($object == 'cmnd') {
			$directory = './assets/images/uploads/users/cmnd/';
		} else if ($object =='dcard') {
            $directory = './assets/images/uploads/users/dcard/';
        }		
		//image upload configuration
		$upload_path = $directory;
		$config = array(
			'upload_path'   => $upload_path,
			'allowed_types' => 'gif|jpg|jpeg|png|bmp|svg',
			'max_size'      => 0,
			'overwrite'     => TRUE,
			'file_name'     => preg_replace('/[^A-Za-z0-9.-]/', "", $_FILES[$object]['name'])
		);
		$this->load->library('upload', $config);
		//set a message in case of failure
		if ( ! $this->upload->do_upload($object))
		{
			$this->session->set_flashdata('message_img','Failed to upload a photo');
		}
		//success
		else
		{
			$data = array('upload_data' => $this->upload->data());
        }
        
        return $config['file_name'];

    }
    
    public function admin(){
        if (!$this->session->userdata('admin')){
            redirect('admin/login');
        }
        $all_verify = $this->verify_ml->get_all();
        $data = ['all' => $all_verify, 'places' => $this->map, 'notification' => $this->notification];        
        display('verify_admin', $data);    
    }

    public function accept($id){
        $this->verify_ml->set_attr($id, 'status', 'OK');
        redirect('verify/admin');
    }

    public function deny($id){
        $this->verify_ml->delete($id);
        redirect('verify/admin');
    }
}