<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Controller {
    
    // declare variables
    public $image;
    public $tructiep, $giantiep;

    public function __construct(){
        parent::__construct();        
        $this->load->model(array('request_ml'));
        $this->load->helper(['image']);

        $places = $this->place_ml->get_all();        
        foreach ($places as $place){
            $this->image[$place['id']] = $place['image'];
        }                
        $this->tructiep = 'Trực tiếp';
        $this->giantiep = 'Gián tiếp';                
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
        $trip = $this->trip_ml->get_by_primary($trip_id);   
        if ($trip === null){ redirect('page_not_found'); }

        $username = $this->session->userdata('username');     
        $message = '';
        // Nếu gửi yêu cầu
        if ($this->input->post()){            

            $trip = $this->trip_ml->get_by_primary($trip_id);   
            if ($trip['guess'] != null){
                redirect('trip/detail/'.$trip_id);
            }

            $type_transaction = $this->input->post('type_transaction');  
            // Nếu chưa chọn hình thức giao dịch          
            if ($type_transaction == null){
                $message = get_message_error('Lỗi! <br>', 'Bạn phải chọn hình thức giao dịch');
            }
            elseif ($type_transaction !== $this->tructiep && $type_transaction !== $this->giantiep){
                $message = get_message_error('Lỗi! <br>', 'Bạn vui lòng chọn đúng 1 trong 2 loại hình thức giao dịch');
            }
            else {                
                // Gui yeu cau mat 100d
                
                // Soạn thông báo trước
                $notify = [
                    'to_user' => $username,
                    'time' => get_current_time(),
                    'content' => 'Bạn đã gửi yêu cầu tới chuyến đi '.$trip_id.' với hình thức '.$type_transaction.'.',
                    'type_noti' => 'trip',
                    'where_noti' => $trip_id                                        
                ];
                // Nếu là trả tiền gián tiếp, mình buộc phải dùng tài khoản dự bị
                // Nếu Trực tiếp thì thôi
                $success = ($type_transaction == $this->tructiep);
                if ($type_transaction == $this->giantiep){
                    $success = false;
                    $price = $trip['price'];                    
                    $success = ($this->user_ml->move_money_to_temp_balance($username, $price));                    
                }
                $success = $success && ($this->user_ml->get_money($username) >= 100);
                // Nếu kiểm tra tài khoản thành công! Thì thêm vào database của Request
                if ($success){
                    //Gửi thông báo rằng: Bạn đã bị chuyển từ tài khoản chính vào tk dự bị số tiền là: $trip[price]
                    if ($type_transaction == $this->giantiep){
                        $notify['content'] .= ' Chúng tôi đã chuyển số tiền là '.$trip['price'].' từ tài khoản chính sang tài khoản dự bị của bạn.';
                        $notify['type_noti'] = 'profile';
                        $notify['where_noti'] = $username;                        
                    }
                    
                    /*  */
                    $this->user_ml->move_money_to_temp_balance($this->session->userdata('username'), 100);
                    /*  */

                    $sql = [
                        'trip_id' => $trip_id, 
                        'guess_id' => $username, 
                        'created' => get_current_time(),
                        'type_transaction' => $type_transaction
                    ];
                    if ($this->request_ml->add_into($sql)){                        
                        $message = get_message_success('Bạn đã gửi yêu cầu tới chuyến đi này! Phí gửi yêu cầu là 100đ');
                        // Gửi thông báo
                        $this->notify_ml->add_trigger($notify);
                        // Gửi thông báo đến người owner luôn
                        $user_guess = $this->user_ml->get_by_primary($username);
                        $notify = [
                            'to_user' => $trip['owner'],
                            'time' => get_current_time(),
                            'content' => hashCode($user_guess['full_name']).' đã gửi yêu cầu đến chuyến đi '.$trip['id'].' của bạn. Phí gửi yêu cầu là 100đ',
                            'type_noti' => 'edit_trip',
                            'where_noti' => $trip_id
                        ];
                        $this->notify_ml->add_trigger($notify);
                    } else {
                        $message = get_message_error('Lỗi! <br>', 'Gửi yêu cầu thất bại!');
                    }   
                }  
                else{ 
                    $message = get_message_error('Lỗi! <br>','Số tiền của bạn không đủ!');
                }
            }
        }
        if ($trip['success'] == false){            
            // Nếu đã có khách
            if ($trip['guess'] != null){
                if ($trip['guess'] == $username){
                    $message = get_message_info('Bạn đã tham gia vào chuyến đi này! <br>','Mã của chuyến đi là: '.$trip['code']);
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
            $message = get_message_info('', 'Bạn đã gửi yêu cầu tới chuyến đi này! Phí gửi yêu cầu là 100đ');
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
        $message = '';
        if ($this->input->post()){            
            $check = $this->needed_trip_ml->preparing_data();
            if ($check['status'] === false){
                $message = $check['data'];
            }
            else{                                
                // Nếu chọn hình thức gián tiếp thì phải kiểm tra tài khoản
                $type = $this->input->post('type_transaction');
                if ($type == null){
                    $message = get_message_error('Lỗi!', 'Xin vui lòng chọn hình thức thanh toán!');
                } else{
                    $data_sql = $check['data'];                       
                    $ok = ($type == $this->tructiep);
                    if ($type == $this->giantiep){
                        $asker = $this->session->userdata('username');
                        $ok = $this->user_ml->move_money_to_temp_balance($asker, $data_sql['price']);                                                
                    }
                    /* */                    
                    if ($this->user_ml->get_money($this->session->userdata('username')) < 100){
                        $ok = false;                        
                    }
                    /*  */
                    if ($ok){
                        $data_sql['type_transaction'] = $type;
                        if ($this->needed_trip_ml->add_into($data_sql)){
                            print_r($data_sql);                 
                            $insert_id = $this->db->insert_id();
                            $link = 'click vào link <a href="'.site_url('trip/edit_need/'.$insert_id).'"> này </a> để xem chuyến đi vừa tạo.';
                            $money = ' Phí cho chuyến đi là 100đ';
                            $message = get_message_success('Bạn đã tạo chuyến đi thành công!<br>', $link.$money); 
                            $this->user_ml->move_money_to_temp_balance($this->session->userdata('username'), 100);
                        }
                    }
                    else{
                        $message = get_message_error('Lỗi!', 'Số tiền của bạn không đủ!');
                    }
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
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }

        $username = $this->session->userdata('username');
        $data = ['owner' => $username, 'message'=>'', '_places' => $this->place_ml->get_all()];
        
        if ($this->input->post()){            
            $check = $this->trip_ml->preparing_data();                        
            if ($check['status'] === false){
                $data['message'] = $check['data'];
            }    
            else{
                $data_sql = $check['data'];
                // Tạo chuyến đi mới

                /* */                    
                if ($this->user_ml->get_money($this->session->userdata('username')) < 100){
                    $data['message'] = get_message_error('Tạo chuyến đi thất bại!');
                }                
                /* */
                else{
                    if ($this->trip_ml->add_into($data_sql)){
                        $insert_id = $this->db->insert_id();
                        $link = 'click vào link <a href="'.site_url('trip/edit/'.$insert_id).'"> này </a> để xem chuyến đi vừa tạo.';
                        $money = ' Phí để tạo chuyến đi là 100đ';
                        $data['message'] = get_message_success('Bạn đã tạo chuyến đi thành công!<br>', $link.$money);
                        $this->user_ml->move_money_to_temp_balance($username, 100);
                    }
                    else{
                        $data['message'] = get_message_error('Tạo chuyến đi thất bại!');
                    }
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
        if ($request['type_transaction'] == $this->tructiep){
            $owner_id = $this->session->userdata('username');
            $owner = $this->user_ml->get_by_primary($owner_id);
            $trip = $this->trip_ml->get_by_primary($trip_id);            
            $fee = $trip['price'] * 0.2;            
            if ($owner['balance'] >= $fee){
                $this->user_ml->set_attr($owner_id, 'balance', $owner['balance'] - $fee);
                // Nếu là chuyến đi trực tiếp, thì coi như đã thành công!
                $this->trip_ml->set_attr($trip_id, 'success', true);
                $this->accept($trip_id, $request);

                $data = [
                    'title' => 'Chấp nhận chuyến đi thành công!',
                    'content' => 'Phí cho chuyến đi này là '.$trip['price'].'đ x 20% = '.$fee.'đ. Đây là chuyến đi trực tiếp. <br>
                    Vậy nên chúng tôi đã trừ phí này vào tài khoản của bạn. <br> Bấm vào <a href="'.site_url('trip/edit/'.$trip_id).'">đây</a> để quay về chi tiết chuyến đi.' 
                ];
                $this->session->set_flashdata('title', $data['title']);
                $this->session->set_flashdata('content', $data['content']);
                redirect('trip/accept_success/'.$trip_id);
            }        
            else{
                $data = [
                    'title' => 'Chấp nhận chuyến đi KHÔNG thành công!',
                    'content' => 'Phí cho chuyến đi này là '.$trip['price'].'đ x 20% = '.$fee.'đ. Đây là chuyến đi gián tiếp. <br>
                    Và số tiền trong tài khoản của bạn không đủ. <br> Bấm vào <a href="'.site_url('trip/edit/'.$trip_id).'">đây</a> để quay về chi tiết chuyến đi.' 
                ];
                $this->session->set_flashdata($data);
                redirect('trip/accept_fail/'.$trip_id);
                //redirect('trip/edit/'.$trip_id);
            }
        }
        else{
            $this->accept($trip_id, $request);   
            $data = [
                'title' => 'Chấp nhận chuyến đi thành công!',
                'content' => 'Phí cho chuyến đi này là '.$trip['price'].'đ x 20% = '.$fee.'đ. Đây là chuyến đi gián tiếp. <br>
                Vậy nên chúng tôi sẽ trừ phí này vào tài khoản của bạn sau khi bạn check code thành công. <br> Bấm vào <a href="'.site_url('trip/edit/'.$trip_id).'">đây</a> để quay về chi tiết chuyến đi.' 
            ];
            $this->session->set_flashdata($data);
            redirect('trip/accept_success/'.$trip_id);
            //Chuyển từ tài khoản dự bị sang tài khoản chính cho những khách không được đồng ý!
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
        $this->trip_ml->push_to_trip($trip_id, $request['guess_id'], $request['type_transaction']);
        $this->trip_ml->set_attr($trip_id, 'guess', $request['guess_id']);    
        $this->trip_ml->set_attr($trip_id, 'type_transaction', $request['type_transaction']);
        // Hoàn tác tiền cho tất cả mọi người
        $all_requests = $this->request_ml->get_all_from_trip($trip_id);        
        foreach ($all_requests as $req){
            if (($request['guess_id'] != $req['guess_id']) && ($req['type_transaction'] == $this->giantiep)){
                $this->user_ml->move_money_to_balance($req['guess_id'], $trip['price']);
            }
        }
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
        // Trả lại tiền nếu người dùng thanh toán gián tiếp,
        // Chỉ gián tiếp mới mất tiền
        if ($request['type_transaction'] == $this->giantiep){            
            $this->user_ml->move_money_to_balance($request['guess_id'], $trip['price']);        
            $notify['content'] .= 'Chúng tôi đã chuyển lại từ tài khoản dự bị vào tài khoản chính cho bạn số tiền '.$trip['price'];
            $notify['type_noti'] = 'profile';
            $notify['where_noti'] = $notify['to_user'];            
        }
        // Gửi thông báo
        $this->notify_ml->add_trigger($notify);

        // Xóa request cho nó
        $this->request_ml->delete($request_id);
    }

    public function deny_request($id){        
        $request = $this->request_ml->get_by_primary($id);
        $trip = $this->trip_ml->get_by_primary($request['trip_id']);
        // Trả lại tiền nếu người dùng thanh toán gián tiếp,
        // Chỉ gián tiếp mới mất tiền
        if ($request['type_transaction'] == $this->giantiep){
            $this->user_ml->move_money_to_balance($request['guess_id'], $trip['price']);        
        }
        // Xóa request cho nó
        $this->request_ml->delete($id);
    }

    public function detail_need($id){
        if (!$this->session->userdata('user_logged')){
            redirect('login');
        }
        $message = '';
        $trip = $this->needed_trip_ml->get_by_primary($id);
        if ($this->input->post()){
            $data_sql = [
                'guess' => $trip['asker'],
                'code' => rand(100000, 999999),
                'owner' => $this->session->userdata('username'),
                'price' => $trip['price'],
                'start_from' =>$trip['start_from'],
                'finish_to' => $trip['finish_to'],
                'timestart' => $trip['timestart'],
                'created' => $trip['created'],
                'type_transaction' => $trip['type_transaction']                
            ];                  
            // Nếu là thanh toán trực tiếp thì mình lấy tiền của owner
            if ($trip['type_transaction'] == $this->tructiep){
                // Trừ tiền của người chở
                $owner = $this->user_ml->get_by_primary($data_sql['owner']);
                $fee = $trip['price'] * 0.2;
                if ($owner['balance'] >= $fee){
                    $this->user_ml->set_attr($data_sql['owner'], 'balance', $owner['balance'] - $fee);
                    // Tạo chuyến đi ngay!
                    $data_sql['success'] = true;
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
                    // remove need trip                    
                    redirect('trip/detail/'.$insert_id);                          
                }
                else{
                    $message = get_message_error('Lỗi!<br>', 'Đây là hình thức thanh toán trực tiếp. Nhưng tài khoản của bạn không đủ.');
                }
            }
            elseif ($trip['type_transaction'] == $this->giantiep){                
                $this->trip_ml->add_into($data_sql);                
                $insert_id = $this->db->insert_id();          
                $this->needed_trip_ml->delete($id);      
                // Gửi thông báo
                $notify = [
                    'to_user' => $data_sql['owner'],
                    'time' => get_current_time(),
                    'content' => 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn là: '.$insert_id,
                    'type_noti' => 'trip',
                    'where_noti' => $insert_id
                ];
                $this->notify_ml->add_trigger($notify);

                $notify = [
                    'to_user' => $data_sql['guess'],
                    'time' => get_current_time(),
                    'content' => 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: '.$insert_id,
                    'type_noti' => 'trip',
                    'where_noti' => $insert_id
                ];
                $this->notify_ml->add_trigger($notify);

                redirect('trip/detail/'.$insert_id);
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
        if ($trip['owner'] != $username){
            redirect('trip/detail/'.$trip_id); 
        }
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

                if ($req['type_transaction'] == $this->giantiep){
                    $notify['content'] = $content.'Vì vậy, chúng tôi đã chuyển tiền từ tài khoản dự bị vào lại tài khoản chính cho bạn';
                    $this->user_ml->move_money_to_balance($req['guess_id'], $trip['price']);
                }
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
        //Trả lại tiền cho những người gián tiếp
        // Nếu là xóa, thì mình chuyển lại tiền vào tài khoản chính từ tài khoản dự bị                
        if ($trip['type_transaction'] == $this->giantiep){
            $this->user_ml->move_money_to_balance($username, $trip['price']);   
        }            
        $this->needed_trip_ml->delete($trip_id);
        redirect('trip/my_trips');
    
    }
}