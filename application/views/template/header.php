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
    .fuck2{
        margin: 0px;
    }
    .dropdown-toggle::after {
        display:none;
    }
</style>     


<script>
function beep() {
    var snd = new  Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");  
    snd.play();
}
</script>

<script src="<?= base_url('assets/js/moment.js') ?>"></script>

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
                        height: 100px;                        
                        width: 200px;
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
                                    <div class="fuck2">
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

    first_time = true;

    setInterval(
        function(){
            $.get(<?php echo '"'.base_url('notify/get_unseen_notification').'"';  ?>, function(data, status){                                           
                data = JSON.parse(data);                
                // Show dynamic notification                
                _new = get_id(data);
                diff = get_diff(_old, _new);          
                
                console.log(_new);                
                
                if (diff.length == 0) return ;                
                                
                if (diff.length > 0 && first_time == false){
                    //PlaySound("sound1");
                    console.log("DMMMMMMMMMMMM");
                    beep();
                    console.log(first_time);
                    first_time = false;
                }     

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