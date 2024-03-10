<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SimulasiController;

// login
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login/cek', [SessionController::class, 'cekLogin'])->name('cekLogin');
// logout
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
// register
Route::get('/register', [SessionController::class, 'register']);
Route::post('/cekregister', [SessionController::class, 'create']);

// rute untuk yang sudah login
Route::group(['middleware' => 'auth'], function(){
    // Home
    Route::get('/', [HomeController::class, 'index']);
    // Guru
    Route::resource('guru', GuruController::class);
    // route untuk admin
    Route::group(['middleware' => ['cekUserLogin:admin']], function(){
        // paket 
        Route::resource('paket', PaketController::class);
        Route::get('/t_paket', [PaketController::class, 'create']);
        Route::get('/e_paket/{id}', [PaketController::class, 'edit']);
        Route::patch('u_paket/{id}', [PaketController::class, 'update']);
        Route::delete('paket/{id}', [PaketController::class, 'destroy']);
        // outlet
        Route::resource('outlet', OutletController::class);
        Route::get('/t_outlet', [OutletController::class, 't_outlet']);
        Route::get('e_outlet/{id}', [OutletController::class, 'e_outlet']);
        Route::patch('u_outlet/{id}', [OutletController::class, 'update']);
        Route::delete('h_outlet/{id}', [OutletController::class, 'delete']);
        // user 
        Route::resource('pengguna', PenggunaController::class);
        Route::get('/e_pengguna/{id}', [PenggunaController::class, 'e_pengguna']);
        Route::patch('/u_pengguna/{id}', [PenggunaController::class, 'u_pengguna']);
        // pelanggan 
        Route::resource('pelanggan', MemberController::class);
        Route::get('/t_pelanggan', [MemberController::class, 't_pelanggan']);
        Route::get('e_pelanggan/{id}', [MemberController::class, 'e_pelanggan']);
        Route::post('u_pelanggan/{id}', [MemberController::class, 'update']);
        Route::delete('h_pelanggan/{id}', [MemberController::class, 'delete']);
        Route::get('/cetak_pelanggan', [MemberController::class, 'cetak']);
    });

    // Route untuk kasir
    Route::group(['middleware' => ['cekUserLogin:kasir']], function(){
        // transaksi crud
        Route::resource('transaksi', TransaksiController::class);
        Route::get('/t_transaksi', [TransaksiController::class, 't_transaksi']);
        Route::get('e_transaksi/{id}', [TransaksiController::class, 'e_transaksi']);
        Route::post('u_transaksi/{id}', [TransaksiController::class, 'u_transaksi']);
    });
    
    // Route untuk owner
    Route::group(['middleware' => ['cekUserLogin:owner']], function(){
        Route::resource('laporan', LaporanController::class);
        Route::get('/cetak_laporan', [LaporanController::class, 'cetak']);
    });

    // guru crud
    Route::get('/t_guru', [GuruController::class, 'create']);
    Route::get('e_guru/{id}', [GuruController::class, 'edit']);
    Route::post('u_guru/{id}', [GuruController::class, 'update']);
    Route::delete('h_guru/{id}', [GuruController::class, 'destroy']);
    Route::get('/cetak_guru', [GuruController::class, 'cetak']);
});

// Excel Export
Route::get('guru-export', [GuruController::class, 'export']);
// Excel Import 
Route::post('guru/import', [GuruController::class, 'import'])->name('import-paket');

// simulasi
Route::get('simulasi', [SimulasiController::class, 'index'])->name('simulasi');
Route::get('simulasi_cucian', [SimulasiController::class, 'simulasiCucian'])->name('simulasiCucian');

