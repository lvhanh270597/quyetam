

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">   
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
                                <?php
                                if ($trip['owner'] == $this->session->userdata('username')){
                                    echo '<a class="btn btn-info btn-rounded" href="'.site_url('trip/edit/'.$trip['id']).'">Edit</a>';
                                }
                                ?>
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
                                                    echo '<option value="'.$trip['start_from'].'" disabled selected> from: '.$places[$trip['start_from']].'</option>';                                                                              
                                                ?>
                                              </select>
                                            </div>
                                        </div>
                                        <!--Second column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                              <select class="browser-default custom-select mb-4" name="finish_to">                                                
                                                <?php                                                
                                                echo '<option value="'.$trip['finish_to'].'" disabled selected>to: '.$places[$trip['finish_to']].'</option>';                                                
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
                                                <input type="datetime-local" name="timestart" value="<?= system_to_user($trip['timestart']) ?>"disabled class="form-control validate"/>
                                                <label for="form2" data-error="wrong" data-success="right" class="active">Bắt đầu lúc</label>                                                                                                                                                              
                                            </div>
                                        </div>   
                                        <!--First column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $owner['full_name'].'('.$owner['username'].')' ?>" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Người chở</label>
                                            </div>
                                        </div>
                                    </div>                                                                                                                                               
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <select class="browser-default custom-select mb-4" name="type_transaction">
                                                    <?php
                                                    if ($trip['guess']){
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
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="<?php echo $trip['price']; ?>đ" disabled>
                                                <label for="form2" data-error="wrong" data-success="right">Giá</label>
                                            </div>
                                        </div>                                        
                                    </div>                                   
                                    <!--/.Third row-->
                                    <!-- Fourth row -->
                                    
                                            <?php               
                                            $ok = $trip['guess'] || ($this->session->userdata('username') == $trip['owner']);                                                          
                                            if (!$ok){
                                                echo '
                                                <div class="row">
                                                    <div class="col-md-12 text-center my-4">           
                                                        <input type="submit" value="Gửi yêu cầu" class="btn btn-info btn-rounded" name="btn">
                                                    </div>
                                                </div>';
                                            }
                                            ?>                                                              
                                    <!-- /.Fourth row -->                                    
                                </form>
                                <?php
                                if ($requested){                                                                                                                                                         
                                    echo '
                                    <div class="row">
                                        <div class="col-md-12">
                                    ';   
                                    echo $message;                                 
                                    echo '
                                        </div>                                            
                                        <div class="col-md-12">';                                            
                                    echo '<form method="post" action="'.site_url('trip/process_request/'.$requested['trip_id'].'/'.$requested['id']).'">';
                                    echo '<input type="submit" class="btn btn-danger btn-rounded" value="Hủy đặt chuyến" name="cancel">';                                        
                                    echo '</form>';
                                    echo '</div>
                                    </div>';    
                                }

                                ?>
                                <!-- Edit Form -->
                            </div>                           
                            <style>
                                #fuckyou{
                                    padding-top: 0px;                                    
                                }
                                #fuck{                                    
                                    max-height: 80px;
                                    min-height: 50px;
                                    min-width: 50px;
                                    max-width: 80px;
                                }
                                #dmm{
                                    padding-top: 10px;
                                    padding-left: 10px;
                                }
                            </style>
                            <!-- /.Card content -->
                            <?php
                            $cur_user = $this->session->userdata('username');
                            if ($trip['guess'] && (($cur_user == $trip['guess']) || ($cur_user == $trip['owner']))){
                                echo '
                                <div class="card-body card-body-cascade" id="fuckyou">
                                        <!--Card-->
                                    <div class="card card-cascade narrower" id="comment">
                                        <!-- Card content -->';                                                       
                                        if (isset($comments) ){
                                            foreach ($comments as $comment){
                                                $from = $this->user_ml->get_by_primary($comment['user_id']);
                                                $image = profile_image($from['gender'], $from['username'], $from['image']);
                                                echo '
                                                <div class="media" id="dmm">                        
                                                    <img id="fuck" class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="'.$image.'" alt="Avatar">
                                                    <div class="media-body">
                                                        <a href="'.site_url('review/detail/'.$from['username']).'"> <h5 class="mt-0 font-weight-bold blue-text">'.$from['full_name'].'</h5> </a>
                                                        '.$comment['content'].'
                                                        <div class="media mt-3 shadow-textarea">
                                                        </div>          
                                                        <label> <small>'.$comment['created'].'</small> </label>                              
                                                    </div>                                    
                                                </div>
                                                ';
                                            }
                                        }                                                                        
                                        $current_user = $this->user_ml->get_by_primary($cur_user);
                                        $image = profile_image($current_user['gender'], $current_user['username'], $current_user['image']);                                    
                                        echo '
                                        <div class="card-body" id="fuckmepls">
                                            <!-- Edit Form -->                                                                                                                                     
                                                <!--Third row-->
                                                <div class="media mt-3 shadow-textarea">
                                                    <img id="fuck" class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="'.$image.'" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 font-weight-bold blue-text">'.$current_user['full_name'].'</h5>
                                                        <div class="form-group basic-textarea rounded-corners">
                                                            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea3" rows="3" placeholder="Write your comment..." name="content"></textarea>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <!--/.Third row-->
                                                <!-- Fourth row -->
                                                <div class="text-center">                                
                                                    <div class="row">
                                                        <div class="col-md-12">                                        
                                                            <input type="submit" value="Đăng"" class="btn btn-info btn-rounded" name="comment_btn">
                                                        </div>
                                                    </div>                   
                                                </div>                 
                                                <!-- /.Fourth row -->                                                           
                                            <!-- Edit Form -->
                                        </div>                           
                                        <!-- /.Card content -->

                                    </div>
                                </div>';
                            }
                            ?>
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

<script>
    <?php
    $cur_user = $this->session->userdata('username');
    $current_user = $this->user_ml->get_by_primary($cur_user);
    $image = profile_image($current_user['gender'], $current_user['username'], $current_user['image']); 
    echo 'var image1 = "'.$image.'";';
    echo 'var username1="'.$cur_user.'";';
    echo 'var fullname1="'.$current_user['full_name'].'";';
    ?>

    $("textarea[name='content']").on('keypress', function (e) {
         if(e.which === 13){
            var content = $("textarea[name='content']").val();                   
            if (content.length == 0){
                alert('Tin nhắn bị rỗng!');
                return ;
            }
            
            $.ajax({
            url:<?php echo '\''.base_url('comment/push_to_database/'.$trip['id']).'\',';  ?>
            type: 'POST',
            data: {content: content},
            error: function() {
                alert('Something is wrong');
            },
            success: function(data) {                
                var output = '\
                    <div class="media" id="dmm">                        \
                        <img id="fuck" class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="'+image1+'" alt="Avatar">\
                        <div class="media-body">\
                            <a href="'+ '<?php echo site_url('review/detail/'); ?>'+username1+'">\
                                <h5 class="mt-0 font-weight-bold blue-text">'+fullname1+'</h5> \
                            </a>\
                            '+content+'\
                            <div class="media mt-3 shadow-textarea">\
                            </div>                                        \
                        </div>                                    \
                    </div>';                
                  $("#fuckmepls").before(output);
                }                           
            });                                           
         }         
   });
   $("textarea[name='content']").on('keyup', function (e) {
         if(e.which === 13){
            $(this).val('');
         }
   });


   $("input[name=comment_btn]").click(function () {         
    var content = $("textarea[name='content']").val();       
        if (content.length == 0){
            alert('Tin nhắn bị rỗng!');
            return ;
        }
        
        $.ajax({
        url:<?php echo '\''.base_url('comment/push_to_database/'.$trip['id']).'\',';  ?>
        type: 'POST',
        data: {content: content},
        error: function() {
            alert('Something is wrong');
        },
        success: function(data) {                
            var output = '\
                <div class="media" id="dmm">                        \
                    <img id="fuck" class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="'+image1+'" alt="Avatar">\
                    <div class="media-body">\
                        <a href="'+ '<?php echo site_url('review/detail/'); ?>'+username1+'">\
                            <h5 class="mt-0 font-weight-bold blue-text">'+fullname1+'</h5> \
                        </a>\
                        '+content+'\
                        <div class="media mt-3 shadow-textarea">\
                        </div>                                        \
                    </div>                                    \
                </div>';                
                $("#fuckmepls").before(output);
            }                           
        });
        $("textarea[name='content']").val('');
   });
</script>


<script>

    <?php
        $another = get_another($trip['owner'], $trip['guess'], $cur_user);
        $another = $this->user_ml->get_by_primary($another);                 
        $image = profile_image($another['gender'], $another['username'], $another['image']); 
        echo 'var image = "'.$image.'";';
        echo 'var username="'.$another['username'].'";';
        echo 'var fullname="'.$another['full_name'].'";';        
    ?>
    setInterval(
        function(){
            $.get(<?php echo '"'.base_url('comment/get_unseen_comment/'.$trip['id'].'/'.$another['username']).'"';  ?>, function(data, status){                                           
                data = JSON.parse(data);                
                // Show dynamic notification               
                if (data.length == 0) return ;
                for (var i=0; i<data.length; i++){
                    var info = data[i];                                                             
                    time = info['created'];                    
                    content = info['content'];      

                    var output = '\
                    <div class="media" id="dmm">                        \
                        <img id="fuck" class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="'+image+'" alt="Avatar">\
                        <div class="media-body">\
                            <a href="'+ '<?php echo site_url('review/detail/'); ?>'+username+'">\
                                <h5 class="mt-0 font-weight-bold blue-text">'+fullname+'</h5> \
                            </a>\
                            '+content+'\
                            <div class="media mt-3 shadow-textarea">\
                            </div>                                        \
                        </div>                                    \
                    </div>';                
                    $("#fuckmepls").before(output);                                    
                }    
            })
        }, 5000);



</script>
