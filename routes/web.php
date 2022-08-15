<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/user/editprofil', 'UserController@editprofil')->name('profil.edit');
    Route::post('/user/update-profil/{id}', 'UserController@updateprofil')->name('profil.update');
    Route::post('/user/update-email/{id}', 'UserController@updateEmail')->name('email.update');
    Route::post('/user/ubah-password/', 'UserController@ubah_password')->name('password.update');
});


Route::group(['middleware' => 'role:dosen'], function () {

    //pembimbing skripsi 1
    Route::get('/admin/bimbingan-skripsi', 'SkripsibController@index')->name('dospem.index');
    Route::post('/admin/bimbingan-skripsi-dospem1/update/{id}', 'SkripsibController@update')->name('dospem1.update');

    //pembimbing skripsi 2
    Route::get('/admin/bimbingan-skripsi-dospem2', 'SkripsibController@indexDospem2')->name('dospem2.index');
});

Route::group(['middleware' => 'role:mahasiswa'], function () {
    //KP
    Route::get('/mahasiswa/daftar-sidang', 'DaftarSidangController@index')->name('daftarsidang.index');
    Route::post('/mahasiswa/daftar-sidang/simpan-kp', 'DaftarSidangController@simpankp')->name('daftarsidang.simpankp');

    //Skripsi
    Route::get('/mahasiswa/daftar-skripsi', 'DaftarSkripsiController@index')->name('daftarskripsi.index');
    Route::post('/mahasiswa/daftar-skripsi/simpan-skripsi', 'DaftarSkripsiController@simpansk')->name('daftarskripsi.simpansk');
});




Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/admin/manajemen-user', 'UserRoleController@index')->name('userrole.index');
    Route::post('/admin/manajemen-user/simpan', 'UserRoleController@simpan')->name('userrole.simpan');
    Route::delete('/admin/manajemen-user/hapus/{id}', 'UserRoleController@hapus')->name('userrole.hapus');

    Route::get('/admin/manajemen-role', 'RoleController@index')->name('role.index');
    Route::post('/admin/simpan-role', 'RoleController@simpan')->name('role.simpan');
    Route::get('/admin/edit-role/{role}', 'RoleController@edit')->name('role.edit');
    Route::post('/admin/update-role/{id}', 'RoleController@update')->name('role.update');
    Route::post('/admin/assign-role/{id}', 'RoleController@givePermission')->name('role.permission');
    Route::delete('/admin/hapus-role/{id}', 'RoleController@hapus')->name('role.hapus');



    Route::get('/admin/manajemen-permission', 'PermissionController@index')->name('permission.index');
    Route::post('/admin/simpan-permission', 'PermissionController@simpan')->name('permission.simpan');
    Route::get('/admin/edit-permission/{id}', 'PermissionController@edit')->name('permission.edit');
    Route::post('/admin/update-permission/{id}', 'PermissionController@update')->name('permission.update');
    Route::get('/admin/hapus-permission/{id}', 'PermissionController@hapus')->name('permission.hapus');

    //dosen
    Route::get('/admin/manajemen-dosen', 'DosenController@index')->name('dosen.index');
    Route::post('/admin/manajemen-dosen/simpan', 'DosenController@simpan')->name('dosen.simpan');

    //bimbingan kp
    Route::get('/admin/bimbingan-kp', 'KpbController@index')->name('kpb.index');
    Route::post('/admin/bimbingan-kp/simpan', 'KpbController@simpan')->name('kpb.simpan');

    //bimbingan skripsi


    //bimbingan proposal
    Route::get('/admin/bimbingan-proposal', 'ProposalbController@index')->name('pb.index');


    //penguji kp
    Route::get('/admin/penguji-kp', 'KppController@index')->name('kpp.index');

    //penguji skripsi
    Route::get('/admin/penguji-skripsi', 'SkripsipController@index')->name('skp.index');

    //penguji proposal
    Route::get('/admin/penguji-proposal', 'ProposalpController@index')->name('pp.index');


    //jadwal kp
    Route::get('/admin/jadwal-kp', 'KpjController@index')->name('kpj.index');

    //jadwal skripsi
    Route::get('/admin/jadwal-skripsi', 'SkripsijController@index')->name('skj.index');

    //jadwal proposal
    Route::get('/admin/jadwal-proposal', 'ProposaljController@index')->name('pj.index');
});

Route::group(['middleware' => 'role:admin|dosen'], function () {
    //penguji kp
    Route::get('/admin/penguji-kp', 'KppController@index')->name('kpp.index');

    //penguji skripsi
    Route::get('/admin/penguji-skripsi', 'SkripsipController@index')->name('skp.index');

    //penguji proposal
    Route::get('/admin/penguji-proposal', 'ProposalpController@index')->name('pp.index');

    //jadwal kp
    Route::get('/admin/jadwal-kp', 'KpjController@index')->name('kpj.index');

    //jadwal skripsi
    Route::get('/admin/jadwal-skripsi', 'SkripsijController@index')->name('skj.index');

    //jadwal proposal
    Route::get('/admin/jadwal-proposal', 'ProposaljController@index')->name('pj.index');
});
