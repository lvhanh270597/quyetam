

<style>
    #fuck{
        margin-bottom: 20px;
    }   
    body{
        
    }
</style>
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
            
            <div class="container">
                <!--Navbar-->                            
                <nav class="navbar navbar-expand-lg navbar-dark primary-color" id="fuck">

                    <!-- Navbar brand -->
                    <a class="font-weight-bold white-text mr-4" href="#"></a>

                    <!-- Collapse button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">


<!-- Links -->
                        <!-- Links -->
                        <ul class="navbar-nav mr-auto">                                                                            
                            <!--Dropdown primary-->
                            <div class="dropdown">

                                <!--Trigger-->
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                From
                                </button>
                                <!--Menu-->
                                <div class="dropdown-menu dropdown-primary">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>                                        
                            <!--/Dropdown primary-->
                            <div class="dropdown">

                                <!--Trigger-->
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                To
                                </button>
                                <!--Menu-->
                                <div class="dropdown-menu dropdown-primary">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </ul>
                        <!-- Links -->

                        <!-- Search form -->
                        <form class="search-form" role="search">
                            <div class="form-group md-form my-0 waves-light waves-effect waves-light">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <!-- Collapsible content -->

                </nav>
                <!--/.Navbar-->
            
            </div>
            
        </div>
        
        <!-- Grid row -->
        

        <!-- Card -->
    <div class="card card-cascade">

    <!-- Card image -->
    <div class="view view-cascade gradient-card-header blue-gradient">

    <!-- Title -->
    <h2 class="card-header-title mb-3">EasyHere</h2>
    <!-- Subtitle -->
    <p class="card-header-subtitle mb-0">We go tothere!!!</p>

    </div>

    <!-- Card content -->
    <div class="card-body card-body-cascade text-center">
        <!-- /.Main Container -->
        <div class="container">
            <!-- Grid row -->
            <div class="row">
                
                <div class="container">
                
                    <!-- Card Narrower -->
                    <div class="card card-cascade narrower">
                        <section>
                            
                            <h4 class="font-weight-bold mt-4 dark-grey-text"><strong>ALL TRIPS</strong></h4>
                            <hr class="mb-3">

                            
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
                                                <div class="card-body" id="dm">                                    
                                                    <!--Category & Title-->
                                                    <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">'.$places[$trip['start_from']].'</a> <i class="fa fa-mail-forward" aria-hidden="true"></i> '.$places[$trip['finish_to']].'</strong></h5>                                        
                                                    <span class="badge badge-success mb-2">'.$owner['full_name'].'</span> </br>
                                                    '.$free.'
                                                    '.$empty.'
                                                    <!--Card footer-->
                                                    <div class="card-footer pb-0">
                                                        <div class="row mb-0">
                                                            <span class="float-left"><strong> '.$trip['timestart'].'</strong></span>
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
                                    else {
                                        echo '
                                        <div class="col-md-12">
                                        <h5> No need trips</h5>
                                        </div>
                                        ';      
                                    }
                                ?>

                                <!--Grid column-->
                                
                                <!--Grid column-->                        

                            </div>
                            <!--Grid row-->

                            <!--Grid row-->                    
                            <!--Grid row-->
                        </section>

                    </div>
                    <!-- Card Narrower -->

                <!-- Card Narrower -->
                <div class="card card-cascade narrower">
                        <section>
                            
                            <h4 class="font-weight-bold mt-4 dark-grey-text"><strong>ALL NEED TRIPS</strong></h4>
                            <hr class="mb-3">

                            
                            <div class="row">
                            <?php
                                if ($needed_trips){
                                    foreach ($needed_trips as $trip){
                                        $asker = $this->user_ml->get_by_primary($trip['asker']);                                    
                                        $place = $this->place_ml->get_by_primary($trip['finish_to']);                                    
                                        $free = '';
                                        if ($trip['price'] == 0){
                                            $free = '<span class="badge badge-warning mb-2">free</span>';
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
                                            <div class="card-body" id="dm">
                                                <!--Category & Title-->
                                                <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">'.$places[$trip['start_from']].'</a> <i class="fa fa-mail-forward" aria-hidden="true"></i> '.$places[$trip['finish_to']].'</strong></h5>
                                                <span class="badge badge-success mb-2">'.$asker['full_name'].'</span> </br>
                                                '.$free.'                                            
                                                <!--Card footer-->
                                                <div class="card-footer pb-0">
                                                    <div class="row mb-0">
                                                        <span class="float-left"><strong> '.$trip['timestart'].'</strong></span>
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
                                    <h5> No need trips</h5>
                                    </div>
                                    ';      
                                }
                            ?>

                                <!--Grid column-->
                                
                                <!--Grid column-->                        

                            </div>
                            <!--Grid row-->

                            <!--Grid row-->                    
                            <!--Grid row-->
                        </section>

                    </div>
                    <!-- Card Narrower -->

            
                <section>

                    
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

    </div>

</div>
<!-- Card -->

</div>