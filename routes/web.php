<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardMemberController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KemitraanController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\PenawaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [HomeController::class, 'berita_detail'])->name('berita.detail');

Route::get('/informasi', [HomeController::class, 'informasi'])->name('informasi');
Route::post('/penawaran-store', [HomeController::class, 'penawaran_store'])->name('penawaran.store');
Route::post('/pengaduan-store', [HomeController::class, 'pengaduan_store'])->name('pengaduan.store');

Route::get('/kemitraan', [HomeController::class, 'kemitraan'])->name('kemitraan');
Route::post('/kemitraan-store', [HomeController::class, 'kemitraan_store'])->name('kemitraan.store');

Route::get('/register-member', [MemberController::class, 'view_register'])->name('register.member')->middleware('guest:admin,member,web');
Route::post('/register-member-proses', [MemberController::class, 'create_member'])->name('register.member.proses');

Route::get('/login', [UserController::class, 'view_login'])->name('login')->middleware('guest:admin,member,web');
Route::post('/login-proses', [UserController::class, 'login_verif'])->name('login.load');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'view_register'])->name('register')->middleware('guest:admin,member,web');
Route::post('/register-proses', [UserController::class, 'store_register'])->name('register.load');

Route::group(['middleware' => 'member'], function(){
    Route::get('/dashboard-member', [DashboardMemberController::class, 'dashboard'])->name('dashboard-member.index');
    Route::get('/register-member/pengisian', [DashboardMemberController::class, 'multi_step'])->name('isidata.member');
    Route::post('/register-member/pengisian/store', [DashboardMemberController::class, 'storeData'])->name('store.data');
    Route::post('/register-member/pengisian/store-restoran', [DashboardMemberController::class, 'storeDataResto'])->name('store.data-resto');

    Route::get('/dashboard-member/profile', [DashboardMemberController::class, 'profile'])->name('dashboard-member.profile');
    Route::post('/dashboard-member/profile/img-upd', [DashboardMemberController::class, 'updateImg'])->name('dashboard-member.profile.img.upd');
    Route::post('/dashboard-member/profile/update', [DashboardMemberController::class, 'updProfile'])->name('dashboard-member.profile.update');
    
    Route::get('/dashboard-member/pengaduan', [DashboardMemberController::class, 'pengaduan'])->name('dashboard-member.pengaduan');
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard.index');

    Route::get('/dashboard/berita', [DashboardAdminController::class, 'berita'])->name('dashboard.berita');
    Route::post('/dashboard/berita-store', [BeritaController::class, 'store_berita'])->name('dashboard.berita.store');
    Route::get('/dashboard/berita-edit/{id}', [BeritaController::class, 'edit_berita'])->name('dashboard.berita.edit');
    Route::post('/dashboard/berita-update/{id}', [BeritaController::class, 'update_berita'])->name('dashboard.berita.update');
    Route::delete('/dashboard/berita-delete/{id}', [BeritaController::class, 'destroy_berita'])->name('dashboard.berita.destroy');
    
    Route::get('/dashboard/pengaduan', [DashboardAdminController::class, 'pengaduan'])->name('dashboard.pengaduan');

    Route::get('/dashboard/kemitraan', [DashboardAdminController::class, 'mitra'])->name('dashboard.mitra');
    Route::post('/dashboard/kemitraan/terima/{id}', [KemitraanController::class, 'terima_mitra'])->name('dashboard.mitra.terima');
    Route::post('/dashboard/kemitraan/tolak/{id}', [KemitraanController::class, 'tolak_mitra'])->name('dashboard.mitra.tolak');

    Route::get('/dashboard/member', [DashboardAdminController::class, 'member'])->name('dashboard.member');
    Route::get('/dashboard/member-detail/{id}', [DashboardAdminController::class, 'detail_member'])->name('dashboard.member.detail');
    Route::post('/dashboard/member/terima/{id}', [MemberController::class, 'terima_member'])->name('dashboard.member.terima');
    Route::post('/dashboard/member/tolak/{id}', [MemberController::class, 'tolak_member'])->name('dashboard.member.tolak');
    
    Route::get('/dashboard/master-data/jenis-usaha', [DashboardAdminController::class, 'jenis'])->name('dashboard.jenis');
    Route::post('/dashboard/jenis-usaha-store', [MasterDataController::class, 'store_jenis'])->name('dashboard.jenis.store');
    Route::get('/dashboard/jenis-usaha-edit/{id}', [MasterDataController::class, 'edit_jenis'])->name('dashboard.jenis.edit');
    Route::post('/dashboard/jenis-update/{id}', [MasterDataController::class, 'update_jenis'])->name('dashboard.jenis.update');
    Route::delete('/dashboard/jenis-usaha-delete/{id}', [MasterDataController::class, 'destroy_jenis'])->name('dashboard.jenis.destroy');
    
    Route::get('/dashboard/master-data/klasifikasi-usaha', [DashboardAdminController::class, 'klasifikasi'])->name('dashboard.klasifikasi');
    Route::post('/dashboard/klasifikasi-usaha-store', [MasterDataController::class, 'store_klasifikasi'])->name('dashboard.klasifikasi.store');
    Route::get('/dashboard/klasifikasi-usaha-edit/{id}', [MasterDataController::class, 'edit_klasifikasi'])->name('dashboard.klasifikasi.edit');
    Route::post('/dashboard/klasifikasi-update/{id}', [MasterDataController::class, 'update_klasifikasi'])->name('dashboard.klasifikasi.update');
    Route::delete('/dashboard/klasifikasi-usaha-delete/{id}', [MasterDataController::class, 'destroy_klasifikasi'])->name('dashboard.klasifikasi.destroy');
    
    Route::get('/dashboard/master-data/benefit', [DashboardAdminController::class, 'benefit'])->name('dashboard.benefit');
    Route::post('/dashboard/benefit-store', [MasterDataController::class, 'store_benefit'])->name('dashboard.benefit.store');
    Route::get('/dashboard/benefit-edit/{id}', [MasterDataController::class, 'edit_benefit'])->name('dashboard.benefit.edit');
    Route::post('/dashboard/benefit-update/{id}', [MasterDataController::class, 'update_benefit'])->name('dashboard.benefit.update');
    Route::delete('/dashboard/benefit-delete/{id}', [MasterDataController::class, 'destroy_benefit'])->name('dashboard.benefit.destroy');

    Route::get('/dashboard/penawaran', [DashboardAdminController::class, 'penawaran'])->name('dashboard.penawaran');
    Route::post('/dashboard/penawaran/terima/{id}', [PenawaranController::class, 'terima_penawaran'])->name('dashboard.penawaran.terima');
    Route::post('/dashboard/penawaran/tolak/{id}', [PenawaranController::class, 'tolak_penawaran'])->name('dashboard.penawaran.tolak');

    Route::get('/dashboard/profile', [DashboardAdminController::class, 'profile'])->name('dashboard.profile');
    Route::post('/dashboard/profile/img-upd', [DashboardAdminController::class, 'updateImg'])->name('dashboard.profile.img.update');
    Route::post('/dashboard/profile/update', [DashboardAdminController::class, 'updProfile'])->name('dashboard.profile.update');
    
    Route::get('/dashboard/9-Benefit/Button-Panic', [DashboardAdminController::class, 'panic_btn'])->name('dashboard.benefit.panic-btn');

    Route::get('/dashboard/superadmin/admin', [SuperAdminController::class, 'admin'])->name('dashboard.superadmin.admin');
    Route::post('/dashboard/superadmin/admin/add', [SuperAdminController::class, 'add_admin'])->name('dashboard.admin.add');
    Route::delete('/dashboard/superadmin/admin-delete/{id}', [SuperAdminController::class, 'destroy_admin'])->name('dashboard.admin.destroy');
    Route::post('/dashboard/superadmin/admin/reset-pass', [SuperAdminController::class, 'reset_pass'])->name('dashboard.admin.reset-pass');

    Route::get('/dashboard/superadmin/mitra', [SuperAdminController::class, 'mitra'])->name('dashboard.superadmin.mitra');
    Route::post('/dashboard/superadmin/mitra/store', [SuperAdminController::class, 'add_mitra']);
    Route::delete('/dashboard/superadmin/mitra-delete/{id}', [SuperAdminController::class, 'destroy_mitra'])->name('dashboard.mitra.destroy');
});