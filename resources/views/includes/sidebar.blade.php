<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item rtl">
        <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="{{ route('main') }}">
          <i class="bi bi-grid mx-2"></i>
          <span>لوحة التحكم</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if (auth()->user()->role == 'مسؤول نظام')
        <li class="nav-item rtl">
            <a class="nav-link {{ request()->is('user*') ? '' : 'collapsed' }}" href="{{ route('user.index') }}">
                <span><i class="bi bi-people-fill"></i> قائمة المستخدمين</span>
            </a>
        </li>
      @endif

      <li class="nav-item rtl">
        <a class="nav-link {{ request()->is('room*') ? '' : 'collapsed' }}" href="{{ route('room.index') }}">
          <span><i class="bi bi-building"></i> قائمة المرافق</span>
        </a>
      </li>

      <li class="nav-item rtl">
        <a class="nav-link {{ request()->is('booking*') ? '' : 'collapsed' }}" href="{{ route('booking.index') }}">
          <span><i class="bi bi-book"></i> قائمة الحجوزات</span>
        </a>
      </li>

    </ul>

  </aside>
