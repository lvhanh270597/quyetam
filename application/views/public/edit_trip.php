

    <link href="../../assets/datetime/css/datetimepicker.css" rel="stylesheet" type="text/css"/>        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../../assets/datetime/js/datetimepicker.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">   
    <script type="text/javascript">
    $(document).ready( function () {
        $('#picker').dateTimePicker();        
    })    
    </script>
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
                                        <?php
                                        $owner = $this->user_ml->get_by_primary($trip['owner']);
                                        ?>
                                        <a href="<?php echo site_url('review/detail/'.$owner['username']); ?>">
                                            <button class="btn btn-info btn-rounded btn-sm"><?php echo $owner['full_name']; ?></button><br>
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
                                <h5 class="mb-0 font-weight-bold">Chi tiết chuyến đi</h5>
                                <a class="btn btn-info btn-rounded" href="<?= site_url('trip/detail/'.$trip['id'])?>">Detail</a>
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
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                              <select class="browser-default custom-select mb-4" name="start_from">                                                
                                                <?php         
                                                $disable = '';                       
                                                if ($editable == false) $disable = 'disabled'; 
                                                $place = $this->place_ml->get_by_primary($trip['start_from']);               
                                                echo '<option value="'.$place['id'].'"  selected '.$disable.'>'.$place['name'].'</option>'; 
                                                if ($editable){
                                                    foreach ($_places as $place){                                                    
                                                        echo '<option value="'.$place['id'].'">'.$place['name'].'</option>';                                                                                        
                                                    }
                                                }
                                                ?>                                                
                                              </select>
                                            </div>
                                        </div>
                                        <!--Second column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                              <select class="browser-default custom-select mb-4" name="finish_to">
                                                <?php
                                                 $disable = '';                       
                                                 if ($editable == false) $disable = 'disabled'; 
                                                 $place = $this->place_ml->get_by_primary($trip['finish_to']);               
                                                 echo '<option value="'.$place['id'].'"  selected '.$disable.'>'.$place['name'].'</option>';                                                                                        
                                                 if ($editable){
                                                    foreach ($_places as $place){                                                    
                                                        echo '<option value="'.$place['id'].'">'.$place['name'].'</option>';                                                                                        
                                                    }
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
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">                                                 
                                                <input type="datetime-local" id="party-time" min="<?= min_date() ?>" max="<?= max_date() ?>"
                                                    name="timestart" value="<?= system_to_user($trip['timestart']) ?>" class="form-control validate"/>
                                                <label for="form2" data-error="wrong" data-success="right" class="active">Bắt đầu lúc</label>                                                                                                                                                              
                                            </div>
                                        </div>  
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $this->session->userdata('username'); ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Bạn là</label>
                                            </div>
                                        </div>
                                    </div>                                                                                                           
                                    <!--Third row-->                                    
                                    <!--/.Third row-->
                                    <!-- Fourth row -->
                                    <div class="row">
                                        <div class="col-md-12 text-center my-4">
                                            <input type="text" name="owner" hidden value="<?php echo $this->session->userdata('username'); ?>"/>
                                            <?php
                                                echo '<input type="submit" value="Xóa" class="btn btn-danger btn-rounded" name="delete">';
                                                if ($editable){
                                                    echo '<input type="submit" value="Sửa" class="btn btn-info btn-rounded" name="edit">';                                                    
                                                }
                                                if ($trip['guess'] != null){
                                                    echo '<a href="'.site_url('verify/trip/'.$trip['id']).'" class="btn btn-success btn-rounded">Check code</a>';
                                                }
                                            ?>
                                        </div>
                                    </div>                                                      
                                    <!-- /.Fourth row -->                                    
                                </form>                                         
                                <!-- Edit Form -->                                
                                <?php
                                    if ($requests){                                        
                                        foreach ($requests as $request){                                            
                                            $user = $this->user_ml->get_by_primary($request['guess_id']);                                                                                        
                                            echo '
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="alert alert-info"> 
                                                        <strong>                                        
                                                        <a href="'.site_url('review/detail/'.$user['username']).'"> '.$user['username'].'</a>
                                                        </strong>
                                                        đã gửi yêu cầu tới chuyến đi này(thanh toán '.$request['type_transaction'].')
                                                    </div>  
                                                </div>';
                                            echo '                                                                                          
                                                <div class="col-md-4">';                                            
                                            echo '<form method="post" action="'.site_url('trip/process_request/'.$request['trip_id'].'/'.$request['id']).'">';
                                            echo '<input type="submit" class="btn btn-info btn-rounded" value="Accept" name="accept">';                                        
                                            echo '</form>';
                                            echo '</div>
                                            </div>';
                                        }                                        
                                    }
                                    
                                ?>
                                </form>
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
    