<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Sempro;
use App\Models\Semhas;
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

Route::get('/', 'FrontEndController@index');





Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/profil', 'UserController@index')->name('profil.index');
    Route::get('/user/editprofil', 'UserController@editprofil')->name('profil.edit');
    Route::post('/user/update-profil/{id}', 'UserController@updateprofil')->name('profil.update');
    Route::post('/user/update-email/{id}', 'UserController@updateEmail')->name('email.update');
    Route::post('/user/ubah-password/', 'UserController@ubah_password')->name('password.update');
});


Route::group(['middleware' => 'role:dosen|admin|kaprodi'], function () {
    Route::get('/admin/bimbingan-skripsi-dospem', 'SkripsibController@indexDospem1')->name('dospem1.index');
    Route::get('/admin/bimbingan-skripsi-kaprodiacc', 'SkripsibController@kaprodiacc')->name('kaprodi.acc');
    Route::post('/admin/bimbingan-skripsi-dospem/update/{id}', 'SkripsibController@update')->name('dospem1.update');
    Route::post('/admin/bimbingan-skripsi-dospem2/update/{id}', 'SkripsibController@update2')->name('dospem2.update');

    Route::get('/admin/bimbingan-skripsi-dospem2', 'SkripsibController@indexDospem2')->name('dospem2.index');

    Route::get('/penguji/manajemen-penguji/', 'ProposalpController@index')->name('pengpro1.index');
    Route::get('/penguji/manajemen-penguji/info/{id}', 'ProposalpController@infoPenguji1')->name('pengpro1.info');
    Route::post('/penguji/manajemen-penguji/update-status-proposal/{id}', 'ProposalpController@updatePenguji1')->name('pengpro1.update');
    Route::get('/admin/penguji-proposal', 'ProposalpController@index')->name('pp.index');
    Route::get('/penguji/manajemen-penguji/ketua-sidang', 'ProposalpController@index2')->name('pengpro3.index');
    Route::get('/penguji/manajemen-penguji-3/', 'ProposalpController@index2')->name('ket_sidang.index');
    Route::get('/penguji/manajemen-penguji/penguji-2', 'ProposalpController@index3')->name('pengpro2.index');
    Route::get('/penguji/manajemen-penguji-penguji-2/', 'ProposalpController@index3')->name('penguji_2.index');
    Route::get('/penguji/manajemen-penguji/edit-revisi1/{id}', 'ProposalpController@getRevisi')->name('editRevisi1.edit');
    Route::post('/penguji/manajemen-penguji/simpanRevisi1/{id}', 'ProposalpController@simpanRevisi1')->name('simpanRevisi1.simpan');
    Route::get('/penguji/manajemen-penguji/edit-revisi2/{id}', 'ProposalpController@getRevisi2')->name('editRevisi2.edit');
    Route::post('/penguji/manajemen-penguji/simpanRevisi2/{id}', 'ProposalpController@simpanRevisi2')->name('simpanRevisi2.simpan');
});

Route::group(['middleware' => 'role:mahasiswa'], function () {
    //KP
    // Route::get('/mahasiswa/daftar-sidang', 'DaftarSidangController@index')->name('daftarsidang.index');
    // Route::post('/mahasiswa/daftar-sidang/simpan-kp', 'DaftarSidangController@simpankp')->name('daftarsidang.simpankp');

    // daftar skripsi
    Route::get('/mahasiswa/daftar-skripsi/tambah', 'DaftarSkripsiController@index')->name('daftarskripsi.index');
    Route::post('/mahasiswa/daftar-skripsi/simpan-skripsi', 'DaftarSkripsiController@simpansk')->name('daftarskripsi.simpansk');

    //Daftar Proposal
    Route::get('/mahasiswa/daftar-proposal/tambah', 'DaftarProposalController@create')->name('proposal.tambah');
    Route::post('/mahasiswa/daftar-sidang-proposal/store', 'DaftarProposalController@store')->name('proposal.store');

    Route::get('/mahasiswa/daftar-semhas', 'DaftarSemhasController@create')->name('sidangsemhas.index');
    Route::post('/mahasiswa/daftar-semhas/store', 'DaftarSemhasController@store')->name('semhas.store');
});


Route::group(['middleware' => 'role:kaprodi|admin'], function () {
    Route::get('/kaprodi/manajemen-jadwal/proposal/lihat-file/{id}', function ($id) {
        $data = Sempro::findorfail($id);
        return response()->file($data->file_proposal);
    })->name('sempro.lihat');

    Route::get('/kaprodi/manajemen-jadwal/proposal', 'JadwalProposalController@index')->name('man-pro.index');
    Route::get('/kaprodi/manajemen-jadwal/proposal/edit/{id}', 'JadwalProposalController@edit')->name('sempro.edit');
    Route::get('/kaprodi/manajemen-jadwal/proposal/buat-jadwal/{id}', 'JadwalProposalController@getJadwal')->name('sempro.buatjadwal');
    Route::post('/kaprodi/manajemen-jadwal/proposal/simpan-jadwal/{id}', 'JadwalProposalController@simpanJadwal')->name('sempro.simpanJadwal');
    Route::get('/kaprodi/manajemen-jadwal/proposal/lihat-jadwal', 'JadwalProposalController@lihatJadwal')->name('sempro.lihatJadwal');
    Route::get('/kaprodi/manajemen-jadwal/proposal/print-jadwal', 'JadwalProposalController@printJadwal')->name('sempro.printJadwal');

    // semhas
    Route::get('/kaprodi/manajemen-jadwal/semhas/lihat-file/{id}', function ($id) {
        $data = Semhas::findorfail($id);
        return response()->file($data->file_skripsi);
    })->name('semhas.lihat');
    Route::get('/kaprodi/manajemen-jadwal/semhas', 'SemhasjController@index')->name('jadwalsemhas.index');
    Route::get('/kaprodi/manajemen-jadwal/semhas/edit/{id}', 'SemhasjController@edit')->name('jadwalsemhas.edit');
    Route::get('/kaprodi/manajemen-jadwal/semhas/buat-jadwal/{id}', 'SemhasjController@getJadwal')->name('semhas.buatjadwal');
    Route::post('/kaprodi/manajemen-jadwal/semhas/simpan-jadwal/{id}', 'SemhasjController@simpanJadwal')->name('semhas.simpanJadwal');
    Route::get('/kaprodi/manajemen-jadwal/semhas/lihat-jadwal', 'SemhasjController@lihatJadwal')->name('semhas.lihatJadwal');

    Route::get('/kaprodi/manajemen-jadwal/proposal/edit/{id}', 'SemprojController@edit')->name('sempro.edit');
    Route::get('/kaprodi/manajemen-jadwal/proposal/buat-jadwal/{id}', 'SemprojController@getJadwal')->name('sempro.buatjadwal');
    Route::post('/kaprodi/manajemen-jadwal/proposal/simpan-jadwal/{id}', 'SemprojController@simpanJadwal')->name('sempro.simpanJadwal');
    Route::get('/kaprodi/manajemen-jadwal/proposal/lihat-jadwal', 'SemprojController@lihatJadwal')->name('sempro.lihatJadwal');
    Route::get('/kaprodi/manajemen-jadwal/proposal/print-jadwal', 'SemprojController@printJadwal')->name('sempro.printJadwal');
    Route::get('/kaprodi/manajemen-jadwal/proposal', 'SemprojController@index')->name('man-pro.index');
});


Route::group(['middleware' => 'role:admin|kaprodi'], function () {
    Route::get('/admin/manajemen-user', 'UserRoleController@index')->name('userrole.index');
    Route::post('/admin/manajemen-user/simpan', 'UserRoleController@simpan')->name('userrole.simpan');
    Route::get('/admin/manajemen-user/edit/{user}', 'UserRoleController@edit')->name('userrole.edit');
    Route::post('/admin/manajemen-user/update/{id}', 'UserRoleController@update')->name('userrole.update');
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

    //penguji kp
    Route::get('/admin/penguji-kp', 'KppController@index')->name('kpp.index');



    //jadwal kp
    Route::get('/admin/jadwal-kp', 'KpjController@index')->name('kpj.index');
});



Route::group(['middleware' => 'role:admin|dosen|kaprodi'], function () {

    //penguji kp
    Route::get('/admin/penguji-kp', 'KppController@index')->name('kpp.index');

    //jadwal kp
    Route::get('/admin/jadwal-kp', 'KpjController@index')->name('kpj.index');
});

Route::group(['middleware' => 'role:admin|kaprodi'], function () {
    Route::get('/admin/pendaftar', 'PendaftarController@index')->name('pd.index');
    Route::get('/admin/info-pendaftar/{id}', 'PendaftarController@getInfo');
});