
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="assets/css/review.css">
<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<style>
    .media {
        padding-left: 10px;
    }                        
    .media .avatar {
        width: 64px;
        height: 64px;
    }
    .shadow-textarea textarea.form-control::placeholder {
        font-weight: 300;
    }
    .shadow-textarea textarea.form-control {
        padding-left: 0.8rem;
    }
    #dm{
        padding-top: 20px;
    }    
    #fuck{
        height: 120px;
    }
</style>


<div class="container" id="dm">
    <div class="row profile">
    <div class="col-md-3">
        <!-- Card -->
            <div class="card testimonial-card">

        <!-- Bacground color -->
                <div class="card-up indigo lighten-1">                
                </div>

                <!-- Avatar -->
                <div class="avatar mx-auto white" id="fuck">
                    <img src="<?php  echo $image; ?>" class="rounded-circle" id="fuck">                    
                </div>
                <form class="md-form" action="<?php site_url('profile/upload'); ?>" enctype="multipart/form-data">
                    <div class="file-field">
                        <a class="btn-floating blue-gradient mt-0 float-left">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <input type="file" name="image">
                        </a>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" id="test" placeholder="Upload your file">
                        </div>
                    </div>
                </form>       

                <script>                    
                    $("input[name=image]").change(function(){
                        var file = $(this)[0].files[0];                                                
                        var formData = new FormData();                        

                        formData.append("image", file);                        
                        
                        $.ajax({
                            url:<?php echo '\''.site_url('profile/upload').'\''; ?>,                                
                            data: formData,                            
                            cache: false,
                            contentType: false,
                            processData: false,
                            method: 'POST',
                            error: function() {
                                alert('Something is wrong');
                            },
                            success: function(data) {
                                console.log(data);
                                window.location.href = "<?php site_url('edit_profile'); ?>";
                            }                           
                        });                                            
                    });
                </script>         
                <div class="card-body">
                    <!-- Name -->
                    
                    <h4 class="card-title"><?php  echo $full_name; ?></h4>
                    <span class="badge badge-info mb-2"><?php  echo $username; ?></span>
                    <span class="badge badge-warning mb-2"><?php  echo $gender; ?></span>                                        
                    <a class="btn btn-unique" href="<?php  echo site_url('verify'); ?>">
                    Verification
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?php  echo site_url('logout'); ?>">
                    Logout
                    </a>
                    <hr>
                    <!-- Quotation -->
                    <ul class="nav">
						<li class="active">						                        	
                            <?php echo $email; ?>
                            <small> Xác thực email sinh viên </small>
						</li>
						<li>				
                            <?php echo $scard; ?>
                            <small> Xác thực có thẻ sinh viên </small>
						</li>
						<li>
                            <?php echo $cmnd; ?>
                            <small> Xác thực có giấy CMND </small>
						</li>
						<li>							
							<?php echo $dcard; ?>
							<small> Xác thực có bằng lái xe </small>
						</li>
					</ul>
                </div>

            </div>
        <!-- Card -->			
		</div>
		
        <div class="col-md-9">
                    <!-- Card -->
            <div class="card card-cascade narrower">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header purple-gradient">
                <!-- Title -->
                    <h2 class="card-header-title">Profile</h2>            
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade">
                    <!--Card-->
                    <div class="card card-cascade narrower">
                        <!-- Card content -->
                        <div class="card-body text-center">
                            <form method="post">
                                    <!--First row-->
                                    <?php
                                        echo $message;
                                    ?>
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="Company, inc" disabled>
                                                <label for="form1" data-error="wrong" data-success="right">Company</label>
                                            </div>
                                        </div>
                                        <!--Second column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $this->session->userdata('username'); ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Username</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.First row-->
                                    <!--First row-->
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form81" class="form-control validate" value="<?php echo $full_name; ?>" name="full_name">
                                                <label for="form81" data-error="wrong" data-success="right">Full name</label>
                                            </div>
                                        </div>
                                        <!--Second column-->
                                        <div class="col-md-3">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $balance; ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Tài khoản chính</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $t_balance; ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Tài khoản dự bị</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.First row-->
                                    <!--Second row-->
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form76" class="form-control validate" value="<?php echo $phone_num; ?>" name="phone_num">
                                                <label for="form76">Phone number</label>
                                            </div>
                                        </div>
                                        <!--Second column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form77" class="form-control validate" value="<?php echo $facebook; ?>" name="facebook">
                                                <label for="form77" data-error="wrong" data-success="right">Facebook Address</label>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <!--/.Second row-->                                   
                                    <!--/.Second row-->
                                    <!--/.Third row-->
                                    <!-- Fourth row -->
                                    <div class="row">
                                        <div class="col-md-12 text-center my-4">                        
                                            <input type="text" name="username" value="<?php echo $username; ?>" hidden>                    
                                            <input type="submit" value="Update Account" class="btn btn-info btn-rounded">
                                        </div>
                                    </div>                                    
                                    <!-- /.Fourth row -->
                                </form>                                            
                        </div>       

                    </div>
                </div>

            </div>
            <!-- Card -->            
		</div>
    </div>
</div>