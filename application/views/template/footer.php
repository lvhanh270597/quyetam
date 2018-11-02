
<div class="fuck">
</div>
<!--Footer-->
    <footer class="page-footer text-center text-md-left stylish-color-dark pt-0">

        <div style="background-color: #4285f4;">
            <div class="container">
                <!--Grid row-->
                <div class="row py-4 d-flex align-items-center">

                    <!--Grid column-->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                        <!--Facebook-->
                        <a class="fb-ic ml-0 px-2" href="https://www.facebook.com/easyhere.service"><i class="fa fa-facebook white-text"> </i></a>
                        <!--Twitter-->
                        <a class="tw-ic px-2"><i class="fa fa-twitter white-text"> </i></a>
                        <!--Google +-->
                        <a class="gplus-ic px-2"><i class="fa fa-google-plus white-text"> </i></a>
                        <!--Linkedin-->
                        <a class="li-ic px-2"><i class="fa fa-linkedin white-text"> </i></a>
                        <!--Instagram-->
                        <a class="ins-ic px-2"><i class="fa fa-instagram white-text"> </i></a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </div>
        </div>

        <!--Footer Links-->
        <div class="container mt-5 text-center text-md-left">
            <div class="row mt-3">

                <!--First column-->
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold"><strong>Easy Here</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Giải quyết vấn đề chuyên chở</p>                    
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold"><strong>Products</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a href="#!">Dịch vụ đi cùng nhau!</a></p>                   
                </div>
                <!--/.Second column-->

                <!--Third column-->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold"><strong>Useful links</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a href="<?php echo base_url('edit_profile'); ?>">Your Account</a></p>                    
                </div>
                <!--/.Third column-->

                <!--Fourth column-->
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h6 class="text-uppercase font-weight-bold"><strong>Contact</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><i class="fa fa-home mr-3"></i> KTX B - DHQG, TP.HCM</p>
                    <p><i class="fa fa-envelope mr-3"></i> easyhere.dh@gmail.com</p>
                    <p><i class="fa fa-phone mr-3"></i> + 84 165 300 1562</p>                    
                </div>
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->
    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <!-- JQuery -->

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/mdb.min.js'); ?>"></script>    
    <script type="text/javascript">
    /* WOW.js init */
        new WOW().init();

        // Tooltips Initialization
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        // Material Select Initialization
        $(document).ready(function () {
            $('.mdb-select').material_select();
        });
    </script>
    <script>
        // SideNav Initialization
        $(".button-collapse").sideNav();
    </script>

    <?php
        if (preg_match('/register/', $this->uri->uri_string())){
            echo '<script type="text/javascript" src="'.base_url('assets/js/register.js').'"></script>';
        }
    
    ?>    

    
<script>
    $(document).ready(function(){ 
	$('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();
    }); 
</script>
    </body>
</html>