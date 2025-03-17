<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bank\BankController;

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

// Dashboard route
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Unified Account Checker Routes
Route::prefix('banks')->group(function () {
    Route::get('/', [BankController::class, 'index'])->name('banks.index');
    Route::post('/check', [BankController::class, 'checkAccount'])->name('banks.check');
});