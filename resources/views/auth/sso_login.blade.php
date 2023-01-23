<!DOCTYPE html>
<!-- saved from url=(0036)https://sso.undiksha.ac.id/cas/login -->
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
<!-- Start Page Loading -->
<!-- <div id="loader-wrapper">
  <div id="loader">
    <div id="loader-logo"></div>
  </div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div> -->
<!-- End Page Loading -->






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
<div class="loading" style="display:none;"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
<!--Basic Card-->









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

                        <form id="fm1" class="login-form login-baru" action="https://sso.undiksha.ac.id/cas/login;jsessionid=C86BA0B20768BAAB80A442D3A8E43666" method="post">




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


                                    <input type="hidden" name="lt" value="LT-4086885-tQJ31dy5qpl2wfRWMIs0Eb3coppoAc-sso.undiksha.ac.id">
                                    <input type="hidden" name="execution" value="e1s1">
                                    <input type="hidden" name="_eventId" value="submit">

                                    <button id="login_password" accesskey="l" tabindex="4" class=" col s12 waves-effect waves-light gradient-45deg-green-teal  btn-large  gradient-shadow  z-depth-4  ">
                                        <i class="material-icons right">lock</i> Login</button>

                                </div>
                            </div>

                            <div id="login_qr"  style="margin-bottom: 2px;" class="row">
                                <div class="input-field col s12">

                                    <button onclick="show_qr()" class=" col s12 waves-effect waves-light gradient-45deg-purple-teal  btn-large  gradient-shadow  z-depth-4">
                                        <i class="material-icons right">qr_code_2</i> Login Kode QR</button>

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

<center>  <b> ... </b> <a href="https://upttik.undiksha.ac.id/helpdesk/faq" target="_blank">FAQ </a>| <a href="https://upttik.undiksha.ac.id/" target="_blank"> <i style="font-size: 16px;" class="material-icons prefix">language</i> </a> - Copyright © <script type="text/javascript" async="" src="/login_sso_files/recaptcha__en.js" crossorigin="anonymous" integrity="sha384-P8pCcHmv6YuQzFS4CHCBH75RXE60mJL5a4xXH5SOKJXf73JeLMNzQcVajnZH59MQ"></script><script async="" src="/login_sso_files/analytics.js"></script><script type="text/javascript">
        document.write(new Date().getFullYear());
    </script>2022  <a href="http://undiksha.ac.id/" target="_blank"> Undiksha</a> <b> ... </b> </center>




<!-- ================================================
  Scripts
  ================================================ -->
<!-- jQuery Library -->
<script type="text/javascript" src="/login_sso_files/jquery-3.2.1.min.js"></script>
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




    var fm1;
    var email;
    var password;
    var login;
    var login_password;
    var login_qr;
    var forget_password;
    var qr_canvas = '   <div id="canvas_qr"  class="row margin" style="text-align: center;">  <div style="margin: 0 auto;" id="canvas"></div> </div>  ';
    function show_qr(){
            document.getElementById("message_top").innerHTML="Scan QR CODE dengan Aplikasi E-Ganesha";
            fm1 = document.getElementById("fm1");
            email = document.getElementById("email");
            password = document.getElementById("password");
            login = document.getElementById("login");
            login_qr = document.getElementById("login_qr");
            forget_password = document.getElementById("forget_password");
            login_password = document.getElementById("login_password");
            login_password.innerHTML = ' <i class="material-icons right">lock</i> Login dengan Password';
            fm1.innerHTML= qr_canvas;
            fm1.appendChild(login);
            fm1.appendChild(forget_password);


        const qrCode = new QRCodeStyling({
            width: 275,
            height: 275,
            type: "svg",
            data: "{{$qr_code}}",
            image: "/images/logo-undiksha.png",
            dotsOptions: {
                color: "#384DBA",
                type: "rounded"
            },
            backgroundOptions: {
                color: "#e9ebee",
            },
            imageOptions: {
                crossOrigin: "anonymous",
                margin: 2,
                imageSize:0.5
            }
        });

        qrCode.append(document.getElementById("canvas"));




    }



    //clear cache
</script>

<script src="/login_sso_files/api.js" async="" defer="">
</script>
<div id="respon"></div>
<div class="hiddendiv common"></div><div style="background-color: rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 3px; position: absolute; transition: visibility 0s linear 0.3s, opacity 0.3s linear 0s; opacity: 0; visibility: hidden; z-index: 2000000000; left: 0px; top: -10000px;"><div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.05;"></div><div class="g-recaptcha-bubble-arrow" style="border: 11px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;"></div><div class="g-recaptcha-bubble-arrow" style="border: 10px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;"></div><div style="z-index: 2000000000; position: relative;"><iframe title="recaptcha challenge expires in two minutes" src="/login_sso_files/bframe.html" name="c-szu4lci1rg4s" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" style="width: 100%; height: 100%;"></iframe></div></div>


<script src="/js/passkey.js"></script>

<script>
    async function showHideFidoLoginButton()
    {
        let platformAuthExist = await checkPlatformAuthAvailable();
        console.log("hasil check");
        console.log(platformAuthExist);
        if(platformAuthExist){
            document.getElementById("login_qr").style.display = 'none';
        }else{
            document.getElementById("login_qr").style.display = 'block';
        }
    }
    showHideFidoLoginButton();
</script>

</body></html>


