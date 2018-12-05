
    <style>
        .intro-2 {
            background: url("https://aphoto.vn/wp-content/uploads/2016/07/cach-chup-hinh-dep-bang-dien-thoai.jpg")no-repeat center center;
            background-size: cover;
        }

        .top-nav-collapse {
            background-color: #9da4b1 !important;
        }

        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }

        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background: #9da4b1 !important;
            }
        }

        .rgba-gradient {
            background: -webkit-linear-gradient(45deg, rgba(83, 125, 210, 0.4), rgba(178, 30, 123, 0.4) 100%);
            background: -webkit-gradient(linear, 45deg, from(rgba(29, 236, 197, 0.4)), to(rgba(96, 0, 136, 0.4)));
            background: linear-gradient(to 45deg, rgba(29, 236, 197, 0.4), rgba(96, 0, 136, 0.4) 100%);
        }

        .card {
            background-color: rgba(229, 228, 255, 0.2);
        }

        body {
            background-color: #fff;
        }

        h6 {
            line-height: 1.7;
        }

        html,
        body,        
        .view {
          height: 100%;
        }

        @media (max-width: 740px) {
          html,
          body,          
          .view {
            height: 1040px;
          }
        }
        @media (min-width: 800px) and (max-width: 850px) {
          html,
          body,
          header,
          .view {
            height: 600px;
          }
        }

        footer.page-footer {
            background-color: #9da4b1;
        }
        
    </style>
<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>

<script src='https://www.google.com/recaptcha/api.js?render=6Lfm6X4UAAAAAJIDkh4TpbDDXBg4otXfSRK11D96'></script>

</head>

        <!-- Intro Section -->
        <section class="view intro-2">
            <div class="mask rgba-gradient">
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="d-flex align-items-center content-height">
                        <div class="row flex-center pt-5 mt-3">
                            <div class="col-md-6 text-center text-md-left mb-5">
                                <div class="white-text">
                                    <h1 class="h1-responsive font-weight-bold wow fadeInLeft animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeInLeft; animation-delay: 0.3s;">Sign up right now! </h1>
                                    <hr class="hr-light wow fadeInLeft animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeInLeft; animation-delay: 0.3s;">
                                    <h6 class="wow fadeInLeft animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeInLeft; animation-delay: 0.3s;">Sign up right now for use our service. 
                                    <br>EasyHere - The service which can solve the problem of the crowded bus!</h6>
                                    <br>
                                    <a class="btn btn-outline-white btn-rounded wow fadeInLeft waves-effect waves-light animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeInLeft; animation-delay: 0.3s;">Learn more</a>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-5 offset-xl-1">
                                <!-- Form -->
                                <div class="card wow fadeInRight animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeInRight; animation-delay: 0.3s;">
                                    <div class="card-body">
                                        <!-- Header -->
                                        <div class="text-center">
                                            <h3 class="white-text"><i class="fa fa-user white-text"></i> Register:</h3>
                                            <hr class="hr-light">
                                        </div>
                                        <style>
                                        .error{
                                            font-size: 12px;                                                                                        
                                            padding-left: 40px;
                                        }                                    
                                        
                                        #gender{
                                            font-size: 12px;
                                            color: white;
                                        }                                        
                                        </style>
                                        <div id="registration">
                                            <!-- Body -->
                                            <form method="post" id="form_register" >                                              
                                                <div class="md-form" id="fuck">
                                                    <i class="fa fa-user prefix white-text"></i>
                                                    <input id="full_name" class="form-control" type="text" name="full_name" required>
                                                    <label for="form3" class="white-text">Full name</label>
                                                    <p class="error" id="full_name_err"></p>
                                                </div>    
                                                
                                                <!-- Material inline 1 -->
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" id="materialInline1" name="gender" value="nam" checked>
                                                    <label class="form-check-label" for="materialInline1" id="gender">Male</label>
                                                </div>

                                                <!-- Material inline 2 -->
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" id="materialInline2" name="gender" value="nu">
                                                    <label class="form-check-label" for="materialInline2" id="gender">Female</label>
                                                </div>

                                                <!-- Material inline 3 -->
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" id="materialInline3" name="gender" value="khac">
                                                    <label class="form-check-label" for="materialInline3" id="gender">Other</label>
                                                </div>
                                                <div class="md-form" id="fuck">
                                                    <i class="fa fa-user prefix white-text"></i>
                                                    <input id="username" class="form-control" type="text" name="username">
                                                    <label for="form3" class="white-text">Username</label>
                                                    <p class="error" id="username_err"></p>
                                                </div>

                                                <div class="md-form" id="fuck">
                                                    <i class="fa fa-lock prefix white-text"></i>
                                                    <input id="password" class="form-control" type="password" name="password">
                                                    <label for="form4" class="white-text">Password</label>
                                                    <p class="error" id="password_err"></p>
                                                </div>                                                    
                                                <div class="md-form" id="fuck">
                                                    <i class="fa fa-lock prefix white-text"></i>
                                                    <input id="confirm_password" class="form-control" type="password" name="confirm_password">
                                                    <label for="form4" class="white-text">Confirm Password</label>
                                                    <p class="error" id="confirm_password"></p>
                                                </div>                       
                                                <div class="g-recaptcha" data-sitekey="6Lfm6X4UAAAAAJIDkh4TpbDDXBg4otXfSRK11D96"></div>
                                            </form>
                                        </div>
                                        <div class="text-center mt-4">
                                            <?php echo $errors; ?>
                                            
                                            <button class="btn btn-light-blue btn-rounded waves-effect waves-light" type="submit" form="form_register">Sign up</button>
                                            <hr class="hr-light mb-3 mt-4">

                                            <div class="inline-ul text-center d-flex justify-content-center">
                                                <a class="p-2 m-2 fa-lg tw-ic"><i class="fa fa-twitter white-text"></i></a>
                                                <a class="p-2 m-2 fa-lg li-ic"><i class="fa fa-linkedin white-text"> </i></a>
                                                <a class="p-2 m-2 fa-lg ins-ic"><i class="fa fa-instagram white-text"> </i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
    <!-- Main Navigation -->    
    <!--/.Footer-->

    <script>
        grecaptcha.ready(function() {
        grecaptcha.execute('6Lfm6X4UAAAAAJIDkh4TpbDDXBg4otXfSRK11D96', {action: 'action_name'})
        .then(function(token) {
        // Verify the token on the server.
        });
        });
</script>