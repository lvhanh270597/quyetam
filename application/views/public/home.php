

<style>    
    .fuck{
        padding: 45px;        
    }       
    body{
        
    }
</style>
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
        height: 50%;
    }
</style>

    <!-- Mega menu -->
    
    <!-- Mega menu -->
    
    <!-- /.Main Container -->    
    <div class="container">  
    
        <div class="fuck">                                
        </div>                  
        <!-- Grid row -->
        <!-- Card -->
        <div class="card card-cascade">
            <!-- Card image -->            
            <div class="view view-cascade overlay" id="hihi">
                <!-- Title -->                
                <img  class="card-img-top" src="<?php echo base_url('assets/cover.jpg'); ?>" alt="Card image cap">                
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
                                            <i class="fa fa-motorcycle" aria-hidden="true"></i> TẤT CẢ CHUYẾN ĐI ĐÃ CÓ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#panel666" role="tab">
                                            <i class="fa fa-heart"></i> CÁC CHUYẾN ĐI ĐƯỢC YÊU CẦU</a>
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
                                                if ($trips){
                                                    foreach ($trips as $trip){
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
                                                        echo '<div class="col-lg-3 col-md-6 mb-4" >
                                                        <!--Card-->
                                                        <div class="card card-ecommerce">
                                                            <!--Card image-->
                                                            <div class="view overlay">
                                                                <img src="assets/images/uploads/places/'.$place['id'].'/'.$place['image'].'" class="img-fluid" alt="" id="dm">
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
                                                                '.$free.'
                                                                '.$empty.'
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
                                    </div>
                                    <!-- Nav tabs -->
                                </div>
                                <!--/.Panel 1-->
                                <!--Panel 2-->
                                <div class="tab-pane fade" id="panel666" role="tabpanel">
                                    <!-- Card content -->
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
                                                        $free = '';
                                                        $trip_detail = $this->trip_ml->get_by_primary($trip['trip_id']);
                                                        if ($trip_detail !== null){
                                                            $free = '<span class="badge badge-warning mb-2">đã có người chở</span>';
                                                        }                                    
                                                        echo '<div class="col-lg-3 col-md-6 mb-4">

                                                        <!--Card-->
                                                        <div class="card card-ecommerce">

                                                            <!--Card image-->
                                                            <div class="view overlay">
                                                                <img src="assets/images/uploads/places/'.$place['id'].'/'.$place['image'].'" class="img-fluid" alt="" id="dm">
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
                                                                <span class="badge badge-success mb-2">'.$asker['full_name'].'</span> </br>
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
                                <!--/.Panel 2-->
                            </div>
                            <!-- Tab panels -->
                        </div>
                        <!-- Card -->                    
                    </div>
                </div>
            </div>
        </div>                     
    </div>    
</div>
