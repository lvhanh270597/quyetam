

<style>
    #dm{
        width: 100%;
        height: 200px;                        
    }
    #dmm{
        width: 100%;
        height: 70px;
    }
    #hihi{
        height: 100%;
    }
</style>

    <!-- Mega menu -->
    
    <!-- Mega menu -->
    
    <!-- /.Main Container -->    
    <div class="container">      
        <!-- Grid row -->
        <!-- Card -->
        <div class="card card-cascade">
            <!-- Card image -->            
            <div class="view view-cascade overlay">
                <!-- Title -->                
                <img  class="card-img-top" src="<?php echo base_url('assets/EasyHere.png'); ?>" alt="Card image cap">                
            </div>

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">
                <!-- /.Main Container -->
                <div class="container">
                    <!-- Grid row -->
                    <div class="row">
                        <div class="container">                                
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs nav-justified cyan" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#panel555" role="tab">
                                            <i class="fa fa-heart" aria-hidden="true"></i> CÁC YÊU CẦU HIỆN CÓ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#panel666" role="tab">
                                            <i class="fa fa-motorcycle"></i> CHUYẾN ĐI CỦA TÔI</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Nav tabs -->
                            <!-- Tab panels -->
                            <div class="tab-content">
                                <!--Panel 1-->
                                <div class="tab-pane fade in show active" id="panel555" role="tabpanel">
                                    <!-- Nav tabs -->
                                    <div class="row">
                                    <div class="card-body card-body-cascade">
                                                        <!--Card-->
                                                        
                                        <div class="card card-cascade narrower">
                                            <!-- Card content -->
                                            
                                            <div class="row">                                                
                                                <?php
                                                if ($needed_trips){
                                                    foreach ($needed_trips as $trip){
                                                        $asker = $this->user_ml->get_by_primary($trip['asker']);                                    
                                                        $place = $this->place_ml->get_by_primary($trip['finish_to']);                                    
                                                        $empty = '';
                                                        $trip_detail = $this->trip_ml->get_by_primary($trip['trip_id']);
                                                        if ($trip_detail !== null){
                                                            $empty = '<span class="badge badge-warning mb-2">đã có người nhận chở</span> <br>';
                                                        }          
                                                        $free = '';
                                                        if ($trip['price'] == 0){
                                                            $free = '<span class="badge badge-info mb-2">free</span> <br>';
                                                        }
                                                        else{
                                                            $free = '<span class="badge badge-info mb-2">'.$trip['price'].'đ</span> <br>';
                                                        }                          
                                                        echo '<div class="col-lg-3 col-md-6 mb-4">

                                                        <!--Card-->
                                                        <div class="card card-ecommerce">

                                                            <!--Card image-->
                                                            <div class="view overlay">
                                                                <img src="'.base_url('assets/images/uploads/places/'.$place['id'].'/'.$place['image']).'" class="img-fluid" alt="" id="dm">
                                                                <a href="'.site_url('trip/detail_need/'.$trip['id']).'">
                                                                    <div class="mask rgba-white-slight waves-effect waves-light">                                            
                                                                    </div>                                            
                                                                </a>
                                                            </div>
                                                            <!--Card image-->
                            
                                                            <!--Card content-->
                                                            <div class="card-body">
                                                                <!--Category & Title-->                                                                
                                                                <h6 class="card-title mb-1"><strong><a href="'.site_url('trip/detail_need/'.$trip['id']).'" class="dark-grey-text">'.$places[$trip['start_from']].' <i class="fa fa-mail-forward" aria-hidden="true"></i> '.$places[$trip['finish_to']].'</a></strong></h6>
                                                                <span class="badge badge-success mb-2">'.$asker['full_name'].'</span>'.get_color_status(get_status($asker['username'])).'</br>
                                                                '.$empty.'
                                                                '.$free.'
                                                                <!--Card footer-->
                                                                <div class="card-footer pb-0">
                                                                    <div class="row mb-0">
                                                                        <span><strong> '.after($trip['timestart']).'</strong></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Card content-->
                            
                                                        </div>
                                                        <!--Card-->
                            
                                                    </div>';
                                                    }
                                                }
                                                else{
                                                    echo '
                                                    <div class="col-md-12">
                                                    <h5>CHƯA CÓ YÊU CẦU NÀO</h5>
                                                    </div>
                                                    ';      
                                                }
                                            ?>

                                                <!--Grid column-->
                                                
                                                <!--Grid column-->                        

                                            </div>                                            
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Nav tabs -->
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-circle pg-blue justify-content-center">                                                
                                            <li class="page-item <?php if ($index == 1) echo 'disabled'; ?>"><a class="page-link"  href="<?= site_url('pages/1') ?>">First</a></li>
                                            <li class="page-item <?php if ($index == 1) echo 'disabled'; ?>">
                                                <a class="page-link" aria-label="Previous"  href="<?= site_url('pages/'.($index - 1)) ?>">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>                        
                                            <?php
                                            $from = max(1, $index - 2);
                                            $to = min($max, 5 - $from + 1);
                                            for ($i=$from; $i<=$to; $i++){
                                                echo '<li class="page-item ';
                                                if ($i == $index){
                                                    echo 'active">';
                                                }
                                                else{
                                                    echo '">';
                                                }
                                                echo '<a class="page-link" href="'.site_url('pages/'.$i).'">'.$i.'</a> </li>';
                                            }
                                            if ($from > $to){
                                                echo '<li class="page-item active"> <a class="page-link" href="#">'.$i.'</a> </li>';
                                            }
                                            ?>                        
                                            <li class="page-item <?php if ($index >= $max) echo 'disabled'; ?>">
                                                <a class="page-link" aria-label="Next" href="<?= site_url('pages/'.($index + 1)) ?>">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                            <li class="page-item <?php if ($index >= $max) echo 'disabled'; ?>"><a class="page-link" href="<?= site_url('pages/'.($max)) ?>">Last</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!--/.Panel 1-->
                                <!--Panel 2-->
                                <div class="tab-pane fade" id="panel666" role="tabpanel">
                                    <!-- Card content -->
                                    <div class="card-body card-body-cascade">
                                        <!--Card-->
                                            <!-- Card content -->
                                            
                                            <div class="row">
                                                
                                                <style>
                                                    #dm{
                                                        width: 100%;
                                                        height: 200px;                        
                                                    }
                                                </style>

                                                    <!-- Mega menu -->
                                                    
                                                    <!-- Mega menu -->

                                                    <!-- /.Main Container -->
                                                
                                                    <div class="container">
                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Content -->
                                                            <div class="col-lg-12">
                                                                
                                                                <!-- Section: Last items -->
                                                                                        <!-- Card -->

                                                                        <!-- Card image -->
                                                                        <div class="view view-cascade gradient-card-header blue-gradient">

                                                                            <!-- Title -->
                                                                            <h2 class="card-header-title mb-3">CÁC CHUYẾN ĐI CỦA TÔI</h2>                                                                            
                                                                            <!-- Subtitle -->                                                       
                                                                        </div>
                                                                        <!-- Card content -->
                                                                        <div class="card-body card-body-cascade text-center">
                                                                            <!-- Card -->
                                                                            <div class="row">
                                                                            
                                                                                <?php
                                                                                    if ($my_trips){
                                                                                        foreach ($my_trips as $trip){                                    
                                                                                            $owner = $this->user_ml->get_by_primary($trip['owner']);
                                                                                            $guess = $this->user_ml->get_by_primary($trip['guess']);
                                                                                            $place = $this->place_ml->get_by_primary($trip['finish_to']);                                    
                                                                                            $free = '';
                                                                                            if ($trip['price'] == 0){
                                                                                                $free = '<span class="badge badge-warning mb-2">free</span>';
                                                                                            }
                                                                                            $empty = '';
                                                                                            if ($trip['guess'] == null){
                                                                                                $empty = '<span class="badge badge-primary mb-2">còn trống</span></br>';
                                                                                            }                              
                                                                                            else{
                                                                                                $empty .= '<span class="badge badge-danger mb-2">'.$guess['full_name'].'</span></br>';
                                                                                            }  

                                                                                            $link = site_url('trip/detail/'.$trip['id']);
                                                                                            if ($this->session->userdata('username') == $trip['owner']){
                                                                                                $link = site_url('trip/edit/'.$trip['id']);
                                                                                            }
                                                                                            echo '<div class="col-lg-3 col-md-6 mb-4">

                                                                                            <!--Card-->
                                                                                            <div class="card card-ecommerce">

                                                                                                <!--Card image-->
                                                                                                <div class="view overlay">
                                                                                                    <img src="'.base_url('assets/images/uploads/places/'.$place['id'].'/'.$place['image']).'" class="img-fluid" alt="" id="dm">
                                                                                                    <a href="'.$link.'">
                                                                                                        <div class="mask rgba-white-slight waves-effect waves-light">                                            
                                                                                                        </div>                                            
                                                                                                    </a>
                                                                                                </div>
                                                                                                <!--Card image-->
                                                                
                                                                                                <!--Card content-->
                                                                                                <div class="card-body">
                                                                                                    <!--Category & Title-->
                                                                                                    <h6 class="card-title mb-1"><strong><a href="" class="dark-grey-text">'.$places[$trip['start_from']].'</a> <i class="fa fa-mail-forward" aria-hidden="true"></i> '.$places[$trip['finish_to']].'</strong></h6>                                        
                                                                                                    <span class="badge badge-success mb-2">'.$owner['full_name'].'</span> </br>
                                                                                                    '.$free.'
                                                                                                    '.$empty.'
                                                                                                    <!--Card footer-->
                                                                                                    <div class="card-footer pb-0">
                                                                                                        <div class="row mb-0">
                                                                                                            <span class="float-left"><strong> '.get_compare($trip['timestart']).'</strong></span>                                                            
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!--Card content-->
                                                                
                                                                                            </div>
                                                                                            <!--Card-->
                                                                
                                                                                        </div>';
                                                                                        }
                                                                                    }                                   
                                                                                ?>

                                                                                <!--Grid column-->
                                                                                
                                                                                <!--Grid column-->                        

                                                                            </div>
                                                                        

                                                                    </div>

                                                                    
                                                                    <!--Grid row-->

                                                                    <!--Grid row-->                    
                                                                    <!--Grid row-->
                                                                <!-- /.Section: Last items -->

                                                                                                                            
                                                                    <!-- Grid row -->

                                                                        <!-- Card image -->
                                                                        <div class="view view-cascade gradient-card-header blue-gradient">

                                                                            <!-- Title -->
                                                                            <h2 class="card-header-title mb-3">CÁC YÊU CẦU CỦA TÔI</h2>
                                                                            <!-- Subtitle -->                                                                                                       
                                                                        </div>
                                                                        <!-- Card content -->
                                                                        <div class="card-body card-body-cascade text-center">
                                                                            <!-- Card -->
                                                                            <div class="row">
                                                                            <?php
                                                                            if ($my_needed_trips){
                                                                                foreach ($my_needed_trips as $trip){
                                                                                    $asker = $this->user_ml->get_by_primary($trip['asker']);                                    
                                                                                    $place = $this->place_ml->get_by_primary($trip['finish_to']);                                    
                                                                                    $free = '';
                                                                                    if ($trip['price'] == 0){
                                                                                        $free = '<span class="badge badge-warning mb-2">free</span>';
                                                                                    }                                    
                                                                                    $link = site_url('trip/edit_need/'.$trip['id']);                                    
                                                                                    echo '<div class="col-lg-3 col-md-6 mb-4">

                                                                                    <!--Card-->
                                                                                    <div class="card card-ecommerce">

                                                                                        <!--Card image-->
                                                                                        <div class="view overlay">
                                                                                            <img src="'.base_url('assets/images/uploads/places/'.$place['id'].'/'.$place['image']).'" class="img-fluid" alt="" id="dm">
                                                                                            <a href="'.$link.'">
                                                                                                <div class="mask rgba-white-slight waves-effect waves-light">                                            
                                                                                                </div>                                            
                                                                                            </a>
                                                                                        </div>
                                                                                        <!--Card image-->
                                                        
                                                                                        <!--Card content-->
                                                                                        <div class="card-body">                                    
                                                                                            <!--Category & Title-->
                                                                                            <h6 class="card-title mb-1"><strong><a href="" class="dark-grey-text">'.$places[$trip['start_from']].'</a> <i class="fa fa-mail-forward" aria-hidden="true"></i> '.$places[$trip['finish_to']].'</strong></h6>
                                                                                            <span class="badge badge-success mb-2">'.$asker['full_name'].'</span> </br>
                                                                                            '.$free.'                                            
                                                                                            <!--Card footer-->
                                                                                            <div class="card-footer pb-0">
                                                                                                <div class="row mb-0">
                                                                                                    <span class="float-left"><strong> '.get_compare($trip['timestart']).'</strong></span>
                                                                                                    <span class="float-right">                                                                                                       
                                                                                                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Giờ xuất phát"><i class="fa fa-clock-o ml-3" aria-hidden="true"></i></a>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--Card content-->
                                                        
                                                                                    </div>
                                                                                    <!--Card-->
                                                        
                                                                                </div>';
                                                                                }
                                                                            }                            
                                                                        ?>


                                                                                <!--Grid column-->
                                                                                
                                                                                <!--Grid column-->                        

                                                                            </div>
                                                                        
                                                                        </div>
                                                                  
                                                                <!-- /.Section: Last items -->



                                                            </div>
                                                            <!-- /.Content -->

                                                        </div>
                                                        <!-- Grid row -->
                                                    </div>
                                    

                                                <!--Grid column-->
                                                
                                                <!--Grid column-->                        

                                                </div>
                                            
                                    </div>

                                </div>
                                <!--/.Panel 2-->
                            </div>
                            <!-- Tab panels -->
                        </div>
                        <!-- Card -->                    
                    </div>
                </div>                                

                
                <main>
                    <div class="container-fluid mt-2">
                        <!-- Main docs tabs -->
                            <!--Grid row-->
                        <div class="row">
                            <!--Grid column: Content-->
                            <div class=" col-md-8">                        
                                <!--Section: Docs content-->                                
                                <style>
                                    
                                    .scrollbar {
                                    margin-left: 30px;
                                    float: left;
                                    height: 300px;
                                    width: 65px;
                                    background: #fff;
                                    overflow-y: scroll;
                                    margin-bottom: 25px;
                                    }

                                    .force-overflow {
                                    min-height: 450px;
                                    }

                                    .example-1 {
                                        position: relative;
                                        overflow-y: scroll;
                                        height: 500px;
                                    }

                                    .scrollbar-dusty-grass::-webkit-scrollbar-track {
                                    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                                    background-color: #F5F5F5;
                                    border-radius: 10px;
                                    }

                                    .scrollbar-dusty-grass::-webkit-scrollbar {
                                    width: 12px;
                                    background-color: #F5F5F5;
                                    }

                                    .scrollbar-dusty-grass::-webkit-scrollbar-thumb {
                                    border-radius: 10px;
                                    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                                    background-image: -webkit-linear-gradient(330deg, #d4fc79 0%, #96e6a1 100%);
                                    background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);
                                    }

                                </style>                                                    
                                <!--Title-->
                                <div class="view view-cascade gradient-card-header blue-gradient">
                                    <!-- Title -->
                                    <h2 class="card-header-title mb-3">Chuyến đi gợi ý</h2>
                                    <!-- Subtitle -->                                                                                                       
                                </div>                                
                                <!--Section: Live preview-->
                        
                                <!-- Grid row -->
                                <div class="row">
                                    <!-- Grid column -->
                                    <div class="col-md-12">
                                        <!-- Exaple 1 -->
                                        <div class="card example-1 square scrollbar-dusty-grass square thin">
                                            <div class="row">
                                                <div class="card-body card-body-cascade">
                                                                    <!--Card-->
                                                                    
                                                    
                                                    <?php
                                                    if ($no_trips){
                                                        foreach ($no_trips as $trip){                                                                    
                                                            $place = $this->place_ml->get_by_primary($trip['finish_to']);                                    
                                                            $trip_detail = $this->trip_ml->get_by_primary($trip['id']);     
                                                            $owner = $this->user_ml->get_by_primary($trip['owner']);                                              
                                                            $free = '';
                                                            if ($trip['price'] == 0){
                                                                $free = '<span class="badge badge-info mb-2">free</span> <br>';
                                                            }
                                                            else{
                                                                $free = '<span class="badge badge-info mb-2">'.$trip['price'].'đ</span> <br>';
                                                            }                          
                                                            echo '<div class="col-lg-9 col-md-6 mb-4" >

                                                            <!--Card-->
                                                            <div class="card card-ecommerce">

                                                                <!--Card image-->
                                                                <div class="view overlay">
                                                                    <img src="'.base_url('assets/images/uploads/places/'.$place['id'].'/'.$place['image']).'" class="img-fluid" alt="" id="dm">                                                         
                                                                </div>
                                                                <!--Card image-->
                                
                                                                <!--Card content-->
                                                                <div class="card-body">
                                                                    <!--Category & Title-->                                                                
                                                                    <h6 class="card-title mb-1"><strong><a href="#" class="dark-grey-text">'.$places[$trip['start_from']].' <i class="fa fa-mail-forward" aria-hidden="true"></i> '.$places[$trip['finish_to']].'</a></strong></h6>
                                                                    '.$free.'
                                                                    <span><strong> '.after($trip['timestart']).' ('.$trip['timestart'].')</strong></span>
                                                                    <a href='.site_url('review/detail/'.$owner['username']).'><button class="btn aqua-gradient btn-rounded btn-sm">'.$owner['full_name'].'</button></a>
                                                                    <!--Card footer-->
                                                                    <div class="card-footer pb-0">                                                            
                                                                        <a href='.site_url('trip/create_as_trip/'.$trip['id']).'><button class="btn aqua-gradient btn-rounded btn-sm">TẠO YÊU CẦU NHƯ THẾ NÀY</button></a>
                                                                    </div>
                                                                </div>
                                                                <!--Card content-->
                            
                                                            </div>
                                                            <!--Card-->
                                
                                                        </div>';
                                                        }
                                                    }                                            
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                    
                            </div>
                            <div class=" col-md-4">   
                                <div class="view view-cascade gradient-card-header success-color">
                                    <!-- Title -->
                                    <h2 class="card-header-title mb-3">Online</h2>
                                    <!-- Subtitle -->                                                                                                       
                                </div>           
                                <!-- Grid row -->
                                <div class="row">
                                    <!-- Grid column -->
                                    <div class="col-md-12">
                                        <!-- Exaple 1 -->
                                        <div class="card example-1 square scrollbar-dusty-grass square thin">
                                            <div class="card-body">        
                                                                
                                            <?php   
                                                $count = 0;                         
                                                foreach ($this->user_ml->get_all_status_desc() as $user){                                                    
                                                    $str = get_color_status(get_status($user['username']));
                                                    if (!(strpos($str, 'off') !== false)){
                                                        $count += 1;
                                                        echo '<div class="media">       
                                                                <img class="d-flex rounded-circle" src="'.profile_image($user['gender'], $user['username'], $user['image']).'" style="width: 40px; height: 40px;">
                                                                <div class="media-body">                                            
                                                                    <a href="'.site_url('review/detail/'.$user['username']).'"> 
                                                                    <h5 class="mt-1 font-weight-bold blue-text">'.$user['full_name'].'<p style="font-size: 15px">'.$str.'</p> </h5> </a>
                                                                </div>                                    
                                                            </div>';                                                            
                                                    }                                                    
                                                }
                                                if ($count == 0){
                                                    echo '<h5 class="mt-1 font-weight-bold black-text">Không có người dùng nào đang online</h5>';
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>            
                    </div>
                </main>                      
            </div>     
                                      
            <div class="alert alert-info">
                <strong>Lưu ý: </strong> Trước khi chuyến đi bắt đầu 15-30 phút, bạn nên vào xem yêu cầu của mình đã được chấp nhận hay chưa để liên hệ kịp thời nhé.
            </div>       
        </div>                             
    </div>        
</div>