
    <!-- Mega menu -->
    <div class="container mt-5 pt-3">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color mt-5">

            <!-- Navbar brand -->
            <a class="font-weight-bold white-text mr-4" href="#">Lọc</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item dropdown mega-dropdown active">
                        <a class="nav-link dropdown-toggle  no-caret waves-effect waves-light" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bạn đi đâu?</a>
                        <div class="dropdown-menu mega-menu v-2 row z-depth-1 white" aria-labelledby="navbarDropdownMenuLink1">
                            <div class="row mx-md-4 mx-1">
                                <div class="col-md-6 col-xl-3 sub-menu my-xl-5 mt-5 mb-4">
                                    <h6 class="sub-title text-uppercase font-weight-bold blue-text">Trường Đại Học</h6>
                                    <ul class="caret-style pl-0">
                                        <li class=""><a class="menu-item mb-0 waves-effect waves-light" href="">ĐH Công Nghệ Thông Tin</a></li>
                                        <li class=""><a class="menu-item waves-effect waves-light" href="">ĐH Nông Lâm</a></li>
                                        <li class=""><a class="menu-item waves-effect waves-light" href="">ĐH Kinh Tế - Luật</a></li>
                                        <li class=""><a class="menu-item waves-effect waves-light" href="">ĐH Bách Khoa</a></li>
                                        <li class=""><a class="menu-item waves-effect waves-light" href="">ĐH Nhân Văn</a></li>
                                        <li class=""><a class="menu-item waves-effect waves-light" href="">ĐH Quốc Tế</a></li>
                                        <li class=""><a class="menu-item waves-effect waves-light" href="">ĐH Khoa Học Tự Nhiên</a></li>                                        
                                    </ul>
                                </div>
                                <div class="col-md-6 col-xl-3 sub-menu my-xl-5 mt-md-5 mt-4 mb-4">
                                    <h6 class="sub-title text-uppercase font-weight-bold blue-text">Kí túc xá</h6>
                                    <ul class="caret-style pl-0">
                                        <li class=""><a class="menu-item waves-effect waves-light" href="">Kí túc xá khu A</a></li>
                                        <li class=""><a class="menu-item waves-effect waves-light" href="">Kí túc xá khu B</a></li>                                        
                                    </ul>
                                </div>                                
                            </div>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown mega-dropdown">
                        
                    </li>

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
    <!-- Mega menu -->

    <!-- /.Main Container -->
    <div class="container">

        <!-- Grid row -->
        <div class="row pt-4">

            <!-- Content -->
            <div class="col-lg-12">
               
                <!-- /.Section: Last items -->

                <!-- Section: Last items -->
                <section>

                    <h4 class="font-weight-bold mt-4 dark-grey-text"><strong>ALL TRIPS</strong></h4>
                    <hr class="mb-5">

                    <!-- Grid row -->
                    <div class="row">

                        <?php
                            if (count($trips) > 0){
                                foreach ($trips as $trip){
                                    $owner = $this->user_ml->get_by_primary($trip['owner']);
                                    $free = '';
                                    if ($owner['balance'] < 0){
                                        $free = '<span class="badge badge-warning mb-2">free</span>';
                                    }
                                    $empty = '';
                                    if ($trip['occup'] == false){
                                        $empty = '<span class="badge badge-primary mb-2">còn trống</span></br>';
                                    }                              
                                    else{
                                        $empty .= '<span class="badge badge-danger mb-2">hết chỗ</span></br>';
                                    }  
                                    echo '<div class="col-lg-3 col-md-6 mb-4">

                                    <!--Card-->
                                    <div class="card card-ecommerce">

                                        <!--Card image-->
                                        <div class="view overlay">
                                            <img src="'.$map_image[$trip['_to']].'" class="img-fluid" alt="">
                                            <a href="'.site_url('detail/'.$trip['id_boss']).'">
                                                <div class="mask rgba-white-slight waves-effect waves-light">                                            
                                                </div>                                            
                                            </a>
                                        </div>
                                        <!--Card image-->
        
                                        <!--Card content-->
                                        <div class="card-body">                                    
                                            <!--Category & Title-->
                                            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">'.$trip['_from'].'</a> <i class="fa fa-mail-forward" aria-hidden="true"></i> '.$trip['_to'].'</strong></h5>                                        
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
                        ?>

                        <!--Grid column-->
                        
                        <!--Grid column-->                        

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row justify-content-center mb-4">

                        <!--Pagination -->
                        <nav class="mb-4">
                            <ul class="pagination pagination-circle pg-blue mb-0">

                                <!--First-->
                                <li class="page-item disabled clearfix d-none d-md-block"><a class="page-link waves-effect waves-effect">First</a></li>

                                <!--Arrow left-->
                                <li class="page-item disabled">
                                    <a class="page-link waves-effect waves-effect" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                </li>

                                <!--Numbers-->
                                <li class="page-item active"><a class="page-link waves-effect waves-effect">1</a></li>
                                <li class="page-item"><a class="page-link waves-effect waves-effect">2</a></li>
                                <li class="page-item"><a class="page-link waves-effect waves-effect">3</a></li>
                                <li class="page-item"><a class="page-link waves-effect waves-effect">4</a></li>
                                <li class="page-item"><a class="page-link waves-effect waves-effect">5</a></li>

                                <!--Arrow right-->
                                <li class="page-item">
                                    <a class="page-link waves-effect waves-effect" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                </li>

                                <!--First-->
                                <li class="page-item clearfix d-none d-md-block"><a class="page-link waves-effect waves-effect">Last</a></li>

                            </ul>
                        </nav>
                        <!--/Pagination -->

                    </div>
                    <!--Grid row-->
                </section>
                <!-- /.Section: Last items -->

            </div>
            <!-- /.Content -->

        </div>
        <!-- Grid row -->

    </div>
