<div class="sidebar mySimpleBar"  data-simplebar data-simplebar-auto-hide="true">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ (Storage::exists(Auth::guard('web')->user()->profile_picture))? Storage::url(Auth::guard('web')->user()->profile_picture) : asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block text-capitalize">{{ Auth::guard('web')->user()->name }}</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ (Request::segment(2) == "dashboard")? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header text-uppercase">Menu</li>
        <li class="nav-item">
          <a href="{{ route('admin.profil.index') }}" class="nav-link {{ (Request::segment(2) == "profil")? 'active' : '' }}">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Profil
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.partner.index') }}" class="nav-link {{ (Request::segment(2) == "partner")? 'active' : '' }}">
            <i class="nav-icon fas fa-handshake"></i>
            <p>
              Partner
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.member.index') }}" class="nav-link {{ (Request::segment(2) == "member")? 'active' : '' }}">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Member
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.klien.index') }}" class="nav-link {{ (Request::segment(2) == "klien")? 'active' : '' }}">
            <i class="nav-icon fa fa-male"></i>
            <p>
              Klien
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.mitra.index') }}" class="nav-link {{ (Request::segment(2) == "mitra")? 'active' : '' }}">
            <i class="nav-icon fa fa-male"></i>
            <p>
              Mitra
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.landing-page.index') }}" class="nav-link {{ (Request::segment(2) == "landing-page")? 'active' : '' }}">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Harga
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.penghasilan.fee') }}" class="nav-link {{ (Request::segment(2) == "penghasilan" && Request::segment(3) == "fee")? 'active' : '' }}">
            <i class="nav-icon fa fa-cog"></i>
            <p>
              Pengaturan Fee
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.penghasilan.index') }}" class="nav-link {{ (Request::segment(2) == "penghasilan" && Request::segment(3) <> "fee")? 'active' : '' }}">
            <i class="nav-icon fas fa-money-bill-wave-alt"></i>
            <p>
              Penghasilan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.promosi.index') }}" class="nav-link {{ (Request::segment(2) == "promosi")? 'active' : '' }}">
            <i class="nav-icon fa fa-tags"></i>
            <p>
              Promosi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.aturan.index') }}" class="nav-link {{ (Request::segment(2) == "aturan")? 'active' : '' }}">
            <i class="nav-icon fas fa-compact-disc"></i>
            <p>
              Aturan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.bantuan.index') }}" class="nav-link {{ (Request::segment(2) == "bantuan")? 'active' : '' }}">
            <i class="nav-icon fas fa-question-circle"></i>
            <p>
              Bantuan
            </p>
          </a>
        </li>
        {{-- <li class="nav-item has-treeview {{ (Request::segment(1) == "transaction")? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (Request::segment(1) == "transaction")? 'active' : '' }}">
            <i class="nav-icon fa fa-opencart"></i>
            <p>
              Transaction
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link {{ (Request::segment(1) == "transaction" && Request::segment(2) == null)? 'active' : '' }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link {{ (Request::segment(2) == "create")? 'active' : '' }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Create</p>
              </a>
            </li>
          </ul>
        </li> --}}
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
