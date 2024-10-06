<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">IT Rooms</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item pe-3">
            <span>{{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
        </li>

        <li class="nav-item pe-3">
            <span>{{ Carbon\Carbon::now()->format('h:i a') }}</span>
        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile rtl">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('user.show', auth()->user()->id) }}">
                <span>الملف الشخصي</span>
                <i class="bx bxs-user"></i>
              </a>
            </li>
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('auth.logout') }}">
                  <span>تسجيل خروج</span>
                  <i class="bi bi-box-arrow-right mx-2"></i>
                </a>
              </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
