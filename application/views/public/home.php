

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
                                                            $free = '<span class="badge badge-info mb-2">free</span>';
                                                        }
                                                        else{
                                                            $free = '<span class="badge badge-info mb-2">'.$trip['price'].'đ</span>';
                                                        }
                                                        $empty = '';
                                                        if ($trip['guess'] == null){
                                                            $empty = '<span class="badge badge-primary mb-2">còn trống</span></br>';
                                                        }                              
                                                        else{
                                                            $empty .= '<span class="badge badge-danger mb-2">'.$guess['full_name'].'</span>'.get_color_status(get_status($trip['guess'])).'</br>';
                                                        }  
                                                        echo '<div class="col-lg-3 col-md-6 mb-4" >
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
                                                                <h6 class="card-title mb-1"><strong><a href="'.site_url('trip/detail/'.$trip['id']).'" class="dark-grey-text">'.$places[$trip['start_from']].'<i class="fa fa-mail-forward" aria-hidden="true"></i> '.$places[$trip['finish_to']].'</a> </strong></h6>
                                                                <span class="badge badge-success mb-2">'.$owner['full_name'].'</span>'.get_color_status(get_status($owner['username'])).' </br>
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
                                                        $empty = '';
                                                        $trip_detail = $this->trip_ml->get_by_primary($trip['trip_id']);
                                                        if ($trip_detail !== null){
                                                            $empty = '<span class="badge badge-warning mb-2">đã có người chở</span> <br>';
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
                                <!--/.Panel 2-->
                            </div>
                            <!-- Tab panels -->
                        </div>
                        <!-- Card -->                    
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-circle pg-blue justify-content-center">
                        <li class="page-item <?php if ($index == 1) echo 'disabled'; ?>"><a class="page-link"  href="<?= site_url('pages/1') ?>">First</a></li>
                        <li class="page-item">
                        <a class="page-link <?php if ($index == 1) echo 'disabled'; ?>" aria-label="Previous"  href="<?= site_url('pages/'.($index - 1)) ?>">
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
                        ?>                        
                        <li class="page-item <?php if ($index == $max) echo 'disabled'; ?>">
                        <a class="page-link" aria-label="Next" href="<?= site_url('pages/'.($index + 1)) ?>">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                        <li class="page-item <?php if ($index == $max) echo 'disabled'; ?>"><a class="page-link" href="<?= site_url('pages/'.($max)) ?>">Last</a></li>
                    </ul>
                </nav>
                <div class="alert alert-warning">
                    <strong>Để đảm bảo an toàn: </strong>EasyHere yêu cầu mọi người phải cập nhật đủ các loại giấy tờ liên quan lên hệ thống tại link <a href="<?= base_url('verify') ?>"> này </a>                                        
                </div>                    
                <div class="alert alert-info">
                    <strong>Lưu ý: </strong> Trước khi chuyến đi bắt đầu 15-30 phút, bạn nên vào xem các chuyến đi, yêu cầu của mình đã được chấp nhận hay chưa để liên hệ kịp thời nhé.
                </div>
            </div>            
        </div>                             
    </div>        
</div>
