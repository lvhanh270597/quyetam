<?php
class Security
{
    private $blacktrie;
    
    public function __construct(){
        $this->buildBlacklist();
    }

    public function encode($text){
        return htmlentities($text);
    }

    private function buildBlacklist(){
        $myfile = fopen(__DIR__."/list.json", "r") or die("Unable to open file!");
        $list = fread($myfile, filesize(__DIR__."/list.json"));        
        fclose($myfile);
        $list = json_decode($list, true);

        require_once "Trie.php";
        $this->blacktrie = new Trie();
        foreach ($list as $word){
            $this->blacktrie->add($word, true);
        }
    }
    
    private function checkInBlacklist($str){
        return $this->blacktrie->search($str) !== null;
    }

    public function checkUsername($username){        
        $username = trim($username);
        if (empty($username)) {
            return "username không được rỗng";
        }elseif (strlen($username) < 4) {
            return "username quá ngắn ";
        }elseif (strlen($username) > 26) {
            return "username quá dài";
        }elseif (!preg_match('~^[a-z]{2}~i', $username)) {
            return "username phải bắt đầu với hai kí tự chữ";
        }elseif (preg_match('~[^a-zA-Z0-9_.]+~i', $username)) {
            return "username chứa những kí tự không hợp lệ";
        }elseif (substr_count($username, ".") > 1) {
            return "username chỉ chứa một hoặc không có dấu chấm nào";
        }elseif (substr_count($username, "_") > 1) {
            return "username chỉ chứa một hoặc không có dấu _ nào";
        }elseif (substr_count($username, " ") > 0){
            return "username không chứa kí tự rỗng";
        }elseif ($this->checkInBlacklist($username)){
            return "username không được đặt tên như này";
        }
        return true;
    }

    public function checkGender($gender){
        $gender = trim($gender);
        if (empty($gender)){
            return "Giới tính không được rỗng!";
        }
        if (! in_array($gender, ["nam", "nu", "khac"])){
            return 'Giới tính không tồn tại';
        }
        return true;
    }

    public function checkFullName($fullname){
        $fullname = trim($fullname);
        if (empty($fullname)){
            return "Tên không được rỗng!";
        }
        if(!preg_match("/[a-zA-Z]/", $fullname)){
			return 'Tên chưa đúng';
        }
        return true;
    }

    public function checkPassword($password){        
		if (strlen($password) < 8){
			return 'Mật khẩu phải nhiều hơn 8 kí tự';
        }
        return true;
    }

    public function checkRegister($data){        
        $error = $this->checkUsername($data['username']);		
        if ($error !== true){ return $error; }	
        $error = $this->checkPassword($data['password']);	
        if ($error !== true){ return $error; }	
        $error = $this->checkFullName($data['full_name']);	
        if ($error !== true){ return $error; }	
        $error = $this->checkGender($data['gender']);	
        if ($error !== true){ return $error; }	
        return true;
    }

    public function checkLogin($data){          
        $error = $this->checkUsername($data['username']);		
        if ($error !== true){ return $error; }	
        $error = $this->checkPassword($data['password']);	
        if ($error !== true){ return $error; }	
        return true;
    }

}