<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/user/profil', 'UserController@index')->name('profil.index');
    Route::get('/user/editprofil','UserController@editprofil')->name('profil.edit');
    Route::post('/user/update-profil/{id}','UserController@updateprofil')->name('profil.update');
    Route::post('/user/update-email/{id}','UserController@updateEmail')->name('email.update');
    Route::post('/user/ubah-password/{id}','UserController@ubah_password')->name('password.update');
});
