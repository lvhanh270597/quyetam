
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

    #fuck{
        weight: 100px;
        height: 150px;
    }
        
</style>


<div class="container" id="dm">
    <div class="row">
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
                    <table>
                        <tr>
                            <td><a class="btn blue-gradient btn-sm btn-rounded" href="<?php  echo site_url('verify'); ?>">Xác thực</a></td>
                            <td><a class="btn btn-danger btn-sm btn-rounded" href="<?php  echo site_url('logout'); ?>">Đăng xuất</a></td>
                        </tr>
                    </table>                                        
                    <!-- Quotation -->
                    <table class="table">                        
                        <tbody>
                            <tr>
                                <td><?php echo $email; ?><small> Xác thực email sinh viên </small></td>                                                           
                            </tr>
                            <tr>
                                <td><?php echo $scard; ?> <small> Xác thực có thẻ sinh viên </small></td>
                            </tr>                        
                            <tr>
                                <td><?php echo $cmnd; ?> <small> Xác thực có giấy CMND </small></td>
                            </tr>                        
                            <tr>
                                <td><?php echo $dcard; ?> <small> Xác thực có bằng lái xe </small></td>
                            </tr>                        
                        </tbody>
                    </table>   
                </div>

            </div>
        <!-- Card -->			
		</div>
		
        <div class="col-md-9">
                    <!-- Card -->
            <div class="card card-cascade narrower">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header blue-gradient">
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
                                        <!--Second column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $this->session->userdata('username'); ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Username</label>
                                            </div>
                                        </div>
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form81" class="form-control validate" value="<?php echo $full_name; ?>" name="full_name" >
                                                <label for="form81" data-error="wrong" data-success="right">Full name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.First row-->
                                    <!--First row-->
                                    <div class="row">                                        
                                        <!--Second column-->
                                        <div class="col-md-3">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $balance; ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Tài khoản chính</label>
                                            </div>
                                        </div>
                                        <!--First column-->
                                        <div class="col-md-3">
                                            <div class="md-form mb-0">
                                            <select class="browser-default custom-select mb-4" name="role">

                                              <?php
                                              if ($role == null){
                                                echo '<option value="" disabled selected>Bạn là?</option>
                                                <option value="chu_xe" >Chủ xe</option>
                                                <option value="hanh_khach" >Hành khách</option>';
                                              }                                           
                                              else if ($role === 'chu_xe'){
                                                echo '<option value="chu_xe" >Chủ xe</option>
                                                <option value="hanh_khach" >Hành khách</option>';
                                              } else {
                                                echo '<option value="hanh_khach" >Hành khách</option>
                                                <option value="chu_xe" >Chủ xe</option>';
                                              }
                                              ?>                                                                                               
                                              </select> 
                                            </div>
                                        </div>
                                            <!-- Material inline 1 -->
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="materialInline1" name="gender" value="nam" 
                                                <?php  
                                                    if ($gender == 'nam'){
                                                        echo 'checked';
                                                    }
                                                ?>
                                                >
                                                <label class="form-check-label" for="materialInline1" id="gender">Male</label>
                                            </div>

                                            <!-- Material inline 2 -->
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="materialInline2" name="gender" value="nu"
                                                <?php  
                                                    if ($gender == 'nu'){
                                                        echo 'checked';
                                                    }
                                                ?>
                                                >
                                                <label class="form-check-label" for="materialInline2" id="gender">Female</label>
                                            </div>

                                            <!-- Material inline 3 -->
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="materialInline3" name="gender" value="khac"
                                                <?php  
                                                    if ($gender == 'khac'){
                                                        echo 'checked';
                                                    }
                                                ?>
                                                >
                                                <label class="form-check-label" for="materialInline3" id="gender">Other</label>
                                            </div>    
                                    </div>
                                    <!--/.First row-->
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form76" class="form-control validate" value="<?php echo $university; ?>" name="university">
                                                <label for="form76">Trường</label>
                                            </div>
                                        </div>
                                        <!--Second column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form77" class="form-control validate" value="<?php echo $subject; ?>" name="subject">
                                                <label for="form77" data-error="wrong" data-success="right">Khoa</label>
                                            </div>
                                        </div>                                                                            
                                    </div>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check form-check-inline">                                            
                                                <div class="form-check">
                                                <a href="<?= site_url('profile/road') ?>" class="btn btn-sm btn-info btn-rounded">Cập nhật tuyến đường mà bạn quan tâm</a> 
                                                </div>                                                                                                                                  
                                            </div>
                                        </div>                                                                                                         
                                    </div>                                                                      
                                    <!--/.Second row-->
                                    <!--/.Third row-->
                                    <!-- Fourth row -->
                                    <div class="row">
                                        <div class="col-md-3 text-center my-4"></div>
                                        <div class="col-md-3 text-center my-4">                        
                                            <input type="text" name="username" value="<?php echo $username; ?>" hidden>                    
                                            <input type="submit" value="Cập nhật" class="btn btn-info btn-rounded">
                                        </div>
                                        <div class="col-md-3 text-center my-4">                        
                                            <a href="<?= site_url('profile/recharge') ?>" class="btn btn-info btn-rounded">NỘP TIỀN</a> 
                                        </div>
                                        <div class="col-md-3 text-center my-4"></div>
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
