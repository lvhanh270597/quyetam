

    <link href="../assets/datetime/css/datetimepicker.css" rel="stylesheet" type="text/css"/>        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../assets/datetime/js/datetimepicker.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">   
    <script type="text/javascript">
    $(document).ready( function () {
        $('#picker').dateTimePicker();
    })
    </script>


        <div class="container-fluid">

            <!-- Section: Edit Account -->
            <section class="section">
                <!-- First row -->
                <div class="row">
                    <!-- First column -->
                    <div class="col-lg-2 mb-4">

                        <!--/.Card-->

                    </div>
                    <!-- /.First column -->
                    <!-- Second column -->
                    <div class="col-lg-8 mb-4">

                        <!--Card-->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div class="view gradient-card-header mdb-color lighten-3">
                                <h5 class="mb-0 font-weight-bold">Tạo yêu cầu mới</h5>
                            </div>
                            <!--/Card image-->

                            <!-- Card content -->
                            <div class="card-body text-center">
                                <!-- Edit Form -->
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-info"> 
                                                <strong>Lưu ý:</strong>                                                
                                                Nếu tạo yêu cầu, nghĩa là bạn đang cần tìm người chở.
                                                Nếu bạn là người chở, hãy bấm vào <a href="<?= base_url('trip/create') ?>"> đây </a> để tạo chuyến đi.
                                            </div>  
                                        </div>
                                    </div>  
                                    <div class="row">                                                                            
                                        <div class="col-md-12">
                                            <?php echo $message; ?>
                                        </div>
                                    </div>
                                    <!--First row-->
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                              <select class="browser-default custom-select mb-4" name="start_from">
                                                <option value="" disabled selected>Bạn muốn đi từ đâu?</option>
                                                <?php
                                                foreach ($_places as $place){
                                                    echo '<option value="'.$place['id'].'">'.$place['name'].'</option>';
                                                }                                                
                                                ?>
                                              </select>
                                            </div>
                                        </div>
                                        <!--Second column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                              <select class="browser-default custom-select mb-4" name="finish_to">
                                                <option value="" disabled selected>Bạn muốn đến đâu?</option>
                                                <?php
                                                foreach ($_places as $place){
                                                    echo '<option value="'.$place['id'].'">'.$place['name'].'</option>';
                                                }                                                
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
                                                <input type="date" min="<?= get_date(min_date()) ?>" max="<?= get_date(max_date()) ?>" value="<?= get_date(get_current_time()) ?>" name="datestart" id="dateofbirth" class="form-control validate">
                                                <label for="form2" data-error="wrong" data-success="right" class="active">Ngày đi</label>
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="md-form mb-0">                                                                                                 
                                                <input type="time" name="timestart" id="dateofbirth" class="form-control validate">
                                                <label for="form2" data-error="wrong" data-success="right" class="active">Giờ đi</label>                                                                                                                                                              
                                            </div>
                                        </div>  
                                        <!--First column-->
                                        <div class="col-md-3">
                                            <div class="md-form mb-0">
                                                <input type="number" id="form1" class="form-control validate" value="" name="price">
                                                <label for="form2" data-error="wrong" data-success="right">Giá</label>
                                            </div>
                                        </div>       
                                        <div class="col-md-3">
                                            <div class="md-form mb-0">
                                                <?
                                                $role = $this->user_ml->get_by_primary($this->session->userdata('username'));
                                                if (isset($role['role'])){
                                                    $role = $role['role'];
                                                    if ($role == 'chu_xe'){
                                                        $role = 'Chủ xe';
                                                    }
                                                    else{
                                                        $role = 'Hành khách';
                                                    }
                                                }
                                                else{
                                                    $role = 'wrong';
                                                }
                                                ?>
                                                <input type="text" id="form1" class="form-control validate" value="<?= $role ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Bạn là?</label>
                                            </div>
                                        </div>                                        
                                    </div>                                                                                                           
                                    <!--Third row-->                                    
                                    <!--/.Third row-->
                                    <!-- Fourth row -->
                                    <div class="row">
                                        <div class="col-md-12 text-center my-4">
                                            <input type="text" name="asker" hidden value="<?php echo $this->session->userdata('username'); ?>"/>
                                            <input type="text" name="type_transaction" hidden value="Trực tiếp" />
                                            <input type="submit" value="Tạo Mới" class="btn btn-info btn-rounded">
                                        </div>
                                    </div>                                    
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
    
    