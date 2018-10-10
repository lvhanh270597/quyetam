

    <main>
        <div class="container-fluid">

            <!-- Section: Edit Account -->
            <section class="section">
                <!-- First row -->
                <div class="row">
                    <!-- First column -->
                    <div class="col-lg-4 mb-4">

                        <!--Card-->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div class="view gradient-card-header mdb-color lighten-3">
                                <h5 class="mb-0 font-weight-bold">Easy Here</h5>
                            </div>
                            <!--/Card image-->

                            <!-- Card content -->
                            <div class="card-body text-center">                                
                                <img src="https://scontent.fsgn5-7.fna.fbcdn.net/v/t39.1997-6/s168x128/851582_488524031261042_690174590_n.png?_nc_cat=1&oh=e0db0fafa1fd62d1f358046ad1a77d0e&oe=5C1A14E9" alt="User Photo" class="z-depth-1 mb-3 mx-auto" />
                                <span><i class="fa fa-mail-forward" aria-hidden="true"></i> </span>
                                <img src="https://scontent.fsgn5-7.fna.fbcdn.net/v/t39.1997-6/s168x128/851582_488524031261042_690174590_n.png?_nc_cat=1&oh=e0db0fafa1fd62d1f358046ad1a77d0e&oe=5C1A14E9" alt="User Photo" class="z-depth-1 mb-3 mx-auto" />                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo site_url('review/detail/'.$asker['username']); ?>">
                                            <button class="btn btn-info btn-rounded btn-sm"><?php echo $asker['full_name']; ?></button><br>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.Card content -->

                        </div>
                        <!--/.Card-->

                    </div>
                    <!-- /.First column -->
                    <!-- Second column -->
                    <div class="col-lg-8 mb-4">

                        <!--Card-->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div class="view gradient-card-header mdb-color lighten-3">
                                <h5 class="mb-0 font-weight-bold">Tạo chuyến đi mới</h5>
                            </div>
                            <!--/Card image-->

                            <!-- Card content -->
                            <div class="card-body text-center">
                                <!-- Edit Form -->
                                <form method="post">                                                                            
                                    <?php echo $message; ?>                                    
                                    <!--First row-->
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                              <select class="browser-default custom-select mb-4" name="start_from">
                                                <?php                                                
                                                    echo '<option value="'.$trip['start_from'].'" disabled selected> from: '.$map[$trip['start_from']].'</option>';                                                                              
                                                ?>
                                              </select>
                                            </div>
                                        </div>
                                        <!--Second column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                              <select class="browser-default custom-select mb-4" name="finish_to">                                                
                                                <?php                                                
                                                echo '<option value="'.$trip['finish_to'].'" disabled selected>to: '.$map[$trip['finish_to']].'</option>';                                                
                                                ?>
                                              </select>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <!--/.First row-->
                                    <!--First row-->
                                    <div class="row">                                        
                                        <!--Second row-->                                    
                                        <!--First column-->
                                        <div class="col-md-6">                                                                                        
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $trip['timestart']; ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Giờ xuất phát</label>                                                                                                                                   
                                            </div>                                        
                                        </div>    
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $asker['full_name'].'('.$asker['username'].')' ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Người yêu cầu</label>
                                            </div>
                                        </div>                                       
                                    </div>               
                                    <div class="row">                                        
                                        <!--Second row-->                                    
                                        <!--First column-->                                        
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $trip['price']; ?>đ" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Giá</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <select class="browser-default custom-select mb-4" name="type_transaction">
                                                    <?php
                                                    if ($trip['type_transaction']){
                                                        echo '<option value="" disabled selected>'.$trip['type_transaction'].'</option>';
                                                    }
                                                    else{
                                                        echo '
                                                        <option value="" disabled selected>Chọn hình thức thanh toán</option>
                                                        <option value="Trực tiếp">Trực tiếp</option>
                                                        <option value="Gián tiếp">Gián tiếp</option>';
                                                    }
                                                    ?>                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-12 text-center my-4">
                                            <input type="text" name="asker" hidden value="<?php echo $this->session->userdata('username'); ?>"/>
                                            <input type="submit" value="Mở chuyến đi này"" class="btn btn-info btn-rounded">
                                        </div>
                                    </div>                                                                                                                                                                
                                    <!--/.Third row-->
                                    <!-- Fourth row -->                                                                   
                                    <!-- /.Fourth row -->                                    
                                </form>                               
                                <!-- Edit Form -->
                            </div>                           
                            <!-- /.Card content -->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!-- /.Second column -->
                </div>
                <!-- /.First row -->
            </section>
            <!-- /.Section: Edit Account -->

        </div>
    </main>
    <!--Main layout-->
    