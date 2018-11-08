<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Controller {
    
    // declare variables
    public $image;

    public function __construct(){
        parent::__construct();        
        $this->load->model(array('request_ml'));
        $this->load->helper(['image']);

        $places = $this->place_ml->get_all();        
        foreach ($places as $place){
            $this->image[$place['id']] = $place['image'];
        }                        
    }       
    
    public function index(){
        redirect('trip/my_trips');
    }

    public function all($type){
        if ($type == 'normal'){
            $trips = $this->trip_ml->get_all();
        }
        else{ 
            if ($type == 'needed'){
                $trips = $this->needed_trip_ml->get_all();
            }
        }
        $data = ['trips' => $trips];
        display('all_trip', $data);
    }

    public function my_trips(){
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }
        // sorted by time
        // my trips where I am a owner or a guess        
        // my needed trips
        $my_username = $this->session->userdata('username');
        $my_trips = $this->trip_ml->get_my_trips($my_username);        
        $my_needed_trips = $this->needed_trip_ml->get_my_trips($my_username);
        
        $data = array(
            'my_trips' => $my_trips,
            'my_needed_trips' => $my_needed_trips,           
        );

        display('my_trips', $data);
        // show all of my trips
    }    

    public function edit($trip_id){
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }
        // Nếu trip không phải của mình, thì chuyển về detail
        $trip = $this->trip_ml->get_by_primary($trip_id);
        $username = $this->session->userdata('username');
        if ($trip['owner'] != $username){ redirect('trip/detail/'.$trip_id); }

        $message = '';
        $editable = true;
        // check if it is mine                
        if ($this->input->post('edit')){
            $check_edit = $this->trip_ml->edit($trip_id);
            if ($check_edit['status'] === true){ 
                $message = get_message_success('Sửa thành công!'); 

                // Thông báo cho tất cả những người theo dõi                               
                // Nói rằng: Tôi đã sửa đổi thông tin của chuyến đi này  
                $self = $this->user_ml->get_by_primary($username);
                $content = hashCode($self['full_name'].' đã thay đổi ở chuyến đi mà bạn quan tâm');
                $all_requests = $this->request_ml->get_all_from_trip($trip_id);            
                if ($all_requests){
                    foreach ($all_requests as $req){
                        // Tạo thông báo
                        $notify = [
                            'to_user' => $req['guess_id'],
                            'time' => get_current_time(),
                            'content' => $content,
                            'type_noti' => 'trip',
                            'where_noti' => $trip_id
                        ];
                        // Gửi thông báo
                        $this->notify_ml->add_trigger($notify);
                    }
                }            

            }
            else{
                $message = $check_edit['data'];
            }
        }
        
        // Nếu đã có khách, thì không thể sửa chuyến đi được
        if ($trip['guess'] != null){
            $editable = false;
            $guess = $this->user_ml->get_by_primary($trip['guess']);
            $message = get_message_success(hashCode($guess['full_name']).' (<strong>'.$guess['username'].'</strong>) <br>',' đã tham gia cùng bạn');
        }        
        $requests = $this->request_ml->get_all_from_trip($trip_id);
        $trip = $this->trip_ml->get_by_primary($trip_id);
        $data = [
            'trip' => $trip,
            'message' => $message,
            'editable' => $editable,
            'requests' => $requests,            
            'images' => $this->image,            
        ];

        display('edit_trip', $data);
    }

    public function detail($trip_id){       
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }         

        $username = $this->session->userdata('username');     
        /*  
        if ($this->verify_ml->count_verify($username) < 2){
            redirect('trip/show_no_permission');
        }        
        */
        $trip = $this->trip_ml->get_by_primary($trip_id);   
        if ($trip === null){ redirect('page_not_found'); }
        
        $message = '';
        // Nếu gửi yêu cầu
        if ($this->input->post()){                       
            $trip = $this->trip_ml->get_by_primary($trip_id);   
            if ($trip['guess'] != null){                
                redirect('trip/detail/'.$trip_id);
            }
            // Soạn thông báo trước
            $notify = [
                'to_user' => $username,
                'time' => get_current_time(),
                'content' => 'Bạn đã gửi yêu cầu tới chuyến đi '.$trip_id.'.',
                'type_noti' => 'trip',
                'where_noti' => $trip_id                                        
            ];            
            // Nếu kiểm tra tài khoản thành công! Thì thêm vào database của Request                            
            $sql = [
                'trip_id' => $trip_id, 
                'guess_id' => $username, 
                'created' => get_current_time(),
            ];
            if ($this->request_ml->add_into($sql)){                        
                $message = get_message_success('Bạn đã gửi yêu cầu tới chuyến đi này!');
                // Gửi thông báo
                $this->notify_ml->add_trigger($notify);
                // Gửi thông báo đến người owner luôn
                $user_guess = $this->user_ml->get_by_primary($username);
                $notify = [
                    'to_user' => $trip['owner'],
                    'time' => get_current_time(),
                    'content' => hashCode($user_guess['full_name']).' đã gửi yêu cầu đến chuyến đi '.$trip['id'].' của bạn.',
                    'type_noti' => 'edit_trip',
                    'where_noti' => $trip_id
                ];
                $this->notify_ml->add_trigger($notify);
                $this->sendMessage($trip['owner'], hashCode($user_guess['full_name']).' has sent a request to your trip '.$trip['id'].'\n Click <a href="'.site_url('trip/detail/'.$trip['id']).'"> here </a> to view this request!');
            } else {
                $message = get_message_error('Lỗi! <br>', 'Gửi yêu cầu thất bại!');
            }         
        }
        if (!$trip['v_owner'] && ! $trip['v_guess']){            
            // Nếu đã có khách
            if ($trip['guess'] != null){
                if ($trip['guess'] == $username){
                    $message = get_message_info('Bạn đã tham gia vào chuyến đi này!','');
                }
                else{
                    $guess = $this->user_ml->get_by_primary($trip['guess']);
                    $message = get_message_success($guess['full_name'], ' đã tham gia vào chuyến đi này!');
                }
            }
        }
        else{
            $message = get_message_success('Chuyến đi thành công!');
        }

        $requested = false;
        $username = $this->session->userdata('username');
        if ($requested = $this->request_ml->check_user_trip($username, $trip_id)){
            $message = get_message_info('', 'Bạn đã gửi yêu cầu tới chuyến đi này!');
        }

        $data = [            
            'trip' => $trip,
            'owner' => $this->user_ml->get_by_primary($trip['owner']),
            'guess' => false,
            'message' => $message,
            'requested' => $requested,
            'images' => $this->image,
        ];


        /*  Load comment của chuyến đi này  */
        if ($trip['guess'] != null){
            if ($this->input->post('comment_btn')){
                $content = hashCode(trim($this->input->post('content')));
                $created = get_current_time();
                $username = $this->session->userdata('username');
                $datasql = [
                    'trip_id' => $trip_id,
                    'created' => $created,
                    'user_id' => $username,
                    'content' => $content
                ];
                if ($this->comment_ml->add_into($datasql)){
                    // Tạo notify báo cho người còn lại
                    $cur_user = $this->user_ml->get_by_primary($username);
                    $another = get_another($trip['guess'], $trip['owner'], $username);
                    $notify = [
                        'to_user' => $another,
                        'time'    => get_current_time(),
                        'content' => $cur_user['full_name'].' đã bình luận tại chuyến đi mà bạn đang tham gia.',
                        'type_noti'=> 'trip',
                        'where_noti' => $trip_id,
                        'seen' => false
                    ];
                    // Send
                    $this->notify_ml->add_trigger($notify);

                    redirect('trip/detail/'.$trip_id);
                }                
            }

            $data['guess'] = $this->user_ml->get_by_primary($trip['guess']);
            $data['comments'] = $this->comment_ml->get_from_trip($trip_id);            
        }        

        display('detail_trip', $data);    
    }

    public function create_ask_trip(){
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }
        $username = $this->session->userdata('username');
        /*if ($this->verify_ml->count_verify($username) < 2){
            redirect('trip/show_no_permission');
        } */       

        $message = '';
        if ($this->input->post()){            
            $check = $this->needed_trip_ml->preparing_data();
            if ($check['status'] === false){
                $message = $check['data'];
            }
            else{                                                                
                $data_sql = $check['data'];                                                   
                if ($this->needed_trip_ml->add_into($data_sql)){
                    $insert_id = $this->db->insert_id();
                    $link = 'click vào link <a href="'.site_url('trip/edit_need/'.$insert_id).'"> này </a> để xem yêu cầu vừa tạo.';
                    $message = get_message_success('Bạn đã tạo tạo yêu cầu thành công!<br>', $link);                             
                }                                          
            }
        }
                
        $data = [            
            'message'=>$message, 
            '_places' => $this->place_ml->get_all(),
        ];
        display('create_needed_trip', $data);
    }

    public function create(){        
        /* Xoa chuc nang tao chuyen di */
        redirect('page_not_found');

        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }
        $username = $this->session->userdata('username');        
        if ($this->verify_ml->count_verify($username) < 1){
            redirect('trip/show_no_permission');
        }        
        
        $data = ['owner' => $username, 'message'=>'', '_places' => $this->place_ml->get_all()];
        
        if ($this->input->post()){            
            $check = $this->trip_ml->preparing_data();                        
            if ($check['status'] === false){
                $data['message'] = $check['data'];
            }    
            else{
                $data_sql = $check['data'];
                // Tạo chuyến đi mới
                if ($this->trip_ml->add_into($data_sql)){
                    $insert_id = $this->db->insert_id();
                    $link = 'click vào link <a href="'.site_url('trip/edit/'.$insert_id).'"> này </a> để xem chuyến đi vừa tạo.';
                    $data['message'] = get_message_success('Bạn đã tạo chuyến đi thành công!<br>', $link);
                }
                else{
                    $data['message'] = get_message_error('Tạo chuyến đi thất bại!');
                }            
            }
        }
        display('create_trip', $data);
    }

    public function process_request($trip_id, $id){   
        if (!$this->session->userdata('user_logged')){            
            redirect('page_not_found');
        }     
        // Nếu trip không phải của mình, thì chuyển về detail
        $trip = $this->trip_ml->get_by_primary($trip_id);
        // neu trip da accept roi thi thoi
        if ($trip['guess'] !== null){ return ; }
        $username = $this->session->userdata('username');
        
        $data = [];
        if ($this->input->post('accept')){          
            $data = $this->accept_request($trip_id, $id);                        
        }
        if ($this->input->post('cancel')){                         
            $this->cancel_request($id);
            redirect('trip/edit/'.$trip_id);
        }                           
        
    }

    public function accept_request($trip_id, $id){        
        $request = $this->request_ml->get_by_primary($id);                        
        $owner_id = $this->session->userdata('username');
        $owner = $this->user_ml->get_by_primary($owner_id);
        $trip = $this->trip_ml->get_by_primary($trip_id);            
        $fee = $trip['price'] * 0.2;                        
        if ($owner['balance'] >= $fee){                        
            // Tru tien
            $this->user_ml->set_attr($owner_id, 'balance', $owner['balance'] - $fee);
            // Dong y
            $this->accept($trip_id, $request);

            $data = [
                'title' => 'Chấp nhận chuyến đi thành công!',
                'content' => 'Phí cho chuyến đi này là '.$fee.'đ. Đây là chuyến đi trực tiếp. <br>
                Chúng tôi đã trừ phí này vào tài khoản của bạn. <br> Bấm vào <a href="'.site_url('trip/edit/'.$trip_id).'">đây</a> để quay về chi tiết chuyến đi.' 
            ];
            $this->session->set_flashdata('title', $data['title']);
            $this->session->set_flashdata('content', $data['content']);
            redirect('trip/accept_success/'.$trip_id);
        }        
        else{
            $data = [
                'title' => 'Chấp nhận chuyến đi KHÔNG thành công!',
                'content' => 'Phí cho chuyến đi này là '.$fee.'đ.<br>
                Và số tiền trong tài khoản của bạn không đủ. <br> Bấm vào <a href="'.site_url('trip/edit/'.$trip_id).'">đây</a> để quay về chi tiết chuyến đi.' 
            ];
            $this->session->set_flashdata($data);
            redirect('trip/accept_fail/'.$trip_id);
        }          
    }
    
    function accept($trip_id, $request){
        // Tạo thông báo        
        if ($request === null) {
            redirect('page_not_found');
        }
        $user = $this->user_ml->get_by_primary($this->session->userdata('username'));
        $notify = [
            'to_user' => $request['guess_id'],
            'time' => get_current_time(),
            'content' => hashCode($user['full_name']).' đã đồng ý yêu cầu của bạn ở trong chuyến đi '.$trip_id,
            'type_noti' => 'trip',
            'where_noti' => $trip_id            
        ];
        // Gửi thông báo
        $this->notify_ml->add_trigger($notify);
        // Send message
        $this->sendMessage($request['guess_id'], hashCode($user['full_name']).' has accepted your request in trip '.$trip_id.'\nClick <a href="'.site_url('trip/detail/'.$trip_id).'"> here </a> to view this trip!');
        // Tạo thông báo        
        $trip = $this->trip_ml->get_by_primary($trip_id);        
        $notify = [
            'to_user' => $trip['owner'],
            'time' => get_current_time(),
            'content' => 'Bạn đã đồng ý yêu cầu ở trong chuyến đi '.$trip_id,
            'type_noti' => 'trip',
            'where_noti' => $trip_id            
        ];
        // Gửi thông báo
        $this->notify_ml->add_trigger($notify);
        // Xác nhận là người dùng guess, đã được thêm vào chuyến đi        
        $this->trip_ml->set_attr($trip_id, 'guess', $request['guess_id']);                    
        // Xóa tất cả request của chuyến đi này      
        $this->request_ml->delete_all_from_trip($trip_id);    
    }

    // Có lẽ chủ xe không có quyền từ chối
    // mà người dùng sẽ tự biết để hủy

    public function cancel_request($request_id){
        $request = $this->request_ml->get_by_primary($request_id);      
        if ($request['guess_id'] != $this->session->userdata('username')){
            return ;
        }          
        $trip = $this->trip_ml->get_by_primary($request['trip_id']);
        // Soạn thông báo
        $notify = [
            'to_user' => $this->session->userdata('username'),
            'time' => get_current_time(),
            'content' => 'Bạn đã hủy yêu cầu tới chuyến đi '.$trip['id'].'.',
            'type_noti' => 'trip',
            'where_noti' => $trip['id']
        ];                
        // Gửi thông báo
        $this->notify_ml->add_trigger($notify);
        // Xóa request cho nó
        $this->request_ml->delete($request_id);
    }

    public function deny_request($id){        
        $request = $this->request_ml->get_by_primary($id);
        $trip = $this->trip_ml->get_by_primary($request['trip_id']);        
        // Xóa request cho nó
        $this->request_ml->delete($id);
    }

    public function detail_need($id){
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }

        $username = $this->session->userdata('username');
        if ($this->verify_ml->count_verify($username) < 1){
            redirect('trip/show_no_permission');
        } 

        $message = '';
        $trip = $this->needed_trip_ml->get_by_primary($id);

        if ($trip['asker'] == $this->session->userdata('username')){
            redirect('trip/edit_need/'.$id);
        }

        if ($this->input->post()){            
            $data_sql = [
                'guess' => $trip['asker'],
                'code' => rand(100000, 999999),
                'owner' => $this->session->userdata('username'),
                'price' => $trip['price'],
                'start_from' =>$trip['start_from'],
                'finish_to' => $trip['finish_to'],
                'timestart' => $trip['timestart'],
                'created' => $trip['created']                           
            ];                                              
            $owner = $this->user_ml->get_by_primary($data_sql['owner']);                
            $fee = $trip['price'] * 0.2;                
            if ($owner['balance'] >= $fee){
                // Trừ tiền của người chở
                $this->user_ml->set_attr($data_sql['owner'], 'balance', $owner['balance'] - $fee);                
                // Tạo chuyến đi ngay!
                $this->trip_ml->add_into($data_sql);
                $insert_id = $this->db->insert_id();                    
                // Xóa need trip này!
                // Set trip_id, instead removing it
                $this->needed_trip_ml->set_attr($id, 'trip_id', $insert_id);
                //$this->needed_trip_ml->delete($id);
                // Gửi thông báo
                $notify = [
                    'to_user' => $data_sql['owner'],
                    'time' => get_current_time(),
                    'content' => 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: '.$insert_id,
                    'type_noti' => 'trip',
                    'where_noti' => $insert_id
                ];
                $this->notify_ml->add_trigger($notify);

                // them vao bang matched
                $this->matched_ml->add_into(['user1' => $data_sql['owner'], 'user2' => $data_sql['guess']]);
                //            
                $notify = [
                    'to_user' => $data_sql['guess'],
                    'time' => get_current_time(),
                    'content' => 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: '.$insert_id,
                    'type_noti' => 'trip',
                    'where_noti' => $insert_id
                ];
                $this->notify_ml->add_trigger($notify);
                // send message
                $this->sendMessage($data_sql['guess'], 'Your asked trip was opened! Please check to contact as soon as posible!^^'.'\nClick <a href="'.site_url('trip/detail/'.$insert_id).'"> here </a> to view this trip!');
                redirect('trip/show_open_this_trip/'.$insert_id);                          
            }
            else{
                $message = get_message_error('Lỗi!<br>', 'Đây là hình thức thanh toán trực tiếp. Nhưng tài khoản của bạn không đủ.');
            }            
        }
        
        $asker = $this->user_ml->get_by_primary($trip['asker']);
        $data = [
            'trip' => $trip,
            'asker' => $asker,
            'message' => $message,     
            'images' => $this->image,                             
        ];
        display('detail_need', $data);
    }

    public function edit_need($trip_id){
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }
        // Nếu trip không phải của mình, thì chuyển về detail
        $trip = $this->needed_trip_ml->get_by_primary($trip_id);
        $username = $this->session->userdata('username');
        if ($trip['asker'] != $username){ redirect('trip/detail_need/'.$trip_id); }
        $asker = $this->user_ml->get_by_primary($username);
        $message = '';
        // check if it is mine                
        if ($this->input->post('edit')){
            $check = $this->needed_trip_ml->edit($trip_id);
            if ($check['status'] == true){
                $message = get_message_success('Sửa thành công!'); 
            }
            else{
                $message = get_message_error($check['data']); 
            }
        }
        
        $trip = $this->needed_trip_ml->get_by_primary($trip_id);
        $data = [
            'trip' => $trip,
            'message' => $message,            
            'asker' => $asker,            
            'images' => $this->image,            
        ];

        display('edit_need_trip', $data);
    }

    public function accept_success($id){
        $trip = $this->trip_ml->get_by_primary($id);
        $match = [
            'user1' => $trip['owner'],
            'user2' => $trip['guess']
        ];
        $this->matched_ml->add_into($match);
        $data = [
            'title' => $this->session->flashdata('title'),
            'content' => $this->session->flashdata('content')
        ];
        display('action_info', $data);
    }

    public function accept_fail($id){
        display('action_info', $this->session->flashdata());
    }

    public function remove_trip($trip_id){
        $username = $this->session->userdata('username');
        $trip = $this->trip_ml->get_by_primary($trip_id);
        if (!$trip) {
            redirect('page_not_found');
        }
        if ($trip['owner'] != $username){
            redirect('trip/detail/'.$trip_id); 
        }

        $id_need_trip = $this->needed_trip_ml->get_id_from_tripid($trip_id);
        echo $id_need_trip;
        return ;
        if ($id_need_trip) $this->needed_trip_ml->set_attr($id_need_trip, 'trip_id', 0);

        // Gửi notify đến cho Khách nếu đã có khách
        //Trả lại tiền cho những người gián tiếp
        $self = $this->user_ml->get_by_primary($username);
        $content = hashCode($self['full_name'].' đã xóa chuyến đi '.$trip_id.' mà bạn quan tâm.');
        $all_requests = $this->request_ml->get_all_from_trip($trip_id);            
        if ($all_requests){
            foreach ($all_requests as $req){
                // Gửi thông báo rằng đã xóa chuyến đi
                // Soạn thông báo
                $notify = [
                    'to_user' => $req['guess_id'],
                    'time' => get_current_time(),
                    'content' => $content,
                    'type_noti' => 'profile',
                    'where_noti' => $req['guess_id']
                ];
                // Gửi thông báo
                $this->notify_ml->add_trigger($notify);
            }
        }            
        // Xóa tất cả comment liên quan đến chuyến đi này
        $this->comment_ml->delete_all_from_trip($trip_id);
        // Xóa hết tất cả các request từ chuyến đi này
        $this->request_ml->delete_all_from_trip($trip_id);        
        // Xóa chuyến đi này!
        $this->trip_ml->delete($trip_id);

        redirect('trip/my_trips');        
    }

    public function remove_need($trip_id){
        $username = $this->session->userdata('username');
        $trip = $this->needed_trip_ml->get_by_primary($trip_id);
        if ($trip['asker'] != $username){ redirect('trip/detail_need/'.$trip_id); }
        // Gửi notify đến cho Khách nếu đã có khách                
        $this->needed_trip_ml->delete($trip_id);
        redirect('trip/my_trips');    
    }

    public function show_no_permission(){
        $data = [
            'title' => 'Vì lí do an toàn',
            'content' => 'Có lẽ bạn cần ít nhất một trong bốn loại giấy tờ xác thực để có thể thực hiện được chức năng này. Mời bạn bấm vào <a href="'.site_url('verify').'"> đây </a> để gửi giấy tờ xác thực.',  
        ];
        display('action_info', $data);
    }

    public function sendMessage($username, $content){
        $email = $this->verify_ml->get_email($username);
        if ($email == null){
            return ;
        }
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

    public function show_open_this_trip($trip_id){
        $trip = $this->trip_ml->get_by_primary($trip_id);
        if ($trip == null){
            redirect('page_not_found');
        }
        $fee = $trip['price'] * 0.2;
        $data = [
            'title' => 'Bạn đã đồng ý mở chuyến đi này',
            'content' => 'Chúng tôi đã trừ vào tài khoản của bạn phí cho chuyến đi này là '.$fee.'d. Bấm vào <a href="'.site_url('trip/detail/'.$trip_id).'"> đây </a> để  xem chuyến đi bạn vừa tạo.'  
        ];
        display('action_info', $data);
    }
}