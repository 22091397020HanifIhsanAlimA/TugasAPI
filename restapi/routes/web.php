<?php

use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home',[
        'title' => 'Laravel 11 | API'
    ]);
});

//Route Register
Route::get('register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [UserController::class, 'register_store']);

//Route login
Route::get('login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [UserController::class, 'login_authenticate']); //nama bebas bagian autenticate
Route::post('logout', [UserController::class, 'logout']); //nama bebas bagian autenticate

//Route Dashboard
Route::get('dashboard', function() {
    return view('dashboard.index');

})->name('dashboard')->middleware('auth');

//Route Pengeluaran
Route::get('dashboard/pengeluaran/filter', [PengeluaranController::class, 'filter'])->name('filter')->middleware('auth');
Route::resource('dashboard/pengeluaran', PengeluaranController::class)->middleware('auth');
