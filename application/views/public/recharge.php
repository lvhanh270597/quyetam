<div class="container">
    <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
            <!-- Material form subscription -->
            <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>NẠP TIỀN VÀO TÀI KHOẢN</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" id="form1" method="POST">

                        <p> Bạn hãy nhập mã số bí mật vào ô bên dưới </p>
                        <?= $message ?>
                        <!-- Name -->
                        <div class="md-form mt-3">
                            <input type="text" id="materialSubscriptionFormPasswords" class="form-control" disabled value="<?= $this->session->userdata('username') ?>">
                            <label for="materialSubscriptionFormPasswords">Tên tài khoản</label>
                        </div>

                        <!-- E-mai -->
                        <div class="md-form">
                            <input type="text" id="materialSubscriptionFormEmail" class="form-control" name="code">
                            <label for="materialSubscriptionFormEmail">Mã số bí mật</label>
                        </div>

                        <!-- Sign in button -->
                        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" form="form1" value="abc">Nạp</button>

                    </form>
                    <!-- Form -->

                </div>

            </div>
            <!-- Material form subscription -->
        </div>
    </div>
</div>