<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>School Rooms</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <head>
        @include('includes.head')
        @yield('page_style')
    </head>

<body>

    @include('includes.header')

  @include('includes.sidebar')

  <main id="main" class="main">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('success') }}
      </div>
    @endif
    <section class="section dashboard rtl">
        @yield('section_content')

        @yield('section_modals')
    </section>
  </main>

    @include('includes.footer')

    @extends('includes.foot')

</body>

</html>
