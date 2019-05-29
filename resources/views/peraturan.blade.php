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
                <a class="nav-link active" id="v-pills-peraturan1-tab" role="tab" data-toggle="pill" aria-controls="v-pills-peraturan1" aria-selected="true" href="#peraturan1">peraturan pertama</a>
                <a class="nav-link" id="v-pills-peraturan2-tab" role="tab" data-toggle="pill" aria-controls="v-pills-peraturan2" aria-selected="false" href="#peraturan2">peraturan kedua</a>
                <a class="nav-link" id="v-pills-peraturan3-tab" role="tab" data-toggle="pill" aria-controls="v-pills-peraturan3" aria-selected="false" href="#peraturan3">peraturan ketiga</a>
                <a class="nav-link" id="v-pills-peraturan4-tab" role="tab" data-toggle="pill" aria-controls="v-pills-peraturan4" aria-selected="false" href="#peraturan4">peraturan ketiga</a>
              </div>
            </div>
            <div class="col px-0" id="listPeraturan">
              <div class="tab-content" id="v-pills-tabContent">
                <div role="tabpanel" aria-labelledby="v-pills-peraturan1-tab" class="tab-pane fade show active" id="peraturan1">
                  <h3>Judul Peraturan ke1</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id diam tincidunt, accumsan est id, porttitor velit. Sed placerat quam dui,
                    eu vehicula lectus faucibus et. Praesent bibendum bibendum justo. Proin a quam quis dui vulputate consequat.
                    Duis consequat, nulla nec condimentum tincidunt, velit neque ullamcorper risus, rhoncus eleifend justo enim in ante.
                    Phasellus sodales, mauris et viverra scelerisque, arcu sem cursus nunc, gravida volutpat sem nibh vel nibh.
                    Sed ac fringilla elit. Etiam sagittis dui quis mauris rhoncus auctor. Vivamus fringilla justo leo, vel aliquet elit tempus et.
                    Donec sed purus sollicitudin, mattis elit vel, ornare sapien. Duis aliquam libero at nunc auctor, quis efficitur est vehicula.
                    Aenean eget auctor velit, quis congue nisi.</p>
                </div>
                <div role="tabpanel" aria-labelledby="v-pills-peraturan2-tab" class="tab-pane fade" id="peraturan2">
                  <h3>Judul Peraturan ke2</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id diam tincidunt, accumsan est id, porttitor velit. Sed placerat quam dui,
                    eu vehicula lectus faucibus et. Praesent bibendum bibendum justo. Proin a quam quis dui vulputate consequat.
                    Duis consequat, nulla nec condimentum tincidunt, velit neque ullamcorper risus, rhoncus eleifend justo enim in ante.
                    Phasellus sodales, mauris et viverra scelerisque, arcu sem cursus nunc, gravida volutpat sem nibh vel nibh.
                    Sed ac fringilla elit. Etiam sagittis dui quis mauris rhoncus auctor. Vivamus fringilla justo leo, vel aliquet elit tempus et.
                    Donec sed purus sollicitudin, mattis elit vel, ornare sapien. Duis aliquam libero at nunc auctor, quis efficitur est vehicula.
                    Aenean eget auctor velit, quis congue nisi.</p>
                </div>
                <div role="tabpanel" aria-labelledby="v-pills-peraturan3-tab" class="tab-pane fade" id="peraturan3">
                  <h3>Judul Peraturan ke3</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id diam tincidunt, accumsan est id, porttitor velit. Sed placerat quam dui,
                    eu vehicula lectus faucibus et. Praesent bibendum bibendum justo. Proin a quam quis dui vulputate consequat.
                    Duis consequat, nulla nec condimentum tincidunt, velit neque ullamcorper risus, rhoncus eleifend justo enim in ante.
                    Phasellus sodales, mauris et viverra scelerisque, arcu sem cursus nunc, gravida volutpat sem nibh vel nibh.
                    Sed ac fringilla elit. Etiam sagittis dui quis mauris rhoncus auctor. Vivamus fringilla justo leo, vel aliquet elit tempus et.
                    Donec sed purus sollicitudin, mattis elit vel, ornare sapien. Duis aliquam libero at nunc auctor, quis efficitur est vehicula.
                    Aenean eget auctor velit, quis congue nisi.</p>
                </div>
                <div role="tabpanel" aria-labelledby="v-pills-peraturan4-tab" class="tab-pane fade" id="peraturan4">
                  <h3>Judul Peraturan ke4</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id diam tincidunt, accumsan est id, porttitor velit. Sed placerat quam dui,
                    eu vehicula lectus faucibus et. Praesent bibendum bibendum justo. Proin a quam quis dui vulputate consequat.
                    Duis consequat, nulla nec condimentum tincidunt, velit neque ullamcorper risus, rhoncus eleifend justo enim in ante.
                    Phasellus sodales, mauris et viverra scelerisque, arcu sem cursus nunc, gravida volutpat sem nibh vel nibh.
                    Sed ac fringilla elit. Etiam sagittis dui quis mauris rhoncus auctor. Vivamus fringilla justo leo, vel aliquet elit tempus et.
                    Donec sed purus sollicitudin, mattis elit vel, ornare sapien. Duis aliquam libero at nunc auctor, quis efficitur est vehicula.
                    Aenean eget auctor velit, quis congue nisi.</p>
                </div>
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
  </body>
</html>
