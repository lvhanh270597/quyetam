
<script>
    var id = <?php echo count($all_roads); ?>;
    var start = [];
    <?php
    foreach ($places as $key => $value){
        echo "start['$key'] = '$value';";
    }    
    ?>
</script>
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
                                <h5 class="mb-0 font-weight-bold">Các tuyến đường quan tâm</h5>                                
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
                                    <!--First row-->
                                    <div class="container">
                                        <div class="row" id="road_info"> 
                                        <?php
                                        $str = '';
                                        foreach ($places as $key => $value){
                                            $str .= '<option value="'.$key.'">'.$value.'</option>';
                                        }
                                        $i = -1;
                                        foreach ($all_roads as $road){
                                            $i += 1;
                                            echo '
                                            <div class="col-md-4" id="'.$i.'"> 
                                                <div class="md-form mb-0"> 
                                                    <select class="browser-default custom-select mb-4" name="start[]" required>
                                                        <option value="'.$road['start_from'].'" selected>'.$places[$road['start_from']].'</option> 
                                                        '.$str.'
                                                    </select>
                                                </div>
                                            </div>';
                                            echo '
                                            <div class="col-md-4" id="'.$i.'"> 
                                                <div class="md-form mb-0"> 
                                                    <select class="browser-default custom-select mb-4" name="finish[]" required>
                                                        <option value="'.$road['finish_to'].'" selected>'.$places[$road['finish_to']].'</option>                                                    
                                                        '.$str.'
                                                    </select>
                                                </div>
                                            </div>';
                                            echo '
                                            <div class="col-md-2" id="'.$i.'">                                                 
                                                <div class="md-form mt-2">
                                                    <label class="btn btn-sm btn-danger waves-effect waves-light" onclick="remove('.$i.')">Xóa</label>
                                                </div>
                                            </div>';
                                        }
                                        ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="btn btn-info" id="add" onclick="add()">Thêm</label>                                            
                                            </div> 
                                        </div>
                                    </div>
                                                                                                                                                              
                                    <!--Third row-->                                    
                                    <!--/.Third row-->
                                    <!-- Fourth row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check form-check-inline">
                                                <?php 
                                                    if ($noti_email){
                                                        $class = 'materialChecked';
                                                        $check = 'checked';                                                        
                                                    }
                                                    else{
                                                        $class = 'materialUnchecked';
                                                        $check = '';
                                                    }
                                                ?>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="<?= $class ?>" name="noti_email" value="1" <?= $check ?>>
                                                    <label class="form-check-label" for="<?= $class ?>">Nhận thông báo về một yêu cầu mới qua email?</label>
                                                </div>                                                                                                                                  
                                            </div>
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
    <script src="<?= base_url('assets/js/add_road.js') ?>"> </script>