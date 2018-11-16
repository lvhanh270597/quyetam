<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('startsWith'))
{		
    function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

}

if ( ! function_exists('endsWith')){
    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
        return (substr($haystack, -$length) === $needle);
    }
}

if ( ! function_exists('hasSpace')){
    function hasSpace($str){
        if ($str == trim($str) && strpos($str, ' ') !== false) {
            return true;
        }
        return false;
    }   
}

if ( ! function_exists('hasSpecialCharacter')) {
    function hasSpecialCharacter($string){        
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $string))
        {
            return true;
        }
        return false;
    }
}

if ( ! function_exists('checkUsername') ){
    function checkUsername($username) {
                
        $username = trim($username);
        if (empty($username)) {
            return "username was left blank.";
        }elseif (strlen($username) < 4) {
            return "username was too short";
        }elseif (strlen($username) > 26) {
            return "username was too long";
        }elseif (!preg_match('~^[a-z]{2}~i', $username)) {
            return "username must start with two letters";
        }elseif (preg_match('~[^a-z0-9_.]+~i', $username)) {
            return "username contains invalid characters.";
        }elseif (substr_count($username, ".") > 1) {
            return "username may only contain one or less periods.";
        }elseif (substr_count($username, "_") > 1) {
            return "username may only contain one or less underscores.";
        }
        return true;
    } 
}

if ( ! function_exists('checkFacebook')) {
    function checkFacebook($facebook){
        $regrex = '/(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?/';
        if (!preg_match($regrex, $facebook)) {
            return false;
        }
        else{
            return true;
        }
    }
}

if ( ! function_exists('get_message_success')){
    function get_message_success($content, $sub=''){
        $message_success = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success"> 
					<strong>                                        
						'.$content.'
                    </strong>
                    '.$sub.'
				</div>  
			</div>
		</div>    ';
		return $message_success;	
    }
}

if ( ! function_exists('get_message_error')){
    function get_message_error($content, $sub=''){
        $message_error = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger"> 
					<strong>                                        
						'.$content.'
                    </strong>
                    '.$sub.'
				</div>  
			</div>
        </div>    ';	
        return $message_error;
    }
}

if ( ! function_exists('get_message_info')){
    function get_message_info($content, $sub=''){
        $message_error = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info"> 
					<strong>                                        
						'.$content.'
                    </strong>
                    '.$sub.'
				</div>  
			</div>
        </div>    ';	
        return $message_error;
    }
}

if ( ! function_exists('get_message_primary')){
    function get_message_primary($content, $sub){
        $message_error = '
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary"> 
					<strong>                                        
						'.$content.'
                    </strong>
                    '.$sub.'
				</div>  
			</div>
        </div>    ';	
        return $message_error;
    }
}

if ( ! function_exists('get_another')){
    function get_another($str1, $str2, $username){
        if ($str1 == $username) return $str2;
        return $str1;
    }
}

if ( ! function_exists('check_email')){
    function check_email($email){
        $endSwith = array(
            'ĐH Bách Khoa' => 'hcmut.edu.vn',
            'ĐH Công Nghệ Thông Tin' => 'gm.uit.edu.vn',
            'ĐH Nhân Văn' => 'hcmussh.edu.vn',
            'ĐH Kinh Tế - Luật' => 'st.uel.edu.vn',
            'ĐH Nông Lâm' => 'st.hcmuaf.edu.vn',
            'ĐH Quốc Tế' => 'mp.hcmiu.edu.vn',
            'ĐH Khoa Học Tự Nhiên' => 'student.hcmus.edu.vn'            
        );
        foreach ($endSwith as $uni => $end){
            $length = strlen($end);
            if (substr($email, -$length) === $end){
                return $uni;
            }
        }
        return 'Quả thật! Có một số trường không dùng loại email riêng. Hãy chắc rằng đây thực sự là email sinh viên của bạn.';        
    }
}

if ( ! function_exists('hashCode')){
    function hashCode($code){
        return htmlentities($code);
    }
}

if (!function_exists('get_price')){
    function get_price($price){
        $price = trim($price);
        return is_numeric($price) ? (int)$price : false;
    }
}

if (!function_exists('get_color_status')){
    function get_color_status($status){
        $ok = (strpos($status, 'online') !== false);
        if ($ok){
            return '<span class="badge badge-success mb-2">online</span>';            
        }
        else{
            $ok = (strpos($status, 'offline') !== false);
            if ($ok){
                return '<span class="badge badge-danger mb-2">off</span>';            
            }
            else{
                return '<span class="badge badge-warning mb-2">'.$status.'</span>';            
            }
        }
    }
}

if (!function_exists('random_number')){
    function random_number($length = 13){ 
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;        
    }
}
if (!function_exists('khongdau')){
    function khongdau($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return $str;
    }
}

if (!function_exists('get_content')){
    function get_content($header, $content){
        $res = '

        <html lang="en"><head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
        <title>Easy Here</title>
        
        <script src="https://together.easyhere.cf/assets/js/jquery-3.3.1.min.js"> </script>
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- Bootstrap core CSS -->
        
        <link href="https://together.easyhere.cf/assets/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Material Design Bootstrap -->
        <link href="https://together.easyhere.cf/assets/css/mdb.min.css" rel="stylesheet">
        
        <link rel="shortcut icon" type="image/x-icon" href="https://together.easyhere.cf/assets/images/icon/icon.png" />
        
        
        <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
        </style>
        
        
        <style>
            #hehe{
                width: 50px;
                height: 50px; 
                margin-right: 30px;       
            }
            .fuck2{
                margin: 0px;
            }
            .dropdown-toggle::after {
                display:none;
            }
        </style>     
        
        
        <script>
        function beep() {
            var snd = new Audio("https://together.easyhere.cf/assets/noti.mp3");
            snd.play();
        }
        </script>
        
        <script src="https://together.easyhere.cf/assets/js/moment.js"></script>
        
        </head>
        
        <body class="cart-v1 hidden-sn white-skin animated">
        
            <!--Navigation-->
            <header>        
                <!--/. Sidebar navigation -->
                <!-- Navbar -->
                <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">
                    <div class="container">
                        <!-- SideNav slide-out button -->
                        <div>
                            <a href="https://together.easyhere.cf/">
                                <img src="https://together.easyhere.cf/assets/images/icon/icon.png" id="hehe"/>
                            </a>
                        </div>                
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Small button group -->
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="from_btn">From</button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" name="from" id="1">Kí túc xá Khu A</a><a class="dropdown-item" href="#" name="from" id="2">Kí túc xá Khu B</a><a class="dropdown-item" href="#" name="from" id="3">ĐH Khoa Học Tự Nhiên</a><a class="dropdown-item" href="#" name="from" id="4">ĐH Công Nghệ Thông Tin</a><a class="dropdown-item" href="#" name="from" id="5">ĐH Khoa Học Xã Hội & Nhân Văn</a><a class="dropdown-item" href="#" name="from" id="7">ĐH Bách Khoa</a><a class="dropdown-item" href="#" name="from" id="8">ĐH Nông Lâm</a><a class="dropdown-item" href="#" name="from" id="9">ĐH Kinh Tế - Luật</a><a class="dropdown-item" href="#" name="from" id="10">ĐH Công Nghệ</a><a class="dropdown-item" href="#" name="from" id="11">ĐH Quốc Tế</a><a class="dropdown-item" href="#" name="from" id="12">ĐH Sư Phạm Kĩ Thuật</a><a class="dropdown-item" href="#" name="from" id="13">Khu Giáo Dục Quốc Phòng</a><a class="dropdown-item" href="#" name="from" id="15">ĐH Ngân Hàng</a><a class="dropdown-item" href="#" name="from" id="16">Thư Viện Trung Tâm</a><a class="dropdown-item" href="#" name="from" id="17">KTX Xã Hội Hóa</a>                    <!-- 
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" name="from" id="4">Separated link</a>
                            -->
                            </div>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="to_btn">To</button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" name="to" id="1">Kí túc xá Khu A</a><a class="dropdown-item" href="#" name="to" id="2">Kí túc xá Khu B</a><a class="dropdown-item" href="#" name="to" id="3">ĐH Khoa Học Tự Nhiên</a><a class="dropdown-item" href="#" name="to" id="4">ĐH Công Nghệ Thông Tin</a><a class="dropdown-item" href="#" name="to" id="5">ĐH Khoa Học Xã Hội & Nhân Văn</a><a class="dropdown-item" href="#" name="to" id="7">ĐH Bách Khoa</a><a class="dropdown-item" href="#" name="to" id="8">ĐH Nông Lâm</a><a class="dropdown-item" href="#" name="to" id="9">ĐH Kinh Tế - Luật</a><a class="dropdown-item" href="#" name="to" id="10">ĐH Công Nghệ</a><a class="dropdown-item" href="#" name="to" id="11">ĐH Quốc Tế</a><a class="dropdown-item" href="#" name="to" id="12">ĐH Sư Phạm Kĩ Thuật</a><a class="dropdown-item" href="#" name="to" id="13">Khu Giáo Dục Quốc Phòng</a><a class="dropdown-item" href="#" name="to" id="15">ĐH Ngân Hàng</a><a class="dropdown-item" href="#" name="to" id="16">Thư Viện Trung Tâm</a><a class="dropdown-item" href="#" name="to" id="17">KTX Xã Hội Hóa</a>                    </div>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="emp_btn">Tất cả</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" name="option" id="all">Tất cả</a>
                                <a class="dropdown-item" href="#" name="option" id="empty">Còn trống</a>
                            </div>
                        </div>
                        <input hidden value="null" id="id_from" />
                        <input hidden value="null" id="id_to" />
                        <input hidden value="all" id="id_emp" />
                        <a class="btn-floating btn-sm peach-gradient" id="loveyou"><i class="fa fa-search" aria-hidden="true"></i></a>                        
                        
                        <style>
                            .fuck{
                                width: 150px;                    
                            }
                            .beau{
                                height: 100px;                        
                                width: 200px;
                            }
                            .beau:hover{
                                background-color: #ebebeb;
                            }
                        </style>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">                
                            <ul class="nav navbar-nav nav-flex-icons ml-auto">      
                                                                                      
                               <li class="nav-item">
                                    <a href="https://together.easyhere.cf/trip/create_ask_trip" class="btn btn-primary btn-sm">
                                        tạo yêu cầu
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://together.easyhere.cf/trip/create" class="btn btn-info btn-sm">
                                        tạo chuyến đi
                                    </a>
                                </li> 
                                   <a id="navbar-static-login" class="btn btn-info btn-rounded btn-sm waves-effect waves-light"  href="https://together.easyhere.cf/login">Log In
                                        <i class="fa fa-sign-in ml-2"></i>
                                    </a>                                             
                             </ul>
                            
                        </div>                
                    </div>
                </nav>
                <!-- /.Navbar -->
        
            </header>
        
        
        <style>
            #fuckfuck{
                padding-top: 200px;        
            }
            .fuckfuck{
                padding-top: 100px;
            }
        </style>
        
        <div class="fuckfuck">
        </div>
        <div class="container">
            </div>
        
        <!-- /.Navigation --><div class="fuckfuck">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>'.$header.'</h1>
                    '.$content.'
                </div>                 
            </div>
        </div>
        <div class="fuckfuck">
        </div>
        
        <div class="fuck">
        </div>
        <!--Footer-->
            <footer class="page-footer text-center text-md-left stylish-color-dark pt-0">
        
                <div style="background-color: #4285f4;">
                    <div class="container">
                        <!--Grid row-->
                        <div class="row py-4 d-flex align-items-center">
        
                            <!--Grid column-->
                            <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                                <h6 class="mb-0 white-text">Liên hệ với chúng tôi qua</h6>
                            </div>
                            <!--Grid column-->
        
                            <!--Grid column-->
                            <div class="col-md-6 col-lg-7 text-center text-md-right">
                                <!--Facebook-->
                                <a class="fb-ic ml-0 px-2" href="https://www.facebook.com/easyhere.service"><i class="fa fa-facebook white-text"> </i></a>
                                <!--Twitter-->
                                <a class="tw-ic px-2"><i class="fa fa-twitter white-text"> </i></a>
                                <!--Google +-->
                                <a class="gplus-ic px-2"><i class="fa fa-google-plus white-text"> </i></a>
                                <!--Linkedin-->
                                <a class="li-ic px-2"><i class="fa fa-linkedin white-text"> </i></a>
                                <!--Instagram-->
                                <a class="ins-ic px-2"><i class="fa fa-instagram white-text"> </i></a>
                            </div>
                            <!--Grid column-->
        
                        </div>
                        <!--Grid row-->
        
                    </div>
                </div>
        
                <!--Footer Links-->
                <div class="container text-center text-md-left">
                    <div class="row mt-3">
                        <!--First column-->
                        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                            <h6 class="text-uppercase font-weight-bold"><strong>Easy Here</strong></h6>
                            <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p>Giải quyết vấn đề chuyên chở</p>                    
                        </div>
                        <!--/.First column-->
                        <!--Third column-->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase font-weight-bold"><strong>Thường xuyên</strong></h6>
                            <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p><a href="https://together.easyhere.cf/edit_profile">Tài khoản EasyHere</a></p>                    
                            <p><a href="https://together.easyhere.cf/trip/my_trips">Chuyến đi của tôi</a></p>                    
                        </div>
                        <!--/.Third column-->
        
                        <!--Fourth column-->
                        <div class="col-md-4 col-lg-3 col-xl-3">
                            <h6 class="text-uppercase font-weight-bold"><strong>Contact</strong></h6>
                            <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p><i class="fa fa-home mr-3"></i> KTX B - DHQG, TP.HCM</p>
                            <p><i class="fa fa-envelope mr-3"></i> easyhere@zoho.com</p>
                            <p><i class="fa fa-phone mr-3"></i> 035 300 1562</p>                    
                        </div>
                        <!--/.Fourth column-->
                    </div>
                </div>
                <!--/.Footer Links-->
            </footer>
            <!--/.Footer-->
        
        
            <!-- SCRIPTS -->
        
            <!-- JQuery -->
        
                
            </body>
        </html>';
        return $res;
    }
}