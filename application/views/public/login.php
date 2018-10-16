
    <style>

        .intro-2 {
            background: url("http://anhdep.pro/wp-content/uploads/2015/06/anh-dep-71.jpg")no-repeat center center;
            background-size: cover;
        }
        .top-nav-collapse {
            background-color: #3f51b5 !important;
        }
        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }
       
        .card {
            background-color: rgba(229, 228, 255, 0.2);
        }
        .md-form label {
            color: #ffffff;
        }
        h6 {
            line-height: 1.7;
        }
        #home{
              visibility: hidden;
        }
        html,
        body,               
        .view {
          height: 100%;
        }

        @media (min-height: 160px) and (max-height: 540px) {                            
          header{
              height: 600px;
          }
          #home{
                visibility: visible;
          }
        }

        @media (min-width: 160px) and (max-width: 540px) {                            
          header{
              display: none;
          }
          #home{
                visibility: visible;
          }
        }

        @media (min-width: 560px) and (max-width: 740px) {
          html,
          body,                    
          .view {
            height: 650px;
          }
          #home{
              visibility: hidden;
          }
          header{
              display: none;
          }
        }

        @media (min-width: 800px) and (max-width: 850px) {
          html,
          body,
          .view  {
            height: 650px;
          }
          #home{
              visibility: hidden;
          }          
        }

        .card {
            margin-top: 30px;
            /*margin-bottom: -45px;*/

        }

        .md-form input[type=text]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #8EDEF8;
            box-shadow: 0 1px 0 0 #8EDEF8;
        }
        .md-form input[type=text]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label {
            color: #8EDEF8;
        }

        .md-form .form-control {
            color: #fff;
        }

        .navbar.navbar-dark form .md-form input:focus:not([readonly]) {
            border-color: #8EDEF8;
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5!important;
            }
        }

    </style>

<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style><style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>

<body>



        <!--Intro Section-->
        <section class="view intro-2">
          <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

                        <!--Form with header-->
                        <div class="card wow fadeIn animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
                            <div class="card-body">

                                <!--Header-->
                                <div class="form-header purple-gradient">
                                    <h3><i class="fa fa-user mt-2 mb-2"></i> Log in:</h3>
                                </div>
                                <form method="post" id="form_login">
                                <!--Body-->
                                <div class="md-form">
                                    <i class="fa fa-user prefix white-text"></i>
                                    <input id="orangeForm-name" class="form-control" type="text" name="username">
                                    <label for="orangeForm-name">Username</label>
                                </div>                           
                                <div class="md-form">
                                    <i class="fa fa-lock prefix white-text"></i>
                                    <input id="orangeForm-pass" class="form-control" type="password" name="password">
                                    <label for="orangeForm-pass">Password</label>
                                </div>
                            </form>
                                <div class="text-center mt-4">
                                    <?php echo $errors; ?>                                    
                                </div>
                                <div class="text-center">                                
                                    <button class="btn purple-gradient btn-lg btn-rounded waves-effect waves-light" type="submit" value="submit" form="form_login">Continue</button>
                                    <a class="btn btn-info btn-lg btn-rounded waves-effect waves-light" href="<?php echo site_url('register'); ?>">Signup</a>
                                    <a id="home" class="btn aqua-gradient btn-rounded" href="<?php echo base_url(); ?>">Go back home</a>
                                    <hr>                                    
                                    <div class="inline-ul text-center d-flex justify-content-center">
                                        <a class="p-2 m-2 fa-lg tw-ic"><i class="fa fa-twitter white-text"></i></a>
                                        <a class="p-2 m-2 fa-lg li-ic"><i class="fa fa-linkedin white-text"> </i></a>
                                        <a class="p-2 m-2 fa-lg ins-ic"><i class="fa fa-instagram white-text"> </i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Form with header-->

                    </div>
                </div>
            </div>
          </div>
        </section>

    </header>
    <!--Main Navigation-->


</body>
</html>