<?php

Route::permanentRedirect('home', '/');
Route::view('support/thank-you', 'member.thanks')->name('support.thanks');
Route::view('/adminss', 'admin')->name('adminpage');
Route::view('mailable', 'admin.bantuan.template_mail');

Route::prefix('admin')->namespace('Auth')->name('admin.')->group(function () {
  Route::get('login','LoginController@showLoginForm')->name('login');
  Route::post('login', 'LoginController@login')->name('login');
  Route::get('register','RegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'RegisterController@register')->name('register');
  Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::prefix('member')->namespace('Auth')->name('member.')->group(function () {
  Route::get('login','MemberLoginController@showLoginForm')->name('login');
  Route::post('login', 'MemberLoginController@login')->name('login');
  Route::get('register','MemberLoginController@showRegisterPage')->name('register');
  Route::post('register', 'MemberLoginController@register')->name('register');
  Route::post('logout', 'MemberLoginController@logout')->name('logout');
});

Route::namespace('Home')->name('home.')->group(function () {
  Route::get('/', 'HomeController@landing');
  Route::get('about', 'HomeController@about')->name('about');
  Route::get('mitra', 'HomeController@mitra')->name('mitra');
  Route::get('support', 'HomeController@support')->name('support');
  Route::post('support', 'HomeController@supportStore')->name('support.store');
  Route::get('promo', 'HomeController@promosi')->name('promosi');
  Route::get('syarat-dan-ketentuan', 'HomeController@peraturan')->name('peraturan');
  Route::get('profil', 'HomeController@profil')->name('profil');

  Route::post('klien/create', 'HomeController@klienStore')->name('klien.store');
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('auth')->group(function () {
  Route::resource('dashboard', 'DashboardController');
  Route::put('profil/change-password', 'ProfilController@changePassword')->name('profil.change.password');
  Route::put('profil/picture-update', 'ProfilController@UpdateProfile')->name('profil.picture_update');
  Route::resource('profil', 'ProfilController');
  Route::put('member/activating/{id}', 'MemberController@activating')->name('member.activating');
  Route::resource('member', 'MemberController');

  Route::get('klien/edit-api/{id?}', 'KlienController@editApi')->name('klien.editAjax');
  Route::post('klien/update-api/{id?}', 'KlienController@updateApi')->name('klien.updateAjax');
  Route::resource('klien', 'KlienController');
  Route::resource('penghasilan', 'PenghasilanController');
  Route::resource('landing-page', 'LandingPageController');
  Route::resource('promosi', 'PromosiController');
  Route::get('promosi/{slug}', 'PromosiController@show')->name('promosi.show');
  Route::resource('aturan', 'AturanController');
  Route::resource('bantuan', 'BantuanController');
  Route::resource('partner', 'PartnerController');
});

Route::prefix('member')->namespace('Member')->name('member.')->middleware(['auth:member'])->group(function () {
  Route::resource('dashboard', 'DashboardController');

  Route::put('profil/change-password', 'ProfilController@changePassword')->name('profil.change.password');
  Route::put('profil/picture-update', 'ProfilController@UpdateProfile')->name('profil.picture_update');
  Route::resource('profil', 'ProfilController');
  Route::resource('klien', 'KlienController');
  Route::resource('penghasilan', 'PenghasilanController');
  Route::resource('promosi', 'PromosiController');
  Route::resource('aturan', 'AturanController');
  Route::resource('bantuan', 'BantuanController');
});

Route::namespace('Home')->name('home.')->group(function () {
Route::get('/{promo}/{member}', 'HomeController@getPromo')->name('getpromo')->where(['promo' => '^(?!admin$).*$', 'promo' => '^(?!member$).*$']);
});
