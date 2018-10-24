

    <!--Main layout-->
    <main>
        <div class="container-fluid">
            
            <!-- Section: Edit Account -->
            <section class="section">
                <!-- First row -->
                <div class="row">
                    <!-- First column -->                    
                    <!-- /.First column -->
                    <!-- Second column -->
                    <div class="col-md-1"> </div>
                    <div class="col-lg-10 mb-4">
                        <!-- Card -->
                        <div class="card card-cascade wider">

                        <!-- Card image -->
                            <div class="view view-cascade gradient-card-header peach-gradient">

                                <!-- Title -->
                                <h2 class="card-header-title mb-3">Thông tin xác thực</h2>
                                <!-- Text -->
                                <p class="mb-0"><i class="fa fa-user mr-2"></i><?php echo $this->session->userdata('username'); ?></p>

                            </div>

                        <!-- Card content -->
                            <div class="card-body card-body-cascade text-center">

                                <form method="post" class="md-form" enctype="multipart/form-data" action="<?php echo site_url('verify/process'); ?>">
                                    <!--First row-->
                                    <?php
                                        echo $message;
                                    ?>                                                                      
                                    <!--Second row-->
                                    <div class="row">                                        
                                        <!--Second column-->
                                        <div class="col-md-1"> </div>
                                        <div class="col-md-9">
                                            <div class="md-form mb-0">
                                                <input type="email" id="form77" class="form-control validate" value="<?php echo $status['email']['content']; ?>" name="email">
                                                <label for="form77" data-error="wrong" data-success="right">Nhập email sinh viên...</label>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-2">
                                            <div class="md-form mb-0">
                                                <label for="form77" data-error="wrong" data-success="right">
                                                <?php
                                                    $text = $status['email']['status']; 
                                                    echo ($text == 'Not yet' ? "Chưa xác thực" : $text);
                                                 ?>
                                                 </label>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <br>
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-10 text-center">
                                            <div class="file-field">
                                                <a class="btn-floating peach-gradient mt-0 float-left">
                                                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                    <input type="file" name="scard">
                                                </a>
                                                <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Tải lên ảnh thẻ sinh viên của bạn...">
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="col-md-2">                                            
                                            <label for="form77" data-error="wrong" data-success="right">
                                            <?php                                                 
                                                 $text = $status['scard']['status']; 
                                                 echo ($text == 'Not yet' ? "Chưa xác thực" : $text);                                              
                                            ?>
                                            </label>                                        
                                        </div>                                                                                                             
                                    </div>
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-10 text-center">
                                            <div class="file-field">
                                                <a class="btn-floating peach-gradient mt-0 float-left">
                                                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                    <input type="file" name="cmnd">
                                                </a>
                                                <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Tải lên ảnh giấy CMND của bạn...">
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="col-md-2">
                                            <label for="form77" data-error="wrong" data-success="right">
                                                <?php
                                                    $text = $status['cmnd']['status']; 
                                                    echo ($text == 'Not yet' ? "Chưa xác thực" : $text);
                                                ?>
                                            </label>
                                        </div>                                                                      
                                    </div>
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-10 text-center">
                                            <div class="file-field">
                                                <a class="btn-floating peach-gradient mt-0 float-left">
                                                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                    <input type="file" name="dcard">
                                                </a>
                                                <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Tải lên ảnh bằng lái xe của bạn...">
                                                </div>
                                            </div>
                                        </div>      
                                        <div class="col-md-2">
                                            <label for="form77" data-error="wrong" data-success="right">
                                            <?php                                              
                                                $text = $status['dcard']['status']; 
                                                echo ($text == 'Not yet' ? "Chưa xác thực" : $text);                                           
                                            ?>
                                            </label>
                                        </div>                                                                    
                                    </div>                                                                                
                                    <div class="row">                                        
                                        <div class="col-md-12 text-center my-4">                        
                                            <input type="text" name="username" value="'.$info['username'].'" hidden>                    
                                            <input type="submit" value="Gửi thông tin xác thực" class="btn btn-info btn-rounded">
                                        </div>
                                    </div>                                                                                                                                       
                                </form>
                            
                            </div>
                        <!-- Card content -->

                        </div>
                        <!-- Card -->

<!-- Card -->
                        <!--Card-->                    
                    </div>
                    <!-- /.Second column -->
                </div>
                <!-- /.First row -->
            </section>
            <!-- /.Section: Edit Account -->

        </div>
    </main>
    <!--Main layout-->
