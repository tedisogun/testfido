<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="E-Ganesha">

    <title>E-Ganesha | Login</title>
    <!-- Favicons-->
    <link rel="icon" href="https://sso.undiksha.ac.id/cas/assets_new/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="https://sso.undiksha.ac.id/cas/assets_new/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="/login_sso_files/materialize.css" type="text/css" rel="stylesheet">
    <link href="/login_sso_files/style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->

    <link href="/login_sso_files/page-center.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="/login_sso_files/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>

    <style>


        .modal-border{
            border-top: 1px solid rgba(0, 0, 0, 0.1);

            bottom: 0;
        }



    </style>
</head>

<body class="loaded">


<style>
    /* Absolute Center Spinner */
    .loading {
        position: fixed;
        z-index: 9999999;
        height: 2em;
        width: 2em;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    /* Transparent Overlay */
    .loading:before {
        content: '';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.3);
    }


    .lds-ellipsis {
        display: inline-block;
        position: relative;
        width: 64px;
        height: 64px;
        left:-10px;
    }
    .lds-ellipsis div {
        position: absolute;
        top: 27px;
        width: 11px;
        height: 11px;
        border-radius: 50%;
        background: #cef;
        animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }
    .lds-ellipsis div:nth-child(1) {
        left: 6px;
        animation: lds-ellipsis1 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(2) {
        left: 6px;
        animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(3) {
        left: 26px;
        animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(4) {
        left: 45px;
        animation: lds-ellipsis3 0.6s infinite;
    }
    @keyframes lds-ellipsis1 {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }
    @keyframes lds-ellipsis3 {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }
    @keyframes lds-ellipsis2 {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(19px, 0);
        }
    }


</style>










<div class="row" style="max-width:850px;margin-bottom: 0px;">
    <div class="col s12 z-depth-4 card-panel m12 gradient-45deg-blue-grey-blue-grey" style="margin-top: 20px;padding: 5px 0px 0px 0px;margin-bottom: 0px;">

        <div class="col s12 m12 l7" style="margin-right: 10px;">

            <div class="card z-depth-2 gradient-45deg-blue-indigo">

                <div class="card-content white-text" style="padding-bottom: 0px;">
                    <center style="text-transform: uppercase;">
                        <img src="/login_sso_files/logo.png" width="140">
                        <span class="card-title"><b>Visi Undiksha : </b></span>
                        <p>Menjadi Universitas Unggul Berlandaskan Falsafah Tri Hita Karana di Asia Pada Tahun 2045</p>
                    </center>
                </div>

                <div class="card-content white-text">
                    <center><span class="card-title"><b>Misi Undiksha :</b></span></center>
                    <ol>
                        <li>Menyelenggarakan pendidikan dan pengajaran yang bermartabat untuk menghasilkan sumber daya manusia yang kompetitif, kolaboratif, dan berkarakter.
                        </li>
                        <li>Menyelenggarakan penelitian yang kompetitif, kolaboratif, dan inovatif untuk pengembangan dan penerapan ilmu pengetahuan dan teknologi.
                        </li>
                        <li>Menyelenggarakan pengabdian kepada masyarakat yang kompetitif, kolaboratif, akomodatif, dan inovatif.</li>

                    </ol>
                </div>

            </div>
        </div>

        <div class="col s12 m12 l4" style="margin: 0px;">
            <div style="display: flex;">
                <div id="login-page" class="row">

                    <div class="col s12 z-depth-2 card-panel m12" style="padding:0px">
                        <div class="row">
                            <div style="
                                 margin-top: 0px;" class="input-field col s12 center gradient-45deg-amber-amber padding-5 medium-small">
                                <img src="/login_sso_files/logo(1).png" alt="" class=" responsive-img valign profile-image-login">
                                <p class="center login-form-text" style="font-size:16px;font-weight:bold">E-Ganesha Login</p>
                            </div>

                            <div class="blue lighten-5">
                                <center id="message_top">Masukan Username dan Password.</center>
                            </div>
                        </div>

                        <!-- <form class="login-form" style="padding: 0 0.75rem;"> -->

                        <form id="fm1" class="login-form login-baru" action="/login-password" method="post">




                            <div id="email" class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">person_outline</i>

                                    <!-- <input required id="username" type="text"> -->





                                    <input id="username" name="username" accesskey="u" type="text" value="" autocomplete="off" required="">



                                    <label for="username" class="center-align active">Username</label>
                                </div>
                            </div>
                            <div id="password" class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-5">lock_outline</i>
                                    <!-- <input required id="password" type="password"> -->


                                    <input id="password" name="password" accesskey="p" type="password" value="" autocomplete="off" required="">

                                    <label for="password" class="active">Password</label>
                                </div>
                            </div>



                            <div id="login" style="margin-bottom: 2px;" class="row">
                                <div class="input-field col s12">

                                    <button id="login_password" accesskey="l" tabindex="4" class=" col s12 waves-effect waves-light gradient-45deg-green-teal  btn-large  gradient-shadow  z-depth-4  ">
                                        <i class="material-icons right">lock</i> Login</button>

                                </div>
                            </div>

                            <div id="login_passkey"  style="margin-bottom: 2px;" class="row">
                                <div class="input-field col s12">

                                    <button onclick="loginPasskey('{{$challenge}}')" class=" col s12 waves-effect waves-light  btn-large  gradient-shadow  z-depth-4" style="background: linear-gradient(45deg,#48b7f5 0%, #157bef 100%);">
                                        <i class="material-icons right">fingerprint</i>Login Passkey</button>

                                </div>
                            </div>


                            <div id="forget_password" class="row">
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin medium-small">
                                        <!-- <a class="modal-trigger" href="#modalsukses">Helpdesk</a> -->
                                        <a target="_blank" href="https://upttik.undiksha.ac.id/helpdesk/">Helpdesk</a>
                                    </p>
                                </div>
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin right-align medium-small modal-trigger">
                                        <a class="modal-trigger" onclick="reset_f();" href="https://sso.undiksha.ac.id/cas/login#modal1">Lupa Password?</a>
                                    </p>
                                </div>
                            </div>
                            <!-- </form> -->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<center style="margin-top: 15px;"><img src="/login_sso_files/logo-bsre.png" style="width: 100px"></center>

<center>  <b> ... </b> <a href="https://upttik.undiksha.ac.id/helpdesk/faq" target="_blank">FAQ </a>| <a href="https://upttik.undiksha.ac.id/" target="_blank"> <i style="font-size: 16px;" class="material-icons prefix">language</i>
    </a> - Copyright © <script>document.write(new Date().getFullYear());</script>
    </script>  <a href="http://undiksha.ac.id/" target="_blank"> Undiksha</a> <b> ... </b> </center>




<!-- ================================================
  Scripts
  ================================================ -->
<!-- jQuery Library -->
<script type="text/javascript" src="/login_sso_files/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--materialize js-->
<script type="text/javascript" src="/login_sso_files/materialize.min.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="/login_sso_files/perfect-scrollbar.min.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="/login_sso_files/plugins.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="/login_sso_files/custom-script.js"></script>

<script type="text/javascript" src="/login_sso_files/ba-debug.min.js" async="" defer=""></script>


<script type="text/javascript" src="/login_sso_files/cas.js"></script>

<script>




{{--    var fm1;--}}
{{--    var email;--}}
{{--    var password;--}}
{{--    var login;--}}
{{--    var login_password;--}}
{{--    var login_qr;--}}
{{--    var forget_password;--}}
{{--    var qr_canvas = '   <div id="canvas_qr"  class="row margin" style="text-align: center;">  <div style="margin: 0 auto;" id="canvas"></div> </div>  ';--}}
{{--    --}}
{{--    function show_qr(){--}}
{{--            document.getElementById("message_top").innerHTML="Scan QR CODE dengan Aplikasi E-Ganesha";--}}
{{--            fm1 = document.getElementById("fm1");--}}
{{--            email = document.getElementById("email");--}}
{{--            password = document.getElementById("password");--}}
{{--            login = document.getElementById("login");--}}
{{--            login_qr = document.getElementById("login_qr");--}}
{{--            forget_password = document.getElementById("forget_password");--}}
{{--            login_password = document.getElementById("login_password");--}}
{{--            login_password.innerHTML = ' <i class="material-icons right">lock</i> Login dengan Password';--}}
{{--            fm1.innerHTML= qr_canvas;--}}
{{--            fm1.appendChild(login);--}}
{{--            fm1.appendChild(forget_password);--}}


{{--        const qrCode = new QRCodeStyling({--}}
{{--            width: 275,--}}
{{--            height: 275,--}}
{{--            type: "svg",--}}
{{--            data: "{{$qr_code}}",--}}
{{--            image: "/images/logo-undiksha.png",--}}
{{--            dotsOptions: {--}}
{{--                color: "#384DBA",--}}
{{--                type: "rounded"--}}
{{--            },--}}
{{--            backgroundOptions: {--}}
{{--                color: "#e9ebee",--}}
{{--            },--}}
{{--            imageOptions: {--}}
{{--                crossOrigin: "anonymous",--}}
{{--                margin: 2,--}}
{{--                imageSize:0.5--}}
{{--            }--}}
{{--        });--}}

{{--        qrCode.append(document.getElementById("canvas"));--}}

{{--    }--}}



    //clear cache
</script>

<script>
    $("#login_password").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/login-password",
            data: {
                email: $("#username").val(),
            },
            success: function(result) {
                $.cookie("castgc", result.castgc, { path: '/', expires: 7 });
                location.reload();
            },
            error: function(result) {
                console.log('something is error')
                console.log(result)
                location.reload();
            }
        });
    });
</script>




<script src="/js/passkey.js"></script>

<script>
    async function showHideFidoLoginButton()
    {
        let platformAuthExist = await checkPlatformAuthAvailable();

        if(platformAuthExist){
            document.getElementById("login_passkey").style.display = 'block';
        }else{
            document.getElementById("login_passkey").style.display = 'none';
        }
    }
    showHideFidoLoginButton();
</script>

</body></html>


