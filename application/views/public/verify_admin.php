<html lang="en" class="">
<head>
    <title>Easy Here</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" id="compiled.css-css" href="<?= base_url('assets/css/compiled-4.5.11.min.css') ?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?= base_url('assets/css/users.css') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/images/icon/icon.jpg') ?>" />
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
    .fuck{
        min-height: 200px;
        min-width: 200px;
        max-height: 500px;
        max-width: 500px;
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
  <h4 class="card-title"><strong>Users control</strong></h4>

    <main>

<div class="container-fluid mt-2">

    <!--Section: -->
    <section id="material-design-example">
    
<!--Section: Live preview-->
    <section>
        <div id="dtMaterialDesignExample_wrapper" class="dataTables_wrapper dt-bootstrap4">        
            <div class="row">
                <div class="col-sm-12">
                    <form method="POST" action="<?= site_url('verify/admin_process') ?>">
                        <table id="dtMaterialDesignExample" class="table table-striped dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="dtMaterialDesignExample_info" style="width: 100%;">
                            <thead>                        
                                <tr role="row">
                                    <th class="th-sm sorting_asc">ID
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm sorting" >Username
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm sorting">Type
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm sorting">Content
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>                                                                                                                                       
                                    <th class="th-sm sorting">Check
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>                                
                                </tr>
                            </thead>
                            <tbody>                                                              
                                <?php
                                if (count($all) > 0){
                                    $dir = '../assets/images/uploads/users/';
                                    $map = [
                                        'student card' => 'scard', 
                                        'driver card' => 'dcard',
                                        'cmnd card' => 'cmnd',
                                        'student email' => ''                    
                                    ]; 
                                    
                                    for ($i=0; $i<count($all); $i++){
                                        $one = $all[$i];
                                        $path = $dir.'/'.$map[$one['type']].'/'.$one['content'];
                                        if ($i % 2 == 0){
                                            echo '<tr role="row" class="odd">';
                                        } 
                                        else{
                                            echo '<tr role="row" class="even">';
                                        }                                    
                                        echo '
                                        <th class="sorting_1"> '.$one['id'].'</th>
                                        <th><a href="'.site_url('user/'.$one['from_user']).'">'.$one['from_user'].'</th>';
                                        echo '<th>'.$one['type'].'</th>';
                                        if ($one['type'] == 'student email'){
                                            echo '<th> '.$one['content'].'</th>';
                                        }
                                        else{
                                            echo '<th> <img src="'.$path.'" class="fuck"> </th>';			
                                        }                                    
                                        echo '
                                        <th>
                                            <!-- Default unchecked -->
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="tableDefaultCheck'.$one['id'].'" name="a'.$one['id'].'">
                                                <label class="custom-control-label" for="tableDefaultCheck'.$one['id'].'"></label>
                                            </div>
                                        </th>';

                                        echo '</tr>';
                                    }
                                }
                                ?>                                
                            </tbody>                      
                        </table>
                        <input type="submit" class="btn btn-success" name="accept" value="Accept"> 
                        <input type="submit" class="btn btn-danger" name="reject" value="Reject"> 
                    </form>
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



<script type="text/javascript" src="<?= base_url('assets/js/compiled.min.js') ?>"></script>

<script src="<?= base_url('assets/js/vl.js') ?>"></script>

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
