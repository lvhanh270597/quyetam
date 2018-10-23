<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thông tin về EasyHere</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon/icon.png'); ?>" />
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?= base_url('assets/css/mdb.min.css'); ?>" rel="stylesheet">
    <style>
        html,
        body,
        header,
        .jarallax {
          height: 100%;
        }

        @media (min-width: 560px) and (max-width: 740px) {
          html,
          body,
          header,
          .jarallax {
            height: 500px;
          }
        }

        @media (min-width: 800px) and (max-width: 850px) {
          html,
          body,
          header,
          .jarallax {
            height: 500px;
          }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2A48!important;
            }
            .navbar {
              box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12) !important;
            }
        }
    </style>
<style type="text/css" id="jarallax-clip-0">#jarallax-container-0 {
           clip: rect(0 252px 600px 0);
           clip: rect(0, 252px, 600px, 0);
        }</style></head>

<body class="university-lp">

    <!--Navigation & Intro-->
    <header>

        <!--Navbar-->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <strong>EasyHere</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--Links-->
                    <ul class="navbar-nav mr-auto smooth-scroll">
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="#home">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="#about" data-offset="100">Thông tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="#info" data-offset="100">Hướng dẫn sử dụng</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" data-toggle="modal" data-target="#modal-contact">Liên hệ</a>
                        </li>
                    </ul>

                    <!--Social Icons-->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Navbar-->

        <!-- Intro Section -->
        <div id="home" class="view jarallax" data-jarallax="{&quot;speed&quot;: 0.2}" style="background-image: none; background-repeat: no-repeat; background-size: cover; background-position: center center; z-index: 0; background-image: url('<?= base_url('assets/cover.jpg') ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="mask rgba-black-strong">
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="row smooth-scroll">
                        <div class="col-md-12 white-text text-center">
                            <div class="wow fadeInDown" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeInDown; animation-delay: 0.2s;">
                                <h2 class="display-3 font-weight-bold mb-2">EasyHere</h2>
                                <hr class="hr-light">
                                <h3 class="subtext-header mt-4 mb-5">Dịch vụ đi xe chung giá rẻ chưa từng thấy</h3>
                            </div>
                            <a href="<?= site_url('login') ?>" data-offset="100" class="btn btn-info wow fadeInLeft waves-effect waves-light" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeInLeft; animation-delay: 0.2s;">Đăng nhập</a>
                            <a href="<?= site_url('register'); ?>" data-offset="100" class="btn btn-warning wow fadeInRight waves-effect waves-light" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeInRight; animation-delay: 0.2s;">Đăng kí</a>
                        </div>
                    </div>
                </div>
            </div>        
    </div>
</div>


    </header>
    <!--Navigation & Intro-->

    <!--Main content-->
    <main>

        <div class="container">

            <!--Section: About-->
            <section id="about" class="section mt-4 mb-2">

                <!--Secion heading-->
                <h2 class="text-center my-5 font-weight-bold wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">Thông tin về EasyHere</h2>

                <!--First row-->
                <div class="row">

                    <!--First column-->
                    <div class="col-lg-5 col-md-12 mb-5 pb-4 wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                        <!--Image-->
                        <img src="<?= base_url('assets/info/h1.jpg') ?>" class="img-fluid z-depth-1 rounded" alt="My photo">

                    </div>
                    <!--First column-->

                    <!--Second column-->
                    <div class="col-lg-6 dark-grey-text ml-lg-auto col-md-12 wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                        <!--Description-->
                        <p align="justify">EasyHere là dịch vụ đi xe chung dành cho các bạn sinh viên. <br>
EasyHere được tạo ra từ một ý tưởng đơn giản nhưng hiệu quả đó là kết nối các bạn sinh viên:<br>
                        <ul>
                            <li>Có xe nhưng đi một mình</li>
                            <li>Không có xe nhưng lại có nhu cầu đi lại</li> 
                        </ul>
                        Và những bạn này đi trên tuyến đường và thời gian như nhau. <br>
                        EasyHere ra đời từ ngày 20 tháng 9 năm 2018. 
                        </p>                        
                    </div>
                    <!--Second column-->

                </div>
                <!--First row-->

            </section>
            <!--Section: About-->
            <!--Section: About-->
            <section id="about" class="section mt-4 mb-2">

                <!--First row-->
                <div class="row">

                    <!--Second column-->
                    <div class="col-lg-6 dark-grey-text ml-lg-auto col-md-12 wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                        <!--Description-->
                        <p align="justify">Vì là đi xe chung nên giá thành của dịch vụ rất rẻ. Thậm chí đến mức người dùng có thể tự định giá.</p>
                        <p align="justify">EasyHere ra đời nhằm giải quyết các nhu cầu như: </p>
                        <ul>
                            <li>Nếu là các bạn có xe
                                <ul>
                                    <li>Kiếm thêm thu nhập nhỏ</li>
                                    <li>Có thêm người đi chung cho vui</li>
                                    <li>Mở rộng mối quan hệ</li>
                                </ul>
                            </li>

                            <li>Nếu là các bạn đi cùng
                                <ul>
                                    <li>Không phải chống chọi với vấn đề xe buýt như:
                                        <ul>
                                            <li> Quá nóng vào lúc trưa </li>
                                            <li>Đôi lúc chật chội, xô đẩy, chen lấn (nhất là giờ cao điểm vào sáng sớm)</li>
                                            <li>Các bạn bị say xe</li>
                                        </ul>
                                    </li>
                                    <li>Không phải đi bộ thật xa để đến trạm xe buýt</li>
                                    <li>Không phải sợ khi hết giờ xe buýt</li>
                                </ul>
                            </li>                            
                        </ul>              
                    </div>
                    <!--Second column-->
                    <!--First column-->
                    <div class="col-lg-5 col-md-12 mb-5 pb-4 wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                        <!--Image-->
                        <img src="<?= base_url('assets/info/h3.jpg') ?>" class="img-fluid z-depth-1 rounded" alt="My photo">

                    </div>
                    <!--First column-->

                </div>
                <!--First row-->

            </section>
            <!--Section: About-->
            <hr>
            <!--Projects section v.3-->
            <section id="info" class="section mt-4 mb-5 pb-4">

                <!--Section heading-->
                <h2 class="text-center mb-5 font-weight-bold pt-5 pb-4 my-5 wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">Hướng dẫn sử dụng</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto my-5 grey-text wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;"></p>

                <!--First row-->
                <div class="row wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">

                    <!--First column-->
                    <div class="col-md-12">

                        <div class="mb-2">

                            <!--Nav tabs-->
                            <ul class="nav md-pills pills-primary d-flex justify-content-center" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#panel31" role="tab">
                                        <i class="fa fa-mortar-board fa-2x"></i>
                                        <br> Bước 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#panel32" role="tab">
                                        <i class="fa fa-users fa-2x"></i>
                                        <br> Bước 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#panel33" role="tab">
                                        <i class="fa fa-bank fa-2x"></i>
                                        <br> Bước 3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#panel34" role="tab">
                                        <i class="fa fa-home fa-2x"></i>
                                        <br> Bước 4</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#panel35" role="tab">
                                        <i class="fa fa-home fa-2x"></i>
                                        <br> Bước 5</a>
                                </li>
                            </ul>

                        </div>

                        <!--Tab panels-->
                        <div class="tab-content">

                            <!--Panel 1-->
                            <div class="tab-pane fade in show active" id="panel31" role="tabpanel">
                                <br>

                                <!--First row-->
                                <div class="row">

                                    <!--First column-->
                                    <div class="col-lg-5 col-md-12">

                                        <!--Featured image-->
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h4.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                    </div>
                                    <!--First column-->

                                    <!--Second column-->
                                    <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">

                                        <!--Title-->
                                        <h4 class="mb-5">Tạo tài khoản</h4>

                                        <!--Description-->
                                        <p class="text-muted">Để vào được hệ thống bạn cần đăng nhập.<br> Và để đăng nhập được bạn cần tạo một tài khoản. <br>
                                        Sau khi điền tất cả các thông tin xong. Bấm Sign Up.<br>
                                        Lưu ý: Username phải là:
                                            <ul>
                                                <li>Chữ viết liền không dấu</li>
                                                <li>Cho phép các dấu như: "." và "_"</li>
                                            </ul>
                                        </p>

                                    </div>
                                    <!--Second column-->
                                </div>
                                <!--First row-->

                            </div>
                            <!--Panel 1-->

                            <!--Panel 2-->
                            <div class="tab-pane fade" id="panel32" role="tabpanel">
                                <br>

                                <!--First row-->
                                <div class="row">

                                    <!--First column-->
                                    <div class="col-lg-5 col-md-12">

                                        <!--Featured image-->
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h5.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                    </div>
                                    <!--First column-->

                                    <!--Second column-->
                                    <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">

                                        <!--Title-->
                                        <h4 class="mb-5">Đăng nhập vào hệ thống</h4>

                                        <!--Description-->
                                        <p class="text-muted">Bạn nhập tên đăng nhập và mật khẩu của tài khoản mà bạn đã đăng kí vào các ô.
Sau đó bấm Continue, nếu bạn chưa có tài khoản bấm Sign Up để trở lại bước 1.</p>

                                    </div>
                                    <!--Second column-->
                                </div>
                                <!--First row-->

                            </div>
                            <!--Panel 2-->

                            <!--Panel 3-->
                            <div class="tab-pane fade" id="panel33" role="tabpanel">
                                <br>

                                <!--First row-->
                                <div class="row">

                                    <!--First column-->
                                    <div class="col-lg-5 col-md-12">

                                        <!--Featured image-->
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h12.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h6.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h11.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                    </div>
                                    <!--First column-->

                                    <!--Second column-->
                                    <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">

                                        <!--Title-->
                                        <h4 class="mb-5">Gửi yêu cầu và Mở một chuyến đi có sẵn</h4>

                                        <!--Description-->
                                        <p class="text-muted">Sau khi đăng nhập xong. Bạn sẽ vào Trang chủ của trang web. Ở đây bạn thấy 2 tabs, 
                                        <ul>
                                            <li>Tab 1: Tất cả chyến đi đã có </li>
                                            <li>Tab 2: Các chuyến đi được yêu cầu </li>
                                        </ul>
                                        <ul>
                                            <li>
                                            * Nếu bạn là người chủ xe, bạn hãy bấm qua Tab 2, để xem xem có yêu cầu nào không. Nếu bạn chấp nhận được yêu cầu của họ thì bạn hãy bấm vào yêu cầu đó, xem thông tin chi tiết về yêu cầu chuyến đi, xem thông tin người yêu cầu và giá tiền. Sau đó, nếu bạn đồng ý thì hãy bấm vào nút "Mở chuyến đi này". Ngay lúc này, một chuyến đi mới sẽ được tạo giống y đúc yêu cầu chuyến đi này và có hai bạn trong đó.
                                            </li>
                                            <li>
                                            * Nếu bạn là người khách, bạn hãy bấm vào Tab 1, để xem có chuyến đi nào phù hợp với mình không. Nếu có, bạn bấm vào chuyến đi ấy, xem thông tin chi tiết chuyến đi, người chở bạn và giá tiền. Sau đó, nếu bạn đồng ý, bạn hãy chọn hình thức thanh toán là "Trực tiếp", sau đó bấm gửi yêu cầu.
                                            </li>
                                        </ul>
Lưu ý: Khi bạn bấm gửi yêu cầu, người chủ xe sẽ thấy thông báo hiện lên. Và trong chuyến đi của họ sẽ hiển thị là bạn đang gửi yêu cầu đến chuyến đi này. Có thể có nhiều người cùng gửi yêu cầu đến một chuyến đi, nên người chủ xe buộc phải chọn 1 trong số đó. Một thời gian, nếu bạn quan sát thấy, chuyến đi mà bạn gửi yêu cầu đã có chữ "Chuyến đi thành công" thì nghĩa là người chủ chuyến đi này đã đồng ý yêu cầu của một ai đó. Nếu ngay tại chuyến đi đó, bạn không thấy ô bình luận hiện ra, thì nghĩa là người đó không phải là bạn, nếu có ô bình luận, thì nghĩa là bạn đã được chấp nhận yêu cầu.
Tại ô bình luận này, hai bạn có thể nói về địa điểm gặp gỡ, thông tin liên lạc...v.v.v Chỉ có hai người có thể thấy những bình luận này.
</p>

                                    </div>
                                    <!--Second column-->
                                </div>
                                <!--First row-->

                            </div>
                            <!--Panel 3-->

                            <!--Panel 4-->
                            <div class="tab-pane fade" id="panel34" role="tabpanel">
                                <br>

                                <!--First row-->
                                <div class="row">

                                    <!--First column-->
                                    <div class="col-lg-5 col-md-12">

                                        <!--Featured image-->
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h2.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h9.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h10.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                    </div>
                                    <!--First column-->

                                    <!--Second column-->
                                    <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">

                                        <!--Title-->
                                        <h4 class="mb-5">Tạo chuyến đi hoặc Tạo yêu cầu</h4>

                                        <!--Description-->
                                        <p class="text-muted">Nếu ở bước 3, bạn thấy không có chuyến đi nào phù hợp với mình. Thì ở bước này, bạn sẽ tạo một chuyến đi hoặc yêu cầu theo ý bạn.
Bạn bấm vào hình chiếc xe máy (ở gốc trên phải màn hình máy tính, nếu điện thoại thì bạn bấm vào dấu "gạch ngang" để hiện thị ra chiếc xe máy). Khi bấm vào đó, bạn sẽ vào mục Các chuyến đi của tôi. Ở đây, bạn có hai sự lựa chọn:
                                        <ul>
                                            <li>Nếu bạn là chủ xe, và đang muốn kêu gọi người khác vào đi cùng, thì bạn sẽ tạo một chuyến đi.</li>
                                            <li>Nếu bạn là người đi cùng và đang muốn kêu gọi người chở, thì bạn sẽ tạo một yêu cầu.</li>
                                        </ul>
Lưu ý: Bạn cần phân biệt rõ chuyến đi và yêu cầu chuyến đi để tránh tạo nhầm :D
Sau khi bạn bấm vào nút Tạo mới, thì sẽ hiện ra một hộp thoại, và bạn cần điền đầy đủ các thông tin. Sau đó bấm Tạo mới tiếp, để hệ thống ghi nhận chuyến đi của bạn.</p>

                                    </div>
                                    <!--Second column-->
                                </div>
                                <!--First row-->

                            </div>
                            <!--Panel 4-->
                            <!--Panel 2-->
                            <div class="tab-pane fade" id="panel35" role="tabpanel">
                                <br>

                                <!--First row-->
                                <div class="row">

                                    <!--First column-->
                                    <div class="col-lg-5 col-md-12">

                                        <!--Featured image-->
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h8.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                        <div class="view overlay z-depth-1 mb-2">
                                            <img src="<?= base_url('assets/info/h7.png') ?>" class="rounded img-fluid" alt="sample image">
                                        </div>
                                    </div>
                                    <!--First column-->

                                    <!--Second column-->
                                    <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">

                                        <!--Title-->
                                        <h4 class="mb-5">Quan sát chuyến đi của mình</h4>

                                        <!--Description-->
                                        <p class="text-muted">
                                        <ul>
                                            <li>Nếu bạn là chủ xe, hãy thường xuyên xem ai gửi yêu cầu và chấp nhận họ sớm nhất có thể nhé! </li>
                                            <li>Nếu bạn là khách, hãy thường xuyên quan sát yêu cầu của mình, xem người ta đã chấp nhận yêu cầu chưa. Hoặc có người nào mở chuyến đi của mình chưa. </li>
Các bạn xem những thông tin ấy ở Nút hình Cái chuông (ở cạnh hình chiếc xe máy)
Khi các bạn đã được kết nối, hãy để lại thông tin ở ô bình luận để giữ liên lạc nhé!^^ Hoặc có thể hẹn nơi gặp.</p>

                                    </div>
                                    <!--Second column-->
                                </div>
                                <!--First row-->

                            </div>

                        </div>
                        <!--Tab panels-->

                    </div>
                    <!--First column-->

                </div>
                <!--First row-->

            </section>
            <!--Projects section v.3-->

        </div>

        <!--Streak-->
        <div class="streak streak-photo streak-md" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Things/full%20page/img%20%287%29.jpg');">
            <div class="flex-center mask rgba-indigo-strong">
                <div class="text-center white-text">
                    <h2 class="h2-responsive mb-5">
                        <i class="fa fa-quote-left" aria-hidden="true"></i> Chúc các bạn có những chuyến đi vui vẻ và an toàn
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </h2>
                    <h5 class="text-center font-italic " data-wow-delay="0.2s">~ Admin EasyHere</h5>
                </div>
            </div>
        </div>
        <!--Streak-->

    </main>
    <!--Main content-->

    <!--Footer-->
    <footer class="page-footer text-center text-md-left mdb-color darken-3">

        <!--Footer Links-->
        <div class="container-fluid">

            <!--First row-->
            <div class="row " data-wow-delay="0.2s">

                <!--First column-->
                <div class="col-md-12 text-center mb-3 mt-3">

                    <!--Icon-->
                    <i class="fa fa-mortar-board fa-4x orange-text"></i>
                    <!--Title-->
                    <h2 class="mt-3 mb-3">Tham gia với chúng tôi</h2>
                    <!--Description-->
                    <p class="white-text mb-5"></p>
                    <!--Reservation button-->
                    <a href="#!" class="btn btn-warning waves-effect waves-light">Đăng nhập</a>
                    <a href="#!" class="btn btn-info waves-effect waves-light">Đăng kí</a>

                </div>
                <!--First column-->

                <hr class="w-100 mt-4 mb-5">

            </div>
            <!--First row-->

            <div class="container mb-1">

                <!--Second row-->
                <div class="row">
                    

                    <hr class="w-100 clearfix d-lg-none">

                </div>
                <!--Second row-->

            </div>

        </div>
        <!--Footer Links-->

       

    </footer>
    <!--Footer-->

    <!--SCRIPTS-->

    <!--JQuery-->
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>

    <!--Bootstrap tooltips-->
    <script type="text/javascript" src="<?= base_url('assets/js/popper.min.js') ?>"></script>

    <!--Bootstrap core JavaScript-->
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!--MDB core JavaScript-->
    <script type="text/javascript" src="<?= base_url('assets/js/mdb.min.js') ?>"></script>
    <script>
        //Animation init
        new WOW().init();

        //Modal
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })

        // Material Select Initialization
        $(document).ready(function () {
            $('.mdb-select').material_select();
        });

    </script>

</body>
</html>

