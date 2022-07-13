<html>
  <head>
    <title>TestFIDO.com ~ Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

                <form id="registerform" action="/register" method="POST">
                 <input type="hidden" name="_csrf" value="{{ csrf_token() }}" />
                    <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-key fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">TestFIDO Register</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register dengan FIDO2</h5>
                 <p style="color:red;"> {{ $error ?? '' }}</p>
                  <form>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text"  name="name" id="name" class="form-control form-control-lg" />
                    <label class="form-label" for="name">Nama</label>
                  </div>
                   
                  <div class="pt-1 mb-4">
                    <button id="register" onclick="register(event)" class="btn btn-dark btn-lg btn-block" type="submit">REGISTER</button>
                  </div>

                  </form>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Sudah Punya Akun? <a href="/login"
                      style="color: #393f81;">Login Disini</a></p>
                 
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>

    function register(e)
    {
        e.preventDefault();
        alert("hi");
    }

</script>
  </body>
</html>