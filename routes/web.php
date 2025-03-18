<?php

use App\Http\Controllers\Resi\KurirKontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bank\BankController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| semua orang akan mati pada waktunya
| hidup itu gampang, ngapain dipersulit
| 
|
*/

// Dashboard route
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* cek bank ewallet route */
Route::prefix('banks')->group(function () {
    Route::get('/', [BankController::class, 'index'])->name('banks.index');
    Route::post('/check', [BankController::class, 'checkAccount'])->name('banks.check');
});
/* cek resi route */
Route::prefix('resi')->group(function () {
    Route::get('/', [KurirKontroller::class, 'index'])->name('kurir.index');
    Route::post('/track', [KurirKontroller::class, 'trackPackage'])->name('kurir.track');
});