<!DOCTYPE html>
<html lang="en">
@include('temp.head')
<!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to to the body tag
  to get the desired effect
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini pr-0">
  <div class="wrapper">
    @include('temp.navbar')
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-info elevation-4" style="z-index: 1040 !important;">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="brand-link bg-info">
        <img src="{{ asset('assets/img/e-bina.jpeg') }}" alt="E-Bina Logo" class="brand-image img-circle elevation-1">
        <span class="brand-text font-weight-light">E - Bina</span>
      </a>

      <!-- Sidebar -->
      @if (Auth::guard('web')->check() && Request::is('admin/*'))
      @include('temp.sidebarAdmin')
      @elseif (Auth::guard('member')->check() && Request::is('member/*'))
      @include('temp.sidebarMember')
      @endif
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">@yield('title-body')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  @if (\Request::is('admin/*'))
                    @if (\Request::is('admin/dashboard'))
                      <li class="breadcrumb-item active">@yield('title-body')</li>
                    @else
                      <a href="{{ route('admin.dashboard.index') }}">Home</a>
                      <li class="breadcrumb-item active">@yield('title-body')</li>
                    @endif
                  @elseif (\Request::is('member/*'))
                    <a href="{{ route('member.dashboard.index') }}">Home</a>
                    <li class="breadcrumb-item active">@yield('title-body')</li>
                  @endif
                </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            @yield('content')

          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-center">
      Copyright 2019 | PT Jaya Bina Konsultan Grup
    </footer>
  </div>
  <!-- ./wrapper -->
  @include('temp.scripts')
</body>
</html>
