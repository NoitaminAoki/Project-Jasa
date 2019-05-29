<nav class="main-header navbar navbar-expand bg-info navbar-dark border-bottom">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ url('/') }}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>
  
  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
  </form>
  
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-bell-o"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-envelope mr-2 text-dark"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-users mr-2 text-dark"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-file mr-2 text-dark"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
      </div>
    </li>
    <li class="nav-item">
      @if (Auth::guard('web')->check())
      <a class="nav-link" href="{{ route('admin.logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();"><i
      class="fa fa-power-off"></i></a>
      
      <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      @endif
      @if (Auth::guard('member')->check())
      <a class="nav-link" href="{{ route('member.logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();"><i
      class="fa fa-power-off"></i></a>
      
      <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      @endif
    </li>
  </ul>
</nav>