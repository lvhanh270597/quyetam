
<style>
    
    #dm{
        width: 100%;
        height: 200px;                        
    }
    #fuck{
        width: 100%;
        height: 15%;
    }
</style>

    <!-- Mega menu -->
    <div class="container mt-5 pt-3">
    </div>
    <!-- Mega menu -->

    <!-- /.Main Container -->
    <div class="container">

        <!-- Grid row -->
        <div class="row pt-4">
            <!-- Content -->
            <div class="col-lg-12">

                <!-- Section: Last items -->
                <section>    
                
                    <hr class="mb-2">
                    <?php 
                        if ($this->session->userdata('admin')){
                            echo '<a class="btn aqua-gradient btn-rounded" href="'.site_url('place/add_place').'">Create new</a>';
                        }
                    ?>
                    <!-- Grid row -->
                    <div class="row">

                        <?php                            
                            if (count($all) > 0){                                
                                foreach ($all as $place){                                                                                                                                                   
                                    echo '
                                    <div class="col-lg-3 col-md-6 mb-4">

                                        <!--Card-->
                                        <div class="card card-ecommerce">

                                            <!--Card image-->
                                            <div class="view overlay">
                                                <img src="'.place_image($place['id'], $place['image']).'" class="img-fluid" alt="" id="dm">
                                                <a href="'.site_url('place/detail/'.$place['id']).'">
                                                    <div class="mask rgba-white-slight waves-effect waves-light">                                            
                                                    </div>                                            
                                                </a>
                                            </div>
                                            <!--Card image-->
            
                                            <!--Card content-->
                                            <div class="card-body" id="fuck">                                    
                                                <!--Category & Title-->
                                                <h5 class="card-title mb-1"><strong><a href="#" class="dark-grey-text">'.$place['name'].'</a></strong></h5>                                                                                        
                                                <!--Card footer-->
                                                <div class="card-footer pb-0">
                                                    <div class="row mb-0">
                                                        <span class="float-left"><strong> </strong></span>
                                                        <span class="float-right">                                                                                                                                                                   
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

                        

                    </div>
                    <!--Grid row-->
                </section>
                <!-- /.Section: Last items -->

            </div>
            <!-- /.Content -->

        </div>
        <!-- Grid row -->

    </div>
