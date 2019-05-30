<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/native.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick-theme.css') }}">
  </head>
  <body id="peraturanPage">
    <nav>
      <span id="brandNav"><a href="{{ url('/') }}">e-bina</a> <box-icon name='menu-alt-right' color="white"></box-icon></span>
      <a href="{{ url('/') }}#jasaSection">jasa</a>
      <a href="{{ url('/') }}#klienSection">klien</a>
      <a href="{{ url('/') }}#hargaSection">harga</a>
      <a href="{{ url('promo') }}">promo</a>
      <a href="{{ url('mitra') }}">mitra</a>
      <a href="{{ url('support') }}">support</a>
      <a href="{{ url('about') }}">tentang kami</a>
      <a href="{{ route('member.login') }}" id="loginBtn">login</a>
    </nav>
    <main>
      <section>
        <div class="container">
          <h1>Kebijakan E-Bina</h1>
          <h2>Selamat datang di E-Bina</h2>
          <p>Syarat & ketentuan yang ditetapkan di bawah ini mengatur pemakaian jasa yang ditawarkan oleh PT. Jaya Bina Konsultan Group terkait penggunaan
            situs www.ebina.id. Pengguna disarankan membaca dengan seksama karena dapat berdampak kepada hak dan kewajiban Pengguna di bawah hukum.</p>
          <p>Berikut adalah beberapa peraturan dan kebijakan dari kami. Peraturan yang tersedia tidak dapat diganggu gugat.</p>
          <div class="row mx-0">
            <div class="col-md-3 px-0">
              <div class="nav flex-column nav-pills" id="v-pills-tab" aria-orientation="vertical" role="tablist" id="v-pills-tab">
                @foreach ($peraturan as $each)
                  <a class="nav-link" id="v-pills-peraturan{{ $each->id }}-tab" data-toggle="pill" href="#v-pills-peraturan{{ $each->id }}" role="tab"
      						aria-controls="v-pills-peraturan{{ $each->id }}" aria-selected="false">{{ $each->judul }}</a>
                @endforeach
              </div>
            </div>
            <div class="col px-0" id="listPeraturan">
              <div class="tab-content" id="v-pills-tabContent">
                @foreach ($peraturan as $each)
      		      <div class="tab-pane fade" id="v-pills-peraturan{{ $each->id }}" role="tabpanel" aria-labelledby="v-pills-peraturan{{ $each->id }}-tab">
      						<h2 class="text-capitalize">{{ $each->judul }}</h2>
      		      	{!! $each->deskripsi !!}
      		      </div>
      					@endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    @include('temp.footer')
    <script src="{{ asset('assets/jquery.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/native.js') }}" charset="utf-8"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.js') }}" charset="utf-8"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script>
      
    </script>
  </body>
</html>
