<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Stisla Laravel') &mdash; {{ env('APP_NAME') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/pikadays/css/pikaday.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('styles.partials.user.user-topnav')
      </nav>
      <div class="main-sidebar">
        @include('styles.partials.user.user-sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        @include('styles.partials.footer')
      </footer>
    </div>
  </div>

  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}?{{ uniqid() }}"></script>
  <script src="{{ asset('vendor/pikadays/pikaday.js') }}"></script>
  <script src="{{ asset('vendor/nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('vendor/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  <script>
    @if(session('success'))
      swal({
        title: '{{ session('alertTitle') }}',
        text:  '{{ session('success') }}',
        icon:  '{{ session('alertIcon') }}',
        button: "OK",
      });
    @endif
  </script>
  @yield('scripts')
</body>
</html>
