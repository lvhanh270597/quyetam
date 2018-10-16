<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function get_unseen_comment($trip){
        $current_user = $this->session->userdata('username');        
        $trip = $this->trip_ml->get_by_primary($trip);                
        if ($trip['guess'] == $current_user || $trip['owner'] == $current_user){        
            $another = get_another($trip['owner'], $trip['guess'], $current_user);    
            $comments = $this->comment_ml->get_unseen_comment($trip['id'], $another);
            // set unseen comment is seen
            $this->comment_ml->set_seen_comment($comments);
            echo json_encode($comments);
        }
        else{
            echo json_encode([]);
        }
    } 		
    
    public function push_to_database($trip_id){
        if (!$this->trip_ml->checkExist($trip_id)){
            return ;
        }

        $content = $this->input->post('content');
        $username = $this->session->userdata('username');
        $created = get_current_time();
        $seen = false;
        $data = [
            'content' => hashCode($content),
            'user_id' => $username,
            'created' => $created,
            'seen'    => $seen,
            'trip_id' => $trip_id
        ];        
        $this->comment_ml->add_into($data);
        // Tạo notify báo cho người còn lại
        $cur_user = $this->user_ml->get_by_primary($username);
        $trip = $this->trip_ml->get_by_primary($trip_id);
        $another = get_another($trip['guess'], $trip['owner'], $username);
        $notify = [
            'to_user' => $another,
            'time'    => get_current_time(),
            'content' => '<strong> '.$cur_user['full_name'].'</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.',
            'type_noti'=> 'trip',
            'where_noti' => $trip_id,
            'seen' => false
        ];
        // Send
        $this->notify_ml->add_trigger($notify);
    }
}
