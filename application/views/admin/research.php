<html lang="en" class="">
<head>
    <title>Easy Here</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" id="compiled.css-css" href="assets/css/compiled-4.5.11.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/users.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/icon/icon.jpg" />
</head>

<body class="cart-v1 hidden-sn white-skin animated">

<!--Navigation-->
<header>        
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">
        <div class="container">
            <!-- SideNav slide-out button -->
            <div class="float-left mr-2">
                <a href="#" data-activates="slide-out" >
                    <i class="fa fa-motorcycle" aria-hidden="true"></i>
                </a>
            </div>
            <a class="navbar-brand font-weight-bold" href="<?= base_url();?>">
                <strong>EZHERE</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">                                     
                    <li class="nav-item dropdown ml-3">
                        <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fa fa-user blue-text"></i> Profile </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                        <?php                            
                        if ($this->session->userdata('user_logged')){
                            echo '
                            <a class="dropdown-item waves-effect waves-light" href="'.base_url('verify_transaction').'"><i class="fa fa-check" aria-hidden="true"></i><strong class="px-2">Verify transaction</strong></a>
                            <a class="dropdown-item waves-effect waves-light" href="'.base_url('edit_trip').'"><i class="fa fa-automobile" aria-hidden="true"></i><strong class="px-2">Your trip</strong></a>
                            <a class="dropdown-item waves-effect waves-light" href="'.base_url('edit_profile').'"><i class="fa fa-user-circle-o" aria-hidden="true"></i><strong class="px-2">My account</strong></a>
                            <a class="dropdown-item waves-effect waves-light" href="'.base_url('logout').'"><i class="fa fa-window-close" aria-hidden="true"></i><strong class="px-2">Log out </strong></a>                                
                        </div>';
                        }       
                        else{
                            echo '<a class="dropdown-item waves-effect waves-light" href="'.base_url('login').'"><i class="fa fa-upload" aria-hidden="true"></i><strong class="px-2">Login</strong></a>
                            <a class="dropdown-item waves-effect waves-light" href="'.base_url('register').'"><i class="fa fa-registered" aria-hidden="true"></i><strong class="px-2">Register</strong></a>
                            </div>';
                        }                                                     
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.Navbar -->

</header>
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
  <h4 class="card-title"><strong>Data research(<?= date('Y-m-d', strtotime(get_current_time())) ?>)</strong></h4>
  <h6> Yêu cầu chuyến đi ngày nay: <?= $data_research['cnt'] ?> </h6>
  <h6> Yêu cầu thành công ngày nay: <?= $data_research['success_ask'] ?>  </h6>
  <h6> Tỉ lệ thành công: <?= 100*round($data_research['success_ask'] / max($data_research['cnt'], 1), 2) ?>% </h6>
  
  
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
                                <th class="th-sm sorting" >Start from
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm sorting">Times
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>                                
                            </tr>
                        </thead>
                        <tbody>                                     
                            <?php
                            $start_from = $data_research['start_from'];
                            foreach ($start_from as $start){                                                            
                                echo '
                                <tr role="row" class="odd">
                                <td>'.$map[$start['start_from']].'</td>
                                <td>'.$start['cnt'].'</td>                                
                                </tr>
                                ';                                
                            }
                            ?>                                
                        </tbody>
                        <tfoot>
                            <tr><th rowspan="1" colspan="1">Start from
                            </th><th rowspan="1" colspan="1">Times
                            </th></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
        </div>
    </section>
<div>
</main>

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
                                <th class="th-sm sorting" >Hour
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm sorting">Count
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>                                
                            </tr>
                        </thead>
                        <tbody>                                     
                            <?php
                            $hour_cnt = $data_research['hour_cnt'];
                            foreach ($hour_cnt as $start){                                                            
                                echo '
                                <tr role="row" class="odd">
                                <td>'.$start['hour'].'</td>
                                <td>'.$start['cnt'].'</td>                                
                                </tr>
                                ';                                
                            }
                            ?>                                
                        </tbody>
                        <tfoot>
                            <tr><th rowspan="1" colspan="1">Start from
                            </th><th rowspan="1" colspan="1">Times
                            </th></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
        </div>
    </section>
<div>
</main>



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
                                <th class="th-sm sorting" >Finish to
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm sorting">Times
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>                                
                            </tr>
                        </thead>
                        <tbody>                                     
                            <?php
                            $finish_to = $data_research['finish_to'];
                            foreach ($finish_to as $finish){                                                            
                                echo '
                                <tr role="row" class="odd">
                                <td>'.$map[$finish['finish_to']].'</td>
                                <td>'.$finish['cnt'].'</td>                                
                                </tr>
                                ';                                
                            }
                            ?>                                
                        </tbody>
                        <tfoot>
                            <tr><th rowspan="1" colspan="1">Start from
                            </th><th rowspan="1" colspan="1">Times
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
<!-- Card -->

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
  <h4 class="card-title"><strong>Visit page(<?= date('Y-m-d', strtotime(get_current_time())) ?>)</strong></h4>

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
                                <th class="th-sm sorting" >Page name
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm sorting">Times
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>                                
                            </tr>
                        </thead>
                        <tbody>                                     
                            <?php

                            foreach ($visited_today as $visit){                                                            
                                echo '
                                <tr role="row" class="odd">
                                <td>'.$visit['page_name'].'</td>
                                <td>'.$visit['cnt'].'</td>                                
                                </tr>
                                ';                                
                            }
                            ?>                                
                        </tbody>
                        <tfoot>
                            <tr><th rowspan="1" colspan="1">ID
                            </th><th rowspan="1" colspan="1">Page name
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

</div>
</div>
</body>
</html>
