<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Sign In - Pusat Laundry
  </title>
  <!--     Fonts and icons     -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> -->
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Sweet ALert 2 -->
  <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang!</h3>
                  <p class="mb-0">Silakan input username dan password anda untuk masuk</p>
                </div>
                <div class="card-body">
                  <form action="login/cek" method="POST"  novalidate>
                    @csrf
                    <label>Username</label>
                    <div class="mb-3">
                      <input type="text" class="form-control
                      @error('username')
                        is-invalid
                      @enderror
                      " name="username" placeholder="Username" value="{{ old('username') }}">
                      @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control
                      @error('password')
                        is-invalid
                      @enderror" name="password" placeholder="Password" value="{{ old('password') }}">
                      @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>

                    @error('nofound')
                    <div class="row mb-2">
                      <div class="col-12 text-center text-danger">
                        {{ $message }}
                      </div>
                    </div>
                    @enderror
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Anda tidak memiliki akun?
                    <a href="{{ url('/register') }}" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/laundry3.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Soft by Muhammad Farhan.
          </p>
        </div>
      </div>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          const forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
        })()
      </script>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  <!-- Sweet Alert -->
  <script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  @if ($message = Session::get('success'))
  <script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
  </script>
  @elseif ($message = Session::get('update'))
  <script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
  </script>
  @elseif ($message = Session::get('admin'))
  <script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
  </script>
  @elseif ($message = Session::get('kasir'))
  <script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
  </script>
  @elseif ($message = Session::get('owner'))
  <script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
  </script>
  @elseif ($message = Session::get('register'))
  <script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
  </script>
  @endif
</body>

</html>