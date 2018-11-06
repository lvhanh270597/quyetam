
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="../../assets/css/review.css">
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
        height: 120px;
    }
</style>

<div class="container">

    

    <div class="row profile">
    
		<div class="col-md-3">
        <!-- Card -->
            <div class="card testimonial-card">

        <!-- Bacground color -->
                <div class="card-up indigo lighten-1">
                </div>

                <!-- Avatar -->
                <div class="avatar mx-auto white" >
                    <img src="<?php  echo $info['image']; ?>" class="rounded-circle" id="fuck">
                </div>

                <div class="card-body">
                    <!-- Name -->
                    <h4 class="card-title"><?php  echo $info['full_name']; ?> </h4> <h5><?=get_color_status(get_status($info['username']))?></h5>    
                    <span class="badge badge-info mb-2"></span>
                    <span class="badge badge-warning mb-2"></span>                                        
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
                    <h2 class="card-header-title">Reviews</h2>            
                </div>
                <div class="card-body">
                    <!-- Name -->
                    <!-- /.Main Container -->    
                    <div class="container">  
                    
                    <div class="fuck">                                
                    </div>                  
                    <!-- Grid row -->
                    <!-- Card -->                    

                        <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">
                        <!-- /.Main Container -->
                        <div class="container">
                            <!-- Grid row -->
                            <div class="row">                                    
                                <div class="col-md-12">
                                <table class="table table-striped">                                    
                                    <tbody>
                                        <tr>
                                        <th scope="row">Giới tính</a></th>
                                        <td>
                                            <?php
                                            $map = [
                                                'nam' => 'Nam',
                                                'nu' => 'Nữ',
                                                'khac' => 'Khác'
                                            ];
                                            ?>
                                            <?= $map[$info['gender']]; ?>
                                        </td>                                        
                                        </tr>
                                        <tr>
                                        <th scope="row">Username</th>
                                        <td><?= $info['username']; ?></td>                                        
                                        </tr>
                                        <tr>
                                        <th scope="row">Trường</th>
                                        <td><?= $info['university']; ?></td>                                        
                                        </tr>
                                        <th scope="row">Khoa</th>
                                        <td><?= $info['subject']; ?></td>                                        
                                        </tr>
                                        <tr>
                                        <th scope="row">Điện thoại</th>
                                        <td>
                                            <?php
                                            $str = 'Hai bạn phải kết nối mới xem được phần này';
                                            if ($permission){ $str = $info['phone_num']; }
                                            echo $str;                                                
                                            ?>
                                        </td>                                        
                                        </tr>
                                        <tr>
                                        <th scope="row">Facebook</th>
                                        <td>
                                            <?php
                                            $str = 'Hai bạn phải kết nối mới xem được phần này';
                                            if ($permission){ $str = $info['facebook']; }
                                            echo $str;                                                
                                            ?>
                                        </td>                                        
                                        </tr>                                        
                                    </tbody>
                                </table>                                    
                                </div>
                            </div>
                        <!-- Nav tabs -->
                        <!-- Tab panels -->
                            <div class="tab-content">
                                <!--Panel 1-->
                                <div class="tab-pane fade in show active" id="panel555" role="tabpanel">                                   
                                </div>
                                <!--/.Panel 1-->
                                <!--Panel 2-->
                                <div class="tab-pane fade" id="panel666" role="tabpanel">
                                    <!-- Card content -->
                                    <div class="card-body card-body-cascade">
                                        <!-- Card content -->
                                        <p class="font-weight-bold "> </p>
                                    </div>
                                </div>
                                <!--/.Panel 2-->                                            
                                <!--Panel 2-->
                                <div class="tab-pane fade" id="panel777" role="tabpanel">
                                    <!-- Card content -->
                                    <div class="card-body card-body-cascade">
                                        <!-- Card content -->
                                        <p class="font-weight-bold "> 
                                        <?php
                                        $str = 'Hai bạn phải kết nối mới xem được phần này';
                                        if ($permission){ $str = $info['phone_num']; }
                                        echo $str;                                                
                                        ?>
                                        </p>
                                    </div>
                                </div>
                                <!--/.Panel 2-->
                                <!--Panel 2-->
                                <div class="tab-pane fade" id="panel888" role="tabpanel">
                                    <!-- Card content -->
                                    <div class="card-body card-body-cascade">
                                        <!-- Card content -->
                                        <p class="font-weight-bold "> 
                                        <?php
                                        $str = 'Hai bạn phải kết nối mới xem được phần này';
                                        if ($permission){ $str = $info['facebook']; }
                                        echo $str;                                                
                                        ?>
                                        </p>
                                    </div>
                                </div>
                                <!--/.Panel 2-->
                            </div>
                            <!-- Tab panels -->
                        </div>
                    <!-- Card -->                    
                    </div>                            
                                              
                </div>                                                             

                <!-- Card content -->
                <div class="card-body card-body-cascade">
                    <!--Card-->
                    <div class="card card-cascade narrower">
                        <!-- Card content -->
                        <div class="card-body">                                                   
                        </div>               
                        <?php
                        if (isset($reviews) ){
                            foreach ($reviews as $review){
                                $from = $this->user_ml->get_by_primary($review['from_user']);
                                $image = profile_image($from['gender'], $from['username'], $from['image']);;
                                echo '
                                <div class="media">                        
                                    <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="'.$image.'" alt="Avatar">
                                    <div class="media-body">
                                        <a href="'.site_url('review/detail/'.$from['username']).'"> <h5 class="mt-0 font-weight-bold blue-text">'.$from['full_name'].'</h5> </a>
                                        '.$review['content'].'
                                        <div class="media mt-3 shadow-textarea">
                                        </div>                                      
                                        <label> <small>'.ago($review['created']).'</small></label>  
                                    </div>                                    
                                </div>
                                ';
                            }
                        }

                        ?>

                        <?php
                        if ($permission){
                            echo '
                            <div class="card-body">
                                <!-- Edit Form -->
                                <form method="post">                                                                                                                                  
                                    <!--Third row-->
                                    <div class="media mt-3 shadow-textarea">
                                        <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="'.$current_user['image'].'" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="mt-0 font-weight-bold blue-text">'.$current_user['full_name'].'</h5>
                                            <div class="form-group basic-textarea rounded-corners">
                                                <textarea class="form-control z-depth-1" id="exampleFormControlTextarea3" rows="3" placeholder="Write your review..." name="content"></textarea>
                                            </div>
                                        </div>
                                    </div> 

                                    <!--/.Third row-->
                                    <!-- Fourth row -->
                                    <div class="text-center">                                
                                        <div class="row">
                                            <div class="col-md-12">                                        
                                                <input type="submit" value="Đăng"" class="btn btn-info btn-rounded" name="btn">
                                            </div>
                                        </div>                   
                                    </div>                 
                                    <!-- /.Fourth row -->                                    
                                </form>
                                <!-- Edit Form -->
                            </div>';              
                        }           
                        ?>  
                        <!-- /.Card content -->

                    </div>
                </div>

            </div>
            <!-- Card -->            
		</div>
	</div>
</div>
<br>
<br>