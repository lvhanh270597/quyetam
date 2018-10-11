     
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

                                <p class="text-muted"><small>Profile photo will be changed automatically</small></p>
                                <div class="row flex-center">
                                    <button class="btn btn-info btn-rounded btn-sm">Upload New Photo</button><br>
                                    <button class="btn btn-danger btn-rounded btn-sm">Delete</button>
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
                                                <option value="" disabled selected>Bạn đi từ đâu?</option>
                                                <?php
                                                foreach ($places as $place){
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
                                                <option value="" disabled selected>Bạn đến đâu?</option>
                                                <?php
                                                foreach ($places as $place){
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
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="" name="amount">
                                                <label for="form2" data-error="wrong" data-success="right">Giá</label>
                                            </div>
                                        </div>
                                    </div>                                                                                                           
                                    <!--Third row-->
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <textarea type="text" id="form78" class="md-textarea form-control" rows="3" name="note"></textarea>
                                                <label for="form78">Ghi chú</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.Third row-->
                                    <!-- Fourth row -->
                                    <div class="row">
                                        <div class="col-md-12 text-center my-4">
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
    </main>
    <!--Main layout-->
    