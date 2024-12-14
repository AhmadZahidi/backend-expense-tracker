<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ExpenseController::class, 'dashboard'])->name('dashboard');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
});
