<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body>

  <main>
    <div class="container rtl">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block mx-2">IT Rooms</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">تسجيل الدخول</h5>
                    <p class="text-center small">ادخل بريدك الالكتروني و كلمة المرور للدخول</p>
                  </div>
                    @if (session()->has('login_error'))
                        <div class="alert alert-danger">{{ session('login_error') }}</div>
                    @endif
                  <form class="row g-3" action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">البريد الالكتروني</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend" style="border-radius: 0px 5px 5px 0px;">@</span>
                        <input name="email" type="email" name="username" class="form-control" required style="border-radius: 5px 0px 0px 5px;">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">كلمة المرور</label>
                      <input name="password" type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">تسجيل الدخول</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  @include('includes.foot')

</body>

</html>
