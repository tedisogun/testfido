<html>
<head>
    <title>QR Scan Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
</head>
<body>



<section class="vh-100" style="background-color: #212F3C;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="/images/gradient-bg-login.webp"
                                 alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">


                                <div class="d-flex align-items-center mb-3 pb-1">

                                    <span class="h1 fw-bold mb-0">Scan QR Code </span>
                                </div>

                                <div class="d-flex align-items-center mb-3 pb-1">

                                    <div id="canvas"></div>
                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    const qrCode = new QRCodeStyling({
        width: 300,
        height: 300,
        type: "svg",
        data: "{{$qr_code}}",
        image: "/images/logo-undiksha.png",
        dotsOptions: {
            color: "#4267b2",
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
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    var interval = 5000;  // 1000 = 1 second, 3000 = 3 seconds
    function doAjax() {
        let qrcode_base64url = {
            qr_code : '{{$qr_code}}'
        }
        $.ajax({
            type: 'GET',
            url: '/check-challenge-already-login',
            data: qrcode_base64url,
            dataType: 'json',
            success: function (data) {
                console.log('data : '+ JSON.stringify(data))
                if(data.is_succes === true){
                    window.location = "https://testfido.com/welcome?session_base64url="+ data.session_base64url;
                }else{
                    console.log('request to server, no auth yet...');
                }
            },
            complete: function (data) {
                // Schedule the next
                setTimeout(doAjax, interval);
            }
        });
    }
    setTimeout(doAjax, interval);
</script>

</body>
</html>
