<?php
require_once('Quickaccess.php');
class User_ml extends Quickaccess
{

	protected $primary = 'username';
	protected $db_table = 'user';
	protected $personal_info = ['username','full_name', 'password'];
	protected $editable_fields = ['username','full_name', 'gender', 'password','facebook', 'phone_num', 'mssv', 'university'];	

	public function __construct()
	{
		parent::__construct();			
		$this->load->helper(array('string'));
	}

	public function user_log_in($username){
		if ($username){
			$this->session->set_userdata('user_logged', true);						
			$user = $this->get_by_primary($username);
			foreach ($this->personal_info as $info_field) {				
				$this->session->set_userdata($info_field, $user[$info_field]);
			}						
			$redirect = $this->session->redirect != null ? $this->session->redirect : base_url();
			redirect($redirect);
		}
	}	

	public function add_money($username, $money){		
		$query = $this->get_by_primary($username);
		$query['balance'] += $money;
		$this->db->where('username', $username)->update($this->db_table, $query);		
	}

	public function check_register(){
		$error = array(
			'username' => 'Bạn phải nhập Username',
			'full_name' => 'Bạn phải nhập Tên đầy đủ',
			'password' => 'Bạn phải nhập Mật khẩu'			
		);
		foreach ($this->personal_info as $field){
			if ($this->input->post($field) == null){
				return $error[$field];
			}
		}
		// check validation username		
		$username = $this->input->post('username');
		if ($error = checkUsername($username)){
			if ($error !== true){ return $error; }
		}
		
		$user = $this->get_by_primary($username);
		if ($user != null){
			return 'Username '.$this->input->post('username').' đã tồn tại.';
		}
		// end check
		// check password
		$password = $this->input->post('password');
		if (strlen($password) < 4){
			return 'Mật khẩu nên nhiều hơn 3 kí tự';
		}
		return null;		
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
		$this->set_attr($username, 'balance', $balance + $money);
		$this->set_attr($username, 't_balance', $t_balance - $money);			
	}

	public function decrease_money($username, $money, $tkc=true){
		$user = $this->get_by_primary($username);		
		$tkc = $tkc ?  'balance': 't_balance';		
		$this->set_attr($username, $tkc, $user['balance'] - $money);		
	}
}