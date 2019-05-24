<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/native.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick-theme.css') }}">
    <title>E - Bina | @yield('title')</title>
  </head>
  <body>
    @yield('content')
    @include('temp.footer')
    <script src="{{ asset('assets/jquery.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/slick.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/native.js') }}" charset="utf-8"></script>
  </body>
</html>
