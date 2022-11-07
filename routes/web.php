<?php

use App\Http\Controllers\BimbinganSkripsiController;
use App\Http\Controllers\DaftarKpController;
use App\Http\Controllers\DaftarProposalController;
use App\Http\Controllers\DaftarSemhasController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalKerjaPraktekController;
use App\Http\Controllers\JadwalSemhasController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PengujiKerjaPraktekController;
use App\Http\Controllers\PengujiProposalController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\DaftarSkripsiController;
use App\Http\Controllers\JadwalSemproController;
use App\Models\KerjaPraktek;
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


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/profil', [UserController::class, 'index'])->name('profil.index');
    Route::get('/user/editprofil', [UserController::class, 'editprofil'])->name('profil.edit');
    Route::post('/user/update-profil/{id}', [UserController::class, 'updateprofil'])->name('profil.update');
    Route::post('/user/update-email/{id}', [UserController::class, 'updateEmail'])->name('email.update');
    Route::post('/user/ubah-password/', [UserController::class, 'ubah_password'])->name('password.update');
});

Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/admin/pengaturan-aplikasi', [SettingsController::class, 'index'])->name('settings.index');
});

Route::group(['middleware' => 'role:dosen|admin|kaprodi'], function () {

    //manajemen pembimbing proposal
    Route::get('/admin/bimbingan-skripsi-dospem', [BimbinganSkripsiController::class, 'indexDospem1'])->name('dospem1.index');
    Route::get('/admin/bimbingan-skripsi-kaprodiacc', [BimbinganSkripsiController::class, 'kaprodiacc'])->name('kaprodi.acc');
    Route::post('/admin/bimbingan-skripsi-dospem/update/{id}', [BimbinganSkripsiController::class, 'update'])->name('dospem1.update');
    Route::post('/admin/bimbingan-skripsi-dospem2/update/{id}', [BimbinganSkripsiController::class, 'update2'])->name('dospem2.update');
    Route::get('/admin/bimbingan-skripsi-dospem2', [BimbinganSkripsiController::class, 'indexDospem2'])->name('dospem2.index');

    //manajemen pembimbing semhas
    // Route::get('/admin/bimbingan-semhas-dospem', 'SemhasbController@indexDospem1')->name('dospem1.index');
    // Route::get('/admin/bimbingan-semhas-kaprodiacc', 'SemhasbController@kaprodiacc')->name('kaprodi.acc');
    // Route::post('/admin/bimbingan-semhas-dospem/update/{id}', 'SemhasbController@update')->name('dospem1.update');
    // Route::post('/admin/bimbingan-semhas-dospem2/update/{id}', 'SemhasbController@update2')->name('dospem2.update');
    // Route::get('/admin/bimbingan-semhas-dospem2', 'SemhasbController@indexDospem2')->name('dospem2.index');

    //manajemen penguji proposal
    Route::get('/penguji/manajemen-penguji/', [PengujiProposalController::class, 'index'])->name('pengpro1.index');
    Route::get('/penguji/manajemen-penguji/info/{id}', [PengujiProposalController::class, 'infoPenguji1'])->name('pengpro1.info');
    Route::post('/penguji/manajemen-penguji/update-status-proposal/{id}', [PengujiProposalController::class, 'updatePenguji1'])->name('pengpro1.update');
    Route::get('/admin/penguji-proposal', [PengujiProposalController::class, 'index'])->name('pp.index');
    Route::get('/penguji/manajemen-penguji/ketua-sidang', [PengujiProposalController::class, 'index2'])->name('pengpro3.index');
    Route::get('/penguji/manajemen-penguji-3/', [PengujiProposalController::class, 'index2'])->name('ket_sidang.index');
    Route::get('/penguji/manajemen-penguji/penguji-2', [PengujiProposalController::class, 'index3'])->name('pengpro2.index');
    Route::get('/penguji/manajemen-penguji-penguji-2/', [PengujiProposalController::class, 'index3'])->name('penguji_2.index');
    Route::get('/penguji/manajemen-penguji/edit-revisi1/{id}', [PengujiProposalController::class, 'getRevisi'])->name('editRevisi1.edit');
    Route::post('/penguji/manajemen-penguji/simpanRevisi1/{id}', [PengujiProposalController::class, 'simpanRevisi1'])->name('simpanRevisi1.simpan');
    Route::get('/penguji/manajemen-penguji/edit-revisi2/{id}', [PengujiProposalController::class, 'getRevisi2'])->name('editRevisi2.edit');
    Route::post('/penguji/manajemen-penguji/simpanRevisi2/{id}', [PengujiProposalController::class, 'simpanRevisi2'])->name('simpanRevisi2.simpan');
});

Route::group(['middleware' => 'role:mahasiswa'], function () {
    // Daftar KP
    Route::get('/mahasiswa/daftar-kerja-praktek/tambah', [DaftarKpController::class,'index'])->name('daftarkp.index');
    Route::post('/mahasiswa/daftar-sidang/simpan-kp', [DaftarKpController::class,'simpankp'])->name('daftarkp.simpankp');

    // daftar skripsi
    Route::get('/mahasiswa/daftar-skripsi/tambah', [DaftarSkripsiController::class, 'index'])->name('daftarskripsi.index');
    Route::post('/mahasiswa/daftar-skripsi/simpan-skripsi', [DaftarSkripsiController::class, 'simpansk'])->name('daftarskripsi.simpansk');

    //Daftar Proposal
    Route::get('/mahasiswa/daftar-proposal/tambah', [DaftarProposalController::class, 'create'])->name('proposal.tambah');
    Route::post('/mahasiswa/daftar-sidang-proposal/store', [DaftarProposalController::class, 'store'])->name('proposal.store');

    //Daftar Semhas
    Route::get('/mahasiswa/daftar-semhas/tambah', [DaftarSemhasController::class, 'create'])->name('sidangsemhas.index');
    Route::post('/mahasiswa/daftar-semhas/store', [DaftarSemhasController::class, 'store'])->name('semhas.store');
});
Route::group(['middleware' => 'role:kaprodi|admin'], function () {
    Route::get('/kaprodi/manajemen-jadwal/proposal/lihat-file/{id}', function ($id) {
        $data = Sempro::findorfail($id);
        return response()->file($data->file_proposal);
    })->name('sempro.lihat');



    Route::get('/kaprodi/manajemen-jadwal/proposal/edit/{id}', [JadwalSemproController::class, 'edit'])->name('sempro.edit');
    Route::post('/kaprodi/manajemen-jadwal/proposal/buat-jadwal', [JadwalSemproController::class, 'getJadwal'])->name('sempro.buatjadwal');
    Route::post('/kaprodi/manajemen-jadwal/proposal/simpan-jadwal/{id}', [JadwalSemproController::class, 'simpanJadwal'])->name('sempro.simpanJadwal');
    Route::get('/kaprodi/manajemen-jadwal/proposal/lihat-jadwal', [JadwalSemproController::class, 'lihatJadwal'])->name('sempro.lihatJadwal');
    Route::get('/kaprodi/manajemen-jadwal/proposal/print-jadwal', [JadwalSemproController::class, 'printJadwal'])->name('sempro.printJadwal');
    Route::get('/kaprodi/manajemen-jadwal/proposal', [JadwalSemproController::class, 'index'])->name('man-pro.index');
    Route::get('/kaprodi/manajemen-jadwal/editJadwal/{id}', [JadwalSemproController::class, 'editJadwal'])->name('jadwal.edit');
    Route::post('/kaprodi/manajemen-jadwal/updateJadwal/{id}', [JadwalSemproController::class, 'updateJadwal'])->name('jadwalskripsi.update');

    // Route::get('/kaprodi/manajemen-jadwal/kerja-praktek', [JadwalKerjaPraktekController::class, 'index'])->name('kp.index');

    // KP JADWAL

    Route::get('/kaprodi/manajemen-jadwal/kerja-praktek/lihat-file/{id}', function ($id) {
        $data = KerjaPraktek::findorfail($id);
        return response()->file($data->file_kp);
    })->name('kp.lihat');

    Route::get('/kaprodi/manajemen-jadwal/kerja-praktek/edit/{id}', [JadwalKerjaPraktekController::class, 'editJadwal'])->name('kp.edit');
    Route::post('/kaprodi/manajemen-jadwal/kerja-praktek/buat-jadwal', [JadwalKerjaPraktekController::class, 'getJadwal'])->name('kp.buatjadwal');
    Route::post('/kaprodi/manajemen-jadwal/kerja-praktek/simpan-jadwal/{id}', [JadwalKerjaPraktekController::class, 'simpanJadwal'])->name('kp.simpanJadwal');
    Route::get('/kaprodi/manajemen-jadwal/kerja-praktek/lihat-jadwal', [JadwalKerjaPraktekController::class, 'lihatJadwal'])->name('kp.lihatJadwal');
    Route::get('/kaprodi/manajemen-jadwal/kerja-praktek/print-jadwal', [JadwalKerjaPraktekController::class, 'printJadwal'])->name('kp.printJadwal');
    Route::get('/kaprodi/manajemen-jadwal/kerja-praktek', [JadwalKerjaPraktekController::class, 'index'])->name('kp.index');
    Route::get('/kaprodi/manajemen-jadwal/editJadwal/{id}', [JadwalKerjaPraktekController::class, 'editJadwal'])->name('jadwalkp.edit');
    Route::post('/kaprodi/manajemen-jadwal/updateJadwal/{id}', [JadwalKerjaPraktekController::class, 'updateJadwal'])->name('jadwalkp.update');
    Route::get('/kaprodi/manajemen-jadwal/kerja-praktek/detail/{id}', [JadwalKerjaPraktekController::class, 'detail'])->name('jadwalkp.detail');

    // // semhas jadwal
    // Route::get('/kaprodi/manajemen-jadwal/semhas/lihat-file/{id}', function ($id) {
    //     $data = Semhas::findorfail($id);
    //     return response()->file($data->file_skripsi);
    // })->name('semhas.lihat');
    // Route::get('/kaprodi/manajemen-jadwal/semhas', [JadwalSemhasController::class,'index'])->name('jadwalsemhas.index');
    // Route::get('/kaprodi/manajemen-jadwal/semhas/edit/{id}', [JadwalSemhasController::class,'edit'])->name('jadwalsemhas.edit');
    // Route::get('/kaprodi/manajemen-jadwal/semhas/buat-jadwal/{id}', [JadwalSemhasController::class,'getJadwal'])->name('semhas.buatjadwal');
    // Route::post('/kaprodi/manajemen-jadwal/semhas/simpan-jadwal/{id}', [JadwalSemhasController::class,'simpanJadwal'])->name('semhas.simpanJadwal');
    // Route::get('/kaprodi/manajemen-jadwal/semhas/lihat-jadwal', [JadwalSemhasController::class,'lihatJadwal'])->name('semhas.lihatJadwal');

    // Route::get('/kaprodi/manajemen-jadwal/proposal/edit/{id}', [JadwalSemhasController::class,'edit'])->name('sempro.edit');
    // Route::post('/kaprodi/manajemen-jadwal/proposal/buat-jadwal', [JadwalSemhasController::class,'getJadwal'])->name('sempro.buatjadwal');
    // Route::post('/kaprodi/manajemen-jadwal/proposal/simpan-jadwal/{id}', [JadwalSemhasController::class,'simpanJadwal'])->name('sempro.simpanJadwal');
    // Route::get('/kaprodi/manajemen-jadwal/proposal/lihat-jadwal', [JadwalSemhasController::class,'lihatJadwal'])->name('sempro.lihatJadwal');
    // Route::get('/kaprodi/manajemen-jadwal/proposal/print-jadwal', [JadwalSemhasController::class,'printJadwal'])->name('sempro.printJadwal');
    // Route::get('/kaprodi/manajemen-jadwal/proposal', [JadwalSemhasController::class,'index'])->name('man-pro.index');
});


Route::group(['middleware' => 'role:admin|kaprodi'], function () {
    Route::get('/admin/manajemen-user', [UserRoleController::class, 'index'])->name('userrole.index');
    Route::post('/admin/manajemen-user/simpan', [UserRoleController::class, 'simpan'])->name('userrole.simpan');
    Route::get('/admin/manajemen-user/edit/{user}', [UserRoleController::class, 'edit'])->name('userrole.edit');
    Route::post('/admin/manajemen-user/update/{id}', [UserRoleController::class, 'update'])->name('userrole.update');
    Route::delete('/admin/manajemen-user/hapus/{id}', [UserRoleController::class, 'hapus'])->name('userrole.hapus');

    Route::get('/admin/manajemen-role', [RoleController::class, 'index'])->name('role.index');
    Route::post('/admin/simpan-role', [RoleController::class, 'simpan'])->name('role.simpan');
    Route::get('/admin/edit-role/{role}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/admin/update-role/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::post('/admin/assign-role/{id}', [RoleController::class, 'givePermission'])->name('role.permission');
    Route::delete('/admin/hapus-role/{id}', [RoleController::class, 'hapus'])->name('role.hapus');



    Route::get('/admin/manajemen-permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('/admin/simpan-permission', [PermissionController::class, 'simpan'])->name('permission.simpan');
    Route::get('/admin/edit-permission/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/admin/update-permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('/admin/hapus-permission/{id}', [PermissionController::class, 'hapus'])->name('permission.hapus');

    //dosen
    Route::get('/admin/manajemen-dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::post('/admin/manajemen-dosen/simpan', [DosenController::class, 'simpan'])->name('dosen.simpan');
});



Route::group(['middleware' => 'role:admin|dosen|kaprodi'], function () {

    //penguji kp
    Route::get('/admin/penguji-kp', [PengujiKerjaPraktekController::class, 'index'])->name('kpp.index');

    //jadwal kp
    Route::get('/admin/jadwal-kp', [JadwalKerjaPraktekController::class, 'index'])->name('kpj.index');
});

Route::group(['middleware' => 'role:admin|kaprodi'], function () {
    Route::get('/admin/pendaftar', [PendaftarController::class, 'index'])->name('pd.index');
    Route::get('/admin/info-pendaftar/{id}', [PendaftarController::class, 'getInfo']);
});