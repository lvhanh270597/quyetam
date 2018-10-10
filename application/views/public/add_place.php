       
    <main>
        <div class="container">

            <!-- Section: Edit Account -->
            <section class="section">
                <!-- First row -->
                <div class="row">
                    <!-- First column -->
                    <!-- Second column -->
                    <div class="col-lg-12 mb-4">

                        <!--Card-->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div class="view gradient-card-header mdb-color lighten-3">
                                <h5 class="mb-0 font-weight-bold">Tạo nơi mới</h5>
                            </div>
                            <!--/Card image-->

                            <!-- Card content -->
                            <div class="card-body text-center">
                                <!-- Edit Form -->
                                <form method="post" enctype="multipart/form-data">                                    
                                    <?php echo $message; ?>                                          
                                    <div class="row">                                                         
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="" name="name">
                                                <label for="form2" data-error="wrong" data-success="right">Tên địa điểm</label>
                                            </div>
                                        </div>                                                                              
                                    </div>                                              
                                    <div class="col-md-6">
                                        <div class="file-field">
                                            <div class="z-depth-1-half mb-4">                                                
                                                <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="img-fluid" alt="example placeholder">
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="btn btn-mdb-color btn-rounded float-left">
                                                    <span>Choose file</span>
                                                    <input type="file" name="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                                                              
                                    <!--Third row-->
                                    <div class="row">
                                        <!--First column-->
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <textarea type="text" id="form78" class="md-textarea form-control" rows="3" name="descript"></textarea>
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
    