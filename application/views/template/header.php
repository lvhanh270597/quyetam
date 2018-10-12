<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<html lang="en"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>Easy Here</title>

<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"> </script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Bootstrap core CSS -->

<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

<!-- Material Design Bootstrap -->
<link href="<?php echo base_url('assets/css/mdb.min.css'); ?>" rel="stylesheet">

<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon/icon.png'); ?>" />


<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
</style>

<style>
    #hehe{
        width: 50px;
        height: 50px; 
        margin-right: 30px;       
    }
</style>     

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
                    <a href="<?= base_url();?>">
                        <img src="<?= base_url('assets/images/icon/icon.png') ?>" id="hehe"/>
                    </a>
                </div>                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Small button group -->
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="from_btn"><?php if (isset($from)) echo $from; else echo 'From'; ?></button>
                    <div class="dropdown-menu">
                    <?php
                        foreach ($places as $id => $name){
                            echo '<a class="dropdown-item" href="#" name="from" id="'.$id.'">'.$name.'</a>';
                        }                                               
                    ?>
                    <!-- 
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" name="from" id="4">Separated link</a>
                    -->
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="to_btn"><?php if (isset($to)) echo $to; else echo 'To'; ?></button>
                    <div class="dropdown-menu">
                    <?php
                        foreach ($places as $id => $name){
                            echo '<a class="dropdown-item" href="#" name="to" id="'.$id.'">'.$name.'</a>';
                        }                                               
                    ?>
                    </div>
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
                <script>                    
                    $("a[name=from]").click(function(){                        
                        $("button[name=from_btn]").text($(this).text());
                        $("input[id=id_from]").val($(this).attr('id'));
                    });
                    $("a[name=to]").click(function(){                        
                        $("button[name=to_btn]").text($(this).text());
                        $("input[id=id_to]").val($(this).attr('id'));
                    });    
                    $("a[name=option]").click(function(){                        
                        $("button[name=emp_btn]").text($(this).text());
                        $("input[id=id_emp]").val($(this).attr('id'));
                    });                                        
                    $("a[id=loveyou]").click(function(){                        
                        window.location.href = '<?php echo site_url('search/combine') ?>' + '/' + $("input[id=id_from]").val() + '/' + $("input[id=id_to]").val() + '/' + $("input[id=id_emp]").val();
                    });
                </script>
                
                <style>
                    .fuck{
                        width: 150px;                    
                    }
                    .beau{
                        height: 90px;                        
                    }
                    .beau:hover{
                        background-color: #ebebeb;
                    }
                </style>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="nav navbar-nav nav-flex-icons ml-auto">                                                                
                       <?php
                       if (!$this->session->userdata('user_logged')){
                           echo '
                           <a id="navbar-static-login" class="btn btn-info btn-rounded btn-sm waves-effect waves-light"  href="'.site_url('login').'">Log In
                                <i class="fa fa-sign-in ml-2"></i>
                            </a>';
                       }
                       else{
                        $count = '';
                        if (count($notification) > 0){                               
                            foreach ($notification as $noti){
                                if ($noti['seen'] == false){
                                    if ($count == '') $count = 1;
                                    else $count += 1;
                                }
                            }                               
                        }
                           echo '
                           <!--Dropdown primary-->
                           <li class="nav-item">
                                <a href="'.site_url('price').'" class="nav-link waves-effect headerNotifCountBadge">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </a>
                            </li>                          
                            <div class="dropdown">                            
                                <!--Trigger-->                                
                                <li class="nav-item dropdown-toggle" data-toggle="dropdown">
                                    <a href="/contact" data-toggle="modal" data-target="#contactForm" class="nav-link waves-effect">
                                        <i class="fa fa-bell"></i><span class="badge badge-danger mb-2" id="count">'.$count.'</span>
                                    </a>
                                </li>                                
                                <!--Menu-->
                                <div class="dropdown-menu dropdown-primary" id="noti_tab">';                                
                                foreach (array_slice($notification, 0, 4) as $notify){                                
                                    $new = ($notify['seen'] == false) ? '<span class="badge badge-danger mb-2">new</span>' : '';
                                    echo '<a href="'.site_url('notify/check/'.$notify['id']).'" class="beau">
                                    <div class="fuck">
                                        <h6>'.$new.' <small>'.$notify['content'].'</h6> </small> <small>'.ago($notify['time']).'</small>
                                    </div>
                                    </a>';
                                }
                                $count = '';
                                if ($this->session->userdata('user_logged')){
                                    $count = $this->session->userdata('count');
                                    if ($count == 0) $count = '';
                                }
                                echo '<a href="'.site_url('notify').'"> <h6> Xem tất cả </h6></a>'; 
                                echo '</div>
                            </div>
                            <!--/Dropdown primary-->
                            <!-- Login / register -->                        
                            <li class="nav-item ">
                                <a href="'.site_url('edit_profile').'" class="nav-link waves-effect headerNotifCountBadge">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                </a>
                            </li> 
                            <li class="nav-item ">
                                <a href="'.site_url('trip/my_trips').'" class="nav-link waves-effect headerNotifCountBadge">
                                    <i class="fa fa-motorcycle" aria-hidden="true"></i>
                                </a>
                            </li>                             
                           ';
                       }
                       ?>
                                             
                     </ul>
                    
                </div>                
            </div>
        </nav>
        <!-- /.Navbar -->

    </header>


<script>
    function get_id(data){
        var res = [];
        for (var i=0; i<data.length; i++)
            res.push(parseInt(data[i]['id']));
        return res;
    }
    function get_item(data, diff){                
        var res = [];
        for (var i=0; i<data.length; i++){
            if (diff.indexOf(parseInt(data[i]['id'])) >= 0){
                res.push(data[i]);
            }            
        }
        return res;
    }
    function get_diff(_old, _new){
        var res = []; 
        if (_old.length == _new.length) return [];
        _new.sort();        
        for (var i=_old.length; i<_new.length ; i++){
            res.push(_new[i]);
        }
        return res;
    }

    _old = [];
    $(document).ready(function(){
        $.get(<?php echo '"'.base_url('notify/get_unseen_notification').'"';  ?>, function(data, status){                                           
            data = JSON.parse(data);
            _old = get_id(data);
        });
    });
    setInterval(
        function(){
            $.get(<?php echo '"'.base_url('notify/get_unseen_notification').'"';  ?>, function(data, status){                                           
                data = JSON.parse(data);                
                // Show dynamic notification                
                _new = get_id(data);
                diff = get_diff(_old, _new);                
                
                if (diff.length == 0) return ;                
                                
                $("#count").text(diff.length);

                _old = _new.sort();          
                      
                items = get_item(data, diff);
                
                items.sort(function (a, b) {
                    return new Date('1970/01/01 ' + a) - new Date('1970/01/01 ' + b);
                });

                for (var i=0; i<items.length; i++){                    
                    let tempi = items[i];
                    item = '<a href="<?php echo site_url('notify/check/'); ?>'+tempi['id']+'" class="beau waves-effect waves-light"><div class="fuck">' +
                        '<h6><span class="badge badge-danger mb-2">new</span><small>' + tempi['content'] +
                        '</h6> </small> <small>'+moment(tempi['time']).fromNow()+'</small></div></a>';
                    $("#noti_tab").children().first().before(item);                    
                }         


            })
        }, 10000);
</script>

<!-- /.Navigation -->

