<?php
require_once('Quickaccess.php');
class User_ml extends Quickaccess
{

	protected $primary = 'username';
	protected $db_table = 'user';
	protected $personal_info = ['username', 'password'];
	protected $editable_fields = ['username','full_name', 'gender', 'password'];
	protected $fields = ['facebook', 'phone_num', 'gender', 'university', 'subject'];	
	private $security;

	public function __construct()
	{
		parent::__construct();			
		$this->load->helper(array('string'));
		require_once "assets/security/Security.php";
        $this->security = new Security(); 
	}

	public function user_log_in($user){
		if ($user !== null){
			$this->session->set_userdata('user_logged', true);									
			foreach ($this->editable_fields as $info_field) {				
				$this->session->set_userdata($info_field, $user[$info_field]);
			}						
			$redirect = $this->session->redirect != null ? $this->session->redirect : base_url();
			redirect($redirect);
		}
	}	

	public function edit(){
		$username = $this->session->userdata('username');
		$data  = $this->user_ml->get_by_primary($username);
		foreach ($this->fields as $field){
			if (!empty($this->input->post($field))){
				$data[$field] = hashCode($this->input->post($field));
			}
		}
		$this->db->set($data);
		$this->db->where(['username' => $username]);
		$this->db->update($this->db_table);
		return true;
	}

	public function add_money($username, $money, $auth = false){		
		if ($auth == false){
			if (!$this->session->userdata('admin')){
				redirect('admin/login');
			}
		}
		$username = trim($username);
		if (!$this->place_ml->security->checkUsername($username)){
			return false;	
		}
		$user = $this->get_by_primary($username);
		if ($user === null){
			return false;
		}
		$user['balance'] += $money;
		$this->db->where('username', $username)->update($this->db_table, $user);		
	}

	public function check_register(){
		$empty = [
			'username' => 'Bạn phải nhập username',
			'full_name' => 'Bạn phải nhập tên đầy đủ',
			'password' => 'Bạn phải nhập mật khẩu',
			'gender' => 'Bạn phải điền gender',			
		];
		$data = [];
		foreach ($this->editable_fields as $field){
			if ($this->input->post($field) === null){ 
				return [
					'status' => false,
					'data' => $empty[$field]
				]; 
			}
			else{ $data[$field] = trim($this->input->post($field)); }
		}
		// check validation username				
		$ok = $this->security->checkRegister($data);
		if ($ok !== true){ 
			return [
				'status' => false,
				'data' => $ok
			]; 
		}
		// check existed username				
		$user = $this->get_by_primary($data['username']);
		if ($user !== null){ 
			return [
				'status' => false,
				'data' => 'username đã tồn tại.'
			]; 
		}					

		return [
			'status' => true, 
			'data' => $data
		];		
	}	
	
	public function check_login(){
		$empty = [
			'username' => 'Bạn phải nhập username',			
			'password' => 'Bạn phải nhập mật khẩu',					
		];
		$data = [];
		foreach ($this->personal_info as $field){
			if ($this->input->post($field) === null){ 
				return [
					'status' => false,
					'data' => $empty[$field]
				]; 
			}
			else{ $data[$field] = trim($this->input->post($field)); }
		}
		
		$ok = $this->security->checkLogin($data);
		if ($ok !== true){ 
			return [
				'status' => false,
				'data' => $ok
			]; 
		}
		// check existed username		
		$user = $this->get_by_primary($data['username']);
		if ($user === null){ 
			return [
				'status' => false,
				'data' => 'username không tồn tại.'
			]; 
		}			

		return [
			'status' => true,
			'data' => $data
		];
	}

	public function add_really_carefully($data){
		$data['created'] = get_current_time();
		$data['balance'] = 1500; //1999
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT, ['cost' => 11]);
		$this->db->insert($this->db_table, $data);
		return true;
	}

	public function check_verify($username){
		$query = $this->db->get_where($this->db_table, array('username' => $username));
		if ($query->num_rows() != 1){
			return false;
		}
		else{
			$user = $query->result_array()[0];
			return $user['verify'];
		}
	}

	public function verify($username, $hash){
		$query = $this->db->get_where($this->db_table, array('username' => $username));
		if ($query->num_rows() != 1){
			return false;
		}
		$user = $query->result_array()[0];		
		return ($user['hash'] == $hash);
	}

	public function move_money_to_temp_balance($username, $money){
		$user = $this->get_by_primary($username);		
		if (!$user) return false;
		$balance = $user['balance'];
		$t_balance = $user['t_balance'];
		if ($balance >= $money){
			$this->set_attr($username, 'balance', $balance - $money);
			$this->set_attr($username, 't_balance', $t_balance + $money);
			return true;
		}
		return false;
	}

	public function move_money_to_balance($username, $money){
		$user = $this->get_by_primary($username);
		if (!$user) return false;
		$balance = $user['balance'];
		$t_balance = $user['t_balance'];		
		$money = min($money, $t_balance);
		$this->set_attr($username, 'balance', $balance + $money);
		$this->set_attr($username, 't_balance', $t_balance - $money);			
	}

	public function decrease_money($username, $money, $tkc=true){
		$user = $this->get_by_primary($username);		
		$tkc = $tkc ?  'balance': 't_balance';		
		$this->set_attr($username, $tkc, $user['balance'] - $money);		
	}

	public function get_total(){
		$this->db->order_by('created', 'desc');
		$dataset = $this->db->get($this->db_table);
		return $dataset->result_array();
	}

	public function get_money($username){
		$dataset = $this->db->get_where($this->db_table, ['username'=> $username]);
		if ($dataset->num_rows() == 0) return 0;
		return $dataset->result_array()[0]['balance'];
	}
}