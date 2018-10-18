<style>
    #fuck{
        margin-bottom: 20px;
    }
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
                
                    <h4 class="font-weight-bold mt-4 dark-grey-text"><strong>CÁC CHUYẾN ĐI HIỆN CÓ</strong></h4>
                    <hr class="mb-3">

                                        <!-- Card -->
                    <div class="card card-cascade">

                        <!-- Card image -->
                        <div class="view view-cascade gradient-card-header blue-gradient">

                            <!-- Title -->
                            <h2 class="card-header-title mb-3">CÁC CHUYẾN ĐI HIỆN CÓ</h2>
                            <!-- Subtitle -->
                            <?php
                            if ($all == 'all') $all = '<span class="badge badge-info mb-2">tất cả</span>';
                            else $all = '<span class="badge badge-info mb-2">chỉ trống</span>';
                            echo $from.' '.$to;
                            if ($from == 'Any'){
                                $from = '<span class="badge badge-warning mb-2">bất cứ nơi nào</span>';
                            }
                            else{                                
                                $from = '<span class="badge badge-warning mb-2">'.$from.'</span>';
                            }
                            if ($to == 'Any'){
                                $to = '<span class="badge badge-danger mb-2">bất cứ nơi nào</span>';
                            }
                            else{
                                $to = '<span class="badge badge-danger mb-2">'.$to.'</span>';
                            }                            
                            ?>
                            <p class="card-header-subtitle mb-0"><?php echo $all; ?> từ <?php echo $from; ?> đến <?php echo $to; ?></p>

                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <!-- Card -->
                            <div class="row">
                                <?php
                                    if ($normal_trips){
                                        foreach ($normal_trips as $trip){                                    
                                            $owner = $this->user_ml->get_by_primary($trip['owner']);
                                            $guess = $this->user_ml->get_by_primary($trip['guess']);
                                            $place = $this->place_ml->get_by_primary($trip['finish_to']);                                    
                                            $free = '';
                                            if ($trip['price'] == 0){
                                                $free = '<span class="badge badge-info mb-2">free</span> <br>';
                                            }
                                            else{
                                                $free = '<span class="badge badge-info mb-2">'.$trip['price'].'đ</span> <br>';
                                            }     
                                            $empty = '';
                                            if ($trip['guess'] == null){
                                                $empty = '<span class="badge badge-primary mb-2">còn trống</span></br>';
                                            }                              
                                            else{
                                                $empty .= '<span class="badge badge-danger mb-2">'.$guess['full_name'].'</span></br>';
                                            }  
                                            echo '<div class="col-lg-3 col-md-6 mb-4">

                                            <!--Card-->
                                            <div class="card card-ecommerce">

                                                <!--Card image-->
                                                <div class="view overlay">
                                                    <img src="'.base_url('assets/images/uploads/places/'.$place['id'].'/'.$place['image']).'" class="img-fluid" alt="" id="dm">
                                                    <a href="'.site_url('trip/detail/'.$trip['id']).'">
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
                                                    '.$empty.'
                                                    '.$free.'
                                                    <!--Card footer-->
                                                    <div class="card-footer pb-0">
                                                        <div class="row mb-0">
                                                            <span class="float-left"><strong> '.after($trip['timestart']).'</strong></span>                                                            
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
                                        <h5> KHÔNG CÓ CHUYẾN ĐI NÀO</h5>
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
                            <h2 class="card-header-title mb-3">CÁC YÊU CẦU</h2>
                            <!-- Subtitle -->
                            <p class="card-header-subtitle mb-0"><?php echo $all; ?> từ <?php echo $from; ?> đến <?php echo $to; ?></p>

                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <!-- Card -->
                            <div class="row">
                            <?php
                            if ($needed_trips){
                                foreach ($needed_trips as $trip){
                                    $asker = $this->user_ml->get_by_primary($trip['asker']);                                    
                                    $place = $this->place_ml->get_by_primary($trip['finish_to']);                                    
                                    $empty = '';
                                    $trip_detail = $this->trip_ml->get_by_primary($trip['trip_id']);
                                    if ($trip_detail !== null){
                                        $empty = '<span class="badge badge-warning mb-2">đã có người chở</span><br>';
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
                                            <h6 class="card-title mb-1"><strong><a href="" class="dark-grey-text">'.$places[$trip['start_from']].'</a> <i class="fa fa-mail-forward" aria-hidden="true"></i> '.$places[$trip['finish_to']].'</strong></h6>
                                            <span class="badge badge-success mb-2">'.$asker['full_name'].'</span><br>
                                            '.$empty.'   
                                            '.$free.'                                            
                                            <!--Card footer-->
                                            <div class="card-footer pb-0">
                                                <div class="row mb-0">
                                                    <span class="float-left"><strong> '.after($trip['timestart']).'</strong></span>                                                    
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
                                <h5> KHÔNG CÓ YÊU CẦU NÀO</h5>
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
