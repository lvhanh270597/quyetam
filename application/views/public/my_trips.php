
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
                <section>              
                                        <!-- Card -->
                    <div class="card card-cascade">

                        <!-- Card image -->
                        <div class="view view-cascade gradient-card-header blue-gradient">

                            <!-- Title -->
                            <h2 class="card-header-title mb-3">CÁC CHUYẾN ĐI CỦA TÔI</h2>
                            <a href="<?php echo site_url('trip/create'); ?>" class="btn aqua-gradient btn-rounded btn-sm">                            
                            TẠO MỚI
                            </a>
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
                                    else{                                
                                        echo '
                                        <div class="col-md-12">
                                        <h5>CHƯA CÓ CHUYẾN ĐI NÀO</h5>
                                        </div>
                                        ';
                                    }
                                ?>

                                <!--Grid column-->
                                
                                <!--Grid column-->                        

                            </div>
                        
                        </div>

                    </div>
                    
                    <!--Grid row-->

                    <!--Grid row-->                    
                    <!--Grid row-->
                </section>
                <!-- /.Section: Last items -->

            
            <section>                    
                    <!-- Grid row -->
                    <div class="card card-cascade">

                        <!-- Card image -->
                        <div class="view view-cascade gradient-card-header blue-gradient">

                            <!-- Title -->
                            <h2 class="card-header-title mb-3">CÁC YÊU CẦU CỦA TÔI</h2>
                            <!-- Subtitle -->                            
                            <a href="<?php echo site_url('trip/create_ask_trip'); ?>" class="btn aqua-gradient btn-rounded btn-sm">                            
                            TẠO MỚI
                            </a>
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
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row justify-content-center mb-4">
                        

                    </div>
                    <!--Grid row-->
                </section>
                <!-- /.Section: Last items -->



            </div>
            <!-- /.Content -->

        </div>
        <!-- Grid row -->

    </div>
