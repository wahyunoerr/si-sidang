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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/profil', 'UserController@index')->name('profil.index');
    Route::get('/user/editprofil','UserController@editprofil')->name('profil.edit');
    Route::post('/user/update-profil/{id}','UserController@updateprofil')->name('profil.update');
    Route::post('/user/update-email/{id}','UserController@updateEmail')->name('email.update');
    Route::post('/user/ubah-password/{id}','UserController@ubah_password')->name('password.update');
});


Route::group(['middleware' => 'role:mahasiswa'], function () {
    Route::get('/mahasiswa/daftar-sidang', 'DaftarSidangController@index')->name('daftarsidang.index');
});


Route::group(['middleware' => 'auth', 'role:admin'], function () {
    Route::get('/admin/manajemen-user','UserRoleController@index')->name('userrole.index');

    Route::get('/admin/manajemen-role','RoleController@index')->name('role.index');
    Route::post('/admin/simpan-role','RoleController@simpan')->name('role.simpan');
    Route::get('/admin/edit-role/{id}','RoleController@edit')->name('role.edit');
    Route::post('/admin/update-role/{id}','RoleController@update')->name('role.update');
    Route::post('/admin/assign-role/{id}','RoleController@givePermission')->name('role.permission');
    Route::get('/admin/hapus-role/{id}','RoleController@hapus')->name('role.hapus');
    Route::get('/admin/hapus-permission/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    // Route::get('/admin/manajemen-permission','PermissionController@index')->name('permission.index');
    // Route::post('/admin/simpan-permission','PermissionController@simpan')->name('permission.simpan');
    // Route::get('/admin/edit-permission/{id}','PermissionController@edit')->name('permission.edit');
    // Route::post('/admin/update-permission/{id}','PermissionController@update')->name('permission.update');
    // Route::get('/admin/hapus-permission/{id}','PermissionController@hapusPermission')->name('permission.hapus');
});

