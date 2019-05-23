<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function ()
{
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth'], function ()
{
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

Route::group(['prefix' => 'member', 'namespace' => 'Member', 'as' => 'member.'], function ()
{
    Route::resource('dashboard', 'DashboardController');
    Route::resource('profil', 'ProfilController');
    Route::resource('klien', 'KlienController');
    Route::resource('penghasilan', 'PenghasilanController');
    Route::resource('promosi', 'PromosiController');
    Route::resource('aturan', 'AturanController');
    Route::resource('bantuan', 'BantuanController');
});
