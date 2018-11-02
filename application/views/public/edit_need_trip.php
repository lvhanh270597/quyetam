
     <style>
        #fuck {
            height: 150px;
            width: 150px;
        }
    </style>
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
                            <img id="fuck" src="<?php echo base_url('assets/images/uploads/places/'.$trip['start_from'].'/'.$images[$trip['start_from']]); ?>" alt="User Photo" class="z-depth-1 mb-3 mx-auto" />
                                <span><i class="fa fa-mail-forward" aria-hidden="true"></i> </span>
                                <img id="fuck" src="<?php echo base_url('assets/images/uploads/places/'.$trip['finish_to'].'/'.$images[$trip['finish_to']]); ?>" alt="User Photo" class="z-depth-1 mb-3 mx-auto" /> 
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
                                <h5 class="mb-0 font-weight-bold">Sửa chuyến đi</h5>
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
                                                    echo '<option value="'.$trip['start_from'].'" selected> from: '.$places[$trip['start_from']].'</option>';
                                                ?>
                                              </select>
                                            </div>
                                        </div>
                                        <!--Second column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                              <select class="browser-default custom-select mb-4" name="finish_to">                                                
                                                <?php                                                
                                                echo '<option value="'.$trip['finish_to'].'" selected>to: '.$places[$trip['finish_to']].'</option>';
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
                                        <div class="col-md-3">
                                            <div class="md-form mb-0">                                                 
                                                <input type="date" name="datestart" value="<?= get_date($trip['timestart']) ?>" min="<?= get_date(min_date()) ?>" max="<?= get_date(max_date())?>" class="form-control validate"/>
                                                <label for="form2" data-error="wrong" data-success="right" class="active">Ngày đi</label>
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="md-form mb-0">                                                 
                                                <input type="time" name="timestart" value="<?= get_time($trip['timestart']) ?>" class="form-control validate"/>
                                                <label for="form2" data-error="wrong" data-success="right" class="active">Giờ đi</label>                                                                                                                                                              
                                            </div>
                                        </div>  
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $asker['full_name'].'('.$asker['username'].')' ?>" disabled name="acker">
                                                <label for="form2" data-error="wrong" data-success="right">Người yêu cầu</label>
                                            </div>
                                        </div>                                       
                                    </div>               
                                    <div class="row">                                        
                                        <!--Second row-->                                    
                                        <!--First column-->                                        
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $trip['price']; ?>đ" disabled name="price">
                                                <label for="form2" data-error="wrong" data-success="right">Giá</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="Trực tiếp" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Hình thức thanh toán</label>                                               
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-12 text-center my-4">
                                            <input type="text" name="asker" hidden value="<?php echo $this->session->userdata('username'); ?>"/>
                                            <input type="submit" value="Sửa" class="btn btn-info btn-rounded" name="edit">
                                            <a class="btn btn-danger btn-rounded" href="<?php echo site_url('trip/remove_need/'.$trip['id']); ?>"> Xóa </a>
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
    