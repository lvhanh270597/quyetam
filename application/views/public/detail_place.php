
<style>
    #fuck{
        max-height: 500px;        
    }
</style>
       
    <main>
        <div class="container">

            <!-- Section: Edit Account -->
            <section class="section"> 
                
                <div class="col-md-12">
                <!-- Card -->
                    <div class="card card-cascade wider reverse">

                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <?php
                                $original_image = "https://mdbootstrap.com/img/Photos/Others/placeholder.jpg";
                                if (isset($image)){
                                    $original_image = base_url('assets/images/uploads/places/'.$id.'/'.$image);
                                }
                            ?>
                            <img class="card-img-top" src="<?php echo $original_image; ?>" id="fuck" alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">

                            <!-- Title -->
                            <h4 class="card-title"><strong><?php echo $name; ?></strong></h4>
                            <!-- Subtitle -->
                            <h6 class="font-weight-bold indigo-text py-2">Thông tin</h6>
                            <!-- Text -->
                            <p class="card-text">
                            <?php echo $descript; ?>
                            </p>

                            <!-- Linkedin -->
                            <a class="px-2 fa-lg li-ic"><i class="fa fa-linkedin"></i></a>
                            <!-- Twitter -->
                            <a class="px-2 fa-lg tw-ic"><i class="fa fa-twitter"></i></a>
                            <!-- Dribbble -->
                            <a class="px-2 fa-lg fb-ic"><i class="fa fa-facebook"></i></a>

                        </div>

                    </div>
                    <!-- Card -->
                </div>      
            </section>            
            <br>
        </div>        
    </main>
    <!--Main layout-->
    