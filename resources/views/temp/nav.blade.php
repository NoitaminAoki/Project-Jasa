<nav>
  <span id="brandNav"><a href="{{ url('/') }}">e-bina</a> <box-icon name='menu-alt-right' color="white"></box-icon></span>
  <a href="{{ url('/') }}#jasaSection">jasa</a>
  <a href="{{ url('/') }}#klienSection">klien</a>
  <a href="{{ url('/') }}#hargaSection">harga</a>
  <a href="{{ route('home.promosi') }}">promo</a>
  <a href="{{ route('home.mitra') }}">mitra</a>
  <a href="{{ route('home.support') }}">support</a>
  <a href="{{ route('home.profil') }}">tentang kami</a>
  @auth
    <a href="{{ url('dashboard') }}" id="loginBtn">my dashboard</a>
  @else
    <a href="{{ route('admin.login') }}" id="loginBtn">login</a>
  @endauth
</nav>
