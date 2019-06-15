<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/native.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick-theme.css') }}">
    <title>E - Bina | @yield('title')</title>
  </head>
  <body>
    @yield('header')
    <main>
      @yield('content')
    </main>
    @include('temp.footer')
    <script src="{{ asset('assets/jquery.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/slick.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/native.js') }}" charset="utf-8"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script>
    $(document).ready(function() {
      $('input[name="codeMember"]').removeAttr('required');
      $('.message-session').delay(1000).slideUp(600);
    });
    </script>
  </body>
</html>
