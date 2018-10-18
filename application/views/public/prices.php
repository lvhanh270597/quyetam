<html lang="en" class="">
<head>
    <title>Easy Here</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" id="compiled.css-css" href="assets/css/compiled-4.5.11.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/users.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/icon/icon.jpg" />
</head>

<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"> </script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Bootstrap core CSS -->

<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

<!-- Material Design Bootstrap -->
<link href="<?php echo base_url('assets/css/mdb.min.css'); ?>" rel="stylesheet">

<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon/icon.jpg'); ?>" />


<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}

#hehe{
        width: 50px;
        height: 50px; 
        margin-right: 30px;       
    }
    .dropdown-toggle::after {
        display:none;
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
                                        <h6>'.$new.' <small>'.$notify['content'].'</h6> </small> <small>'.$notify['time'].'</small>
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
    <!-- /.Navigation -->
    

<!-- /.Navigation -->
<div class="container" id="vl">

<style> 
    #vl{
        padding-top: 60px;
    }
    .card-img-top{
        height: 200px;
    }
</style>

<!-- Card -->
<div class="card card-cascade wider reverse">
    
  <!-- Card image -->
  <div class="view view-cascade overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg" alt="Card image cap">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">
  <h4 class="card-title"><strong>Prices</strong></h4>
    <?php
        if ($this->session->userdata('admin')){
            echo '<a href="'.site_url('price/add_price').'"> <button class="btn blue-gradient btn-rounded">Create New</button> </a>';
        }
    ?>
<main>

<div class="container-fluid mt-2">

    <!--Section: -->
    <section id="material-design-example">
    
<!--Section: Live preview-->
    <section>
        <div id="dtMaterialDesignExample_wrapper" class="dataTables_wrapper dt-bootstrap4">        
            <div class="row">
                <div class="col-sm-12">
                    <table id="dtMaterialDesignExample" class="table table-striped dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="dtMaterialDesignExample_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="th-sm sorting_asc">From
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm sorting" >To
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>                                
                                <th class="th-sm sorting">Price
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>                                                               
                            </tr>
                        </thead>
                        <tbody>                                     
                            <?php

                            for ($i=0; $i<count($prices); $i++){
                                $price = $prices[$i];
                                if ($i % 2 == 0){
                                    echo '
                                    <tr role="row" class="odd">
                                    <td class="sorting_1"> <a href="'.site_url('place/detail/'.$price['start_from']).'"> '.$places[$price['start_from']].' </a> </td>
                                    <td> <a href="'.site_url('place/detail/'.$price['finish_to']).'"> '.$places[$price['finish_to']].' </a> </td>
                                    <td>'.$price['amount'].'</td>                                    
                                    </tr>
                                    ';
                                } 
                                else{
                                    echo '
                                    <tr role="row" class="even">
                                    <td class="sorting_1"> <a href="'.site_url('place/detail/'.$price['start_from']).'"> '.$places[$price['start_from']].' </a> </td>
                                    <td> <a href="'.site_url('place/detail/'.$price['finish_to']).'"> '.$places[$price['finish_to']].' </a> </td>                
                                    <td>'.$price['amount'].'</td>                                    
                                    </tr>
                                    ';
                                }
                            }
                            ?>                                
                        </tbody>
                        
                        <tfoot>
                            <tr><th rowspan="1" colspan="1">From
                            </th><th rowspan="1" colspan="1">To                            
                            </th><th rowspan="1" colspan="1">Price
                            </th></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
        </div>
    </section>
<div>
</main>

  </div>

</div>
<!-- Card -->

    
</div>



<script type="text/javascript" src="assets/js/compiled.min.js"></script>

<script src="assets/js/vl.js"></script>

<!-- Datatables initialization -->
<script>
    // Basic example
    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });

    // Material Design example
    $(document).ready(function () {
    $('#dtMaterialDesignExample').DataTable();
    $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
        $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
        $('input').attr("placeholder", "Search");
        $('input').removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
    $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select').material_select();
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
    });
</script>
<script>
    $(document).ready(function(){ 
	$('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();
    }); 
</script>
</div>
</div>
</body>
</html>
