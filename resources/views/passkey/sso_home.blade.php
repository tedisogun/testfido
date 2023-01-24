
<!-- saved from url=(0032)https://sso.undiksha.ac.id/home/ -->
<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SSO Undiksha">


    <!-- App Favicon -->
    <link rel="shortcut icon" href="https://sso.undiksha.ac.id/cas/assets/images/favicon.ico">
    <meta name="msapplication-TileColor" content="#2b3d51">
    <!-- App title -->
    <title>e-Ganesha - Home</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="/welcome_sso_files/morris.css">

    <!-- Switchery css -->
    <link href="/welcome_sso_files/switchery.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link href="/welcome_sso_files/style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" /><![endif]-->
    <!-- Modernizr js -->
    <script src="/welcome_sso_files/modernizr.min.js"></script>
    <style type="text/css">
        .card a {
            color:black;
        }
        .biru {
            background-color:#afd3e0;
        }
        .pp {
            color:black;
        }
        #topnav .navbar-toggle span {

            background-color: #000;
        }
        #topnav {

            background-color: #2b3d51;

        }
        #topnav .navigation-menu > li > a {

            color: white;
        }
        .profile-dropdown {
            width: 230px;
        }

        @media (max-width: 991px) {
            #navigation {

                background-color: #2b3d51;
            }
        }

    </style>

    <script src="/welcome_sso_files/OneSignalSDK.js" async=""></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main" style="background-color: white;">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="https://sso.undiksha.ac.id/" class="logo">
                    <img src="/welcome_sso_files/logo.png" style=" height: 45px;">
                    <span style="color: black;">e-Ganesha</span>
                </a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras">

                <ul class="nav navbar-nav pull-right">

                    <li class="nav-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines" style="color: black;">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="nav-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user " data-toggle="dropdown" href="https://sso.undiksha.ac.id/home/#" role="button" aria-haspopup="false" aria-expanded="false"> <span class="txt-user-profile pp">{{$user->email}}</span>
                            <img src="/welcome_sso_files/saved_resource" alt="user" class="img-circle g_user">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small>Welcome ! {{$user->email}}</small> </h5>
                            </div>

                            <!-- item-->
                            <a href="https://sso.undiksha.ac.id/home/profil/" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-account-circle"></i> <span>Profil</span>
                            </a>

                            <a id="register-passkey"  href="https://upttik.undiksha.ac.id/media/download/" target="_blank" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-smartphone-lock"></i> <span>Register Passkey</span>
                            </a>

                            <a href="https://upttik.undiksha.ac.id/media/download/" target="_blank" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-help"></i> <span>PANDUAN PENGGUNAAN</span>
                            </a>


                            <!-- item http://sso.undiksha.ac.id/logout/ -->
                            <a href="/logout" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-power"></i> <span>Logout</span>
                            </a>

                        </div>
                    </li>
                </ul>

            </div> <!-- end menu-extras -->
            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->


    <div class="navbar-custom active">
        <div class="container">
            <div id="navigation" class="active">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="active">
                        <a href="https://sso.undiksha.ac.id/home/"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                    </li>

                    <li>
                        <a href="https://sso.undiksha.ac.id/home/profil/"><i class="zmdi zmdi-account-circle"></i> <span> Profil User</span> </a>
                    </li>

                    <li> <a href="https://upttik.undiksha.ac.id/media/download/" target="_blank" class="dropdown-item notify-item">
                            <i class="zmdi zmdi-help"></i> <span>PANDUAN PENGGUNAAN</span>
                        </a> </li>

                    <li class="last-elements">
                        <a href="https://sso.undiksha.ac.id/home/logout/"><i class="ion ion-log-out "></i> <span> Logout</span> </a>
                    </li>
                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
</header>












<style type="text/css">.h_profil{    background-color: #07a4ea;text-align:right;width:32%;color: black;}</style>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="wrapper">
    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Selamat Datang Di Portal Aplikasi Sistem Informasi Undiksha</h4>


            </div>
        </div>





        <!-- end row -->
        <div class="row">
            <div class=" col-lg-12">

                <div class="card-box">


                    <h5 class=" m-t-0 m-b-20">Selamat Datang User <b> {{$user->name}}</b>, anda login dengan Email <b> {{$user->email}}</b>. .

                    </h5>
                    <!-- <a class="btn btn-danger waves-effect waves-light  m-b-2 " href="#" style="background-color: ff8a7f;" onclick="$('#modalsukses').modal('show')">
                      <h5 style="margin:0">   <span class="btn-label"><b><i class="fa fa-lock"></i></b>
                      </span>Akses ke email Undiksha</h5>

                      </a>  -->








                    <div id="msg" class="success">
                        <h2><spring:message code="screen.success.header"></spring:message></h2>
                        <p><spring:message code="screen.success.success"></spring:message></p>
                        <p><spring:message code="screen.success.security"></spring:message></p>
                    </div>

                    <p>Berikut ini adalah layanan sistem yang bisa digunakan</p>

                </div>
            </div><!-- end col-->
        </div>
        <div class="row" style="margin:0 auto;">

            <a href="https://elearning.undiksha.ac.id/login/index.php" target="_blank" style="margin: 0 auto;" id="E-learning">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">E-learning</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/5259_e_leanring.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                E-learning Undiksha
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://ppl.undiksha.ac.id/" target="_blank" style="margin: 0 auto;" id="PPL">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">PPL</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/248_Teacher-Icon-Info-Page.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Sistem Informasi PPL
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://si.undiksha.ac.id/?berkas=home&amp;control=ctlhome&amp;fungsi=login_sso" target="_blank" style="margin: 0 auto;" id="SIAK">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">SIAK</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/1738_ganesha.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Sistem Informasi Akademik
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://sso.undiksha.ac.id:8080/notifikasi/" target="_blank" style="margin: 0 auto;" id="Sistem Notifikasi ">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">Sistem Notifikasi </h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/6915_128x128.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Sistem Notifikasi
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://mahasiswa.undiksha.ac.id/sso_login" target="_blank" style="margin: 0 auto;" id="PDM">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">PDM</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/1987_graduate.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Pangkalan Data Mahasiswa
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://kkn.undiksha.ac.id/userpage" target="_blank" style="margin: 0 auto;" id="KKN Undiksha">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">KKN Undiksha</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/7790_256.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Sistem Informasi KKN
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://kuisioner.undiksha.ac.id/login/sso" target="_blank" style="margin: 0 auto;" id="Kuisioner UNDIKSHA">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">Kuisioner UNDIKSHA</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/4539_kuisioner.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Kuisioner UNDIKSHA
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://pkl.undiksha.ac.id/cp/login/sso" target="_blank" style="margin: 0 auto;" id="PKL">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">PKL</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/1056_work.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Praktek Kerja Lapangan
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://siakng.undiksha.ac.id/" target="_blank" style="margin: 0px auto; display: none;" id="SIAK-NG">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">SIAK-NG</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/2207_logo.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Sistem Informasi Akademik (Angkatan 2019 Ke Atas)
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://tte.undiksha.ac.id/app/sso" target="_blank" style="margin: 0 auto;" id="TTE Undiksha">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">TTE Undiksha</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/4858_feather.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Tanda Tangan Elektronik Undiksha
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://go.undiksha.ac.id/" target="_blank" style="margin: 0 auto;" id="Go Undiksha">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">Go Undiksha</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/1273_256x256.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Go Undiksha
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

            <a href="https://smart-payment.undiksha.ac.id/" target="_blank" style="margin: 0 auto;" id="Smart Payment">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

                    <div class="card" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                        <div class="card-block " style="padding-bottom: 10px;">
                            <h5 class="card-subtitle text-xs-center" style="font-size: 15px;font-weight: bold;">Smart Payment</h5>
                        </div>
                        <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                            <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="/welcome_sso_files/564_tutorial-preview-large-1.png" alt="Sistem">
                        </div>

                        <div class="card-block" style="padding: 0px 10px 10px 10px;">
                            <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;
max-width: 215px;">
                                Smart Payment Undiksha
                            </p>
                        </div>

                        <div class="card-block card-inverse text-xs-center" style="padding: 0rem;">

                        </div>

                    </div>

                </div><!-- end col -->   </a>

        </div>

        <!-- Modal sukses-->
        <div id="modalsukses" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel"> Akses ke email Undiksha</h5>

                    </div>
                    <div class="modal-body">

                        <div class="alert alert-info">
                            <h5>Silahkan Login ke <a href="http://mail.google.com/a/undiksha.ac.id" target="_blank">mail.undiksha.ac.id</a> Menggunakan Email dan Password Di Bawah ini : </h5>
                            <h5>  Ini password baru, jika sudah pernah di ganti abaikan saja </h5>
                        </div>


                        <ul class="list-group">

                            <li class="list-group-item">

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 form-control-label">Username</label>
                                    <div class="col-sm-9">
                                        <input readonly="" class="form-control" id="email_undiksha" value="{{$user->email}}" type="text">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 form-control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input readonly="" class="form-control" value="1715051073" type="text">
                                    </div>
                                </div>
                            </li>

                        </ul>

                    </div>
                    <div class="modal-footer text-block">
                        <button type="button" data-dismiss="modal" class="btn btn-primary btn-lg text-center">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal sukses-->



        <div class="row">

            <div class="col-xs-12 col-lg-12 col-xl-5">
                <div class="card-box" style="min-height: 162px;">

                    <h4 class="header-title m-t-0 m-b-5">UPT TIK-UNDIKSHA</h4>

                    <p>
                        Bantuan mengenai permasalahan terkait sistem informasi, jaringan dan internet di lingkungan kampus UNDIKSHA dapat menghubungi UPT TIK dengan nomor telepon (0362) 26100 atau melalui Facebook Fans Page <a href="https://www.facebook.com/upttikundiksha" target="_blank">UPT TIK-Undiksha</a>.
                    </p>

                </div>
            </div><!-- end col-->

            <div class="col-xs-12 col-lg-12 col-xl-4">
                <div class="card-box" style="min-height: 162px;">

                    <h4 class="header-title m-t-0 m-b-30">Follow Us On</h4>

                    <section class="icon-list-demo">
                        <div class="row">

                            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xs-4">
                                <a href="https://www.facebook.com/upttikundiksha" data-toggle="tooltip" title="" target="_blank" data-original-title="Facebook"><i class="zmdi zmdi-facebook-box"></i></a>
                            </div>

                            <!--   <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xs-4">
                                 <a href="#" data-toggle="tooltip" title="Twitter"> <i class="zmdi zmdi-twitter-box"></i> </a>
                             </div>

                             <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xs-4">
                                  <a href="#" data-toggle="tooltip" title="Youtube"><i class="zmdi zmdi-youtube-play"></i></a>
                             </div> -->

                            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xs-4">
                                <a href="http://upttik.undiksha.ac.id/" data-toggle="tooltip" title="" target="_blank" data-original-title="Website"><i class="zmdi zmdi-globe"></i></a>
                            </div>

                        </div>
                    </section>

                </div>
            </div><!-- end col-->


            <div class="col-xs-12 col-lg-12 col-xl-3">
                <div class="card-box" style="min-height: 162px;">

                    <h4 class="header-title m-t-0 m-b-30">Kontak Humas</h4>

                    <address class="margin-bottom-40">
                        <i class="fa fa-phone"></i> Phone : (0362) 22570 <br>
                        <i class="fa fa-envelope"></i> Email : <a href="mailto:h%75mas@u%6Ediks%68a.ac.id">humas@undiksha.ac.id</a>
                    </address>

                </div>
            </div><!-- end col-->


        </div>
        <!-- end row -->



        <!-- Footer -->
        <footer class="footer text-right">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <i class="fa fa-copyright"></i>  2018  <a href="http://undiksha.ac.id/" target="_blank">Universitas Pendidikan Ganesha</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


    </div> <!-- container -->
</div> <!-- End wrapper -->




<!-- jQuery  -->
<script src="/welcome_sso_files/jquery.min.js"></script>


<script src="/welcome_sso_files/tether.min.js"></script><!-- Tether for Bootstrap -->
<script src="/welcome_sso_files/bootstrap.min.js"></script>
<script src="/welcome_sso_files/waves.js"></script>
<script src="/welcome_sso_files/jquery.nicescroll.js"></script>
<script src="/welcome_sso_files/switchery.min.js"></script>


<!-- App js -->
<script src="/welcome_sso_files/jquery.core.js"></script>
<script src="/welcome_sso_files/jquery.app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="/js/passkey.js"></script>

<script>
    async function showHideFidoLoginButton()
    {
        let platformAuthExist = await checkPlatformAuthAvailable();

        if(platformAuthExist){
            document.getElementById("register-passkey").style.display = 'block';
        }else{
            document.getElementById("register-passkey").style.display = 'none';
        }
    }
    showHideFidoLoginButton();

    async function register(){
        $.ajax({
            type: "GET",
            url: "/register-passkey-data",
            success: function(result) {
                console.log(result)
                // call webauthn to assign credential to user device
                console.log('success request register data challenge to server')
                getCredential(result)

            },
            error: function(result) {
                console.log(result)
                alert('something is error')

            }
        });

    }

    async function getCredential(result)
    {
         let newCredential;

         try {
             newCredential = await registerPasskey(result.challenge, result.user, result.credentials);
         }catch (e) {
             console.log(e)
             alert('device ini sudah terdaftar passkey')
             return
         }
         console.log(newCredential)
        //console.log(newCredential)

        //'credential_id' is base64url string
        // 'attestation_object', 'clientdata_json' must be convert to base64url from arraybuffer
        $.ajax({
            type: "POST",
            url: "/register-passkey-credential",
            data: {
                credential_id : newCredential.id,
                attestation_object : base64url_encode(newCredential.response.attestationObject),
                clientdata_json : base64url_encode(newCredential.response.clientDataJSON),
            },
            success: function(result) {
                console.log(result);
                alert("success");
            },
            error: function(result) {
                console.log(result)
                alert(result.responseJSON.message)
            }
        });
    }


    $('#register-passkey').click(function(){ register(); return false; });

</script>
</body></html>
