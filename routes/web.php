<?php

Route::view('/', 'landing');
Route::view('about', 'about');
Route::view('mitra', 'mitra');
Route::view('support', 'support');
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
  Auth::routes();
});
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('auth')->group(function () {
  Route::resource('dashboard', 'DashboardController');
  Route::resource('profil', 'ProfilController');
  Route::resource('member', 'MemberController');
  Route::resource('klien', 'KlienController');
  Route::resource('penghasilan', 'PenghasilanController');
  Route::resource('landing-page', 'LandingPageController');
  Route::resource('promosi', 'PromosiController');
  Route::resource('aturan', 'AturanController');
  Route::resource('bantuan', 'BantuanController');
});

Route::prefix('member')->namespace('Member')->name('member.')->group(function () {
  Route::resource('dashboard', 'DashboardController');
  Route::resource('profil', 'ProfilController');
  Route::resource('klien', 'KlienController');
  Route::resource('penghasilan', 'PenghasilanController');
  Route::resource('promosi', 'PromosiController');
  Route::resource('aturan', 'AturanController');
  Route::resource('bantuan', 'BantuanController');
});
