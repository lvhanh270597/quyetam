

        <div class="container-fluid">
            <!-- Section: Edit Account -->
            <section class="section">
                <!-- First row -->
                <div class="row">
                    <!-- First column -->
                    <div class="col-lg-2 mb-4">                        
                    </div>
                    <!-- /.First column -->
                    <!-- Second column -->
                    <div class="col-lg-8 mb-4">
                        <!--Card-->
                        <div class="card card-cascade narrower">
                            <!--Card image-->
                            <div class="view gradient-card-header mdb-color lighten-3">                                
                                <h5 class="mb-0 font-weight-bold">Thay đổi lịch</h5>                                
                            </div>                                                      
                            <!--/Card image-->

                            <!-- Card content -->
                            <div class="card-body text-center">
                                <!-- Edit Form -->
                                <form method="post">                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo $message; ?>
                                        </div>
                                    </div>                
                                    <div class="container">
                                        <?php
                                        $option = '';
                                        foreach ($places as $key => $place){
                                            $option .= '<option value="'.$key.'">'.$place.'</option>';
                                        }
                                        $map = [
                                            2 => 'Thứ 2',
                                            3 => 'Thứ 3',
                                            4 => 'Thứ 4',
                                            5 => 'Thứ 5',
                                            6 => 'Thứ 6',
                                            7 => 'Thứ 7',
                                            8 => 'Chủ nhật'                                                                                        
                                        ];                 
                                        $i = 0;                   
                                        foreach ($calendar as $date){
                                            $i += 1;
                                            $pl = $this->place_ml->get_by_primary($date['start_from']);
                                            $ll = $this->place_ml->get_by_primary($date['finish_to']);
                                            $day = $map[$date['thu']];
                                            $bat = $date['bat'];
                                            if ($bat == 0) $bat = 'Tắt';
                                            else $bat = 'Bật';
                                            echo '<div class="container"> 
                                            <div class="view gradient-card-header mdb-color lighten-4">                                
                                <h5 class="mb-0 font-weight-bold">Tuyến '.$i.'</h5>                                
                            </div>            
                                            <div class="row">                                                
                                                <!--First column-->
                                                <div class="col-md-6">
                                                    <div class="md-form mb-0">
                                                        <select class="browser-default custom-select mb-4" name="start_from[]">
                                                            <option value="'.$pl['id'].'" selected>'.$pl['name'].'</option>                                                        
                                                            '.$option.'
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--Second column-->
                                                <div class="col-md-6">
                                                    <div class="md-form mb-0">
                                                    <select class="browser-default custom-select mb-4" name="finish_to[]">
                                                        <option value="'.$ll['id'].'" selected>'.$ll['name'].'</option>                                                        
                                                        '.$option.'
                                                    </select>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <!--/.First row-->
                                            <!--First row-->
                                            <div class="row">                                                                                                                                                                                     
                                                <div class="col-md-3">
                                                    <div class="md-form mb-0">                                                                                                 
                                                        <select class="browser-default custom-select mb-4" name="thu[]">
                                                            <option value="'.$date['thu'].'" selected>'.$day.'</option>
                                                            <option value="2">Thứ 2</option>
                                                            <option value="3">Thứ 3</option>
                                                            <option value="4">Thứ 4</option>
                                                            <option value="5">Thứ 5</option>
                                                            <option value="6">Thứ 6</option>
                                                            <option value="7">Thứ 7</option>
                                                            <option value="8">Chủ nhật</option>                                                        
                                                        </select>                                                    
                                                    </div>
                                                </div>  
                                                <div class="col-md-3">
                                                    <div class="md-form mb-0">                                                                                                 
                                                        <input type="time" name="timestart[]" id="dateofbirth" class="form-control validate" value="'.$date['timestart'].'">
                                                        <label for="form2" data-error="wrong" data-success="right" class="active">Giờ đi</label>                                                                                                                                                              
                                                    </div>
                                                </div>  
                                                <div class="col-md-3">
                                                    <div class="md-form mb-0">
                                                        <input type="number" id="form1" class="form-control validate" value="'.$date['price'].'" name="price[]">
                                                        <label for="form2" data-error="wrong" data-success="right">Giá</label>
                                                    </div>
                                                </div> 
                                                <!--First column-->
                                                <div class="col-md-3">
                                                    <div class="md-form mb-0">  
                                                    <!-- Material switch -->
                                                        <select class="browser-default custom-select mb-4" name="bat[]">
                                                            <option value="'.$date['bat'].'" selected>'.$bat.'</option>
                                                            <option value="0">Tắt</option>         
                                                            <option value="1">Bật</option>                                                                                                                
                                                        </select>                                                                                                     
                                                    </div>
                                                </div>                                                    
                                            </div>           
                                        </div><br>';
                                        }
                                        ?>                                        
                                    </div>                                                          
                                    <!--First row-->
                                    <div class="container" id="calendar_info">
                                        <div class="view gradient-card-header mdb-color lighten-3">                                
                                            <h5 class="mb-0 font-weight-bold">Tuyến mới</h5>                                
                                        </div>  
                                        <div class="container" id="1">                                             
                                            <div class="row">
                                                <!--First column-->
                                                <div class="col-md-6">
                                                    <div class="md-form mb-0">
                                                    <select class="browser-default custom-select mb-4" name="start_from[]">
                                                        <option value="" disabled selected>Bạn đi từ đâu?</option>
                                                        <?php                                                    
                                                        foreach ($places as $key => $value){
                                                            echo '<option value="'.$key.'">'.$value.'</option>';
                                                        }                                                
                                                        ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <!--Second column-->
                                                <div class="col-md-6">
                                                    <div class="md-form mb-0">
                                                    <select class="browser-default custom-select mb-4" name="finish_to[]">
                                                        <option value="" disabled selected>Bạn đến đâu?</option>
                                                        <?php
                                                        foreach ($places as $key => $value){
                                                            echo '<option value="'.$key.'">'.$value.'</option>';
                                                        }                                                                                          
                                                        ?>
                                                    </select>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <!--/.First row-->
                                            <!--First row-->
                                            <div class="row">                                                                                                                                                                                     
                                                <div class="col-md-3">
                                                    <div class="md-form mb-0">                                                                                                 
                                                        <select class="browser-default custom-select mb-4" name="thu[]">
                                                            <option value="" disabled selected>Ngày đi?</option>
                                                            <option value="2">Thứ 2</option>
                                                            <option value="3">Thứ 3</option>
                                                            <option value="4">Thứ 4</option>
                                                            <option value="5">Thứ 5</option>
                                                            <option value="6">Thứ 6</option>
                                                            <option value="7">Thứ 7</option>
                                                            <option value="8">Chủ nhật</option>                                                        
                                                        </select>                                                    
                                                    </div>
                                                </div>  
                                                <div class="col-md-3">
                                                    <div class="md-form mb-0">                                                                                                 
                                                        <input type="time" name="timestart[]" id="dateofbirth" class="form-control validate">
                                                        <label for="form2" data-error="wrong" data-success="right" class="active">Giờ đi</label>                                                                                                                                                              
                                                    </div>
                                                </div>  
                                                <div class="col-md-3">
                                                    <div class="md-form mb-0">
                                                        <input type="number" id="form1" class="form-control validate" value="" name="price[]">
                                                        <label for="form2" data-error="wrong" data-success="right">Giá</label>
                                                    </div>
                                                </div> 
                                                <!--First column-->
                                                <div class="col-md-3">
                                                    <div class="md-form mb-0">  
                                                    <!-- Material switch -->
                                                        <select class="browser-default custom-select mb-4" name="bat[]">
                                                            <option value="0" selected>Tắt</option>
                                                            <option value="1">Bật</option>                                                                                                                
                                                        </select>                                                                                                     
                                                    </div>
                                                </div>                                                    
                                            </div>           
                                        </div> 
                                    </div>         
                                    <div class="row">                                                    
                                        <div class="col-md-12 text-center my-4">                                            
                                            <label class="btn btn-info btn-rounded" onclick="add()">Thêm</label>
                                        </div>
                                    </div>                          
                                    <div class="row">
                                        <div class="col-md-12 text-center my-4">                                            
                                            <input type="submit" value="Cập nhật" class="btn btn-info btn-rounded">
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
    <!--Main layout-->
    <script src="<?= base_url('assets/js/add_calendar.js') ?>"> </script>