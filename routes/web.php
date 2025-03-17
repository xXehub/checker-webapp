<?php

use App\Http\Controllers\Bank\BankController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Bank Account Checker Routes
Route::get('/banks', [BankController::class, 'index'])->name('banks.index');
Route::post('/check-account', [BankController::class, 'checkAccount'])->name('check.account');