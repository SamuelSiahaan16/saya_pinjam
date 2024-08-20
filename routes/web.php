<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/cek-status', [HomeController::class, 'status'])->name('cekstatus');
Route::get('/cek-status/search', [HomeController::class, 'cekStatus'])->name('cek-status');

Route::get('/jaminan-motor', [HomeController::class, 'pinJamTor'])->name('jaminan-motor');
Route::get('/jaminan-tanah', [HomeController::class, 'pinJamTan'])->name('jaminan-tanah');
Route::get('/pinjaman-guru-pns', [HomeController::class, 'pinGuPns'])->name('pinjaman-guru-pns');
Route::get('/pinjaman-pegawai-negri', [HomeController::class, 'pinPegNeg'])->name('pinjaman-pegawai-negri');
Route::get('/karyawan-swasta', [HomeController::class, 'pinKarySwas'])->name('karyawan-swasta');

Route::get('/jaminan-motor/form', [FormController::class, 'formPinJamTor'])->name('form-jaminan-motor');
Route::get('/jaminan-tanah/form', [FormController::class, 'formPinJamTan'])->name('form-jaminan-tanah');
Route::get('/pinjaman-guru-pns/form', [FormController::class, 'formPinGuPns'])->name('form-pinjaman-guru-pns');
Route::get('/pinjaman-pegawai-negri/form', [FormController::class, 'formPinPegNeg'])->name('form-pinjaman-pegawai-negri');
Route::get('/karyawan-swasta/form', [FormController::class, 'formPinKarySwas'])->name('form-karyawan-swasta');

Route::post('/jaminan-motor/form', [LoanController::class, 'storePin'])->name('store-jaminan-motor');
Route::post('/jaminan-tanah/form', [LoanController::class, 'storePin'])->name('store-jaminan-tanah');
Route::post('/pinjaman-guru-pns/form', [LoanController::class, 'storePin'])->name('store-pinjaman-guru-pns');
Route::post('/pinjaman-pegawai-negri/form', [LoanController::class, 'storePin'])->name('store-pinjaman-pegawai-negri');
Route::post('/karyawan-swasta/form', [LoanController::class, 'storePin'])->name('store-karyawan-swasta');

Route::get('/form/success', [LoanController::class, 'success'])->name('form-success');